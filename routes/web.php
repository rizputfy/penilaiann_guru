<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JenisKehadiranController;

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
    return view('home');
});

Route::get('penilaian_kehadiran', 'App\Http\Controllers\PenilaianKehadiranController@index');

Route::get('penilaian_kehadiran.create', 'App\Http\Controllers\PenilaianKehadiranController@create');

Route::get('jenis_kehadiran', 'App\Http\Controllers\JenisKehadiranController@index');

Route::get('jenis_kehadiran/create', 'App\Http\Controllers\JenisKehadiranController@create')->name('jenis_kehadiran.create');

Route::post('jenis_kehadiran/store', 'App\Http\Controllers\JenisKehadiranController@store')->name('jenis_kehadiran.store');

Route::get('jenis_kehadiran/edit/{id}', 'App\Http\Controllers\JenisKehadiranController@edit')->name('jenis_kehadiran.edit');

Route::post('jenis_kehadiran/update/{id}', 'App\Http\Controllers\JenisKehadiranController@update')->name('jenis_kehadiran.update');

Route::post('jenis_kehadiran/delete/{id}', 'App\Http\Controllers\JenisKehadiranController@destroy')->name('jenis_kehadiran.destroy');

Route::get('unit', 'App\Http\Controllers\UnitController@index');

Route::get('unit/create', 'App\Http\Controllers\UnitController@create')->name('unit.create');

Route::post('unit/store', 'App\Http\Controllers\UnitController@store')->name('unit.store');

Route::get('unit/edit/{id}', 'App\Http\Controllers\UnitController@edit')->name('unit.edit');

Route::post('unit/update/{id}', 'App\Http\Controllers\UnitController@update')->name('unit.update');

Route::post('unit/delete/{id}', 'App\Http\Controllers\UnitController@destroy')->name('unit.destroy');

Route::get('periode', 'App\Http\Controllers\PeriodeController@index');

Route::get('periode/create', 'App\Http\Controllers\PeriodeController@create')->name('periode.create');

Route::post('periode/store', 'App\Http\Controllers\PeriodeController@store')->name('periode.store');

Route::get('periode/edit/{id}', 'App\Http\Controllers\PeriodeController@edit')->name('periode.edit');

Route::post('periode/update/{id}', 'App\Http\Controllers\PeriodeController@update')->name('periode.update');

Route::post('periode/delete/{id}', 'App\Http\Controllers\PeriodeController@destroy')->name('periode.destroy');