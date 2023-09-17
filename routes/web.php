<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('products/view',[ProductController::class,'view'])->name('products.view');
Route::get('products/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
Route::post('products/update/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('products/remove/{product}',[ProductController::class,'remove'])->name('products.remove');
Route::get('products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/store',[ProductController::class, 'store'])->name('products.store');
