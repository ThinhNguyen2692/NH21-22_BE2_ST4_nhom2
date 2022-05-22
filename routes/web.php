<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\WelcomeCotroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopIndexController;
use App\Http\Controllers\ShopItemController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\CartController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/shop-shopping-cart/show', [CartController::class, 'Show']);
Route::get('/indexAdmin', [AdminController::class, 'index']);
Route::get('/indexAdmin/{name?}', [AdminController::class, 'show']);
Route::post('/indexAdmin/{name?}', [AdminController::class, 'createProduct']);
Route::get('/indexAdmin/{name?}/{id?}', [AdminController::class, 'destroy']);
Route::get('/indexAdmin/{name?}/{nameshow?}/{id?}', [AdminController::class, 'edit']);
Route::post('/indexAdmin/{name?}/{nameshow?}', [AdminController::class, 'update']);

Route::get('/', [MyController::class, 'index']);
Route::get('/shop-product-list', [MyController::class, 'store']);
Route::get('/logout', [MyController::class, 'logout']);

Route::get('/name', 'MyController@store');
Route::get('/{name?}/{id?}', [MyController::class, 'show']);
Route::post('/shop-product-list', [MyController::class, 'filter']);

Route::get('/shop-shopping-cart/{id?}/{quantity?}', [CartController::class, 'index']);
Route::get('/shop-shopping-cart/delete/cart/{id?}', [CartController::class, 'deleteCart']);
