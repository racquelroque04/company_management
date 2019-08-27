<?php

namespace App\Http\Controllers\Employees;
use App\Employee;
use App\Http\Controllers\Controller;

use App\Http\Transformer\UserTransformer;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class EmployeeController extends Controller
{
    private  $fractal;

    private  $userTransformer;

    function __construct(Manager $fractal, UserTransformer $userTransformer)
    {
        $this->fractal = $fractal;
        $this->userTransformer = $userTransformer;
    }

    public function index()
    {
        return view('employees.index');
    }

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

        $role = Role::find(Role::EMPLOYEE);

        $user->roles()->attach($role);

        return $employee;
    }

    public function all(Request $request)
    {
        $companyId = $request->get('company_id');

        $users = User::query()->whereHas('employee', function ($q) use($companyId) {
            $q->where('company_id', $companyId);
        })->get();

        $users = new Collection($users, $this->userTransformer);

        $users = $this->fractal->createData($users);

        return $users->toArray();
    }

    public function get($id)
    {
        $user = User::find($id);

        $user = new Item($user, $this->userTransformer);

        $user = $this->fractal->createData($user);

        return $user->toJson();
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update($request->all());

        $user = new Item($user, $this->userTransformer);

        $user = $this->fractal->createData($user);

        return $user->toJson();
    }
}
