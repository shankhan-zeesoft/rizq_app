<?php

use Illuminate\Support\Facades\Route;

Route::controller(App\Http\Controllers\API\AuthController::class)->group(function () {
    Route::post("/login", "login");
    Route::get('/logout', 'logout');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('/products')->controller(\App\Http\Controllers\API\ProductsController::class)->group(function () {
        Route::get('/', 'index')->name('products.index');
        Route::get('/{id}', 'single')->name('products.single');
        Route::post('/store', 'store')->name('products.store');
        Route::put('/update/{product}', 'update')->name('products.update');
        Route::patch('/status/{product}', 'status')->name('products.status');
        Route::delete("/destroy/{product}", "destroy")->name('products.destroy');
    });
});
