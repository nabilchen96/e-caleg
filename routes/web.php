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
    Route::get('/grafik-dapil/{id_dapil}', 'App\Http\Controllers\DashboardController@grafikDapil');
    Route::get('/grafik-kecamatan/{id_calon}', 'App\Http\Controllers\DashboardController@grafikKecamatan');


    //USER
    Route::get('/user', 'App\Http\Controllers\UserController@index')->middleware('checkRole:Admin');
    Route::get('/data-user', 'App\Http\Controllers\UserController@data')->middleware('checkRole:Admin');
    Route::post('/store-user', 'App\Http\Controllers\UserController@store')->middleware('checkRole:Admin');
    Route::post('/update-user', 'App\Http\Controllers\UserController@update')->middleware('checkRole:Admin');
    Route::post('/delete-user', 'App\Http\Controllers\UserController@delete')->middleware('checkRole:Admin');
    Route::post('/import-user', 'App\Http\Controllers\UserController@import')->middleware('checkRole:Admin');
    Route::get('/export-user', 'App\Http\Controllers\UserController@export')->middleware('checkRole:Admin');


    //DAPIL
    Route::get('/halaman-dapil', 'App\Http\Controllers\DapilController@index')->middleware('checkRole:Admin');
    Route::get('/data-dapil', 'App\Http\Controllers\DapilController@data');
    Route::post('/store-dapil', 'App\Http\Controllers\DapilController@store')->middleware('checkRole:Admin');
    Route::post('/update-dapil', 'App\Http\Controllers\DapilController@update')->middleware('checkRole:Admin');
    Route::post('/delete-dapil', 'App\Http\Controllers\DapilController@delete')->middleware('checkRole:Admin');
    Route::post('/import-dapil', 'App\Http\Controllers\DapilController@import')->middleware('checkRole:Admin');
    Route::get('/export-dapil', 'App\Http\Controllers\DapilController@export')->middleware('checkRole:Admin');


    //KECAMATAN
    Route::get('/halaman-kecamatan', 'App\Http\Controllers\KecamatanController@index')->middleware('checkRole:Admin');
    Route::get('/data-kecamatan', 'App\Http\Controllers\KecamatanController@data');
    Route::post('/store-kecamatan', 'App\Http\Controllers\KecamatanController@store')->middleware('checkRole:Admin');
    Route::post('/update-kecamatan', 'App\Http\Controllers\KecamatanController@update')->middleware('checkRole:Admin');
    Route::post('/delete-kecamatan', 'App\Http\Controllers\KecamatanController@delete')->middleware('checkRole:Admin');
    Route::post('/import-kecamatan', 'App\Http\Controllers\KecamatanController@import')->middleware('checkRole:Admin');
    Route::get('/export-kecamatan', 'App\Http\Controllers\KecamatanController@export')->middleware('checkRole:Admin');
    

    //KELURAHAN
    Route::get('/kelurahan', 'App\Http\Controllers\KelurahanController@index')->middleware('checkRole:Admin');
    Route::get('/data-kelurahan', 'App\Http\Controllers\KelurahanController@data');
    Route::post('/store-kelurahan', 'App\Http\Controllers\KelurahanController@store')->middleware('checkRole:Admin');
    Route::post('/update-kelurahan', 'App\Http\Controllers\KelurahanController@update')->middleware('checkRole:Admin');
    Route::post('/delete-kelurahan', 'App\Http\Controllers\KelurahanController@delete')->middleware('checkRole:Admin');
    Route::post('/import-kelurahan', 'App\Http\Controllers\KelurahanController@import')->middleware('checkRole:Admin');
    Route::get('/export-kelurahan', 'App\Http\Controllers\KelurahanController@export')->middleware('checkRole:Admin');


    //PARTAI
    Route::get('/partai', 'App\Http\Controllers\PartaiController@index')->middleware('checkRole:Admin');
    Route::get('/data-partai', 'App\Http\Controllers\PartaiController@data');
    Route::post('/store-partai', 'App\Http\Controllers\PartaiController@store')->middleware('checkRole:Admin');
    Route::post('/update-partai', 'App\Http\Controllers\PartaiController@update')->middleware('checkRole:Admin');
    Route::post('/delete-partai', 'App\Http\Controllers\PartaiController@delete')->middleware('checkRole:Admin');

    //JADWAL
    Route::get('/jadwal', 'App\Http\Controllers\JadwalController@index')->middleware('checkRole:Admin');
    Route::get('/data-jadwal', 'App\Http\Controllers\JadwalController@data');
    Route::post('/store-jadwal', 'App\Http\Controllers\JadwalController@store')->middleware('checkRole:Admin');
    Route::post('/update-jadwal', 'App\Http\Controllers\JadwalController@update')->middleware('checkRole:Admin');
    Route::post('/delete-jadwal', 'App\Http\Controllers\JadwalController@delete')->middleware('checkRole:Admin');

    //CALON
    Route::get('/calon', 'App\Http\Controllers\CalonController@index')->middleware('checkRole:Admin');
    Route::get('/data-calon', 'App\Http\Controllers\CalonController@data');
    Route::post('/store-calon', 'App\Http\Controllers\CalonController@store')->middleware('checkRole:Admin');
    Route::post('/update-calon', 'App\Http\Controllers\CalonController@update')->middleware('checkRole:Admin');
    Route::post('/delete-calon', 'App\Http\Controllers\CalonController@delete')->middleware('checkRole:Admin');
    Route::post('/import-calon', 'App\Http\Controllers\CalonController@import')->middleware('checkRole:Admin');
    Route::get('/export-calon', 'App\Http\Controllers\CalonController@export')->middleware('checkRole:Admin');

    //TIM PEMENANGAN
    Route::get('/tim-pemenangan', 'App\Http\Controllers\TimPemenanganController@index')->middleware('checkRole:Admin');
    Route::get('/data-tim-pemenangan', 'App\Http\Controllers\TimPemenanganController@data');
    Route::post('/store-tim-pemenangan', 'App\Http\Controllers\TimPemenanganController@store')->middleware('checkRole:Admin');
    Route::post('/update-tim-pemenangan', 'App\Http\Controllers\TimPemenanganController@update')->middleware('checkRole:Admin');
    Route::post('/delete-tim-pemenangan', 'App\Http\Controllers\TimPemenanganController@delete')->middleware('checkRole:Admin');
    Route::post('/import-anggota', 'App\Http\Controllers\TimPemenanganController@import')->middleware('checkRole:Admin');
    Route::get('/export-tim-pemenangan', 'App\Http\Controllers\TimPemenanganController@export')->middleware('checkRole:Admin');

    //RELAWAN
    Route::get('/relawan', 'App\Http\Controllers\RelawanController@index')->middleware('checkRole:Admin');
    Route::get('/data-relawan', 'App\Http\Controllers\RelawanController@data');
    Route::post('/store-relawan', 'App\Http\Controllers\RelawanController@store')->middleware('checkRole:Admin');
    Route::post('/update-relawan', 'App\Http\Controllers\RelawanController@update')->middleware('checkRole:Admin');
    Route::post('/delete-relawan', 'App\Http\Controllers\RelawanController@delete')->middleware('checkRole:Admin');
    Route::post('/import-relawan', 'App\Http\Controllers\RelawanController@import')->middleware('checkRole:Admin');
    
    //PENDUKUNG
    Route::get('/pendukung', 'App\Http\Controllers\PendukungController@index')->middleware('checkRole:Admin');
    Route::get('/data-pendukung', 'App\Http\Controllers\PendukungController@data');
    Route::post('/store-pendukung', 'App\Http\Controllers\PendukungController@store')->middleware('checkRole:Admin');
    Route::post('/update-pendukung', 'App\Http\Controllers\PendukungController@update')->middleware('checkRole:Admin');
    Route::post('/delete-pendukung', 'App\Http\Controllers\PendukungController@delete')->middleware('checkRole:Admin');

    //SAKSI
    Route::get('/saksi', 'App\Http\Controllers\SaksiController@index')->middleware('checkRole:Admin');
    Route::get('/data-saksi', 'App\Http\Controllers\SaksiController@data');
    Route::post('/store-saksi', 'App\Http\Controllers\SaksiController@store')->middleware('checkRole:Admin');
    Route::post('/update-saksi', 'App\Http\Controllers\SaksiController@update')->middleware('checkRole:Admin');
    Route::post('/delete-saksi', 'App\Http\Controllers\SaksiController@delete')->middleware('checkRole:Admin');


    //TPS
    Route::get('/tps', 'App\Http\Controllers\TpsController@index')->middleware('checkRole:Admin');
    Route::get('/data-tps', 'App\Http\Controllers\TpsController@data');
    Route::post('/store-tps', 'App\Http\Controllers\TpsController@store')->middleware('checkRole:Admin');
    Route::post('/update-tps', 'App\Http\Controllers\TpsController@update')->middleware('checkRole:Admin');
    Route::post('/delete-tps', 'App\Http\Controllers\TpsController@delete')->middleware('checkRole:Admin');
    Route::post('/import-tps', 'App\Http\Controllers\TPSController@import')->middleware('checkRole:Admin');
    Route::get('/export-tps', 'App\Http\Controllers\TPSController@export')->middleware('checkRole:Admin');

    //SUARA
    Route::get('/suara', 'App\Http\Controllers\SuaraController@index')->middleware('checkRole:Admin');
    Route::get('/data-suara', 'App\Http\Controllers\SuaraController@data');
    Route::post('/store-suara', 'App\Http\Controllers\SuaraController@store')->middleware('checkRole:Admin');
    Route::post('/update-suara', 'App\Http\Controllers\SuaraController@update')->middleware('checkRole:Admin');
    Route::post('/delete-suara', 'App\Http\Controllers\SuaraController@delete')->middleware('checkRole:Admin');
    Route::post('/import-suara', 'App\Http\Controllers\SuaraController@import')->middleware('checkRole:Admin');
    Route::get('/export-suara', 'App\Http\Controllers\SuaraController@export')->middleware('checkRole:Admin');


    //LAPORAN
    Route::get('/laporan-dapil', 'App\Http\Controllers\LaporanController@index')->middleware('checkRole:Admin');
    Route::get('/export-laporan-dapil', 'App\Http\Controllers\LaporanController@exportDapil')->middleware('checkRole:Admin');
    
    Route::get('/laporan-kecamatan', 'App\Http\Controllers\LaporanController@laporanKecamatan')->middleware('checkRole:Admin');
    Route::get('/export-kecamatan', 'App\Http\Controllers\LaporanController@exportKecamatan')->middleware('checkRole:Admin');
});

//LOGOUT
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');