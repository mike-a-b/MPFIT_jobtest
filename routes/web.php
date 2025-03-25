<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return phpinfo();
    return view('welcome');
});
/* маршруты ProductController */
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

Route::middleware('auth')->group(callback: function () {
    Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])
        ->name('orders.index');
    Route::get('/orders/create', [\App\Http\Controllers\OrderController::class, 'create'])
        ->name('orders.create');
    Route::get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])
        ->name('orders.show');
    Route::post('/orders/create/store', [\App\Http\Controllers\OrderController::class, 'store'])
        ->name('orders.store');
    Route::post('/orders/{order}/update', [\App\Http\Controllers\OrderController::class, 'update'])
        ->name('orders.update');
    Route::delete('/orders/{order}/delete', [\App\Http\Controllers\OrderController::class, 'destroy'])
        ->name('orders.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Кэш очищен.";
});

require __DIR__.'/auth.php';
