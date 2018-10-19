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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::group(['middleware' => ['mimin']], function(){

// });

Route::post('klien/store', 'PelangganController@store')->name('klien.store');
Route::get('/dash', 'PelangganController@index')->name('klien.index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('product', 'ProductController');

Route::get('/profile', 'ProfilController@index')->name('profil');
Route::put('/profile/edit', 'ProfilController@edit')->name('editProfil');

// Route::get('/product', 'ProductController@index')->name('product');
// Route::put('/product/edit', 'ProductController@edit')->name('editProduct');

Route::get('/order', 'OrderController@index')->name('order');
Route::get('/order/make/{id}', 'OrderController@create')->name('make_order');

Route::get('/supplier', 'SupplierController@index')->name('order');
Route::get('/supplier/add', 'SupplierController@create')->name('add_supplier');

Route::get('/transaksi', 'TransaksiController@index')->name('transaksi');
Route::get('/transaksi/up', 'TransaksiController@create')->name('upload_transaksi');

Route::get('/penawaran', 'PenawaranController@index')->name('penawaran');
Route::get('/penawaran/make', 'PenawaranController@create')->name('make_transaksi');

Route::get('/laporan', 'LaporanController@index')->name('laporan');

Auth::routes();

