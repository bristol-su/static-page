<?php

namespace BristolSU\Module\Tests\StaticPage\CompletionConditions;

use BristolSU\Module\StaticPage\CompletionConditions\HasViewedPage;
use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Module\Tests\StaticPage\TestCase;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use FormSchema\Schema\Form;

class HasViewedPageTest extends TestCase
{

    /** @test */
    public function isComplete_returns_true_if_the_number_of_page_views_is_greater_than_the_number_of_views(){
        $moduleInstance = ModuleInstance::factory()->create();
        $activityInstance = ActivityInstance::factory()->create();

        $pageViews = PageView::factory()->count(5)->create([
            'module_instance_id' => $moduleInstance->id,
            'activity_instance_id' => $activityInstance->id
        ]);

        $condition = new HasViewedPage('static-page');
        $this->assertTrue(
            $condition->isComplete(['number_of_views' => 4], $activityInstance, $moduleInstance)
        );
    }

    /** @test */
    public function isComplete_returns_false_if_the_number_of_page_views_is_less_than_the_number_of_views(){
        $moduleInstance = ModuleInstance::factory()->create();
        $activityInstance = ActivityInstance::factory()->create();

        $pageViews = PageView::factory()->count(5)->create([
            'module_instance_id' => $moduleInstance->id,
            'activity_instance_id' => $activityInstance->id
        ]);

        $condition = new HasViewedPage('static-page');
        $this->assertFalse(
            $condition->isComplete(['number_of_views' => 6], $activityInstance, $moduleInstance)
        );
    }

    /** @test */
    public function isComplete_returns_true_if_the_number_of_page_views_is_equal_to_the_number_of_views(){
        $moduleInstance = ModuleInstance::factory()->create();
        $activityInstance = ActivityInstance::factory()->create();

        $pageViews = PageView::factory()->count(5)->create([
            'module_instance_id' => $moduleInstance->id,
            'activity_instance_id' => $activityInstance->id
        ]);

        $condition = new HasViewedPage('static-page');
        $this->assertTrue(
            $condition->isComplete(['number_of_views' => 5], $activityInstance, $moduleInstance)
        );
    }

    /** @test */
    public function percentage_returns_100_if_the_page_views_are_equal_to_the_required_number(){
        $moduleInstance = ModuleInstance::factory()->create();
        $activityInstance = ActivityInstance::factory()->create();

        $pageViews = PageView::factory()->count(5)->create([
            'module_instance_id' => $moduleInstance->id,
            'activity_instance_id' => $activityInstance->id
        ]);

        $condition = new HasViewedPage('static-page');
        $this->assertEquals(100,
            $condition->percentage(['number_of_views' => 5], $activityInstance, $moduleInstance)
        );
    }

    /** @test */
    public function percentage_returns_100_if_the_page_views_are_greater_than_the_required_number(){
        $moduleInstance = ModuleInstance::factory()->create();
        $activityInstance = ActivityInstance::factory()->create();

        $pageViews = PageView::factory()->count(10)->create([
            'module_instance_id' => $moduleInstance->id,
            'activity_instance_id' => $activityInstance->id
        ]);

        $condition = new HasViewedPage('static-page');
        $this->assertEquals(100,
            $condition->percentage(['number_of_views' => 5], $activityInstance, $moduleInstance)
        );
    }

    /** @test */
    public function percentage_returns_0_if_the_page_views_are_zero(){
        $moduleInstance = ModuleInstance::factory()->create();
        $activityInstance = ActivityInstance::factory()->create();

        $condition = new HasViewedPage('static-page');
        $this->assertEquals(0,
            $condition->percentage(['number_of_views' => 5], $activityInstance, $moduleInstance)
        );
    }

    /** @test */
    public function percentage_returns_50_if_the_page_views_are_half_the_required_views(){
        $moduleInstance = ModuleInstance::factory()->create();
        $activityInstance = ActivityInstance::factory()->create();

        $pageViews = PageView::factory()->count(5)->create([
            'module_instance_id' => $moduleInstance->id,
            'activity_instance_id' => $activityInstance->id
        ]);

        $condition = new HasViewedPage('static-page');
        $this->assertEquals(50,
            $condition->percentage(['number_of_views' => 10], $activityInstance, $moduleInstance)
        );
    }

    /** @test */
    public function percentage_returns_75_if_the_page_views_are_three_quarters_the_required_views(){
        $moduleInstance = ModuleInstance::factory()->create();
        $activityInstance = ActivityInstance::factory()->create();

        $pageViews = PageView::factory()->count(3)->create([
            'module_instance_id' => $moduleInstance->id,
            'activity_instance_id' => $activityInstance->id
        ]);

        $condition = new HasViewedPage('static-page');
        $this->assertEquals(75,
            $condition->percentage(['number_of_views' => 4], $activityInstance, $moduleInstance)
        );
    }

    /** @test */
    public function the_alias_is_given(){
        $this->assertEquals('static_page_has_viewed_page', (new HasViewedPage('static-page'))->alias());
    }

    /** @test */
    public function name_returns_a_string(){
        $this->assertIsString((new HasViewedPage('static-page'))->name());
    }

    /** @test */
    public function description_returns_a_string(){
        $this->assertIsString((new HasViewedPage('static-page'))->description());
    }

    /** @test */
    public function options_returns_a_form_schema(){
        $this->assertInstanceOf(Form::class, (new HasViewedPage('static-page'))->options());
    }


}
