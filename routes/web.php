<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\WelcomeCotroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopIndexController;
use App\Http\Controllers\ShopItemController;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Input;


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

/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/indexGT', function () {
    return view('indexGT');
});
Route::get('/indexSP', function () {
    return view('indexSP');
});
Route::get('/indexBG', function () {
    return view('indexBG');
});
Route::get('/indexLH', function () {
    return view('indexLH');
});
Route::get('/shopindex', function () {
    return view('shopindex');
});

*/


// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/indexLH', function () {
//     return view('indexLH');
// }) -> middleware('checkage'); 
// Route::get('/', [WelcomeCotroller::class, 'index']);
// Route::post('frombt', [WelcomeCotroller::class, 'frombt']);

// Route::resource('/product', ProductController::class);  
//  Route::post('/product', [ProductController::class, 'store']);

// Route::resource('/product', ProductController::class);  

// Route::get('/{name?}', function ($name="shop-index") {
//    return view($name);
// });

// Route::get('/', function () {
//     return view('shop-index');
// });

// Route::get('/shop-item', function () {
//     return view('/shop-item');
// });

// Route::get('/shop-product-list', function () {
//     return view('/shop-product-list');
// });  
Route::get('/', [MyController::class, 'index']);
Route::get('/shop-product-list', [MyController::class, 'store']);
//Route::get('/name', 'MyController@store');
Route::get('/{name?}/{id?}', [MyController::class, 'show']);
Route::post('/shop-product-list', [MyController::class, 'filter']);

// Route::get('/shop-item', [ShopItemController::class, 'index']);
// Route::get('/shop-product-list', [ShopListController::class, 'index']);
// Route::get('/', [WelcomeCotroller::class, 'index']);
