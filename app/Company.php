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

    public function position()
    {
        return $this->hasMany('App\Position', 'company_id');
    }
    public function employee()
    {
        return $this->hasMany('App\Employee');
    }

}
