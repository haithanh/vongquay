<?php

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

Route::group([
    'prefix' => '/vongquay/'
], function () {
    Route::group([
        'middleware' => array()
    ], function () {
        Route::get('register', 'VongQuay\VongQuayController@register');
        Route::get('start', 'VongQuay\VongQuayController@start');
        Route::get('test', 'VongQuay\VongQuayController@test');
        Route::get('{sCuaHangId}', 'VongQuay\VongQuayController@home');

    });
});
