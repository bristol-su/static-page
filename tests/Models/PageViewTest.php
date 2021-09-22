<?php

namespace BristolSU\Module\Tests\StaticPage\Models;

use BristolSU\ControlDB\Models\User;
use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Module\Tests\StaticPage\TestCase;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\ModuleInstance\ModuleInstance;

class PageViewTest extends TestCase
{

    /** @test */
    public function user_attribute_returns_the_user()
    {
        $user = User::factory()->create();
        $pageView = PageView::factory()->create([
            'viewed_by' => $user->id()
        ]);

        $this->assertInstanceOf(User::class, $pageView->user);
        $this->assertModelEquals($user, $pageView->user);
    }

    /** @test */
    public function activityInstance_attribute_returns_the_activity_instance()
    {
        $activityInstance = ActivityInstance::factory()->create();
        $pageView = PageView::factory()->create([
            'activity_instance_id' => $activityInstance->id
        ]);

        $this->assertInstanceOf(ActivityInstance::class, $pageView->activity_instance);
        $this->assertModelEquals($activityInstance, $pageView->activity_instance);
    }

    /** @test */
    public function moduleInstance_attribute_returns_the_module_instance()
    {
        $moduleInstance = ModuleInstance::factory()->create();
        $pageView = PageView::factory()->create([
            'module_instance_id' => $moduleInstance->id
        ]);

        $this->assertInstanceOf(ModuleInstance::class, $pageView->module_instance);
        $this->assertModelEquals($moduleInstance, $pageView->module_instance);
    }

    /** @test */
    public function all_additional_properties_are_returned_as_an_array()
    {
        $user = User::factory()->create();
        $activityInstance = ActivityInstance::factory()->create();
        $moduleInstance = ModuleInstance::factory()->create();
        $pageView = PageView::factory()->create([
            'viewed_by' => $user->id(),
            'activity_instance_id' => $activityInstance->id,
            'module_instance_id' => $moduleInstance->id
        ]);

        $properties = $pageView->toArray();
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
