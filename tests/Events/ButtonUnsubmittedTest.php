<?php

namespace BristolSU\Module\Tests\StaticPage\Events;

use BristolSU\ControlDB\Models\DataUser;
use BristolSU\ControlDB\Models\User;
use BristolSU\Module\StaticPage\Events\ButtonUnsubmitted;
use BristolSU\Module\StaticPage\Events\PageViewed;
use BristolSU\Module\StaticPage\Models\ButtonClick;
use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Module\Tests\StaticPage\TestCase;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use Carbon\Carbon;

class ButtonUnsubmittedTest extends TestCase
{

    /** @test */
    public function getFields_returns_the_fields_from_the_pageview()
    {
        $dataUser = DataUser::factory()->create([
          'email' => 'myemail@email.com',
          'first_name' => 'Toby',
          'last_name' => 'Twigger',
          'preferred_name' => 'Toby Twigger2'
        ]);

        $user = User::factory()->create(['data_provider_id' => $dataUser->id()]);
        $moduleInstance = ModuleInstance::factory()->create(['name' => 'ModInst1']);
        $activityInstance = ActivityInstance::factory()->create(['name' => 'ActInst1']);

        $now = Carbon::now()->subSeconds(30);
        $nowAndABit = Carbon::now();
        $buttonClick = ButtonClick::factory()->create([
          'clicked_by' => $user->id(),
          'activity_instance_id' => $activityInstance->id,
          'module_instance_id' => $moduleInstance->id,
          'created_at' => $now
        ]);
        $buttonClick->delete();

        $event = new ButtonUnsubmitted($buttonClick);

        $this->assertEquals([
          'user_id' => $dataUser->id(),
          'user_email' => 'myemail@email.com',
          'user_first_name' => 'Toby',
          'user_last_name' => 'Twigger',
          'user_preferred_name' => 'Toby Twigger2',
          'module_instance_id' => $moduleInstance->id,
          'module_instance_name' => 'ModInst1',
          'activity_instance_id' => $activityInstance->id,
          'activity_instance_name' => 'ActInst1',
          'clicked_at' => $now->format('Y-m-d H:i:s'),
          'unsubmitted_at' => $nowAndABit->format('Y-m-d H:i:s'),
        ], $event->getFields());

    }

    /** @test */
    public function getFieldMetaData_returns_an_array_with_the_required_keys()
    {
        $buttonClick = ButtonClick::factory()->create();
        $buttonClick->delete();
        $event = new ButtonUnsubmitted($buttonClick);

        $requiredFields = array_keys($event->getFields());
        $actualFields = ButtonUnsubmitted::getFieldMetaData();

        foreach ($requiredFields as $requiredField) {
            $this->assertArrayHasKey($requiredField, $actualFields);
        }
    }

}
