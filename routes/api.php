<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user'], function (){
   Route::post('register', 'v1\User\Auth\RegisterController@register');
   Route::post('login', 'v1\User\Auth\LoginController@login');
   Route::get('car', 'v1\User\CarController@index')->middleware('auth:api');
   Route::get('driver', 'v1\User\DriverController@index')->middleware('auth:api');
   Route::get('travel', 'v1\User\TravelController@index')->middleware('auth:api');
});