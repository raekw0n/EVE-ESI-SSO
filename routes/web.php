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
    Route::get('corporate/login', 'SsoController@corporateLogin')->name('esi.corporate.login');
    Route::get('callback', 'SsoController@callback')->name('esi.sso.callback');
    Route::get('logout', 'SsoController@logout')->name('esi.sso.logout');
});

Route::group(['prefix' => 'apply'], function() {
    Route::get('', 'CorporateApplicants\ApplicationsController@index')->name('apply');
    Route::post('submit', 'CorporateApplicants\ApplicationsController@submit')->name('apply.submit');
    Route::get('info', 'CorporateApplicants\CharacterController@getInforequiredForApplication')->name('apply.info');
});

Route::group(['prefix' => 'corporate'], function() {
    Route::get('management', 'CorporateManagement\HomeController@index')->name('corporate.management');
    Route::get('mailbox', 'CorporateManagement\MailController@index')->name('corporate.mailbox');
    Route::get('mailbox/{id}', 'CorporateManagement\MailController@view')->name('corporate.mailbox.view');
    Route::get('applications', 'CorporateManagement\ApplicationsController@index')->name('corporate.applications');
    Route::get('applications/{applicant}', 'CorporateManagement\ApplicationsController@view')->name('corporate.applications.view');
    Route::put('applications/{applicant}', 'CorporateManagement\ApplicationsController@decideApplication')->name('corporate.applications.update');
    Route::get('contracts', 'CorporateManagement\ContractsController@index')->name('corporate.contracts');
    Route::post('contracts', 'CorporateManagement\ContractsController@updateContractsFromEsi')->name('corporate.contracts.update');
    Route::get('finances', 'CorporateManagement\FinanceController@index')->name('corporate.finances');
    Route::post('finances', 'CorporateManagement\FinanceController@updateJournalTransactionsFromEsi')->name('corporate.finances.update');
    Route::get('orders', 'CorporateManagement\OrdersController@index')->name('corporate.orders');
    Route::post('orders', 'CorporateManagement\OrdersController@updateOrderHistoryFromEsi')->name('corporate.orders.update');
});

Route::group(['prefix' => 'services'], function() {
    Route::get('route-planner', 'CorporateServices\RoutePlanningController@index');
});

Route::post('/import/{type}/{subtype}', 'CorporateManagement\ImportController@import')->name('import');
