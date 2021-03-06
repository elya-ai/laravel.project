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

    Route::post('logout', 'UsersController@logout');

    Route::get('getproducts', 'ProductsController@getProducts');
    Route::post('addproducts', 'ProductsController@postProducts');
    Route::delete('delproducts', 'ProductsController@deleteProducts');

    Route::get('gethuman', 'HumansController@getHuman');
    Route::post('posthuman', 'HumansController@register');
    Route::post('addhuman', 'HumansController@auth');

    Route::post('logout', 'HumansController@logout');

    Route::post('check', 'HumansController@check');
    Route::post('checks', 'ReservController@checks');



    /*Route::get('yhevner', 'GeorController@getGeor');
    Route::post('addpost', 'GeorController@postGeor');
    Route::patch('addpatch', 'GeorController@patchGeor');*/
    
    Route::post('regstr', 'RegController@regPost');
    Route::post('avto', 'RegController@avtoPost');