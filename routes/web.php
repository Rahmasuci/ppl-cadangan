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

Route::get('/make','PelangganController@create')->name('make.klien');
Route::post('klien/store', 'PelangganController@store')->name('klien.store');
// Route::get('/dash', 'PelangganController@index')->name('klien.index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('product', 'ProductController');
Route::get('/ubah/{id}', 'ProductController@update')->name('ubahProduct');
Route::get('/delete/{id}', 'ProductController@destroy')->name('hapusProduct');

Route::resource('order', 'OrderController')->except('create', 'show', 'edit', 'update','destroy');
Route::get('/tambah/{id}' , 'OrderController@tambah')->name('tambahOrder');
Route::post('/make/{id}', 'OrderController@store')->name('storeOrder');
Route::get('/verifikasi/{id}', 'OrderController@verifikasi')->name('verifOrder');
Route::get('/batal/{id}', 'OrderController@batal')->name('batalOrder');
Route::put('/upload/{id}', 'OrderController@upload')->name('uploadOrder');
Route::get('/proses/{id}', 'OrderController@proses')->name('prosesOrder');
Route::get('/selesai/{id}', 'OrderController@selesai')->name('selesaiOrder');

Route::get('/profile', 'ProfilController@index')->name('profil');
Route::put('/profile/edit', 'ProfilController@edit')->name('editProfil');

Route::resource('supplier', 'SupplierController')->except('show', 'edit', 'update','destroy');

Route::resource('penawaran', 'PenawaranController')->except('edit');
Route::get('/make/{id}' , 'PenawaranController@tambah')->name('makePenawaran');
Route::post('/store/{id}' , 'PenawaranController@store')->name('storePenawaran');
Route::get('/cancel/{id}', 'PenawaranController@batal')->name('cancelPenawaran');
Route::get('/done/{id}', 'PenawaranController@selesai')->name('selesaiPenawaran');

Route::resource('pengajuan', 'PengajuanController')->except('edit');
// Route::get('/liat/{id}' , 'PengajuanController@index')->name('liatPengajuan');
Route::post('/pengajuan/{id}', 'PengajuanController@store')->name('storePengajuan');
Route::get('/terima/{id}', 'PengajuanController@terima')->name('terimaPengajuan');
Route::get('/proses/{id}', 'PengajuanController@proses')->name('prosesPengajuan');
Route::get('/kirim/{id}', 'PengajuanController@kirim')->name('kirimPengajuan');
Route::put('/unggah/{id}', 'PengajuanController@unggah')->name('unggahPengajuan');
Route::get('/verif/{id}', 'PengajuanController@verif')->name('verifPengajuan');

Route::get('/transaksi', 'TransaksiController@index')->name('transaksi');
Route::get('/transaksi/up', 'TransaksiController@create')->name('upload_transaksi');

Route::get('/laporan', 'LaporanController@index')->name('laporan');
Route::get('/bulan', 'LaporanController@bulan')->name('bulan');

Route::post('/ajaxdata', 'LaporanController@ajax');

Auth::routes();
