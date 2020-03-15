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
    return view('home');
});

/*Route::get('/travel', function () {
    return view('templates.travel');
});*/

Route::get('/admin-login', 'web\SuperAdmin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin-login', 'web\SuperAdmin\Auth\LoginController@login')->name('admin.login.submit');
Route::get('/admin-register', 'web\SuperAdmin\Auth\RegisterController@showRegisterForm')->name('admin.register');
Route::post('/admin-register', 'web\SuperAdmin\Auth\RegisterController@store')->name('admin.register.submit');
Route::get('/admin-logout', 'web\SuperAdmin\Auth\LoginController@logout')->name('admin.logout');

Route::get('/travel-login', 'web\AdminTravel\Auth\LoginController@showLoginForm')->name('travel.login');
Route::post('/travel-login', 'web\AdminTravel\Auth\LoginController@login')->name('travel.login.submit');
Route::get('/travel-register', 'web\AdminTravel\Auth\RegisterController@showRegisterForm')->name('travel.register');
Route::post('/travel-register', 'web\AdminTravel\Auth\RegisterController@store')->name('travel.register.submit');
Route::get('/travel-logout', 'web\AdminTravel\Auth\LoginController@logout')->name('travel.logout');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('adashboard', 'web\SuperAdmin\DashboardController');
    Route::resource('travel', 'web\SuperAdmin\TravelController');
    Route::resource('admintravel','web\SuperAdmin\AdminTravelController');
});

Route::group(['prefix' => 'travel'], function (){
    Route::resource('tdashboard', 'web\AdminTravel\DashboardController');
    Route::resource('driver', 'web\AdminTravel\DriverController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
