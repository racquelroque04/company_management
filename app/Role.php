<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const HR = 2;
    const EMPLOYEE = 3;

    public function users()
    {
        return $this->belongsToMany('App\User','role_user', 'role_id', 'user_id')->withTimestamps();
    }
}
