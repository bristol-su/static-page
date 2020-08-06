<?php

namespace BristolSU\Module\Tests\StaticPage\Http\Controllers\Api\Participant;

use BristolSU\Module\StaticPage\Events\ButtonSubmitted;
use BristolSU\Module\StaticPage\Events\ButtonUnsubmitted;
use BristolSU\Module\StaticPage\Models\ButtonClick;
use BristolSU\Module\Tests\StaticPage\TestCase;
use Illuminate\Support\Facades\Event;

class ButtonControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_button_clicks_for_the_resource()
    {
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
        $response->assertJsonFragment(['id' => $buttonClick1->id, 'clicked_by' => (string)$buttonClick1->clicked_by]);
        $response->assertJsonFragment(['id' => $buttonClick2->id, 'clicked_by' => (string)$buttonClick2->clicked_by]);
    }

    /** @test */
    public function store_creates_a_button_click()
    {
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

    /** @test */
    public function an_event_is_fired_if_a_button_is_created()
    {
        $this->bypassAuthorization();
        Event::fake(ButtonSubmitted::class);

        $response = $this->postJson($this->userApiUrl('/click'));
        $response->assertStatus(201);

        Event::assertDispatchedTimes(ButtonSubmitted::class, 1);
    }

    /** @test */
    public function it_returns_a_404_if_the_button_click_does_not_exist()
    {
        $this->bypassAuthorization();

        $response = $this->delete($this->userApiUrl('/click/5000'));
        $response->assertStatus(404);
    }

    /** @test */
    public function a_button_click_can_be_deleted()
    {
        $this->bypassAuthorization();
        $click = factory(ButtonClick::class)->create([
          'module_instance_id' => $this->getModuleInstance()->id(),
          'activity_instance_id' => $this->getActivityInstance()->id
        ]);

        $response = $this->delete($this->userApiUrl('/click/' . $click->id));
        $response->assertStatus(204);

        $this->assertSoftDeleted('static_page_button_clicks', [
          'id' => $click->id
        ]);
    }

    /** @test */
    public function a_404_is_returned_if_the_module_instance_is_wrong()
    {
        $this->bypassAuthorization();
        $click = factory(ButtonClick::class)->create([
          'activity_instance_id' => $this->getActivityInstance()->id
        ]);

        $response = $this->delete($this->userApiUrl('/click/' . $click->id));
        $response->assertStatus(404);
    }

    /** @test */
    public function a_403_is_returned_if_the_activity_instance_is_wrong()
    {
        $this->bypassAuthorization();
        $click = factory(ButtonClick::class)->create([
          'module_instance_id' => $this->getModuleInstance()->id(),
        ]);

        $response = $this->delete($this->userApiUrl('/click/' . $click->id));
        $response->assertStatus(403);
    }

    /** @test */
    public function a_button_click_is_deleted_if_the_permission_is_owned()
    {
        $this->givePermissionTo('static-page.delete-button-click');
        $click = factory(ButtonClick::class)->create([
          'module_instance_id' => $this->getModuleInstance()->id(),
          'activity_instance_id' => $this->getActivityInstance()->id
        ]);

        $response = $this->delete($this->userApiUrl('/click/' . $click->id));
        $response->assertStatus(204);

        $this->assertSoftDeleted('static_page_button_clicks', [
          'id' => $click->id
        ]);
    }

    /** @test */
    public function a_button_click_is_not_deleted_if_the_permission_is_not_owned()
    {
        $this->revokePermissionTo('static-page.delete-button-click');
        $click = factory(ButtonClick::class)->create([
          'module_instance_id' => $this->getModuleInstance()->id(),
          'activity_instance_id' => $this->getActivityInstance()->id
        ]);

        $response = $this->delete($this->userApiUrl('/click/' . $click->id));
        $response->assertStatus(403);

        $this->assertDatabaseHas('static_page_button_clicks', [
          'id' => $click->id,
          'deleted_at' => null
        ]);
    }

    /** @test */
    public function an_event_is_fired_if_the_button_is_deleted()
    {
        $this->bypassAuthorization();
        $click = factory(ButtonClick::class)->create([
          'module_instance_id' => $this->getModuleInstance()->id(),
          'activity_instance_id' => $this->getActivityInstance()->id
        ]);
        Event::fake(ButtonUnsubmitted::class);

        $response = $this->delete($this->userApiUrl('/click/' . $click->id));
        $response->assertStatus(204);

        Event::assertDispatchedTimes(ButtonUnsubmitted::class, 1);
    }

}
