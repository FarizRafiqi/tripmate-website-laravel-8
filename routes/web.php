<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
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

Route::get("/", "PagesController@index");
Route::get('/pesawat/search', 'PagesController@search');

Route::view("/register", "web.frontend.auth.register");
Route::view("/login", "web.frontend.auth.login");

Route::get('/kereta-api', 'KeretaApiController@index');
Route::post('/kereta-api/search', 'KeretaApiController@show');

Route::get('/pesawat', 'PesawatController@index');
// Route::get('/cobalokalisasi', function(){
//   $tanggal = Carbon\Carbon::now()->format('d, F Y');
//   return $tanggal;
// });
// Route::prefix('admin')
//       ->namespace('Admin')
//       ->group(function(){
//           Route::get('/', "DashboardController@index")
// });