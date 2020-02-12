<?php

namespace BristolSU\Module\StaticPage\Http\Controllers;

use BristolSU\Module\StaticPage\Events\PageViewed;
use BristolSU\Module\StaticPage\Models\PageView;
use BristolSU\Support\Authentication\Contracts\Authentication;

class ParticipantPageController extends Controller
{

    public function index(Authentication $authentication)
    {
        $this->authorize('view-page');
        
        $pageView = PageView::create([
            'viewed_by' => $authentication->getUser()->id()
        ]);
        
        event(new PageViewed($pageView));
        
        return view('static-page::participant');
    }
    
}