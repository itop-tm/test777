<?php

use Illuminate\Support\Facades\Route;
use App\Http\Api\V1\Controllers\BankCards\BankCardsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'prefix'    => 'v1', 
    'as'        => 'api.', 
    'namespace' => 'App\Http\Api\V1\Controllers'
], function () {
   
    Route::group([
        'prefix' => 'payments'
    ], function () {

        Route::group([
            'as' => 'gts.'
        ], function () {
            Route::post('gts', 'Payments\GTS\CreateController')->name('create');
            Route::get('gts', 'Payments\GTS\GetBalanceController')->name('getbalance');
        });

        Route::group([
            'as' => 'telecom.'
        ], function () {
            Route::post('telecom', 'Payments\Telecom\CreateController')->name('create');
            Route::get('telecom', 'Payments\Telecom\CheckController')->name('check');
        });

        Route::group([
            'as' => 'tmcell.'
        ], function () {
            Route::post('tmcell', 'Payments\Tmcell\CreateController')->name('create');
            Route::get('tmcell/services', 'Payments\Tmcell\ServicesController')->name('services');
            Route::get('tmcell/balance', 'Payments\Tmcell\BalanceController')->name('balance');
        });
    });

    Route::group([
        'prefix' => 'client'
    ], function () {
        Route::group([
            'as' => 'client.'
        ], function () {
            Route::get('/payments', 'Payments\ListController')->name('payment.list');
            Route::get('/payment/{ref_uuid}', 'Payments\FetchController')->name('payment.fetch');
        });
    });
});
