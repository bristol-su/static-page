<?php

$factory->define(\BristolSU\Module\StaticPage\Models\ButtonClick::class, function(\Faker\Generator $faker) {
    return [
        'clicked_by' => function() {
            return factory(\BristolSU\ControlDB\Models\User::class)->create()->id();
        },
        'module_instance_id' => function() {
            return factory(\BristolSU\Support\ModuleInstance\ModuleInstance::class)->create()->id;
        },
        'activity_instance_id' => function() {
            return factory(\BristolSU\Support\ActivityInstance\ActivityInstance::class)->create()->id;
        }
    ];
});