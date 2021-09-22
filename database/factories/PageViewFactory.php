<?php

namespace Database\StaticPage\Factories;

use BristolSU\Module\StaticPage\Models\PageView;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageViewFactory extends Factory
{

    protected $model = PageView::class;

    public function definition()
    {
        return [
            'viewed_by' => function() {
                return \BristolSU\ControlDB\Models\User::factory()->create()->id();
            },
            'module_instance_id' => function() {
                return \BristolSU\Support\ModuleInstance\ModuleInstance::factory()->create()->id;
            },
            'activity_instance_id' => function() {
                return \BristolSU\Support\ActivityInstance\ActivityInstance::factory()->create()->id;
            }
        ];
    }
}
