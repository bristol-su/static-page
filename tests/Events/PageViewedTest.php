<?php

namespace BristolSU\Module\Tests\StaticPage\Events;

use BristolSU\ControlDB\Models\DataUser;
use BristolSU\ControlDB\Models\User;
use BristolSU\Module\StaticPage\Events\PageViewed;
use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Module\Tests\StaticPage\TestCase;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\ModuleInstance\ModuleInstance;

class PageViewedTest extends TestCase
{

    /** @test */
    public function getFields_returns_the_fields_from_the_pageview(){
        $dataUser = factory(DataUser::class)->create([
            'email' => 'myemail@email.com',
            'first_name' => 'Toby',
            'last_name' => 'Twigger',
            'preferred_name' => 'Toby Twigger2'
        ]);
        
        $user = factory(User::class)->create(['data_provider_id' => $dataUser->id()]);
        $moduleInstance = factory(ModuleInstance::class)->create(['name' => 'ModInst1']);
        $activityInstance = factory(ActivityInstance::class)->create(['name' => 'ActInst1']);
        
        $pageView = factory(PageView::class)->create([
            'viewed_by' => $user->id(),
            'activity_instance_id' => $activityInstance->id,
            'module_instance_id' => $moduleInstance->id
        ]);
        
        $event = new PageViewed($pageView);
        
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
        ], $event->getFields());
        
    }
    
    /** @test */
    public function getFieldMetaData_returns_an_array_with_the_required_keys(){
        $pageView = factory(PageView::class)->create();
        $event = new PageViewed($pageView);
        
        $requiredFields = array_keys($event->getFields());
        $actualFields = PageViewed::getFieldMetaData();
        
        foreach($requiredFields as $requiredField) {
            $this->assertArrayHasKey($requiredField, $actualFields);
        }
    }
    
}