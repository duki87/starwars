<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Author extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('role_id', function (Builder $builder) {
            $builder->where('role_id', 2);
        });
    }

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }
}
