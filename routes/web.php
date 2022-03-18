<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('get.product.index');
    Route::get('/create', '\App\Http\Controllers\ProductController@create')->name('get.product.create');
    Route::post('/create', '\App\Http\Controllers\ProductController@store');
    Route::get('/update/{id}', '\App\Http\Controllers\ProductController@edit')->name('get.product.edit');
    Route::post('/update/{id}', '\App\Http\Controllers\ProductController@update');
    Route::get('/delete/{id}', '\App\Http\Controllers\ProductController@delete')->name('get.product.delete');

    Route::prefix('category')->group(function() {
        Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('get.category.index');
        Route::get('/create', '\App\Http\Controllers\CategoryController@create')->name('get.category.create');
        Route::post('/create', '\App\Http\Controllers\CategoryController@store');
        Route::get('/update/{id}', '\App\Http\Controllers\CategoryController@edit')->name('get.category.edit');
        Route::post('/update/{id}', '\App\Http\Controllers\CategoryController@update');
        Route::get('/delete/{id}', '\App\Http\Controllers\CategoryController@delete')->name('get.category.delete');
    });
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('get.home.index');
