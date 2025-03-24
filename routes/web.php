<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return phpinfo();
    return view('welcome');
});

Route::middleware('auth')->group(callback: function () {
    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('/products/create/store', [\App\Http\Controllers\ProductController::class, 'store'])
        ->name('products.store');
    Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])
        ->name('products.show');
    Route::post('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])
        ->name('products.update');
    Route::delete('/products/{product}/delete', [\App\Http\Controllers\ProductController::class, 'destroy'])
        ->name('products.destroy');
});

Route::resource('orders', \App\Http\Controllers\OrderController::class)->names([
    'index' => 'orders.index',
    'show' => 'orders.show',
    'update' => 'orders.update',
    'destroy' => 'orders.destroy',
])->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
