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

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
