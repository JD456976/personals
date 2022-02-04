<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin', 'auth'])->group(function() {
    Route::get('dashboard', [
        'as'=> 'dashboard',
        'uses' => 'App\Http\Controllers\Admin\AdminController@dashboard',
    ]);

    Route::get('scraper', [
        'as'=> 'scraper',
        'uses' => 'App\Http\Controllers\Admin\AdminController@scraper',
    ]);

    Route::post('scrape', [
        'as'=> 'scrape',
        'uses' => 'App\Http\Controllers\Admin\AdminController@scrape',
    ]);

    Route::resource('reports', ReportController::class);

    Route::resource('users', UserController::class);

    Route::resource('category', CategoryController::class);

    Route::resource('page', PageController::class);
});
