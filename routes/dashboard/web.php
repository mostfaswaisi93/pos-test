<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/index', 'DashboardController@index')->name('dashboard.index');
        });
    }
);
