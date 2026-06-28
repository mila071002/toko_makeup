<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

//halaman utama langsung ke login
Route::get('/',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.process');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');


//protect halaman products supaya tidak bisa diakses tanpa login
Route::middleware('auth')->group(function(){
    Route::get('/products/download-pdf',[ProductController::class,'downloadPdf'])->name('products.pdf');
    Route::resource('products',ProductController::class);
    Route::get('transactions',[TransactionController::class,'index'])->name('transactions.index');
    Route::post('transactions',[TransactionController::class,'store'])->name('transactions.store');
});