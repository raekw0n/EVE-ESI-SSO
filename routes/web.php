<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'services'], function() {
    Route::get('/haulage', 'PageController@haulage')->name('haulage');
    Route::get('/reprocessing', 'PageController@reprocessing')->name('reprocessing');
    Route::get('/manufacturing', 'PageController@manufacturing')->name('manufacturing');
});

Route::get('/apply', 'ApplicationController@index')->name('apply');
Route::post('/apply/submit', 'ApplicationController@submit')->name('apply.submit');

Route::get('/apply/info', 'CharacterController@getInforequiredForApplication')->name('apply.info');

Route::group(['prefix' => 'locations'], function() {
    Route::get('/{type}/{id?}', 'LocationsController@get')->name('locations.get');
});

Route::group(['prefix' => 'eveauth'], function() {
    Route::get('login', 'SsoController@login')->name('esi.sso.login');
    Route::get('callback', 'SsoController@callback')->name('esi.sso.callback');
});

Route::post('/import/{type}/{subtype}', 'ImportController@import')->name('import');
