<?php

// use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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

Route::get('/', [ProductsController::class,'index'])->name('home');

// Route::get('/test', function () {
//     dd('testing');
// })->middleware(['auth', 'password.confirm']);


//authentication
Auth::routes();
Route::post('/processLogin', [LoginController::class, 'postLogin'])->name('processLogin');
Route::post('/processRegistration', [RegisterController::class, 'postRegistration'])->name('processRegistration');

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    // Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    Route::get('/logout', [LogoutController::class, 'logOutUser'])->name('logout.logOutUser');

    //cart
    Route::get('/getCart', [CartsController::class, 'getCart'])->name('getCart');
    Route::post('/cart', [CartsController::class, 'store'])->name('cart');
    Route::get('/checkout', [CartsController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/get/items', [CartsController::class, 'getCartItemsForCheckout']);
    Route::post('/process/user/payment', [CartsController::class, 'processPayment'])->name('processPayment');
 });

