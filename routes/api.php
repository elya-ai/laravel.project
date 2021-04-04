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

    Route::get('/getusers/', 'UserController@getUsers');
    Route::post('/adduser/', 'UserController@addUsers');
    Route::patch('/updateuser/', 'UserController@updateUser');

    Route::get('/getuser/', 'UsersController@getUser');
    Route::post('/postuser/', 'UsersController@registr');
    Route::post('/auto/', 'UsersController@auto');