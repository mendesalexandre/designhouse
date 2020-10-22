<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:api']], function () {
    Route::post('register', 'Auth\\RegisterController@register');
});

// Route::group(['prefix' => 'v1', 'namespace' => 'Api', 'as' => 'api.'], function () {
//     // Route::get('/users', 'WebController@index')->name('index');
//     // Route::post('/auth/login', 'AuthController@login');

//     Route::get('/nfe', 'NfeController@index')->name('nfe.index');
//     Route::get('/custas', 'TabelaCustaController@index')->name('custas.index');
//     Route::get('/clientes', 'ClienteController@index')->name('cliente.index');
//     Route::post('/cliente/store', 'ClienteController@store')->name('cliente.store');
//     Route::get('/cliente/indicador', 'ClienteController@searchIndicadorPessoal')->name('cliente.searchIndicadorPessoal');
//     Route::get('/documentos')->name('documento.index');
//     Route::get('/pdf', 'ClienteController@pdf')->name('pdf');
// });