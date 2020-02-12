<?php

namespace BristolSU\Module\StaticPage\Models;

use BristolSU\ControlDB\Contracts\Repositories\User;
use BristolSU\Support\Authentication\HasResource;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasResource;
    
    protected $table = 'static_page_page_views';
    
    protected $appends = 'user';
    
    protected $fillable = [
        'viewed_by'
    ];

    public function getUserAttribute()
    {
        return app(User::class)->getById($this->viewed_by);
    }
    
}