<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RajaOngkirController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('products', ProductController::class);

Route::get('/rajaongkir', [RajaOngkirController::class, 'index'])->name('rajaongkir.index');
Route::get('/cities/{provinceId}', [RajaOngkirController::class, 'getcities']);
Route::get('/districts/{cityId}', [RajaOngkirController::class, 'getDistrict']);
Route::get('/ongkir', [RajaOngkirController::class, 'checkOngkir']);
