<?php

namespace BristolSU\Module\StaticPage\Models;

use BristolSU\ControlDB\Contracts\Repositories\User;
use BristolSU\Support\ActivityInstance\Contracts\ActivityInstanceRepository;
use BristolSU\Support\Authentication\HasResource;
use BristolSU\Support\ModuleInstance\Contracts\ModuleInstanceRepository;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasResource;

    protected $table = 'static_page_page_views';

    protected $appends = [
        'user', 'activity_instance', 'module_instance'
    ];

    protected $fillable = [
        'viewed_by'
    ];

    public function getUserAttribute()
    {
        return app(User::class)->getById($this->viewed_by);
    }

    public function getActivityInstanceAttribute()
    {
        return app(ActivityInstanceRepository::class)->getById($this->activity_instance_id);
    }

    public function getModuleInstanceAttribute()
    {
        return app(ModuleInstanceRepository::class)->getById($this->module_instance_id);
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
