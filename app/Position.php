<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'name',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function employee()
    {
        return $this->hasMany('App\Employee');
    }
}
