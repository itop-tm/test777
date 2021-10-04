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

// Route::post('login', [AuthController::class, 'login'])->name('login');
// Route::middleware('admin.auth')->group(function () {
//ADMIN AUTH

Route::group([
    'prefix' => 'ba', 
    'as' => 'admin.',
    'namespace' => 'App\Http\Admin\Controllers'
], function () {
    
    Route::get('login', 'AuthController@showLoginPage')->name('login.page');
    Route::post('login', 'AuthController@login')->name('login');
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::post('passwords', 'AuthController@changePassword')->name('password.update');
    // Route::post('passwords/name', [AuthController::class, 'changeName'])->name('name.update');

    Route::middleware('admin.auth')
    ->group(function () {
        Route::get('/settings', 'SettingsController@index')->name('settings');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('/clients', 'ClientsController@index')->name('client.list');
        Route::get('/clients/new', 'ClientsController@showCreateForm')->name('client.create.form');
        Route::post('/clients', 'ClientsController@create')->name('client.create');
        Route::get('/clients/{id}', 'ClientsController@view')->name('client.view');
        Route::get('/clients/update/{id}', 'ClientsController@showUpdateForm')->name('client.update.form');
        Route::post('/clients/{id}', 'ClientsController@update')->name('client.update');
        Route::delete('/clients/{id}', 'ClientsController@delete')->name('client.delete');

        Route::get('/payments', 'PaymentsController@index')->name('payments.list');
        Route::get('/payments/{uuid}', 'PaymentsController@viewPayment')->name('payment.view');

        Route::get('/transactions', 'TransactionsController@index')->name('transactions.list');
        Route::get('/transactions/{id}', 'TransactionsController@viewTransaction')->name('transaction.view');

        Route::group([
            'prefix' => 'support'
        ], function () {
            Route::get('/tickets/create', 'Support\SupportTicketsController@createForm')->name('support.ticket.form');
            Route::post('/tickets/create', 'Support\SupportTicketsController@create')->name('support.ticket.create');
            Route::get('/tickets/update/{id}', 'Support\SupportTicketsController@updateForm')->name('support.ticket.update.form');
            Route::post('/tickets/update/{id}', 'Support\SupportTicketsController@update')->name('support.ticket.update');
            Route::get('/tickets/close', 'Support\SupportTicketsController@close')->name('support.ticket.close');
            Route::get('/tickets', 'Support\SupportTicketsController@index')->name('support.tickets.list');
            Route::get('/tickets/{id}', 'Support\SupportTicketsController@view')->name('support.ticket.view');
        });

        Route::group([
            'prefix' => 'statistics',
            'as' => 'statistics.',
            'namespace' => 'Statistics'
        ], function () {
            Route::get('/payments/main', 'PaymentsController@main')->name('payments.main');
            Route::get('/transactions/main', 'TransactionsController@main')->name('transactions.main');
        });
    });
});

