<?php

namespace BristolSU\Module\Tests\StaticPage\Http\Controllers;

use BristolSU\Module\Tests\StaticPage\TestCase;
use BristolSU\Support\Permissions\Contracts\PermissionTester;

class AdminPageControllerTest extends TestCase
{

    /** @test */
    public function a_403_error_is_returned_if_the_permission_is_not_owned()
    {
        $this->revokePermissionTo('static-page.admin.view-page');
        
        $response = $this->get($this->adminUrl('/'));
        $response->assertStatus(403);
    }

    /** @test */
    public function the_correct_view_is_returned()
    {
        $this->givePermissionTo('static-page.admin.view-page');
        
        $response = $this->get($this->adminUrl('/'));
        $response->assertStatus(200);
        $response->assertViewIs('static-page::admin');
    }

}
