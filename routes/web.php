<?php

Route::get('/', 'PropertiesController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('properties', 'PropertiesController');
    Route::resource('properties.rooms', 'RoomsController', ['except' => ['index']])->shallow();
    Route::resource('rooms.residents', 'ResidentsController', ['except' => ['index']])->shallow();
});