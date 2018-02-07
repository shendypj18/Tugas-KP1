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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//perusahaan
Route::get('/dataperusahaan','perusahaanController@index')->name('perusahaan');

Route::get('/tambahperusahaan','perusahaanController@tambah');

Route::get('/dataperusahaan/{idhapus}/hapus','perusahaanController@hapus');

Route::get('/editperusahaan/{idedit}','perusahaanController@editr');

Route::put('/editperusahaan/{idedit}/simpan','perusahaanController@edit');

Route::post('/tambahperusahaan/tambah','perusahaanController@store');
//selesai perusahaan

//dokumen
Route::get('/dokumenmasuk','dokumenController@index')->name('dokumen');
