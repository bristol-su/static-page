<?php


namespace BristolSU\Module\StaticPage\CompletionConditions;


use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\Completion\Contracts\CompletionCondition;
use BristolSU\Support\ModuleInstance\Contracts\ModuleInstance;
use FormSchema\Schema\Form;

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

    public function percentage($settings, ActivityInstance $activityInstance, ModuleInstance $moduleInstance): int
    {
        $count = PageView::forResource($activityInstance->id, $moduleInstance->id)->count();
        $needed = ( $settings['number_of_views'] ?? 1);
        
        $percentage = (int) round(($count/$needed) * 100, 0);
        
        if($percentage > 100) {
            return 100;
        }
        return $percentage;
    }

    /**
     * Options required by the completion condition.
     *
     * Any settings requested in here will be passed into the percentage or isComplete methods.
     *
     * @return Form
     * @throws \Exception
     */
    public function options(): Form
    {
        return \FormSchema\Generator\Form::make()->withField(
            \FormSchema\Generator\Field::input('number_of_views')->inputType('number')->label('Number of Views')
                ->required(true)->default(1)->hint('The number of times a user needs to view the page')
                ->help('The number of times a user should view the page before the module is marked as complete. 1 will mark the module as complete on the first view, 2 on the second etc.')
        )->getSchema();
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