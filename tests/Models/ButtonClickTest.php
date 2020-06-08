<?php

namespace BristolSU\Module\Tests\StaticPage\Models;

use BristolSU\ControlDB\Models\User;
use BristolSU\Module\StaticPage\Models\ButtonClick;
use BristolSU\Module\Tests\StaticPage\TestCase;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\ModuleInstance\ModuleInstance;

class ButtonClickTest extends TestCase
{

    /** @test */
    public function user_attribute_returns_the_user()
    {
        $user = factory(User::class)->create();
        $buttonClick = factory(ButtonClick::class)->create([
            'clicked_by' => $user->id()
        ]);

        $this->assertInstanceOf(User::class, $buttonClick->user);
        $this->assertModelEquals($user, $buttonClick->user);
    }

    /** @test */
    public function activityInstance_attribute_returns_the_activity_instance()
    {
        $activityInstance = factory(ActivityInstance::class)->create();
        $buttonClick = factory(ButtonClick::class)->create([
            'activity_instance_id' => $activityInstance->id
        ]);

        $this->assertInstanceOf(ActivityInstance::class, $buttonClick->activity_instance);
        $this->assertModelEquals($activityInstance, $buttonClick->activity_instance);
    }

    /** @test */
    public function moduleInstance_attribute_returns_the_module_instance()
    {
        $moduleInstance = factory(ModuleInstance::class)->create();
        $buttonClick = factory(ButtonClick::class)->create([
            'module_instance_id' => $moduleInstance->id
        ]);

        $this->assertInstanceOf(ModuleInstance::class, $buttonClick->module_instance);
        $this->assertModelEquals($moduleInstance, $buttonClick->module_instance);
    }

    /** @test */
    public function all_additional_properties_are_returned_as_an_array()
    {
        $user = factory(User::class)->create();
        $activityInstance = factory(ActivityInstance::class)->create();
        $moduleInstance = factory(ModuleInstance::class)->create();
        $buttonClick = factory(ButtonClick::class)->create([
            'clicked_by' => $user->id(),
            'activity_instance_id' => $activityInstance->id,
            'module_instance_id' => $moduleInstance->id
        ]);

        $properties = $buttonClick->toArray();
        $this->assertArrayHasKey('user', $properties);
        $this->assertArrayHasKey('id', $properties['user']);
        $this->assertEquals($user->id(), $properties['user']['id']);
        $this->assertArrayHasKey('activity_instance', $properties);
        $this->assertArrayHasKey('id', $properties['activity_instance']);
        $this->assertEquals($activityInstance->id, $properties['activity_instance']['id']);
        $this->assertArrayHasKey('module_instance', $properties);
        $this->assertArrayHasKey('id', $properties['module_instance']);
        $this->assertEquals($moduleInstance->id, $properties['module_instance']['id']);
    }
}