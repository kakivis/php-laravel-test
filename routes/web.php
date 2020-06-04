<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/users', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('/users/{id}', 'UserController@show');

Route::get('/user_accesses', 'UserAccessController@index');
Route::get('/user_accesses/create', 'UserAccessController@create');
Route::post('/user_accesses', 'UserAccessController@store');
Route::get('/user_accesses/{id}', 'UserAccessController@show');

Route::get('/composite_report', 'CompositeReportController@index');
Route::post('/composite_report', 'CompositeReportController@index');
Route::get('/composite_report/most_logged', 'CompositeReportController@mostLogged');
Route::get('/composite_report/least_logged', 'CompositeReportController@leastLogged');
