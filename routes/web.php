<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

//Auth Admin
Route::get('/admin/login', 'web\SuperAdmin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'web\SuperAdmin\Auth\LoginController@login')->name('admin.login.submit');
Route::get('/admin/register', 'web\SuperAdmin\Auth\RegisterController@showRegisterForm')->name('admin.register');
Route::post('/admin/register', 'web\SuperAdmin\Auth\RegisterController@store')->name('admin.register.submit');
Route::get('/admin/logout', 'web\SuperAdmin\Auth\LoginController@logout')->name('admin.logout');

//Auth Travel
Route::get('/travel/login', 'web\AdminTravel\Auth\LoginController@showLoginForm')->name('travel.login');
Route::post('/travel/login', 'web\AdminTravel\Auth\LoginController@login')->name('travel.login.submit');
Route::get('/travel/register', 'web\AdminTravel\Auth\RegisterController@showRegisterForm')->name('travel.register');
Route::post('/travel/register', 'web\AdminTravel\Auth\RegisterController@store')->name('travel.register.submit');
Route::get('/travel/logout', 'web\AdminTravel\Auth\LoginController@logout')->name('travel.logout');
Route::get('/travel/activate', 'web\AdminTravel\Auth\ActivationController@activate')->name('travel.activate');
Route::get('/travel/password/reset', 'web\AdminTravel\Auth\ForgotPasswordController@showLinkRequestForm')->name('travel.password.request');
Route::post('/travel/password/email', 'web\AdminTravel\Auth\ForgotPasswordController@sendResetLinkEmail')->name('travel.password.email');
Route::get('/travel/password/reset/{token}', 'web\AdminTravel\Auth\ResetPasswordController@showResetForm')->name('travel.password.reset');
Route::post('/travel/password/reset', 'web\AdminTravel\Auth\ResetPasswordController@reset')->name('travel.password.reset.submit');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('adashboard', 'web\SuperAdmin\DashboardController');
    Route::resource('travel', 'web\SuperAdmin\TravelController')->except(['show', 'destroy']);
    Route::get('travel/{travel}', 'web\SuperAdmin\TravelController@destroy')->name('travel.destroy');
    Route::resource('admintravel','web\SuperAdmin\AdminTravelController');
    Route::resource('notifikasi','web\SuperAdmin\NotifikasiController')->only('index');
    Route::get('notifikasi/{notifikasi}', 'web\SuperAdmin\NotifikasiController@update')->name('notifikasi.update');
    Route::get('notifikasi/{notifikasi}/destroy', 'web\SuperAdmin\NotifikasiController@destroy')->name('notifikasi.destroy');
});

Route::group(['prefix' => 'travel'], function (){
    Route::resource('tdashboard', 'web\AdminTravel\DashboardController');
    Route::resource('driver', 'web\AdminTravel\DriverController')->except('destroy');
    Route::get('driver/{driver}/destroy', 'web\AdminTravel\DriverController@destroy')->name('driver.destroy');
    Route::resource('car', 'web\AdminTravel\CarController')->except('destroy');
    Route::get('car/{driver}/car', 'web\AdminTravel\CarController@destroy')->name('car.destroy');
    Route::resource('booking-notconfirmed', 'web\AdminTravel\BookingNotConfirmedController')->only(['index', 'show']);
    Route::get('booking-notconfirmed/{booking_notconfirmed}/update', 'web\AdminTravel\BookingNotConfirmedController@update')->name('booking-notconfirmed.update');
    Route::get('booking-notconfirmed/{booking_notconfirmed}/destroy', 'web\AdminTravel\BookingNotConfirmedController@destroy')->name('booking-notconfirmed.destroy');
    Route::resource('booking-confirmed', 'web\AdminTravel\BookingConfirmedController')->only('index');
    Route::resource('t-profile', 'web\AdminTravel\ProfileController')->only(['index', 'create', 'store']);

});

Route::get('/home', 'HomeController@index')->name('home');

