<?php

namespace BristolSU\Module\StaticPage\Http\Controllers;

class ParticipantPageController extends Controller
{

    public function index()
    {
        $this->authorize('view-page');
        
        return view('static-page::participant');
    }
    
}