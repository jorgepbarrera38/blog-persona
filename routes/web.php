<?php

use App\Post;

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

Route::redirect('/', 'blog');
Route::resource('blog', 'BlogController')->only('index', 'show');

Route::middleware('auth')->prefix('administration')->group(function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');

    Route::put('posts/{post}/unpublish', 'PostController@unpublish')->name('posts.unpublish');
    Route::put('posts/{post}/publish', 'PostController@publish')->name('posts.publish');

    Route::resources([
        'posts' => 'PostController',
        'categories' => 'CategoryPostController',
        'profile' => 'ProfileController'
    ]);

});

Route::resource('subcribers', 'SubscriberController')->only('store');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');