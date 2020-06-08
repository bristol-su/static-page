<?php

namespace BristolSU\Module\Tests\StaticPage\Http\Controllers\Api\Participant;

use BristolSU\Module\StaticPage\Models\ButtonClick;
use BristolSU\Module\Tests\StaticPage\TestCase;

class ButtonControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_button_clicks_for_the_resource(){
        $this->bypassAuthorization();
        
        $buttonClick1 = factory(ButtonClick::class)->create([
            'activity_instance_id' => $this->getActivityInstance()->id,
            'module_instance_id' => $this->getModuleInstance()->id()
        ]);
        $buttonClick2 = factory(ButtonClick::class)->create([
            'activity_instance_id' => $this->getActivityInstance()->id,
            'module_instance_id' => $this->getModuleInstance()->id()
        ]);
        $buttonClick3 = factory(ButtonClick::class)->create();
        
        $response = $this->getJson($this->userApiUrl('/click'));
        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJsonFragment(['id' => $buttonClick1->id, 'clicked_by' => (string) $buttonClick1->clicked_by]);
        $response->assertJsonFragment(['id' => $buttonClick2->id, 'clicked_by' => (string) $buttonClick2->clicked_by]);
    }
    
    /** @test */
    public function store_creates_a_button_click(){
        $this->bypassAuthorization();

        $response = $this->postJson($this->userApiUrl('/click'));
        $response->assertStatus(201);
        $this->assertDatabaseHas('static_page_button_clicks', [
            'activity_instance_id' => $this->getActivityInstance()->id,
            'module_instance_id' => $this->getModuleInstance()->id(),
            'clicked_by' => $this->getControlUser()->id()
        ]);
    }

    /** @test */
    public function index_needs_the_permission()
    {
        $this->givePermissionTo('static-page.view-page');
        $response = $this->getJson($this->userApiUrl('/click'));
        $response->assertStatus(200);
    }
    
    /** @test */
    public function store_needs_the_permission()
    {
        $this->givePermissionTo('static-page.click-button');
        $response = $this->postJson($this->userApiUrl('/click'));
        $response->assertStatus(201);
    }
    
}