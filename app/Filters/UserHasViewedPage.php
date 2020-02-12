<?php

namespace BristolSU\Module\StaticPage\Filters;

use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Support\ActivityInstance\Contracts\DefaultActivityInstanceGenerator;
use BristolSU\Support\Filters\Contracts\Filters\UserFilter;
use BristolSU\Support\ModuleInstance\Contracts\ModuleInstanceRepository;
use BristolSU\Support\ModuleInstance\ModuleInstance;

class UserHasViewedPage extends UserFilter
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
            return $moduleInstance->activity->activity_for === 'user';
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
        $activityInstance = app(DefaultActivityInstanceGenerator::class)->generate($moduleInstance->activity, 'user', $this->user()->id());
        return PageView::forResource($activityInstance->id, $moduleInstance->id)->count() >= ( $settings['number_of_views'] ?? 1);
    }

    /**
     * Name of the filter
     *
     * @return string Name of the filter
     */
    public function name()
    {
        return 'Static Page: User has viewed page';
    }

    /**
     * Description of the filter
     *
     * @return string Description of the filter
     */
    public function description()
    {
        return 'A user has viewed a given static page module.';
    }

    /**
     * Alias of the filter
     *
     * @return string Alias of the filter
     */
    public function alias()
    {
        return 'static_page_user_has_viewed_page';
    }
}