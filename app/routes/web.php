<?php



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
Route::get('/register_complete', 'Auth\RegisterController@registerComplete')->name('register_complete');

// ログイン後のトップページのルート
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/profile', 'ProfileController@show')->name('profile');

Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');

Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');

Route::post('/profile/save', 'ProfileController@save')->name('profile.save');
