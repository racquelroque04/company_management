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

Route::get('/positions', 'Company\PositionController@getPosition')->name('position.get');

Route::post('/employee', 'Company\EmployeeController@store')->name('employee.store');

