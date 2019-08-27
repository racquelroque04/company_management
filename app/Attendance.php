<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'company_id',
        'employee_id',
        'type',
        'duration',
        'remarks',
    ];
}
