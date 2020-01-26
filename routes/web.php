<?php

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
