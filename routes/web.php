<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/user/product', [ProductController::class, 'store'])->name('user.product');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/added-products', [CartController::class, 'index'])->name('products.added-products');
    Route::post('/products/added-products/store', [CartController::class, 'store'])->name('products.added-products.store');
    Route::delete('/products/added-products/destroy/{id}', [CartController::class, 'destroy'])->name('products.added-products.destory');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware("roles");
    Route::delete('/user/destroy/{user}', [AdminController::class, 'destroy'])->name('user.destroy') ;
    Route::post('/restore-user/{user}', [AdminController::class, 'restoreUser'])->name('restore-user');
    Route::put('/user/update/{user}', [AdminController::class, 'update'])->name('user.update') ;



});

require __DIR__ . '/auth.php';
