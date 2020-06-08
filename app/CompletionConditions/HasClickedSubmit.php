<?php


namespace BristolSU\Module\StaticPage\CompletionConditions;


use BristolSU\Module\StaticPage\Models\ButtonClick;
use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\Completion\Contracts\CompletionCondition;
use BristolSU\Support\ModuleInstance\Contracts\ModuleInstance;
use FormSchema\Schema\Form;

class HasClickedSubmit extends CompletionCondition
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
        return ButtonClick::forResource($activityInstance->id, $moduleInstance->id)->count() > 0;
    }

    public function percentage($settings, ActivityInstance $activityInstance, ModuleInstance $moduleInstance): int
    {
        if($this->isComplete($settings, $activityInstance, $moduleInstance)) {
            return 100;
        }
        return 0;
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
        return \FormSchema\Generator\Form::make()->getSchema();
    }

    /**
     * A name for the completion condition
     *
     * @return string
     */
    public function name(): string
    {
        return 'Has clicked the submit button';
    }

    /**
     * A description of the completion condition
     *
     * @return string
     */
    public function description(): string
    {
        return 'Marked as complete when the user/group/role has clicked the submit button.';
    }

    /**
     * The alias of the completion condition
     *
     * @return string
     */
    public function alias(): string
    {
        return 'static_page_has_submitted';
    }
}