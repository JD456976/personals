<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['admin', 'auth'])->group(function() {
    Route::get('dashboard', [
        'as'=> 'dashboard',
        'uses' => 'App\Http\Controllers\Admin\AdminController@dashboard',
    ]);

    Route::resource('reports', \App\Http\Controllers\Admin\ReportController::class,);
});
