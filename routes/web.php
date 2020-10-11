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

Route::get("/", "PagesController@index");

Route::view("/register", "web.frontend.auth.register");
Route::view("/login", "web.frontend.auth.login");

Route::get('/kereta-api', 'KeretaApiController@index');
Route::post('/kereta-api/search', 'KeretaApiController@show');

Route::get('/pesawat', 'PesawatController@index');
Route::get('/pesawat/search/', 'PagesController@search')->name("cari_penerbangan");
Route::get('/pesawat/search/ubah', 'PagesController@changeSearch');

Route::post('/checkout/{id}', 'CheckoutController@process')
      ->name('checkout_process')
      ->middleware(['auth', 'verified']);

Route::get('/checkout/{id}', 'CheckoutController@index')
      ->name('checkout')
      ->middleware(['auth', 'verified']);
Route::get('/checkout/confirm/{id}', "CheckoutController@success")
      ->name("checkout_success")
      ->middleware(["auth", "verified"]);
      
Route::prefix('admin')
      ->namespace('Admin')
      ->group(function(){
          Route::get('/', "DashboardController@index");
      });

Route::get("/coba", function(){
  return view("web.frontend.transaction.checkout");
});