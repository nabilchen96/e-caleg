<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'App\Http\Controllers\Api\LoginController@index');
Route::get('/logout', 'App\Http\Controllers\Api\LoginController@logout');

Route::middleware('auth:sanctum')->get('/user', 'App\Http\Controllers\Api\UserController@index');
Route::middleware('auth:sanctum')->get('/samapta', 'App\Http\Controllers\Api\SamaptaController@index');
Route::middleware('auth:sanctum')->get('/grup', 'App\Http\Controllers\Api\grupPenilaianController@index');
