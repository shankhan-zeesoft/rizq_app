<?php

use Illuminate\Support\Facades\Route;

// all site related link fall here
Route::controller(\App\Http\Controllers\Site\SiteController::class)->group(function () {
    Route::get('/', 'index')->name('welcome');
    Route::get('/locale/{locale}', 'lang')->name('changeLang');
});
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
