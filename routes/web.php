<?php

use App\Mail\OrderPlaced;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/', [App\Http\Controllers\Welcome::class, 'index'])->name('welcome');

// Route::get('/products', [ProductController::class, 'index'])->middleware('auth');
// Route::get('/products/create',  [ProductController::class, 'create']);
// Route::post('/products',  [ProductController::class, 'store']);
// Route::get('/products/{id}',  [ProductController::class, 'show']);
// Route::delete('/products/{id}',  [ProductController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}/{slug}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.show');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::patch('/cart/{product}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index')->middleware('auth');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/service/{service}/{slug}', [App\Http\Controllers\ServiceController::class, 'show'])->name('service.show');

Route::get('/guest-checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('guest-checkout.index');

Route::get('/company', [App\Http\Controllers\CompanyInfoController::class, 'index'])->name('company.index');
Route::get('/contact-us', [App\Http\Controllers\ContactUsController::class, 'index'])->name('contact-us.index');
Route::post('/contact-us', [App\Http\Controllers\ContactUsController::class, 'store'])->name('contact-us.store');

Route::get('/thankyou', [App\Http\Controllers\ConfirmationController::class, 'index'])->name('confirmation.index');


// Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
//     Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::post('/voyager/products/remove', [App\Http\Controllers\Voyager\ProductsController::class, 'remove_media'])->name('voyager.products.media.remove');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
    Route::patch('/my-profile', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');

    Route::get('/my-orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders.index');
    Route::get('/my-orders/{order}', [App\Http\Controllers\OrdersController::class, 'show'])->name('orders.show');
});
