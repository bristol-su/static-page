<?php

namespace BristolSU\Module\StaticPage\Http\Controllers\Api\Participant;

use BristolSU\Module\StaticPage\Http\Controllers\Controller;
use BristolSU\Module\StaticPage\Models\ButtonClick;
use BristolSU\Support\Authentication\Contracts\Authentication;

class ButtonController extends Controller
{

    public function store(Authentication $authentication)
    {
        $this->authorize('click-button');
        
        return ButtonClick::create([
            'clicked_by' => $authentication->getUser()->id()
        ]);
    }

    public function index()
    {
        $this->authorize('view-page');

        return ButtonClick::forResource()->get();
    }
    
}