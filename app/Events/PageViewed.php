<?php

namespace BristolSU\Module\StaticPage\Events;

use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Support\Action\Contracts\TriggerableEvent;
use BristolSU\Support\ModuleInstance\Contracts\ModuleInstanceRepository;

class PageViewed implements TriggerableEvent
{

    /**
     * @var PageView
     */
    private $pageView;

    public function __construct(PageView $pageView)
    {

        $this->pageView = $pageView;
    }

    /**
     * Register metadata about the fields the event supplies.
     *
     * For each field returned in getFields, pass in a label and a helptext.
     * e.g. [
     *      'user_id' => [
     *          'label' => 'User ID',
     *          'helptext' => 'The ID of the user who posted the comment.'
     *          ],
     *      ...
     * ]
     * @return array
     */
    public static function getFieldMetaData(): array
    {
        return [
            'user_id' => [
                'label' => 'User ID',
                'helptext' => 'The ID of the user'
            ],
            'user_email' => [
                'label' => 'Email Address',
                'helptext' => 'Email Address of the user. May be empty.'
            ],
            'user_first_name' => [
                'label' => 'First Name',
                'helptext' => 'First Name of the user. May be empty.'
            ],
            'user_last_name' => [
                'label' => 'Last Name',
                'helptext' => 'Last Name of the user. May be empty.'
            ],
            'user_preferred_name' => [
                'label' => 'Preferred Name',
                'helptext' => 'Preferred Name of the user. May be empty.'
            ],
            'module_instance_id' => [
                'label' => 'Module Instance ID',
                'helptext' => 'ID of the module instance viewed'
            ],
            'module_instance_name' => [
                'label' => 'Module Instance Name',
                'helptext' => 'Name of the module instance viewed.'
            ],
            'activity_instance_id' => [
                'label' => 'Activity Instance ID',
                'helptext' => 'The id of the activity instance viewed.'
            ],
            'activity_instance_name' => [
                'label' => 'Activity Instance Name',
                'helptext' => 'The name of the activity instance viewed.'
            ],
        ];
    }

    /**
     * Get the fields that the event registers.
     *
     * If the event has parameters which should be used in the framework, return them here.
     *
     * e.g. [
     *      'user_id' => 1,
     *      'comment_id' => 4,
     *      'post_id' => 3
     * ]
     * @return array
     */
    public function getFields(): array
    {
        $moduleInstance = app(ModuleInstanceRepository::class)->getById($this->pageView->module_instance_id);
        $activityInstance = app(ModuleInstanceRepository::class)->getById($this->pageView->activity_instance_id);
        return [
            'user_id' => $this->pageView->user->id(),
            'user_email' => $this->pageView->user->data()->email(),
            'user_first_name' => $this->pageView->user->data()->firstName(),
            'user_last_name' => $this->pageView->user->data()->lastName(),
            'user_preferred_name' => $this->pageView->user->data()->preferredName(),
            'module_instance_id' => $moduleInstance->id,
            'module_instance_name' => $moduleInstance->name,
            'activity_instance_id' => $activityInstance->id,
            'activity_instance_name' => $activityInstance->name,
        ];
    }
}