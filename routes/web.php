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
Route::get('/', 'HomeController@index')->name('home');

//route yang perlu autentikasi //tidak
Auth::routes();

// route yang tidak dierlukan login atau guest
Route::get('/home', 'HomeController@index')->name('home');
Route::get('pesan/{id}', 'PesanController@index');
Route::post('pesan/{id}', 'PesanController@pesan');

//route admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');

    //profile edit untuk admin
    Route::get('adminprofile', 'AdminController@AdminProfile');
    Route::post('adminprofile', 'AdminController@update');

    //list data transaksi
    Route::get('transaksi', 'AdminController@transaksi');
    Route::post('transaksi/{id}', 'AdminController@konfirmasi_transaksi');

    //halaman detail transaksi keseluruhan
    Route::get('transaksi/{id}', 'AdminController@detail_transaksi');

    //halaman produk
    Route::get('produk', 'ProdukController@index')->name('produk.index');
    //ke halaman tambah data produk
    Route::get('produk/tambahProduk', 'ProdukController@halamanTambah');
    Route::post('produk/tambahProduk', 'ProdukController@tambahProduk');

    //sedia tidaknya pesanan
    Route::post('produk/{id}', 'ProdukController@status');

    //update data produk
    Route::get('update/{id}', 'ProdukController@halamanUpdate');
    //update data produk
    Route::post('updateProduk', 'ProdukController@update');
    //delete produk route
    Route::delete('produk/{id}', 'ProdukController@delete');
});

//route user
Route::group(['middleware' => 'user'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    //toure halaman check out
    Route::get('check_out', 'PesanController@check_out');

    //route delete data
    Route::delete('check_out/{id}', 'PesanController@delete');

    Route::get('konfirmasi-pembayaran', 'PesanController@konfirmasi');

    Route::get('profile', 'ProfileController@index');
    Route::post('profile', 'ProfileController@update');

    Route::get('history', 'HistoryController@index');
    Route::get('history/{id}', 'HistoryController@detail');

    Route::post('history', 'HistoryController@proses_upload');
});
