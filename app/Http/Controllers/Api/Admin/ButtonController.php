<?php

namespace BristolSU\Module\StaticPage\Http\Controllers\Api\Admin;

use BristolSU\Module\StaticPage\Http\Controllers\Controller;
use BristolSU\Module\StaticPage\Models\ButtonClick;
use BristolSU\Support\Authentication\Contracts\Authentication;

class ButtonController extends Controller
{

    public function index()
    {
        $this->authorize('admin.view-page');
        
        return ButtonClick::forModuleInstance()->get();
    }
    
}