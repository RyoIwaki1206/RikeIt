<?php

use App\Http\Controllers\ThreadController;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login'); 

// 新規登録ルート
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register'); 

// パスワードリセットのルート
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// 入力内容確認ページのルート
Route::get('/confirm', function () {
    return redirect()->route('register'); 
});
Route::post('/confirm', 'Auth\RegisterController@confirm')->name('confirm');

// 新規登録完了画面のルート
Route::post('/register_complete', 'Auth\RegisterController@registerComplete')->name('register_complete');



// ログイン後のトップページのルート
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/profile', 'ProfileController@show')->name('profile');

Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');

Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');

Route::post('/profile/save', 'ProfileController@save')->name('profile.save');


Route::get('/new_post', 'PostController@create')->name('new_post');

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');


Route::get('/create_thread', 'ThreadController@create')->name('create_thread');

Route::post('/threads', [ThreadController::class, 'store'])->name('threads.store');

Route::get('/threads/{thread}', [ThreadController::class, 'show'])->name('threads.show');

Route::get('/home', [ThreadController::class, 'index'])->name('home');

Route::post('/like/{postId}', 'PostController@toggleLike')->name('like.toggle');

Route::group(['middleware' => 'auth'], function () {
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/search', 'AdminController@search')->name('admin.search');
Route::get('/admin/user/{id}', 'AdminController@userProfile')->name('admin.userProfile');
Route::delete('/admin/user/{id}', 'AdminController@deleteUser')->name('admin.deleteUser');

});
