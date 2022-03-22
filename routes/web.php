<?php

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
Route::get('/shop-product-list', function () {
    return view('/shop-product-list');
});
*/

Route::get('/', function () {
    return view('index');
});
// Route::get('/{name?}', function ($name="shop-index") {
//    return view($name);
//});
Route::get('/indexLH', function () {
    return view('indexLH');
}) -> middleware('checkage'); 


