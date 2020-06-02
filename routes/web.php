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

Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::get('/user/{id}', 'UserController@show');

Route::get('/user_access', 'UserAccessController@index');
Route::get('/user_access/create', 'UserAccessController@create');
Route::get('/user_access/{id}', 'UserAccessController@show');
