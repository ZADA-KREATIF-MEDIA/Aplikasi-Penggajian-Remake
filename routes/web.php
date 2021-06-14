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

Auth::routes();

Route::get('/', 'Auth\LoginController@index');
Route::post('/login','Auth\LoginController@login')->name('login-sistem');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('jabatan', 'JabatanController');
Route::resource('pengguna', 'PenggunaController');

Route::get('/sampah-pengguna', 'KaryawanController@trash');
Route::get('/user-restore/{id}', 'KaryawanController@restore');
Route::get('/user-force-delete/{id}', 'KaryawanController@force_delete');
Route::get('/jurnalUmum/periode-dan-bulan','JurnalUmumController@laporan_periode')->name('laporan-periode');

Route::resource('karyawan', 'KaryawanController');
Route::resource('absensi', 'AbsensiController');
Route::resource('lembur', 'LemburController');
Route::resource('penggajian', 'PenggajianController');
Route::resource('slipgaji', 'SlipGajiController');
Route::resource('laporan', 'LaporanController');
Route::resource('jurnalUmum', 'JurnalUmumController');
Route::resource('level','LevelController');
Route::resource('laporan_jabatan', 'LaporanJabatanController');
// Route::resource('bukuBesar', 'BukuBesarController');

// });
Route::group(['prefix' => 'admin'], function () {

Route::resource('/users', 'UserController');

});
