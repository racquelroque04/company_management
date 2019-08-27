<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'position_id',
    ];

    public function employee()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
