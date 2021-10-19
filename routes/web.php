<?php

use Illuminate\Support\Facades\Route;

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


Route::group(
    ['namespace' => 'Admin\Auth'],
    function () {
        Route::get('login', 'AuthController@login')->name('login');
        Route::post('login/proses', 'AuthController@login_proses')->name('proses-login');
        Route::get('logout', 'AuthController@logout')->name('logout');
    }
);

Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permissions:admin']],
    function () {
        // Dashboard
        Route::get('dashboard', 'DashboardController@index');
        // Pengemudi
        Route::get('pengemudi', 'PengemudiController@index');
        Route::post('pengemudi/tambah', 'PengemudiController@store');
        Route::get('pengemudi/{id}/edit', 'PengemudiController@edit');
        Route::post('pengemudi/{id}/update', 'PengemudiController@update');
        Route::get('pengemudi/{id}/delete', 'PengemudiController@destroy');
        // Depot
        Route::get('depot', 'DepotController@index');
        Route::post('depot/tambah', 'DepotController@store');
        Route::get('depot/{id}/edit', 'DepotController@edit');
        Route::post('depot/{id}/update', 'DepotController@update');
        Route::get('depot/{id}/delete', 'DepotController@destroy');
        Route::get('depot/cetak', 'DepotController@cetak')->name('print');
        Route::get('export', 'DepotController@export');
        // Detail Pengiriman
        Route::get('pengiriman/{id}/kirim', 'PengirimanController@kirim');
        Route::post('pengiriman/{id}/proses', 'PengirimanController@proses');
    }
);

Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'permissions:admin,depot']],
    function () {
        // Dashboard
        Route::get('dashboard', 'DashboardController@index');
        // Pengiriman
        Route::get('pengajuan', 'PengajuanController@index');
        Route::post('pengajuan/tambah', 'PengajuanController@pengajuan');
        Route::get('pengajuan/{id}/edit', 'PengajuanController@edit');
        Route::post('pengajuan/{id}/update', 'PengajuanController@update');
        Route::get('pengajuan/{id}/delete', 'PengajuanController@hapus');
        Route::get('pengajuan/{id}/detail', 'PengajuanController@detail_pengiriman');
    }
);
