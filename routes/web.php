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
]);

Route::get('/page/{slug}', [
    'as' => 'page',
    'uses' => 'App\Http\Controllers\HomeController@page',
]);

Route::get('/tos', [
    'as' => 'tos',
    'uses' => 'App\Http\Controllers\HomeController@tos',
]);

Route::get('/contact', [
    'as' => 'contact',
    'uses' => 'App\Http\Controllers\HomeController@contact',
]);

Route::post('/contact', [
    'as' => 'contact.send',
    'uses' => 'App\Http\Controllers\HomeController@contactSend',
])->middleware(['throttle:contact-send']);


Route::get('/category/{id}', [
    'as' => 'category',
    'uses' => 'App\Http\Controllers\PostController@filteredPosts',
])->middleware(['verified']);

Route::get('/user/posts/', [
    'as' => 'user.posts',
    'uses' => 'App\Http\Controllers\UserController@posts',
])->middleware(['verified']);

Route::post('report/post/{id}', [
    'as' => 'report.post',
    'uses' => 'App\Http\Controllers\ReportController@store',
]);

Route::post('post/reply/{id}', [
    'as' => 'post.reply',
    'uses' => 'App\Http\Controllers\UserController@send',
])->middleware(['throttle:post-reply']);

Route::resource('post', App\Http\Controllers\PostController::class);

Route::group(['middleware' => ['guest']], function () {
    //Socialite Routes
    Route::get('auth/github', [App\Http\Controllers\SocialController::class, 'githubRedirect']);
    Route::get('auth/github/callback', [
        App\Http\Controllers\SocialController::class,
        'loginWithGithub',
    ]);

    Route::get('auth/twitter', [App\Http\Controllers\SocialController::class, 'twitterRedirect']);
    Route::get('auth/twitter/callback', [
        App\Http\Controllers\SocialController::class,
        'loginWithTwitter',
    ]);

    Route::get('auth/facebook', [App\Http\Controllers\SocialController::class, 'facebookRedirect']);
    Route::get('auth/facebook/callback', [
        App\Http\Controllers\SocialController::class,
        'loginWithFacebook',
    ]);

    Route::get('auth/google', [App\Http\Controllers\SocialController::class, 'googleRedirect']);
    Route::get('auth/google/callback', [
        App\Http\Controllers\SocialController::class,
        'loginWithGoogle',
    ]);
});
