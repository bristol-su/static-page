<?php

namespace BristolSU\Module\StaticPage;

use BristolSU\Module\StaticPage\CompletionConditions\HasClickedSubmit;
use BristolSU\Module\StaticPage\CompletionConditions\HasViewedPage;
use BristolSU\Module\StaticPage\Events\PageViewed;
use BristolSU\Module\StaticPage\VueFields\HtmlField;
use BristolSU\Support\Completion\Contracts\CompletionConditionManager;
use BristolSU\Support\Module\ModuleServiceProvider as ServiceProvider;
use FormSchema\Generator\Field;
use FormSchema\Generator\Group;
use FormSchema\Schema\Form;

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
        return '\BristolSU\Module\StaticPage\Http\Controllers';
    }
    
    public function baseDirectory()
    {
        return __DIR__ . '/..';
    }

    public function boot()
    {
        parent::boot();
        
        $this->registerGlobalScript('modules/static-page/js/components.js');

        app(CompletionConditionManager::class)->register($this->alias(), 'static_page_has_viewed_page', HasViewedPage::class);
        app(CompletionConditionManager::class)->register($this->alias(), 'static_page_has_submitted', HasClickedSubmit::class);
    }

    public function register()
    {
        parent::register();
    }

    /**
     * @inheritDoc
     */
    public function settings(): Form
    {
        return \FormSchema\Generator\Form::make()->withGroup(
            Group::make('Layout')->withField(
                Field::input('title')->inputType('text')->label('Title')
                    ->hint('The title of the page')->help('This will appear at the top of the page and in the browser tab.')
            )->withField(
                Field::input('subtitle')->inputType('text')->label('Subtitle')
                    ->hint('The subtitle of the page')->help('This will appear below the title. You can use this to give more information about the page.')
            )->withField(
                Field::make(HtmlField::class, 'html')->label('Page Content')
                    ->apiKey(config('static-page.tinymce.apiKey'))
                    ->hint('The content of the page')->help('This is the main content of the page.')
            )
        )->withGroup(
            Group::make('Button')->withField(
                Field::input('button_text')->inputType('text')->label('Button Text')->hint('Text to show on the button')
            )
        )->getSchema();
    }
}
