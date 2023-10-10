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
Route::get('/', function(){
    return view('frontend.landing');
});

//JADWAL
Route::get('/front/jadwal', function(){
    return view('frontend.jadwal');
});

//PENGUMUMAN
Route::get('/front/pengumuman', function(){
    return view('frontend.pengumuman');
});

//LIBRARY
Route::get('/front/library', 'App\Http\Controllers\LibraryController@frontLibrary');

//PENGUMUMAN
Route::get('/front/pengumuman', 'App\Http\Controllers\PengumumanController@frontPengumuman');

//FORMULIR
Route::get('/front/aktivitas', function(){
    return view('frontend.aktivitas');
});

//KEBUTUHAN DOSEN
Route::get('/front/kebutuhan_dosen', function(){
    return view('frontend.kebutuhan_dosen');
});

//LOGIN
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/loginProses', 'App\Http\Controllers\AuthController@loginProses');

//BACKEND
Route::group(['middleware' => 'auth'], function () {

    //DASHBOARD
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

    //USER
    Route::get('/user', 'App\Http\Controllers\UserController@index');
    Route::get('/data-user', 'App\Http\Controllers\UserController@data');
    Route::post('/store-user', 'App\Http\Controllers\UserController@store');
    Route::post('/update-user', 'App\Http\Controllers\UserController@update');
    Route::post('/delete-user', 'App\Http\Controllers\UserController@delete');

    //TAHUN

    //JADWAL
    Route::get('/jadwal', function(){
        return view('backend.jadwal.index');
    });

    //DOSEN

    //JUDUL
    Route::get('/judul', function(){
        return view('backend.judul.index');
    });

    //PROPOSAL
    Route::get('/proposal', function(){
        return view('backend.proposal.index');
    });

    //REVISI PROPOSAL

    //NOTIFIKASI WHATSAPP
    Route::get('/notifikasi', function(){
        return view('backend.notifikasi.index');
    });

    //LIBRARY
    Route::get('/library', 'App\Http\Controllers\LibraryController@index');
    Route::get('/data-library', 'App\Http\Controllers\LibraryController@data');
    Route::post('/store-library', 'App\Http\Controllers\LibraryController@store');
    Route::post('/update-library', 'App\Http\Controllers\LibraryController@update');
    Route::post('/delete-library', 'App\Http\Controllers\LibraryController@delete');

    //PENGUMUMAN
    Route::get('/pengumuman', 'App\Http\Controllers\PengumumanController@index');
    Route::get('/data-pengumuman', 'App\Http\Controllers\PengumumanController@data');
    Route::post('/store-pengumuman', 'App\Http\Controllers\PengumumanController@store');
    Route::post('/update-pengumuman', 'App\Http\Controllers\PengumumanController@update');
    Route::post('/delete-pengumuman', 'App\Http\Controllers\PengumumanController@delete');

});

//LOGOUT
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');
