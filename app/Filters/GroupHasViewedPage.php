<?php

namespace BristolSU\Module\StaticPage\Filters;

use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Support\ActivityInstance\Contracts\DefaultActivityInstanceGenerator;
use BristolSU\Support\Filters\Contracts\Filters\GroupFilter;
use BristolSU\Support\ModuleInstance\Contracts\ModuleInstanceRepository;
use BristolSU\Support\ModuleInstance\ModuleInstance;

class GroupHasViewedPage extends GroupFilter
{

    /**
     * Get possible options as an array
     *
     * Array should be a key => value of the option key and the default value
     * e.g. ['group_name' => 'Group Name Default']
     *
     * @return array Options
     */
    public function options(): array
    {
        return [
            'number_of_views' => '',
            'module_instance_id' => $this->moduleInstances()
        ];
    }

    public function moduleInstances()
    {
        return app(ModuleInstanceRepository::class)->allWithAlias('static-page')->filter(function(ModuleInstance $moduleInstance) {
            return $moduleInstance->activity->activity_for === 'group';
        })->keyBy('id')->map(function(ModuleInstance $moduleInstance) {
            return $moduleInstance->name;
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