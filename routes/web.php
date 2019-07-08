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

Route::get('/', function () {
    return view('landing');
});


/*
 * ==========================================
 *              ClientRoutes
 * ==========================================
 */

Route::get(
    'clients/',
    'ClientController@index'
)->name('client_index');

Route::view(
    'client/create',
    'client.create'
)->name('client_create');

Route::post(
    'client/create',
    'ClientController@createPost'
)->name('client_create_post');

Route::get(
    'client/{clientId}/update',
    'ClientController@update'
)->name('client_update');

Route::post(
    'client/{clientId}/update',
    'ClientController@updatePost'
)->name('client_update_post');

/*
 * ==========================================
 *              WaterSources
 * ==========================================
 */

Route::get(
    'client/{clientId}/water_sources',
    'WaterSourceController@index'
)->name('water_sources_index');

Route::get(
    'client/{clientId}/water_sources/create',
    'WaterSourceController@create'
)->name('water_sources_create');

Route::post(
    'client/{clientId}/water_sources/create',
    'WaterSourceController@createPost'
)->name('water_sources_create_post');

Route::get(
    'client/{clientId}/water_sources/update',
    'WaterSourceController@update'
)->name('water_sources_update');

Route::post(
    'water_sources/{waterSourceId}/update',
    'WaterSourceController@updatePost'
)->name('water_sources_update_post');

/*
 * ==========================================
 *              Payments
 * ==========================================
 */

Route::get(
    'water_source/{waterSourceId}/payments',
    'PaymentController@index'
)->name('water_sources_payments');

Route::get(
    'water_source/{waterSourceId}/payment/create',
    'PaymentController@create'
)->name('water_sources_create_payment');

Route::get(
    'water_source/{waterSourceId}/payment/compute',
    'PaymentController@computePayment'
)->name('water_sources_compute_payment');

Route::post(
    'water_source/{waterSourceId}/payment/create',
    'PaymentController@createPost'
)->name('water_sources_create_payment_post');


Route::get('payment/{paymentId}/voucher',
    'PaymentController@viewPaymentVoucher'
)->name('payment_voucher');


/*
 * ==========================================
 *              Penalty
 * ==========================================
 */

Route::get(
    'water_source/{waterSourceId}/penalty/index',
    'PenaltyController@index'
)->name('penalty_index');

Route::get(
    'water_source/{waterSourceId}/penalty/create',
    'PenaltyController@create'
)->name('penalty_create');

Route::post(
    'water_source/{waterSourceId}/penalty/create',
    'PenaltyController@createPost'
)->name('penalty_create_post');


Route::get(
    'penalty/{penaltyId}/pay',
    'PenaltyController@penaltyPayment'
)->name('penalty_pay');

/*
 * ==========================================
 *              Transactions
 * ==========================================
 */

Route::get('transactions',
    'VoucherController@index')
->name('transactions_index');

Route::view(
    'transaction/crete',
    'voucher.create_transaction'
)->name('transaction_create');

Route::post(
    'transaction/crete',
    'VoucherController@createPost'
)->name('transaction_create_post');
