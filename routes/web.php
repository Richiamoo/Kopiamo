<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {return view('dashboard');})->name('dashboard');

// Route::resource('menu', \App\Http\Controllers\MenuController::class);

// Group everything into one middleware
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('menu', MenuController::class);
    Route::get('add-review/{orderid}', [ReviewController::class, 'addreview']);
    Route::resource('review', ReviewController::class);
    Route::get('order-details/{orderid}', [OrderController::class, 'details']);
    Route::post('store-paypal', [OrderController::class, 'storepaypal']);
    Route::get('my-orders', [OrderController::class, 'index']);
    Route::resource('order', OrderController::class);
    Route::get('/search', [MenuController::class, 'search']);
    Route::resource('cart', CartController::class);
    Route::get('payment', [OrderController::class, 'checkout'])->name('payment');
    Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus');
    Route::get('buy-now/{currMenu}', [CheckoutController::class, 'buynow']);
    Route::resource('checkout', CheckoutController::class);
    Route::put('/cart-checkout', [CheckoutController::class, 'pagetocheckout'])->name('checkout.pagetocheckout');
    Route::get('report', [ReportController::class, 'index'])->name('report');
});
