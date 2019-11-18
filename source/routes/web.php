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
    'prefix' => '/result'
], function () {
    Route::group([
        'middleware' => []
    ], function () {
        Route::get('{sStoreSeo}', 'VongQuay\VongQuayController@result');
        Route::get('', 'VongQuay\VongQuayController@result');
    });
});

Route::group([
    'prefix' => '/'
], function () {
    Route::group([
        'middleware' => []
    ], function () {
        Route::get('register', 'VongQuay\VongQuayController@register');
        Route::get('start', 'VongQuay\VongQuayController@start');
        Route::get('test', 'VongQuay\VongQuayController@test');
        Route::get('{sCuaHangId}', 'VongQuay\VongQuayController@home');
    });
});
