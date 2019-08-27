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

Route::get('/positions', 'Company\PositionController@all')->name('position.get');

Route::get('/employees', 'Company\EmployeeController@all')->name('employee.all');

Route::post('/employee', 'Company\EmployeeController@store')->name('employee.store');

Route::get('/employee/{id}', 'Company\EmployeeController@get')->name('employee.get');

Route::post('/employee/{id}', 'Company\EmployeeController@update')->name('employee.update');

