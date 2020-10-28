<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\CheckoutController;
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

Route::get('/', [PagesController::class, 'index'])->name('home');

// Rute web Kereta Api
Route::get('/kereta-api', [TrainController::class, 'index'])->name('train');
Route::post('/kereta-api/search', [TrainController::class, 'search'])->name('train_search');

// Rute web Pesawat
Route::get('/pesawat', [PlaneController::class, 'index']);
Route::get('/pesawat/search/', [PagesController::class, 'search'])->name("flight_search");
Route::get('/pesawat/search/edit', [PagesController::class, 'changeSearch'])->name('flight_search_edit');
Route::get('/pesawat/search/next', [PagesController::class, 'nextSearch'])->name('next_flight_search');

// Rute untuk Checkout
Route::post('/checkout/{departureid}/{arrivalid?}', [CheckoutController::class, 'process'])
      ->name('checkout_process')
      ->middleware(['auth', 'verified']);

Route::post('/checkout', [CheckoutController::class, 'getFlightDetail'])
      ->name('flight_detail')
      ->middleware(['auth', 'verified']);

Route::get('/checkout/{id}', [CheckoutController::class, 'index'])
      ->name('checkout')
      ->middleware(['auth', 'verified']);

Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])
      ->name("checkout_success")
      ->middleware(["auth", "verified"]);

// Rute untuk Admin
Route::prefix('admin')->namespace('Admin')
      ->middleware(['auth', 'admin'])
      ->group(function(){
          Route::get('/', [DashboardController::class, "index"])
          ->name('dashboard');

          Route::resource('plane', 'PlaneController');
});

// Rute untuk menampilkan link verifikasi email
Auth::routes(['verify' => true]);
Route::get('/email/verify', function () {
            return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');

// Rute untuk mengirim kembali verifikasi email
Route::post('/email/verification-notification', function (Request $request) {
      $request->user()->sendEmailVerificationNotification();
      
      return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


      