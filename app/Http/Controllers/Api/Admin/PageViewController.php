<?php

namespace BristolSU\Module\StaticPage\Http\Controllers\Api\Admin;

use BristolSU\Module\StaticPage\Http\Controllers\Controller;
use BristolSU\Module\StaticPage\Models\PageView;

class PageViewController extends Controller
{

    public function index()
    {
        $this->authorize('admin.page-view.index');
        
        return PageView::forModuleInstance()->get();
    }

}