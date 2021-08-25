<?php

namespace BristolSU\Module\StaticPage;

use BristolSU\Module\StaticPage\CompletionConditions\HasClickedSubmit;
use BristolSU\Module\StaticPage\CompletionConditions\HasViewedPage;
use BristolSU\Module\StaticPage\Events\ButtonSubmitted;
use BristolSU\Module\StaticPage\Events\ButtonUnsubmitted;
use BristolSU\Module\StaticPage\Events\PageViewed;
use BristolSU\Module\StaticPage\Models\ButtonClick;
use BristolSU\Module\StaticPage\VueFields\HtmlField;
use BristolSU\Support\Completion\Contracts\CompletionConditionManager;
use BristolSU\Support\Module\ModuleServiceProvider as ServiceProvider;
use FormSchema\Generator\Field;
use FormSchema\Generator\Group;
use FormSchema\Schema\Form;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider
{

    protected $permissions = [
      'view-page' => [
        'name' => 'View Participant Page',
        'description' => 'View the main page of the module.',
        'admin' => false
      ],
      'click-button' => [
        'name' => 'Click Submit Button',
        'description' => 'Can click the submit button',
        'admin' => false
      ],
      'delete-button-click' => [
        'name' => 'Unsubmit Submit Button',
        'description' => 'Can unsubmit the page once already submitted',
        'admin' => false
      ],
      'admin.view-page' => [
        'name' => 'View Admin Page',
        'description' => 'View the administrator page of the module.',
        'admin' => true
      ],
      'admin.page-view.index' => [
        'name' => 'View page views',
        'description' => 'View all page views for the module.',
        'admin' => true
      ]
    ];

    protected $events = [
      PageViewed::class => [
        'name' => 'A static page has been viewed',
        'description' => 'A static page module has been viewed by a participant of the module.'
      ],
      ButtonSubmitted::class => [
        'name' => 'The button has been submitted',
        'description' => 'The button on a static page has been pressed by a participant'
      ],
      ButtonUnsubmitted::class => [
        'name' => 'The button has been unsubmitted',
        'description' => 'The button on a static page has been unsubmitted by a participant'
      ]
    ];

    protected $commands = [

    ];

    public function alias(): string
    {
        return 'static-page';
    }

    public function namespace()
    {
        return null;
    }

    public function baseDirectory()
    {
        return __DIR__ . '/..';
    }

    public function boot()
    {
        parent::boot();

        app(CompletionConditionManager::class)->register($this->alias(), 'static_page_has_viewed_page', HasViewedPage::class);
        app(CompletionConditionManager::class)->register($this->alias(), 'static_page_has_submitted', HasClickedSubmit::class);

        Route::bind('static_page_button_click', function($id) {
            $buttonClick = ButtonClick::findOrFail((int) $id);
            if(
              request()->route('module_instance_slug')
              && (int) $buttonClick->module_instance_id === request()->route('module_instance_slug')->id()) {
                return $buttonClick;
            }
            throw (new ModelNotFoundException())->setModel(ButtonClick::class, $id);
        });

    }

    /**
     * @inheritDoc
     */
    public function settings(): Form
    {
        return \FormSchema\Generator\Form::make()->withGroup(
          Group::make('Layout')->withField(
            Field::textInput('title')->setLabel('Title')
              ->setHint('The title of the page')->setTooltip('This will appear at the top of the page and in the browser tab.')
          )->withField(
            Field::textInput('subtitle')->setLabel('Subtitle')
              ->setHint('The subtitle of the page')->setTooltip('This will appear below the title. You can use this to give more information about the page.')
          )->withField(
            Field::html('html')->setLabel('Page Content')
              ->setApiKey(config('static-page.tinymce.apiKey', ''))
              ->setHint('The content of the page')->setTooltip('This is the main content of the page.')
          )
        )->withGroup(
          Group::make('Button')->withField(
            Field::textInput('button_text')->setLabel('Button Text')->setHint('Text to show on the button')
          )
        )->getSchema();
    }
}
