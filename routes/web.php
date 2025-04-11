<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/partners', 'partners')->name('partners');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products');
    Route::get('/products/{product}', 'show')->name('products.show');
});

Route::controller(NewsController::class)->group(function () {
    Route::get('/news', 'index')->name('news');
    Route::get('/news/{news}', 'show')->name('news.show');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'index')->name('reviews');
    Route::post('/reviews', 'store')->name('reviews.store');
});
