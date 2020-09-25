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
Route::view("/register", "web.frontend.auth.register");
Route::view("/login", "web.frontend.auth.login");
Route::get('/kereta-api', 'KeretaApiController@index');
Route::post('/kereta-api/search', 'KeretaApiController@search');
Route::get('/pesawat', 'PesawatController@index');
Route::post('/pesawat/search', 'PesawatController@search');

// Route::prefix('admin')
//       ->namespace('Admin')
//       ->group(function(){
//           Route::get('/', "DashboardController@index")
// });