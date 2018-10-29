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
    return view('welcome');
});


Route::group(['middleware' => ['mimin']], function(){

});

Route::get('/make','PelangganController@create')->name('make_klien');
Route::post('klien/store', 'PelangganController@store')->name('klien.store');
// Route::get('/dash', 'PelangganController@index')->name('klien.index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('product', 'ProductController');
Route::get('/delete/{id}', 'ProductController@destroy')->name('hapusProduct');

Route::resource('order', 'OrderController')->except('create', 'show', 'edit', 'update','destroy');
Route::get('/tambah/{id}' , 'OrderController@tambah')->name('tambahOrder');
Route::post('/make/{id}', 'OrderController@store')->name('storeOrder');
Route::get('/verifikasi/{id}', 'OrderController@verifikasi')->name('verifOrder');

Route::get('/profile', 'ProfilController@index')->name('profil');
Route::put('/profile/edit', 'ProfilController@edit')->name('editProfil');

Route::resource('supplier', 'SupplierController')->except('show', 'edit', 'update','destroy');

Route::resource('penawaran', 'PenawaranController')->except('show', 'edit');
Route::get('/make/{id}' , 'PenawaranController@tambah')->name('makePenawaran');
Route::post('/store/{id}' , 'PenawaranController@store')->name('storePenawaran');
Route::get('/hapus/{id}', 'PenawaranController@destroy')->name('hapusPenawaran');

Route::resource('pengajuan', 'PengajuanController')->except('show', 'edit');
Route::post('/pengajuan/{id}', 'PengajuanController@store')->name('storePengajuan');

Route::get('/transaksi', 'TransaksiController@index')->name('transaksi');
Route::get('/transaksi/up', 'TransaksiController@create')->name('upload_transaksi');

Route::get('/laporan', 'LaporanController@index')->name('laporan');

Auth::routes();
