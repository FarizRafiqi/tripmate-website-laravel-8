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

setlocale(LC_ALL, "id-ID", "id_ID");
Route::get("/", "PagesController@home");
Route::get('/kereta-api', 'KeretaApiController@index');
Route::get('/pesawat', 'PesawatController@index');
Route::get('/pesawat/search', 'PesawatController@search');