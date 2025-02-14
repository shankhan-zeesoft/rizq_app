<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::controller(\App\Http\Controllers\Admin\ProfileController::class)->group(function () {
        Route::post('/change_profile_image', 'changeProfileImage')->name('changeProfileImage');
        Route::post('/user_social_links', 'user_social_links')->name('user_social_links');
        Route::post('/change_personal_data', 'changePersonalData')->name('changePersonalData');
        Route::post('/change_password', 'change_password')->name('change_password');
    });

    Route::prefix('/categories')->controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('categories.index');
        Route::any('/create', 'create')->name('categories.create');
        Route::post('/store', 'store')->name('categories.store');
        Route::post('/status', 'status')->name('categories.status');
        Route::post("/destroy", "destroy")->name('categories.destroy');
    });

    Route::prefix('/products')->controller(\App\Http\Controllers\Admin\ProductsController::class)->group(function () {
        Route::get('/', 'index')->name('products.index');
        Route::any('/create', 'create')->name('products.create');
        // Route::post('/store', 'store')->name('products.store');
        Route::post('/status', 'status')->name('products.status');
        // Route::post("/destroy", "destroy")->name('products.destroy');
    });
});
