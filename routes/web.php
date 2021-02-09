<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
});
