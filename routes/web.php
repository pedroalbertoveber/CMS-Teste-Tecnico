<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');

Route::get('/categories/edit/{category_id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/update/{category_id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/delete/{category_id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product_id}', [ProductController::class, 'edit'])->name('products.edit');
Route::delete('/products/delete/{product_id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::put('/products/update/{product_id}', [ProductController::class, 'update'])->name('products.update');

