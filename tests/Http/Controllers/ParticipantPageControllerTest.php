<?php

namespace BristolSU\Module\Tests\StaticPage\Http\Controllers;

use BristolSU\Module\StaticPage\Events\PageViewed;
use BristolSU\Module\Tests\StaticPage\TestCase;
use BristolSU\Support\Permissions\Contracts\PermissionTester;
use Illuminate\Support\Facades\Event;

class ParticipantPageControllerTest extends TestCase
{

    /** @test */
    public function a_403_error_is_returned_if_the_permission_is_not_owned()
    {
        $permissionTester = $this->prophesize(PermissionTester::class);
        $permissionTester->evaluate('static-page.view-page')->shouldBeCalled()->willReturn(false);
        $this->instance(PermissionTester::class, $permissionTester->reveal());

        $response = $this->get($this->userUrl('/'));
        $response->assertStatus(403);
    }

    /** @test */
    public function the_correct_view_is_returned()
    {
        $permissionTester = $this->prophesize(PermissionTester::class);
        $permissionTester->evaluate('static-page.view-page')->shouldBeCalled()->willReturn(true);
        $this->instance(PermissionTester::class, $permissionTester->reveal());

        $response = $this->get($this->userUrl('/'));
        $response->assertStatus(200);
        $response->assertViewIs('static-page::participant');
    }

    /** @test */
    public function a_page_view_is_not_created_if_the_user_cannot_access_the_page()
    {
        $permissionTester = $this->prophesize(PermissionTester::class);
        $permissionTester->evaluate('static-page.view-page')->shouldBeCalled()->willReturn(false);
        $this->instance(PermissionTester::class, $permissionTester->reveal());

        $response = $this->get($this->userUrl('/'));
        $response->assertStatus(403);
        $this->assertDatabaseMissing('static_page_page_views', []);
    }

    /** @test */
    public function a_page_view_is_created_on_page_load()
    {
        $permissionTester = $this->prophesize(PermissionTester::class);
        $permissionTester->evaluate('static-page.view-page')->shouldBeCalled()->willReturn(true);
        $this->instance(PermissionTester::class, $permissionTester->reveal());

        $response = $this->get($this->userUrl('/'));
        $response->assertStatus(200);

        $this->assertDatabaseHas('static_page_page_views', [
            'activity_instance_id' => $this->getActivityInstance()->id,
            'module_instance_id' => $this->getModuleInstance()->id,
            'viewed_by' => $this->getControlUser()->id()
        ]);
    }

    /** @test */
    public function an_event_is_fired_on_successful_page_load()
    {
        Event::fake(PageViewed::class);
        $permissionTester = $this->prophesize(PermissionTester::class);
        $permissionTester->evaluate('static-page.view-page')->shouldBeCalled()->willReturn(true);
        $this->instance(PermissionTester::class, $permissionTester->reveal());

        $response = $this->get($this->userUrl('/'));
        $response->assertStatus(200);
        
        Event::assertDispatched(PageViewed::class);
    }

    /** @test */
    public function an_event_is_not_fired_on_an_unsuccessful_page_load()
    {
        Event::fake(PageViewed::class);
        $permissionTester = $this->prophesize(PermissionTester::class);
        $permissionTester->evaluate('static-page.view-page')->shouldBeCalled()->willReturn(false);
        $this->instance(PermissionTester::class, $permissionTester->reveal());

        $response = $this->get($this->userUrl('/'));
        $response->assertStatus(403);

        Event::assertNotDispatched(PageViewed::class);
    }

}