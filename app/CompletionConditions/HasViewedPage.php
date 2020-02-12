<?php


namespace BristolSU\Module\StaticPage\CompletionConditions;


use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\Completion\Contracts\CompletionCondition;
use BristolSU\Support\ModuleInstance\Contracts\ModuleInstance;

class HasViewedPage extends CompletionCondition
{

    /**
     * Is the condition fully complete?
     *
     * @param array $settings Settings of the completion condition
     * @param ActivityInstance $activityInstance Activity instance to test
     * @param ModuleInstance $moduleInstance Module instance to test
     * @return bool If the condition is complete
     */
    public function isComplete($settings, ActivityInstance $activityInstance, ModuleInstance $moduleInstance): bool
    {
        return PageView::forResource($activityInstance->id, $moduleInstance->id)->count() >= ( $settings['number_of_views'] ?? 1);
    }

    /**
     * Options required by the completion condition.
     *
     * This allows for you to get user input to modify the behaviour of this class. For example, you could give an
     * option of a 'number of files' to be approved before the condition is complete.
     * [
     *      'number_of_files' => 1
     * ]
     * Any settings requested in here will be passed into the percentage or isComplete methods.
     *
     * @return array
     */
    public function options(): array
    {
        return [
            'number_of_views' => ''
        ];
    }

    /**
     * A name for the completion condition
     *
     * @return string
     */
    public function name(): string
    {
        return 'Has viewed the page';
    }

    /**
     * A description of the completion condition
     *
     * @return string
     */
    public function description(): string
    {
        return 'Marked as complete when the user/group/role has viewed the page a number of times.';
    }

    /**
     * The alias of the completion condition
     *
     * @return string
     */
    public function alias(): string
    {
        return 'static_page_has_viewed_page';
    }
}