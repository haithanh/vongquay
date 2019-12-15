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
        Route::get('{sStoreSeo}', 'VongQuay\ChristmasController@result');
        Route::get('', 'VongQuay\ChristmasController@result');
    });
});

Route::group([
    'prefix' => '/'
], function () {
    Route::group([
        'middleware' => []
    ], function () {
        Route::get('register', 'VongQuay\ChristmasController@register');
        Route::get('start', 'VongQuay\ChristmasController@start');
        Route::get('test', 'VongQuay\ChristmasController@test');
        Route::get('{sCuaHangId}', 'VongQuay\ChristmasController@home');
    });
});
