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

//LANDING
Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');

//LOGIN
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/loginProses', 'App\Http\Controllers\AuthController@loginProses');

//REGISTER
Route::get('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/registerProses', 'App\Http\Controllers\AuthController@registerProses');

//BACKEND
Route::group(['middleware' => 'auth'], function () {

    //DASHBOARD
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

    //USER
    Route::get('/back/user', 'App\Http\Controllers\UserController@index');
    Route::get('/back/data-user', 'App\Http\Controllers\UserController@data');
    Route::post('/back/store-user', 'App\Http\Controllers\UserController@store');
    Route::post('/back/update-user', 'App\Http\Controllers\UserController@update');
    Route::post('/back/delete-user', 'App\Http\Controllers\UserController@delete');
});

//LOGOUT
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');
