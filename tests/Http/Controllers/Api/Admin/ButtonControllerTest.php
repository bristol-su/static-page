<?php

namespace BristolSU\Module\Tests\StaticPage\Http\Controllers\Api\Admin;

use BristolSU\Module\StaticPage\Models\ButtonClick;
use BristolSU\Module\Tests\StaticPage\TestCase;

class ButtonControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_button_clicks_for_the_module(){
        $this->bypassAuthorization();
        
        $buttonClick1 = factory(ButtonClick::class)->create([
            'activity_instance_id' => $this->getActivityInstance()->id,
            'module_instance_id' => $this->getModuleInstance()->id()
        ]);
        $buttonClick2 = factory(ButtonClick::class)->create([
            'module_instance_id' => $this->getModuleInstance()->id()
        ]);
        $buttonClick3 = factory(ButtonClick::class)->create();
        
        $response = $this->getJson($this->adminApiUrl('/click'));
        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJsonFragment(['id' => $buttonClick1->id, 'clicked_by' => (string) $buttonClick1->clicked_by]);
        $response->assertJsonFragment(['id' => $buttonClick2->id, 'clicked_by' => (string) $buttonClick2->clicked_by]);
    }
    
    /** @test */
    public function index_needs_the_permission()
    {
        $this->givePermissionTo('static-page.admin.view-page');
        $response = $this->getJson($this->adminApiUrl('/click'));
        $response->assertStatus(200);
    }
    
}