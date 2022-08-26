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

    //GRUP PENILAIAN
    Route::get('/back/gruppenilaian', 'App\Http\Controllers\GruppenilaianController@index');
    Route::get('/back/data-gruppenilaian', 'App\Http\Controllers\GruppenilaianController@data');
    Route::post('/back/store-gruppenilaian', 'App\Http\Controllers\GruppenilaianController@store');
    Route::post('/back/update-gruppenilaian', 'App\Http\Controllers\GruppenilaianController@update');
    Route::post('/back/delete-gruppenilaian', 'App\Http\Controllers\GruppenilaianController@delete');

    //SAMAPTA
    Route::get('/back/samapta', 'App\Http\Controllers\SamaptaController@index');
    Route::get('/back/data-samapta', 'App\Http\Controllers\SamaptaController@data');
    Route::post('/back/store-samapta', 'App\Http\Controllers\SamaptaController@store');
    Route::post('/back/update-samapta', 'App\Http\Controllers\SamaptaController@update');
    Route::post('/back/delete-samapta', 'App\Http\Controllers\SamaptaController@delete');

    //DETAIL GRUP
    Route::get('/back/detailgrup/{id_grup}', 'App\Http\Controllers\Detail_grup_penilaianController@index');
    Route::get('/back/data-detailgrup/{id_grup}', 'App\Http\Controllers\Detail_grup_penilaianController@data');
    Route::post('/back/store-detailgrup', 'App\Http\Controllers\Detail_grup_penilaianController@store');
    Route::post('/back/update-detailgrup', 'App\Http\Controllers\Detail_grup_penilaianController@update');
    Route::post('/back/delete-detailgrup', 'App\Http\Controllers\Detail_grup_penilaianController@delete');
});

//LOGOUT
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');
