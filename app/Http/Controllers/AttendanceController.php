<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Http\Transformer\AttendanceTransformer;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

class AttendanceController extends Controller
{
    private  $fractal;

    private  $attendanceTransformer;

    function __construct(Manager $fractal, AttendanceTransformer $attendanceTransformer)
    {
        $this->fractal = $fractal;
        $this->attendanceTransformer = $attendanceTransformer;
    }

    public function updateAttendance(Request $request, $id)
    {
        $latestAttendance = Attendance::query()->where('employee_id', $id)->latest()->first();

        $attendance = Attendance::create([
            'company_id'    => $request->get('company_id'),
            'employee_id'   =>  $id,
            'type'          => $request->get('type')
        ]);

        if (! empty($latestAttendance) && ! empty($latestAttendance) && $latestAttendance->type === 'IN' && $attendance->type === 'OUT') {
            $attendance->update([
                'duration' => $latestAttendance->created_at->diffInSeconds($attendance->created_at),
            ]);
        }

        $attendance = new Item($attendance, $this->attendanceTransformer);

        $attendance = $this->fractal->createData($attendance);

        return $attendance->toJson();
    }

    public function myAttendance(Request $request, $id)
    {
        $attendance = Attendance::query()->where('employee_id', 1)->latest()->first();

        $attendance = new Item($attendance, $this->attendanceTransformer);

        $attendance = $this->fractal->createData($attendance);

        return $attendance->toJson();
    }

    public function myAttendances($id)
    {
        $attendances = Attendance::query()->where('employee_id', 1)->get();

        $attendance = new Collection($attendances, $this->attendanceTransformer);

        $attendance = $this->fractal->createData($attendance);

        return $attendance->toArray();
    }
}
