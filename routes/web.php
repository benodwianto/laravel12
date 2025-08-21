<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RajaOngkirController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);

Route::get('/rajaongkir', [RajaOngkirController::class, 'index'])->name('rajaongkir.index');
Route::get('/cities/{provinceId}', [RajaOngkirController::class, 'getcities']);
Route::get('/districts/{cityId}', [RajaOngkirController::class, 'getDistrict']);
Route::post('/ongkir', [RajaOngkirController::class, 'checkOngkir']);

Route::resource('cart', CartController::class); 

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
