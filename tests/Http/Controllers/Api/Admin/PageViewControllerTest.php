<?php

namespace BristolSU\Module\Tests\StaticPage\Http\Controllers\Api\Admin;

use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Module\Tests\StaticPage\TestCase;
use BristolSU\Support\Permissions\Contracts\PermissionTester;

class PageViewControllerTest extends TestCase
{

    /** @test */
    public function a_403_error_is_returned_if_the_permission_is_not_owned(){
        $permissionTester = $this->prophesize(PermissionTester::class);
        $permissionTester->evaluate('static-page.admin.page-view.index')->shouldBeCalled()->willReturn(false);
        $this->instance(PermissionTester::class, $permissionTester->reveal());

        $response = $this->getJson($this->adminApiUrl('page-view'));
        $response->assertStatus(403);
    }

    /** @test */
    public function the_correct_data_is_returned(){
        $incorrectPageViews = factory(PageView::class, 10)->create();
        $correctPageViews = factory(PageView::class, 15)->create(['module_instance_id' => $this->getModuleInstance()->id]);
        $permissionTester = $this->prophesize(PermissionTester::class);
        $permissionTester->evaluate('static-page.admin.page-view.index')->shouldBeCalled()->willReturn(true);
        $this->instance(PermissionTester::class, $permissionTester->reveal());

        $response = $this->getJson($this->adminApiUrl('page-view'));
        $response->assertStatus(200);
        $response->assertJsonCount(15);
        $response->assertJson($correctPageViews->toArray());
    }
    
}