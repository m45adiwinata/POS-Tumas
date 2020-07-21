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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/stok', StokController::class);
Route::get('/stok/masuk/{data}', 'StokController@masuk');
Route::get('/stok/get-data/{barcode}', 'StokController@getData');
Route::get('/stok/update/{barcode}', 'StokController@update2');