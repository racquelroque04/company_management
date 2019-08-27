<?php
/**
 * Created by PhpStorm.
 * User: coreproc
 * Date: 8/27/19
 * Time: 4:39 PM
 */

namespace App\Http\Transformer;


use App\Attendance;
use League\Fractal\TransformerAbstract;

class AttendanceTransformer extends TransformerAbstract
{
    public function transform(Attendance $attendance)
    {
        return [
            'id'            => (int) $attendance->id,
            'employee_id'   => (int) $attendance->employee_id,
            'company_id'    => (int) $attendance->company_id,
            'type'          => $attendance->type,
            'duration'      => $attendance->duration,
            'created_at'    => $attendance->created_at,
        ];
    }
}