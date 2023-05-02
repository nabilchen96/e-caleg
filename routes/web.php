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

Route::get('/kirimemail','App\Http\Controllers\MalasngodingController@index');

//BACKEND
Route::group(['middleware' => 'auth'], function () {

    //DASHBOARD
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

    // BERAT ISI HALUS
    Route::get('/berat-isi-halus', 'App\Http\Controllers\PengujianBeratIsiController@index');
    Route::get('/data-berat-isi-halus', 'App\Http\Controllers\PengujianBeratIsiController@data');
    Route::get('/data-berat-isi-halus-acc', 'App\Http\Controllers\PengujianBeratIsiController@dataacc');
    Route::get('/data-berat-isi-halus-tolak', 'App\Http\Controllers\PengujianBeratIsiController@datatolak');
    Route::post('/store-berat-isi-halus', 'App\Http\Controllers\PengujianBeratIsiController@store');
    Route::post('/update-berat-isi-halus', 'App\Http\Controllers\PengujianBeratIsiController@update');
    Route::get('/cetak-berat-isi-halus/{id}', 'App\Http\Controllers\PengujianBeratIsiController@cetakBerat');
    Route::post('/delete-berat-isi-halus', 'App\Http\Controllers\PengujianBeratIsiController@delete');
    Route::post('/verifikasi-berat-isi-halus', 'App\Http\Controllers\PengujianBeratIsiController@verifikasi');
    
    // BERAT ISI KASAR
    Route::get('/berat-isi-kasar', 'App\Http\Controllers\PengujianberatisikasarController@index');
    Route::get('/data-berat-isi-kasar', 'App\Http\Controllers\PengujianberatisikasarController@data');
    Route::get('/data-berat-isi-kasar-acc', 'App\Http\Controllers\PengujianberatisikasarController@dataacc');
    Route::get('/data-berat-isi-kasar-tolak', 'App\Http\Controllers\PengujianberatisikasarController@datatolak');
    Route::post('/store-berat-isi-kasar', 'App\Http\Controllers\PengujianberatisikasarController@store');
    Route::post('/update-berat-isi-kasar', 'App\Http\Controllers\PengujianberatisikasarController@update');
    Route::get('/cetak-berat-isi-kasar/{id}', 'App\Http\Controllers\PengujianberatisikasarController@cetakBerat');
    Route::post('/delete-berat-isi-kasar', 'App\Http\Controllers\PengujianberatisikasarController@delete');
    Route::post('/verifikasi-berat-isi-kasar', 'App\Http\Controllers\PengujianberatisikasarController@verifikasi');

    // SSD KASAR
    Route::get('/ssd-kasar', 'App\Http\Controllers\PengujianssdkasarController@index');
    Route::get('/data-ssd-kasar', 'App\Http\Controllers\PengujianssdkasarController@data');
    Route::get('/data-ssd-kasar-acc', 'App\Http\Controllers\PengujianssdkasarController@dataacc');
    Route::get('/data-ssd-kasar-tolak', 'App\Http\Controllers\PengujianssdkasarController@datatolak');
    Route::post('/store-ssd-kasar', 'App\Http\Controllers\PengujianssdkasarController@store');
    Route::post('/update-ssd-kasar', 'App\Http\Controllers\PengujianssdkasarController@update');
    Route::get('/cetak-ssd-kasar/{id}', 'App\Http\Controllers\PengujianssdkasarController@cetakBerat');
    Route::post('/delete-ssd-kasar', 'App\Http\Controllers\PengujianssdkasarController@delete');
    Route::post('/verifikasi-ssd-kasar', 'App\Http\Controllers\PengujianssdkasarController@verifikasi');

    // SSD HALUS
    Route::get('/ssd-halus', 'App\Http\Controllers\PengujianssdhalusController@index');
    Route::get('/data-ssd-halus', 'App\Http\Controllers\PengujianssdhalusController@data');
    Route::get('/data-ssd-halus-acc', 'App\Http\Controllers\PengujianssdhalusController@dataacc');
    Route::get('/data-ssd-halus-tolak', 'App\Http\Controllers\PengujianssdhalusController@datatolak');
    Route::post('/store-ssd-halus', 'App\Http\Controllers\PengujianssdhalusController@store');
    Route::post('/update-ssd-halus', 'App\Http\Controllers\PengujianssdhalusController@update');
    Route::get('/cetak-ssd-halus/{id}', 'App\Http\Controllers\PengujianssdhalusController@cetakBerat');
    Route::post('/delete-ssd-halus', 'App\Http\Controllers\PengujianssdhalusController@delete');
    Route::post('/verifikasi-ssd-halus', 'App\Http\Controllers\PengujianssdhalusController@verifikasi');

    // Analisa saringan halus
    Route::get('/analisa-saringan-halus', 'App\Http\Controllers\AnalisasaringanhalusController@index');
    Route::get('/data-analisa-saringan-halus', 'App\Http\Controllers\AnalisasaringanhalusController@data');
    Route::get('/data-analisa-saringan-halus-acc', 'App\Http\Controllers\AnalisasaringanhalusController@dataacc');
    Route::get('/data-analisa-saringan-halus-tolak', 'App\Http\Controllers\AnalisasaringanhalusController@datatolak');
    Route::post('/store-analisa-saringan-halus', 'App\Http\Controllers\AnalisasaringanhalusController@store');
    Route::post('/update-analisa-saringan-halus', 'App\Http\Controllers\AnalisasaringanhalusController@update');
    Route::get('/cetak-analisa-saringan-halus/{id}', 'App\Http\Controllers\AnalisasaringanhalusController@cetakBerat');
    Route::post('/delete-analisa-saringan-halus', 'App\Http\Controllers\AnalisasaringanhalusController@delete');
    Route::post('/verifikasi-analisa-saringan-halus', 'App\Http\Controllers\AnalisasaringanhalusController@verifikasi');

    // Gradasi kasar
    Route::get('/gradasi-kasar', 'App\Http\Controllers\GradasikasarController@index');
    Route::get('/data-gradasi-kasar', 'App\Http\Controllers\GradasikasarController@data');
    Route::get('/data-gradasi-kasar-acc', 'App\Http\Controllers\GradasikasarController@dataacc');
    Route::get('/data-gradasi-kasar-tolak', 'App\Http\Controllers\GradasikasarController@datatolak');
    Route::post('/store-gradasi-kasar', 'App\Http\Controllers\GradasikasarController@store');
    Route::post('/update-gradasi-kasar', 'App\Http\Controllers\GradasikasarController@update');
    Route::get('/cetak-gradasi-kasar/{id}', 'App\Http\Controllers\GradasikasarController@cetakBerat');
    Route::post('/delete-gradasi-kasar', 'App\Http\Controllers\GradasikasarController@delete');
    Route::post('/verifikasi-gradasi-kasar', 'App\Http\Controllers\GradasikasarController@verifikasi');

    // Los Angeles
    Route::get('/los-angeles', 'App\Http\Controllers\PengujianlosangelesController@index');
    Route::get('/data-los-angeles', 'App\Http\Controllers\PengujianlosangelesController@data');
    Route::get('/data-los-angeles-acc', 'App\Http\Controllers\PengujianlosangelesController@dataacc');
    Route::get('/data-los-angeles-tolak', 'App\Http\Controllers\PengujianlosangelesController@datatolak');
    Route::post('/store-los-angeles', 'App\Http\Controllers\PengujianlosangelesController@store');
    Route::post('/update-los-angeles', 'App\Http\Controllers\PengujianlosangelesController@update');
    Route::get('/cetak-los-angeles/{id}', 'App\Http\Controllers\PengujianlosangelesController@cetakBerat');
    Route::post('/delete-los-angeles', 'App\Http\Controllers\PengujianlosangelesController@delete');
    Route::post('/verifikasi-los-angeles', 'App\Http\Controllers\PengujianlosangelesController@verifikasi');

    // Kadar Lumpur
    Route::get('/kadar-lumpur-halus', 'App\Http\Controllers\PengujiankadarlumpurController@index');
    Route::get('/data-kadar-lumpur-halus', 'App\Http\Controllers\PengujiankadarlumpurController@data');
    Route::get('/data-kadar-lumpur-halus-acc', 'App\Http\Controllers\PengujiankadarlumpurController@dataacc');
    Route::get('/data-kadar-lumpur-halus-tolak', 'App\Http\Controllers\PengujiankadarlumpurController@datatolak');
    Route::post('/store-kadar-lumpur-halus', 'App\Http\Controllers\PengujiankadarlumpurController@store');
    Route::post('/update-kadar-lumpur-halus', 'App\Http\Controllers\PengujiankadarlumpurController@update');
    Route::get('/cetak-kadar-lumpur-halus/{id}', 'App\Http\Controllers\PengujiankadarlumpurController@cetakBerat');
    Route::post('/delete-kadar-lumpur-halus', 'App\Http\Controllers\PengujiankadarlumpurController@delete');
    Route::post('/verifikasi-kadar-lumpur-halus', 'App\Http\Controllers\PengujiankadarlumpurController@verifikasi');

    // DOKUMEN REFERENSI
    Route::get('/dokumen-referensi', 'App\Http\Controllers\DokumenReferensiController@index');
    Route::get('/data-dokumen-referensi', 'App\Http\Controllers\DokumenReferensiController@data');
    Route::post('/store-dokumen-referensi', 'App\Http\Controllers\DokumenReferensiController@store');
    Route::post('/update-dokumen-referensi', 'App\Http\Controllers\DokumenReferensiController@update');
    Route::post('/delete-dokumen-referensi', 'App\Http\Controllers\DokumenReferensiController@delete');

    //USER
    Route::get('/user', 'App\Http\Controllers\UserController@index');
    Route::get('/data-user', 'App\Http\Controllers\UserController@data');
    Route::post('/store-user', 'App\Http\Controllers\UserController@store');
    Route::post('/update-user', 'App\Http\Controllers\UserController@update');
    Route::post('/delete-user', 'App\Http\Controllers\UserController@delete');

});

//LOGOUT
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');
