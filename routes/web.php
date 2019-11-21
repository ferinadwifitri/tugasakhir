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
    return view('auth/login');
});

Auth::routes();

Auth::routes();
Route::get('/tesqrcode','qrcodeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/status_bayar', 'status_bayarcontroller@index');
Route::get('/status_order', 'status_ordercontroller@index');

Route::get('/kategori', 'kategoriController@index');
Route::get('/kategori/tambah','kategoriController@Create');
Route::post('/kategori/simpan','kategoriController@store');
Route::get('/kategori/{id}/edit','kategoriController@edit');
Route::post('/kategori/update','kategoriController@update');
Route::get('/kategori/{id}/hapus','kategoriController@hapus');

Route::get('member','memberController@index');
Route::get('member/tambah', 'memberController@Create');
Route::post('/member/simpan','memberController@store');
Route::get('member/{id}/edit','memberController@edit');
Route::post('member/update','memberController@update');
Route::get('member/{id}/hapus','memberController@hapus');

Route::get('menu','menuController@index');
Route::get('menu/tambah', 'menuController@Create');
Route::post('/menu/simpan','menuController@store');
Route::get('/menu/{id}/edit','menuController@edit');
Route::post('/menu/update','menuController@update');
Route::get('/menu/{id}/hapus','menuController@hapus');

Route::get('meja','mejaController@index');
Route::get('meja/tambah','mejaController@Create');
Route::post('meja/simpan', 'mejaController@store');
Route::get('meja/{id}/edit','mejaController@edit');
Route::post('meja/update','mejaController@update');
Route::get('meja/{id}/hapus','mejaController@hapus');

Route::get('pesananbaru','pesananController@pesananbaru');
Route::get('pesananberjalan','pesananController@pesananberjalan');
Route::get('pesanan/{id}/berjalan','pesananController@ubahberjalan');
Route::get('pesanan/{id}/selesai','pesananController@ubahselesai');
Route::get('pesananselesai','pesananController@pesananselesai');

Route::get('transaksiberjalan','transaksiController@transaksiberjalan');
Route::get('transaksi/{id}/selesai','transaksiController@ubahselesai');
Route::get('scan/{id}','qrcodeController@index');
Route::get('transaksi/{id}/bayar','transaksiController@daftarpesanan');
Route::get('transaksiselesai','transaksiController@transaksiselesai');
Route::get('detail_transaksi','detailtransaksiController@index');

Route::get('laporan','LaporanController@rekaptransaksi');
Route::post('laporan/Transaksi', 'LaporanController@postrekaptransaksi');
Route::post('laporan/exceltransaksi', 'LaporanController@excelrekaptransaksi');

Route::get('scantopup','qrcodeController@indextopup');
Route::get('topup','topupController@index');
Route::post('/topup/proses','topupController@store');
Route::get('/scan/topup/{id}','topupController@tambahsaldo');
Route::get('pembayaran','pembayaranController@index');

Route::get('bayar/{id_member}/{id_transaksi}','qrcodeController@selesai');
