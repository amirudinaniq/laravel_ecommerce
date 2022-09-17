<?php

// use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\AboutController;


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

//about
Route::get('/contact', [AboutController::class,'contact'])->name('contact');
Route::get('/team', [AboutController::class,'team'])->name('team');
Route::get('/blog', [AboutController::class,'blog'])->name('blog');


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

    //orders
    Route::get('/orders', [OrdersController::class, 'orders'])->name('orders');
    Route::get('/getOrders', [OrdersController::class, 'getOrders'])->name('getOrders');
 
    //notifications
    Route::get('/notifications', [NotificationsController::class, 'notifications'])->name('notifications');

    //points
    Route::get('/points', [PointsController::class, 'points'])->name('points');

    //settings
    Route::get('/settings', [SettingsController::class, 'settings'])->name('settings');

     //customers
     Route::get('/account', [CustomersController::class, 'customerAccount'])->name('account');

 


});

