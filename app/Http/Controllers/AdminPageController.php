<?php

namespace BristolSU\Module\StaticPage\Http\Controllers;

class AdminPageController extends Controller
{
    
    public function index()
    {
        $this->authorize('admin.view-page');
        
        return view('static-page::admin');
    }
    
}