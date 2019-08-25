<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function company()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
