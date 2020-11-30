<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Plane\SearchController as FlightSearch;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FlightCartController;
use App\Http\Controllers\FlightTicketPaymentController;

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

Route::get('/', [FlightSearch::class, 'index'])->name('home');

// Rute web Kereta Api
Route::get('/kereta-api', [TrainController::class, 'index'])->name('train');
Route::post('/kereta-api/search', [TrainController::class, 'search'])->name('train_search');

// Rute web Pesawat
Route::get('/pesawat', [PlaneController::class, 'index'])->name('home_plane');
Route::get('/pesawat/delete', [PlaneController::class, 'deleteLastSearch'])->name('delete_last_search');
Route::get('/pesawat/search/', [FlightSearch::class, 'search'])->name("flight_search");
// Route::get('/pesawat/search/edit', [FlightSearch::class, 'search'])->name('flight_search_edit');
// Route::get('/pesawat/search/next', [FlightSearch::class, 'search'])->name('flight_search_next');

// Rute untuk Cart Tiket Penerbangan
Route::group(['middleware'=>['auth', 'verified']], function(){
      //Rute untuk keranjang tiket penerbangan
      Route::group(['prefix' => 'cart', 'as' => 'cart.flight.'], function(){
            Route::post('flight/{flight}', [FlightCartController::class, 'store'])
            ->name('store');
            
            Route::post('flight/store-order/{id}', [FlightCartController::class, 'storeOrder'])
            ->name('store-order');
            
            Route::get('flight/{id}', [FlightCartController::class, 'index'])
            ->name('index');
            
            Route::post('flight/detail/{id}', [FlightCartController::class, 'getFlightDetail'])
            ->name('getdetail');
            
            Route::post('flight/destroy/{id}', [FlightCartController::class, 'destroy'])
            ->name('destroy');
      });
      
      //Rute untuk pembayaran tiket pesawat
      Route::get('/payment/flight/{order}', [FlightTicketPaymentController::class, 'index'])
      ->name('payment.flight.index');

      Route::put('/payment/flight/{order}', [FlightTicketPaymentController::class, 'updateFlightOrder'])
      ->name('payment.flight.update');

      // Rute untuk Admin
      Route::group(['middleware' => ['admin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
            Route::get('/', [DashboardController::class, "index"])
            ->name('dashboard');

            Route::resource('plane', 'PlaneController');
      });
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


      