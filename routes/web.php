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
