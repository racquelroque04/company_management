<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function in()
    {
        return response()->json(['status' => 'clocked-in']);
    }
}
