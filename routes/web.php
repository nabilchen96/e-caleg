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

    //GRUP PENILAIAN
    Route::get('/back/gruppenilaian', 'App\Http\Controllers\GruppenilaianController@index');
    Route::get('/back/data-gruppenilaian', 'App\Http\Controllers\GruppenilaianController@data');
    Route::post('/back/store-gruppenilaian', 'App\Http\Controllers\GruppenilaianController@store');
    Route::post('/back/update-gruppenilaian', 'App\Http\Controllers\GruppenilaianController@update');
    Route::post('/back/delete-gruppenilaian', 'App\Http\Controllers\GruppenilaianController@delete');


    //SAMAPTA
    Route::get('/back/referensi', 'App\Http\Controllers\SamaptaController@index');
    Route::get('/back/data-samapta', 'App\Http\Controllers\SamaptaController@data');
    Route::post('/back/store-samapta', 'App\Http\Controllers\SamaptaController@store');
    Route::post('/back/update-samapta', 'App\Http\Controllers\SamaptaController@update');
    Route::post('/back/delete-samapta', 'App\Http\Controllers\SamaptaController@delete');
    Route::post('/back/aktivasi-nilai', 'App\Http\Controllers\SamaptaController@aktivasiNilai');

    //DETAIL GRUP
    Route::get('/back/detailgrup/{id_grup}', 'App\Http\Controllers\Detail_grup_penilaianController@index');
    Route::get('/back/detailgruppilih/{id_grup}', 'App\Http\Controllers\Detail_grup_penilaianController@pilih');
    Route::get('/back/data-detailgrup/{id_grup}', 'App\Http\Controllers\Detail_grup_penilaianController@data');
    Route::post('/back/store-detailgrup', 'App\Http\Controllers\Detail_grup_penilaianController@store');
    Route::post('/back/update-detailgrup', 'App\Http\Controllers\Detail_grup_penilaianController@update');
    Route::post('/back/delete-detailgrup', 'App\Http\Controllers\Detail_grup_penilaianController@delete');

    //PENILAIAN
    Route::get('/back/list-penilaian', 'App\Http\Controllers\PenilaianController@index');
    Route::get('/back/data-penilaian', 'App\Http\Controllers\PenilaianController@data');
    Route::post('/back/store-penilaian', 'App\Http\Controllers\PenilaianController@store');
    Route::get('/back/laporan-pdf-penilaian', 'App\Http\Controllers\PenilaianController@laporanPDF');
    // Route::post('/back/update-penilaian', 'App\Http\Controllers\PenilaianController@update');

    //PENGATURAN
    //USER
    Route::get('/back/pengaturan', 'App\Http\Controllers\PengaturanController@index');
    Route::get('/back/data-pengaturan', 'App\Http\Controllers\PengaturanController@data');
    Route::post('/back/store-pengaturan', 'App\Http\Controllers\PengaturanController@store');
    Route::post('/back/update-pengaturan', 'App\Http\Controllers\PengaturanController@update');
    Route::post('/back/delete-pengaturan', 'App\Http\Controllers\PengaturanController@delete');
});

//LOGOUT
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');
