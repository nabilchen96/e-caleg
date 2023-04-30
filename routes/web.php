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
// Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/', function(){
    return view('frontend.welcome');
});

//LOGIN
Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/loginProses', 'App\Http\Controllers\AuthController@loginProses');

//REGISTER
Route::get('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/registerProses', 'App\Http\Controllers\AuthController@registerProses');

//KALKULATOR SAMAPTA
Route::get('/kalkulator', 'App\Http\Controllers\KalkulatorController@index');

//REFERENSI
Route::get('/referensi', 'App\Http\Controllers\DokumenReferensiController@referensi');

//BACKEND
Route::group(['middleware' => 'auth'], function () {

    //DASHBOARD
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

    // BERAT ISI HALUS
    Route::get('/back/berat-isi-halus', 'App\Http\Controllers\PengujianBeratIsiController@index');
    Route::get('/back/data-berat-isi-halus', 'App\Http\Controllers\PengujianBeratIsiController@data');
    Route::post('/back/store-berat-isi-halus', 'App\Http\Controllers\PengujianBeratIsiController@store');
    Route::post('/back/update-berat-isi-halus', 'App\Http\Controllers\PengujianBeratIsiController@update');
    Route::get('/back/cetak-berat-isi-halus/{id}', 'App\Http\Controllers\PengujianBeratIsiController@cetakBerat');

    // BERAT ISI KASAR
    Route::get('/back/berat-isi-kasar', 'App\Http\Controllers\PengujianberatisikasarController@index');
    Route::get('/back/data-berat-isi-kasar', 'App\Http\Controllers\PengujianberatisikasarController@data');
    Route::post('/back/store-berat-isi-kasar', 'App\Http\Controllers\PengujianberatisikasarController@store');
    Route::post('/back/update-berat-isi-kasar', 'App\Http\Controllers\PengujianberatisikasarController@update');
    Route::get('/back/cetak-berat-isi-kasar/{id}', 'App\Http\Controllers\PengujianberatisikasarController@cetakBerat');

    // SSD KASAR
    Route::get('/back/ssd-kasar', 'App\Http\Controllers\PengujianssdkasarController@index');
    Route::get('/back/data-ssd-kasar', 'App\Http\Controllers\PengujianssdkasarController@data');
    Route::post('/back/store-ssd-kasar', 'App\Http\Controllers\PengujianssdkasarController@store');
    Route::post('/back/update-ssd-kasar', 'App\Http\Controllers\PengujianssdkasarController@update');
    Route::get('/back/cetak-ssd-kasar/{id}', 'App\Http\Controllers\PengujianssdkasarController@cetakBerat');

    // SSD HALUS
    Route::get('/back/ssd-halus', 'App\Http\Controllers\PengujianssdhalusController@index');
    Route::get('/back/data-ssd-halus', 'App\Http\Controllers\PengujianssdhalusController@data');
    Route::post('/back/store-ssd-halus', 'App\Http\Controllers\PengujianssdhalusController@store');
    Route::post('/back/update-ssd-halus', 'App\Http\Controllers\PengujianssdhalusController@update');
    Route::get('/back/cetak-ssd-halus/{id}', 'App\Http\Controllers\PengujianssdhalusController@cetakBerat');

    // Analisa saringan halus
    Route::get('/back/analisa-saringan-halus', 'App\Http\Controllers\AnalisasaringanhalusController@index');
    Route::get('/back/data-analisa-saringan-halus', 'App\Http\Controllers\AnalisasaringanhalusController@data');
    Route::post('/back/store-analisa-saringan-halus', 'App\Http\Controllers\AnalisasaringanhalusController@store');
    Route::post('/back/update-analisa-saringan-halus', 'App\Http\Controllers\AnalisasaringanhalusController@update');
    Route::get('/back/cetak-analisa-saringan-halus/{id}', 'App\Http\Controllers\AnalisasaringanhalusController@cetakBerat');

    // Gradasi kasar
    Route::get('/back/gradasi-kasar', 'App\Http\Controllers\GradasikasarController@index');
    Route::get('/back/data-gradasi-kasar', 'App\Http\Controllers\GradasikasarController@data');
    Route::post('/back/store-gradasi-kasar', 'App\Http\Controllers\GradasikasarController@store');
    Route::post('/back/update-gradasi-kasar', 'App\Http\Controllers\GradasikasarController@update');
    Route::get('/back/cetak-gradasi-kasar/{id}', 'App\Http\Controllers\GradasikasarController@cetakBerat');

    // Los Angeles
    Route::get('/back/los-angeles', 'App\Http\Controllers\PengujianlosangelesController@index');
    Route::get('/back/data-los-angeles', 'App\Http\Controllers\PengujianlosangelesController@data');
    Route::post('/back/store-los-angeles', 'App\Http\Controllers\PengujianlosangelesController@store');
    Route::post('/back/update-los-angeles', 'App\Http\Controllers\PengujianlosangelesController@update');
    Route::get('/back/cetak-los-angeles/{id}', 'App\Http\Controllers\PengujianlosangelesController@cetakBerat');

    // Kadar Lumpur
    Route::get('/back/kadar-lumpur-halus', 'App\Http\Controllers\PengujiankadarlumpurController@index');
    Route::get('/back/data-kadar-lumpur-halus', 'App\Http\Controllers\PengujiankadarlumpurController@data');
    Route::post('/back/store-kadar-lumpur-halus', 'App\Http\Controllers\PengujiankadarlumpurController@store');
    Route::post('/back/update-kadar-lumpur-halus', 'App\Http\Controllers\PengujiankadarlumpurController@update');
    Route::get('/back/cetak-kadar-lumpur-halus/{id}', 'App\Http\Controllers\PengujiankadarlumpurController@cetakBerat');

    // DOKUMEN REFERENSI
    Route::get('/back/dokumen-referensi', 'App\Http\Controllers\DokumenReferensiController@index');
    Route::get('/back/data-dokumen-referensi', 'App\Http\Controllers\DokumenReferensiController@data');
    Route::post('/back/store-dokumen-referensi', 'App\Http\Controllers\DokumenReferensiController@store');
    Route::post('/back/update-dokumen-referensi', 'App\Http\Controllers\DokumenReferensiController@update');
    Route::post('/back/delete-dokumen-referensi', 'App\Http\Controllers\DokumenReferensiController@delete');

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
