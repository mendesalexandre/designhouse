<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'namespace' => 'Api', 'as' => 'api.'], function () {
    Route::get('/users', 'WebController@index')->name('index');
    Route::post('/auth/login', 'AuthController@login');

    Route::get('/nfe', 'NfeController@index')->name('nfe.index');
    Route::get('/custas', 'TabelaCustaController@index')->name('custas.index');
});
