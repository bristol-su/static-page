<?php

namespace BristolSU\Module\Tests\StaticPage\Http\Controllers\Api\Admin;

use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Module\Tests\StaticPage\TestCase;
use BristolSU\Support\Permissions\Contracts\PermissionTester;

class PageViewControllerTest extends TestCase
{

    /** @test */
    public function a_403_error_is_returned_if_the_permission_is_not_owned(){
        $this->revokePermissionTo('static-page.admin.page-view.index');

        $response = $this->getJson($this->adminApiUrl('page-view'));
        $response->assertStatus(403);
    }

    /** @test */
    public function the_correct_data_is_returned(){
        $this->givePermissionTo('static-page.admin.page-view.index');

        $incorrectPageViews = PageView::factory()->count(10)->create();
        $correctPageViews = PageView::factory()->count(15)->create(['module_instance_id' => $this->getModuleInstance()->id]);

        $response = $this->getJson($this->adminApiUrl('page-view'));
        $response->assertStatus(200);
        $response->assertJsonCount(15);
        $response->assertJson($correctPageViews->toArray());
    }

}
