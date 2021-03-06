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
    return view('login.login');
});

Route::get('/login', function () {
	return view('login.login');
});

// Route::get('/dataAkun','akunController@index_akun');

Route::group(['middleware' => ['auth', 'checkRole:1,2,3,4']], function(){

	// Dashboard
	Route::get('/dashboard','DashboardController@index');
	Route::get('/laporanKeuangan','PemilikController@index_laporan_keuangan');

	Route::get('/dataLabaRugi/{dari}/{sampai}','AkuntanController@data_laba_rugi')->name('laba_rugi');
	Route::get('/dataPerubahanModal/{tahun}','AkuntanController@data_perubahan_modal')->name('perubahan_modal');
	Route::get('/dataNeraca/{dari}/{sampai}','AkuntanController@data_neraca')->name('neraca');

	Route::get('/dataLabaRugi/{dari}/{sampai}/cetak_pdf','AkuntanController@cetak_laba_rugi')->name('cetak_laba_rugi');
	Route::get('/dataPerubahanModal/{tahun}/cetak_pdf','AkuntanController@cetak_perubahan_modal')->name('cetak_perubahan_modal');
	Route::get('/dataNeraca/{dari}/{sampai}/cetak_pdf','AkuntanController@cetak_neraca')->name('cetak_neraca');

	// Route::get('/dataUser','AdminController@index_user');
	// Route::get('/tambahData','AdminController@create');
	// Route::post('/dataUser/create','AdminController@create_user');
	// Route::get('/dataUser/edit/{id_user}','AdminController@edit_user');
	// Route::post('/dataUser/update/{id_user}','AdminController@update_user');
	// Route::get('/dataUser/delete/{id_user}','AdminController@delete_user');

});

Route::group(['middleware' => ['auth', 'checkRole:1']], function(){

	Route::get('/dataUser','AdminController@index_user');
	Route::get('/tambahDataUser','AdminController@create');
	Route::post('/dataUser/create','AdminController@create_user');
	Route::get('/dataUser/edit/{id_user}','AdminController@edit_user');
	Route::post('/dataUser/update/{id_user}','AdminController@update_user');
	Route::get('/dataUser/delete/{id_user}','AdminController@delete_user');

});

// Route::group(['middleware' => ['auth', 'checkRole:2']], function(){

	

// });

Route::group(['middleware' => ['auth', 'checkRole:3']], function(){

	Route::get('/dataAkun','AkuntanController@index_akun');
	Route::get('/tambahDataAkun','AkuntanController@add_akun');
	Route::post('/dataAkun/create','AkuntanController@create_akun');
	Route::get('/dataAkun/edit/{id}','AkuntanController@edit_akun');
	Route::post('/dataAkun/update/{id}','AkuntanController@update_akun');
	Route::get('/dataAkun/delete/{id}','AkuntanController@delete_akun');

	Route::get('/dataGolAkun','AkuntanController@index_gol_akun');
	Route::get('/tambahDataGolAkun','AkuntanController@add_gol_akun');
	Route::post('/dataGolAkun/create','AkuntanController@create_gol_akun');
	Route::get('/dataGolAkun/edit/{kode_golongan}','AkuntanController@edit_gol_akun');
	Route::post('/dataGolAkun/update/{kode_golongan}','AkuntanController@update_gol_akun');
	Route::get('/dataGolAkun/delete/{kode_golongan}','AkuntanController@delete_gol_akun');

	Route::get('/dataTransaksi','AkuntanController@index_transaksi');

	Route::get('/dataTransaksi/{bulan}','AkuntanController@getTransaksi');
	Route::get('/dataAkunPilihan','AkuntanController@getAkun');

	Route::get('/dataJurnalUmum','AkuntanController@index_jurnal_umum');
	Route::get('/dataJurnalUmum/filter/{dari}/{sampai}','AkuntanController@filter_jurnal_umum')->name('filter_jurnal_umum');

	Route::get('/cariAkun/{no_akun}','AkuntanController@cari_akun');
	Route::get('/tambahJurnalUmum','AkuntanController@add_jurnal_umum');
	Route::post('/simpanJurnal/save','AkuntanController@simpan_jurnal');
	// Route::post('/dataJurnalUmum/delete/{kode_jurnal}','AkuntanController@delete_jurnal_umum');
	Route::post('/hapusJurnal','AkuntanController@delete_jurnal_umum');
	Route::get('/dataJurnalUmum/lihat/{kode_jurnal}','AkuntanController@lihat_jurnal_umum');

	Route::get('/dataJurnalPenyesuaian','AkuntanController@index_jurnal_penyesuaian');
	Route::get('/tambahJurnalPenyesuaian','AkuntanController@add_jurnal_penyesuaian');
	Route::post('/simpanJurnalPenyesuaian/save','AkuntanController@simpan_jurnal_penyesuaian');
	// Route::post('/dataJurnalUmum/delete/{kode_jurnal_penyesuaian}','AkuntanController@delete_jurnal_umum');
	Route::post('/hapusJurnalPenyesuaian','AkuntanController@delete_jurnal_penyesuaian');
	Route::get('/dataJurnalPenyesuaian/lihat/{kode_jurnal_penyesuaian}','AkuntanController@lihat_jurnal_penyesuaian');

	Route::get('/dataBukuBesar','AkuntanController@index_buku_besar');
	Route::get('/dataBukuBesar/akun/{no_akun}','AkuntanController@detail_buku_besar');

	Route::get('/dataNeracaSaldo','AkuntanController@cari_neraca_saldo');
	Route::get('/dataNeracaSaldo/hasil/{dari}/{sampai}','AkuntanController@hasil_neraca_saldo')->name('hasil');
	Route::get('/dataNeracaSaldo/hasil','AkuntanController@hasil_all_neraca_saldo')->name('hasil_all');

});

Route::group(['middleware' => ['auth', 'checkRole:4']], function(){

	Route::get('/dataTransaksiKasir','KasirController@index_transaksi_kasir');
	Route::get('/tambahDataTransaksi','KasirController@add_transaksi_kasir');
	Route::post('/dataTransaksiKasir/create','KasirController@create_transaksi_kasir');
	Route::get('/dataTransaksiKasir/edit/{id_transaksi}','KasirController@edit_transaksi_kasir');
	Route::post('/dataTransaksiKasir/update/{id_transaksi}','KasirController@update_transaksi_kasir');
	Route::get('/dataTransaksiKasir/delete/{id_transaksi}','KasirController@delete_transaksi_kasir');

	Route::get('/dataArusKas','KasirController@index_arus_kas');
	Route::get('/dataArusKas/filter/{dari}/{sampai}','KasirController@filter_Arus_kas')->name('filter_arus_kas');

	Route::get('/dataArusKas/cetak_pdf','KasirController@cetak_arus_kas');
	Route::get('/dataArusKas/{dari}/{sampai}/cetak_pdf','KasirController@cetak_tanggal_arus_kas');

});

Auth::routes();