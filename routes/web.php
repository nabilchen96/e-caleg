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


//LOGIN
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/loginProses', 'App\Http\Controllers\AuthController@loginProses');

//BACKEND
Route::group(['middleware' => 'auth'], function () {

    //DASHBOARD
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

    //USER
    Route::get('/user', 'App\Http\Controllers\UserController@index')->middleware('checkRole:Admin');
    Route::get('/data-user', 'App\Http\Controllers\UserController@data')->middleware('checkRole:Admin');
    Route::post('/store-user', 'App\Http\Controllers\UserController@store')->middleware('checkRole:Admin');
    Route::post('/update-user', 'App\Http\Controllers\UserController@update')->middleware('checkRole:Admin');
    Route::post('/delete-user', 'App\Http\Controllers\UserController@delete')->middleware('checkRole:Admin');

    //JARINGAN
    Route::get('/jaringan', 'App\Http\Controllers\JaringanController@index')->middleware('checkRole:Admin');
    Route::get('/data-jaringan', 'App\Http\Controllers\JaringanController@data')->middleware('checkRole:Admin');
    Route::post('/store-jaringan', 'App\Http\Controllers\JaringanController@store')->middleware('checkRole:Admin');
    Route::post('/update-jaringan', 'App\Http\Controllers\JaringanController@update')->middleware('checkRole:Admin');
    Route::post('/delete-jaringan', 'App\Http\Controllers\JaringanController@delete')->middleware('checkRole:Admin');

    //SHIFT
    Route::get('/shift', 'App\Http\Controllers\ShiftController@index')->middleware('checkRole:Admin');
    Route::get('/data-shift', 'App\Http\Controllers\ShiftController@data')->middleware('checkRole:Admin');
    Route::post('/store-shift', 'App\Http\Controllers\ShiftController@store')->middleware('checkRole:Admin');
    Route::post('/update-shift', 'App\Http\Controllers\ShiftController@update')->middleware('checkRole:Admin');
    Route::post('/delete-shift', 'App\Http\Controllers\ShiftController@delete')->middleware('checkRole:Admin');

    //JADWAL
    Route::get('/jadwal', 'App\Http\Controllers\JadwalController@index')->middleware('checkRole:Admin');
    Route::get('/data-jadwal', 'App\Http\Controllers\JadwalController@data')->middleware('checkRole:Admin');
    Route::post('/store-jadwal', 'App\Http\Controllers\JadwalController@store')->middleware('checkRole:Admin');
    Route::post('/update-jadwal', 'App\Http\Controllers\JadwalController@update')->middleware('checkRole:Admin');
    Route::post('/delete-jadwal', 'App\Http\Controllers\JadwalController@delete')->middleware('checkRole:Admin');

    //ABSENSI
    Route::get('/absensi', 'App\Http\Controllers\AbsensiController@index')->middleware('checkRole:Admin');
    Route::get('/data-absensi', 'App\Http\Controllers\AbsensiController@data')->middleware('checkRole:Admin');
    Route::get('/store-absensi', 'App\Http\Controllers\AbsensiController@store')->middleware('checkRole:Admin');
});

//LOGOUT
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');