<?php

Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/index', 'DashboardController@index')->name('dashboard.index');
});

// 1 Route Dashboard
