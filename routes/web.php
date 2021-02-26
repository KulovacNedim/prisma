<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

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
})->name('welcome');

Route::get('/products', [ProductController::class, 'index'])->middleware('auth');
Route::get('/products/create',  [ProductController::class, 'create']);
Route::post('/products',  [ProductController::class, 'store']);
Route::get('/products/{id}',  [ProductController::class, 'show']);
Route::delete('/products/{id}',  [ProductController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}/{slug}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.show');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::patch('/cart/{product}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::get('/empty', function () {
    Cart::destroy();
});

// Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
//     Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
