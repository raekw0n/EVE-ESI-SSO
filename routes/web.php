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
Route::get('/services/haulage', 'StaticPageController@haulage')->name('haulage');

Route::group(['prefix' => 'eveauth'], function() {
    Route::get('login', 'SsoController@login')->name('esi.sso.login');
    Route::get('callback', 'SsoController@callback')->name('esi.sso.callback');
});

Route::group(['prefix' => 'apply'], function() {
    Route::get('', 'CorporateApplicants\ApplicationsController@index')->name('apply');
    Route::post('submit', 'CorporateApplicants\ApplicationsController@submit')->name('apply.submit');
    Route::get('info', 'CorporateApplicants\CharacterController@getInforequiredForApplication')->name('apply.info');
});

Route::group(['prefix' => 'corporate'], function() {
    Route::get('login', 'SsoController@corporateLogin')->name('corporate.login');
    Route::get('management', 'CorporateManagement\HomeController@index')->name('corporate.management');
    Route::get('contracts', 'CorporateManagement\ContractsController@fetchContractsFromDataAccess')->name('corporate.contracts');
    Route::get('contracts/update', 'CorporateManagement\ContractsController@updateContractsFromEsi')->name('corporate.contracts.update');
});

Route::group(['prefix' => 'services'], function() {
    Route::get('route-planner', 'CorporateServices\RoutePlanningController@index');
});

Route::post('/import/{type}/{subtype}', 'CorporateManagement\ImportController@import')->name('import');
