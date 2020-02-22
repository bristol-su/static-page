<?php

namespace BristolSU\Module\StaticPage\Filters;

use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Support\ActivityInstance\Contracts\DefaultActivityInstanceGenerator;
use BristolSU\Support\Filters\Contracts\Filters\GroupFilter;
use BristolSU\Support\ModuleInstance\Contracts\ModuleInstanceRepository;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use FormSchema\Schema\Form;

class GroupHasViewedPage extends GroupFilter
{

    /**
     * Get possible options as an array
     *
     * Array should be a key => value of the option key and the default value
     *
     * @return Form Options
     * @throws \Exception
     */
    public function options(): Form
    {
        return \FormSchema\Generator\Form::make()->withField(
            \FormSchema\Generator\Field::select('module_instance_id')->label('Page to View')->featured(true)
                ->required(true)->hint('The page the group needs to view')
                ->help('The page the group needs to view before it is added to the logic group.')
                ->values($this->moduleInstances())
                ->selectOptions(['noneSelectedText' => 'Please Select a Page', 'hideNoneSelectedText' => false])
        )->withField(
            \FormSchema\Generator\Field::input('number_of_views')->inputType('number')->label('Number of Views')
                ->required(true)->default(1)->hint('The number of times a user needs to view the page')
                ->help('The number of times a user should view the page before passing the filter. 1 will add the user to the group on the first view, 2 on the second etc.')
        )->getSchema();
    }

    public function moduleInstances()
    {
        return app(ModuleInstanceRepository::class)->allWithAlias('static-page')->filter(function(ModuleInstance $moduleInstance) {
            return $moduleInstance->activity->activity_for === 'group';
        })->map(function(ModuleInstance $moduleInstance) {
            return ['id' => $moduleInstance->id(), 'name' => $moduleInstance->activity->name . ' - ' . $moduleInstance->name];
        })->toArray();
    }
    
    /**
     * Test if the filter passes
     *
     * @param string $settings Filled in values in the form of options()
     *
     * @return bool Does the filter pass?
     */
    public function evaluate($settings): bool
    {
        $moduleInstance = app(ModuleInstanceRepository::class)->getById($settings['module_instance_id']);
        $activityInstance = app(DefaultActivityInstanceGenerator::class)->generate($moduleInstance->activity, 'group', $this->group()->id());
        return PageView::forResource($activityInstance->id, $moduleInstance->id)->count() >= ( $settings['number_of_views'] ?? 1);
    }

    /**
     * Name of the filter
     *
     * @return string Name of the filter
     */
    public function name()
    {
        return 'Static Page: Group has viewed page';
    }

    /**
     * Description of the filter
     *
     * @return string Description of the filter
     */
    public function description()
    {
        return 'A group has viewed a given static page module.';
    }

    /**
     * Alias of the filter
     *
     * @return string Alias of the filter
     */
    public function alias()
    {
        return 'static_page_group_has_viewed_page';
    }
}