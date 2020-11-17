<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
});
