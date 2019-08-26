<?php

namespace App\Http\Controllers\Company;
use App\Employee;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'email' => $request->get('employee_email'),
            'name' => $request->get('employee_name'),
            'position_id' => $request->get('employee_position'),
            'birthday' => $request->get('employee_position'),
            'company_id' => $request->get('company_id'),
            'password' => $request->get('employee_password'),
        ];

        $user = User::create([
            'email'     =>    $data['email'],
            'name'      =>    $data['name'],
            'password'  =>    bcrypt($data['password'])
        ]);

        $employee = Employee::create([
            'user_id'       =>    $user->id,
            'company_id'    =>    $data['company_id'],
            'position_id'   =>    $data['position_id'],
        ]);

        return $employee;
    }
}
