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

Route::post('klien/store', 'PelangganController@store')->name('klien.store');
Route::get('/dash', 'PelangganController@index')->name('klien.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfilController@index')->name('profil');
Route::put('/profile/edit', 'ProfilController@edit')->name('editProfil');
Route::get('/product', 'ProductController@index')->name('product');
Route::put('/product/edit', 'ProductController@edit')->name('editProduct');
Route::get('/order', 'OrderController@index')->name('order');
Route::get('/order/make/{id}', 'OrderController@create')->name('make_order');
Route::get('/supplier', 'SupplierController@index')->name('order');
Route::get('/supplier/add', 'SupplierController@create')->name('add_supplier');




// Route::group(['middleware' => ['mimin']], function(){

// });