<?php

namespace BristolSU\Module\StaticPage\Http\Controllers\Api\Participant;

use BristolSU\Module\StaticPage\Events\ButtonSubmitted;
use BristolSU\Module\StaticPage\Events\ButtonUnsubmitted;
use BristolSU\Module\StaticPage\Http\Controllers\Controller;
use BristolSU\Module\StaticPage\Models\ButtonClick;
use BristolSU\Support\Activity\Activity;
use BristolSU\Support\ActivityInstance\Contracts\ActivityInstanceResolver;
use BristolSU\Support\Authentication\Contracts\Authentication;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ButtonController extends Controller
{

    public function store(Authentication $authentication)
    {
        $this->authorize('click-button');

        $buttonClick = ButtonClick::create([
          'clicked_by' => $authentication->getUser()->id()
        ]);

        event(new ButtonSubmitted($buttonClick));

        return $buttonClick;
    }

    public function index()
    {
        $this->authorize('view-page');

        return ButtonClick::forResource()->get();
    }

    public function destroy(Activity $activity, ModuleInstance $moduleInstance, ButtonClick $buttonClick, ActivityInstanceResolver  $activityInstanceResolver)
    {
        $this->authorize('delete-button-click');
        if($activityInstanceResolver->getActivityInstance()->id !== (int) $buttonClick->activity_instance_id) {
            throw new AuthorizationException('The button click does not belong to your activity instance');
        }
        if($buttonClick->delete()) {
            event(new ButtonUnsubmitted($buttonClick));
            return Response::create('', Response::HTTP_NO_CONTENT);
        } else {
            throw ValidationException::withMessages([
              'button' => ['Could not delete the button click']
            ]);
        }
    }

}
