<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Auth::routes();

Route::get('/positions', 'Admin\PositionController@all')->name('position.get');

Route::get('/employees', 'Employees\EmployeeController@all')->name('employee.all');

Route::post('/employee', 'Employees\EmployeeController@store')->name('employee.store');

Route::get('/employee/{id}', 'Employees\EmployeeController@get')->name('employee.get');

Route::post('/employee/{id}', 'Employees\EmployeeController@update')->name('employee.update');

Route::post('/attendance/{id}', 'AttendanceController@updateAttendance')->name('attendance.in');

Route::get('/attendance/{id}', 'AttendanceController@myAttendance')->name('attendance.in');

Route::get('/my-attendances/{id}', 'AttendanceController@myAttendances')->name('attendance.in');

