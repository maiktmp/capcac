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
})->name('landing');


Route::get(
    'login',
    'Auth\LoginController@showLoginForm'
)->name('login')->middleware('guest');

Route::post(
    'login/auth',
    'Auth\LoginController@authenticate'
)->name('login.auth');

Route::get(
    'logout',
    'Auth\LoginController@logout'
)->name('logout');

/*
 * ==========================================
 *              ClientRoutes
 * ==========================================
 */

Route::get(
    'clients/',
    'ClientController@index'
)->name('client_index')
    ->middleware('auth');

Route::view(
    'client/create',
    'client.create'
)->name('client_create')
    ->middleware('auth');

Route::post(
    'client/create',
    'ClientController@createPost'
)->name('client_create_post')
    ->middleware('auth');

Route::get(
    'client/{clientId}/update',
    'ClientController@update'
)->name('client_update')
    ->middleware('auth');

Route::post(
    'client/{clientId}/update',
    'ClientController@updatePost'
)->name('client_update_post')
    ->middleware('auth');

/*
 * ==========================================
 *              WaterSources
 * ==========================================
 */

Route::get(
    'client/{clientId}/water_sources',
    'WaterSourceController@index'
)->name('water_sources_index')
    ->middleware('auth');

Route::get(
    'client/{clientId}/water_sources/create',
    'WaterSourceController@create'
)->name('water_sources_create')
    ->middleware('auth');

Route::post(
    'client/{clientId}/water_sources/create',
    'WaterSourceController@createPost'
)->name('water_sources_create_post')
    ->middleware('auth');

Route::get(
    'client/{clientId}/water_sources/update',
    'WaterSourceController@update'
)->name('water_sources_update')
    ->middleware('auth');

Route::post(
    'water_sources/{waterSourceId}/update',
    'WaterSourceController@updatePost'
)->name('water_sources_update_post')
    ->middleware('auth');

/*
 * ==========================================
 *              Payments
 * ==========================================
 */

Route::get(
    'water_source/{waterSourceId}/payments',
    'PaymentController@index'
)->name('water_sources_payments')
    ->middleware('auth');

Route::get(
    'water_source/{waterSourceId}/payment/create',
    'PaymentController@create'
)->name('water_sources_create_payment')
    ->middleware('auth');

Route::get(
    'water_source/{waterSourceId}/payment/compute',
    'PaymentController@computePayment'
)->name('water_sources_compute_payment')
    ->middleware('auth');

Route::post(
    'water_source/{waterSourceId}/payment/create',
    'PaymentController@createPost'
)->name('water_sources_create_payment_post')
    ->middleware('auth');


Route::get('payment/{paymentId}/voucher',
    'PaymentController@viewPaymentVoucher'
)->name('payment_voucher')
    ->middleware('auth');

Route::get(
    'payment/{paymentId}/upload_file',
    'PaymentController@uploadFile'
)->name('payment_upload_file')
    ->middleware('auth');

Route::post(
    'payment/{paymentId}/upload_file',
    'PaymentController@uploadFilePost'
)->name('payment_upload_file_post')
    ->middleware('auth');

/*
 * ==========================================
 *              Penalty
 * ==========================================
 */

Route::get(
    'water_source/{waterSourceId}/penalty/index',
    'PenaltyController@index'
)->name('penalty_index')
    ->middleware('auth');

Route::get(
    'water_source/{waterSourceId}/penalty/create',
    'PenaltyController@create'
)->name('penalty_create')
    ->middleware('auth');

Route::post(
    'water_source/{waterSourceId}/penalty/create',
    'PenaltyController@createPost'
)->name('penalty_create_post')
    ->middleware('auth');


Route::get(
    'penalty/{penaltyId}/pay',
    'PenaltyController@penaltyPayment'
)->name('penalty_pay')
    ->middleware('auth');

/*
 * ==========================================
 *              Transactions
 * ==========================================
 */

Route::get('transactions',
    'VoucherController@index')
    ->name('transactions_index')
    ->middleware('auth');

Route::view(
    'transaction/crete',
    'voucher.create_transaction'
)->name('transaction_create')
    ->middleware('auth');

Route::post(
    'transaction/crete',
    'VoucherController@createPost'
)->name('transaction_create_post')
    ->middleware('auth');


Route::get('transactions/filer',
    'VoucherController@filter')
    ->name('transactions_filter')
    ->middleware('auth');

/*
 * ==========================================
 *              Requests
 * ==========================================
 */

Route::get('requests/',
    'RequestController@index')
    ->name('request_index')
    ->middleware('auth');

Route::get('requests/{requestId}',
    'RequestController@view')
    ->name('request_view')
    ->middleware('auth');

Route::post('requests/{requestId}',
    'RequestController@createComment')
    ->name('request_view')
    ->middleware('auth');

Route::get('request/{requestId}/mark_completed',
    'RequestController@markCompleted')
    ->name('request_completed')
    ->middleware('auth');


/*
 * ==========================================
 *              Clients
 * ==========================================
 */

Route::get('profile/',
    'clients\ClientController@profile')
    ->name('profile')
    ->middleware('auth');

Route::get('client/requests/',
    'clients\ClientController@requests')
    ->name('client_requests')
    ->middleware('auth');

Route::get('client/request/create',
    'clients\ClientController@createRequest')
    ->name('client_create_request')
    ->middleware('auth');

/*
 * ==========================================
 *              Prices
 * ==========================================
 */

Route::get('prices/',
    'PriceController@update')
    ->name('update_prices')
    ->middleware('auth');

Route::post('prices',
    'PriceController@updatePost')
    ->name('update_prices_post')
    ->middleware('auth');

Route::get('client/request/create',
    'clients\ClientController@createRequest')
    ->name('client_create_request')
    ->middleware('auth');
