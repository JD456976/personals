<?php

use App\Http\Livewire\PostTable;
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



Route::get('/', [
    'as' => 'home',
    'uses' => 'App\Http\Controllers\HomeController@home',
])->middleware(['verified','password.confirm']);


Route::get('/category/{id}', [
    'as' => 'category',
    'uses' => 'App\Http\Controllers\PostController@filteredPosts',
])->middleware(['verified','password.confirm']);

Route::get('/user/posts/', [
    'as' => 'user.posts',
    'uses' => 'App\Http\Controllers\UserController@posts',
])->middleware(['verified','password.confirm']);

Route::post('report/post/{id}', [
    'as' => 'report.post',
    'uses' => 'App\Http\Controllers\ReportController@store',
]);

Route::post('post/reply/{id}', [
    'as' => 'post.reply',
    'uses' => 'App\Http\Controllers\UserController@send',
]);

Route::resource('post', App\Http\Controllers\PostController::class);
