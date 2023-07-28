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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Jenis Kehadiran
Route::get('jenis_kehadiran', 'App\Http\Controllers\JenisKehadiranController@index');

Route::get('jenis_kehadiran/create', 'App\Http\Controllers\JenisKehadiranController@create')->name('jenis_kehadiran.create');

Route::post('jenis_kehadiran/store', 'App\Http\Controllers\JenisKehadiranController@store')->name('jenis_kehadiran.store');

Route::get('jenis_kehadiran/edit/{id}', 'App\Http\Controllers\JenisKehadiranController@edit')->name('jenis_kehadiran.edit');

Route::post('jenis_kehadiran/update/{id}', 'App\Http\Controllers\JenisKehadiranController@update')->name('jenis_kehadiran.update');

Route::post('jenis_kehadiran/delete/{id}', 'App\Http\Controllers\JenisKehadiranController@destroy')->name('jenis_kehadiran.destroy');

//Unit
Route::get('unit', 'App\Http\Controllers\UnitController@index');

Route::get('unit/create', 'App\Http\Controllers\UnitController@create')->name('unit.create');

Route::post('unit/store', 'App\Http\Controllers\UnitController@store')->name('unit.store');

Route::get('unit/edit/{id}', 'App\Http\Controllers\UnitController@edit')->name('unit.edit');

Route::post('unit/update/{id}', 'App\Http\Controllers\UnitController@update')->name('unit.update');

Route::post('unit/delete/{id}', 'App\Http\Controllers\UnitController@destroy')->name('unit.destroy');

//Periode
Route::get('periode', 'App\Http\Controllers\PeriodeController@index');

Route::get('periode/create', 'App\Http\Controllers\PeriodeController@create')->name('periode.create');

Route::post('periode/store', 'App\Http\Controllers\PeriodeController@store')->name('periode.store');

Route::get('periode/edit/{id}', 'App\Http\Controllers\PeriodeController@edit')->name('periode.edit');

Route::post('periode/update/{id}', 'App\Http\Controllers\PeriodeController@update')->name('periode.update');

Route::post('periode/delete/{id}', 'App\Http\Controllers\PeriodeController@destroy')->name('periode.destroy');

//jenis aksi nyata
Route::get('jenis_aksi_nyata', 'App\Http\Controllers\JenisAksiNyataController@index');

Route::get('jenis_aksi_nyata/create', 'App\Http\Controllers\JenisAksiNyataController@create')->name('jenis_aksi_nyata.create');

Route::post('jenis_aksi_nyata/store', 'App\Http\Controllers\JenisAksiNyataController@store')->name('jenis_aksi_nyata.store');

Route::get('jenis_aksi_nyata/edit/{id}', 'App\Http\Controllers\JenisAksiNyataController@edit')->name('jenis_aksi_nyata.edit');

Route::post('jenis_aksi_nyata/update/{id}', 'App\Http\Controllers\JenisAksiNyataController@update')->name('jenis_aksi_nyata.update');

Route::post('jenis_aksi_nyata/delete/{id}', 'App\Http\Controllers\JenisAksiNyataController@destroy')->name('jenis_aksi_nyata.destroy');

//jenis pembelajaran
Route::get('jenis_pembelajaran', 'App\Http\Controllers\JenisPembelajaranController@index');

Route::get('jenis_pembelajaran/create', 'App\Http\Controllers\JenisPembelajaranController@create')->name('jenis_pembelajaran.create');

Route::post('jenis_pembelajaran/store', 'App\Http\Controllers\JenisPembelajaranController@store')->name('jenis_pembelajaran.store');

Route::get('jenis_pembelajaran/edit/{id}', 'App\Http\Controllers\JenisPembelajaranController@edit')->name('jenis_pembelajaran.edit');

Route::post('jenis_pembelajaran/update/{id}', 'App\Http\Controllers\JenisPembelajaranController@update')->name('jenis_pembelajaran.update');

Route::post('jenis_pembelajaran/delete/{id}', 'App\Http\Controllers\JenisPembelajaranController@destroy')->name('jenis_pembelajaran.destroy');

//jabatan struktural
Route::get('jabatan_struktural', 'App\Http\Controllers\JabatanStrukturalController@index');

Route::get('jabatan_struktural/create', 'App\Http\Controllers\JabatanStrukturalController@create')->name('jabatan_struktural.create');

Route::post('jabatan_struktural/store', 'App\Http\Controllers\JabatanStrukturalController@store')->name('jabatan_struktural.store');

Route::get('jabatan_struktural/edit/{id}', 'App\Http\Controllers\JabatanStrukturalController@edit')->name('jabatan_struktural.edit');

Route::post('jabatan_struktural/update/{id}', 'App\Http\Controllers\JabatanStrukturalController@update')->name('jabatan_struktural.update');

Route::post('jabatan_struktural/delete/{id}', 'App\Http\Controllers\JabatanStrukturalController@destroy')->name('jabatan_struktural.destroy');


//penilaian aksi nyata
Route::get('penilaian_aksi_nyata', 'App\Http\Controllers\PenilaianAksiNyataController@index');

Route::get('penilaian_aksi_nyata/create', 'App\Http\Controllers\PenilaianAksiNyataController@create')->name('penilaian_aksi_nyata.create');

Route::post('penilaian_aksi_nyata/store', 'App\Http\Controllers\PenilaianAksiNyataController@store')->name('penilaian_aksi_nyata.store');

Route::get('penilaian_aksi_nyata/edit/{id}', 'App\Http\Controllers\PenilaianAksiNyataController@edit')->name('penilaian_aksi_nyata.edit');

Route::post('penilaian_aksi_nyata/update/{id}', 'App\Http\Controllers\PenilaianAksiNyataController@update')->name('penilaian_aksi_nyata.update');

Route::post('penilaian_aksi_nyata/delete/{id}', 'App\Http\Controllers\PenilaianAksiNyataController@destroy')->name('penilaian_aksi_nyata.destroy');

// guru
Route::get('guru', 'App\Http\Controllers\GuruController@index');

Route::get('guru/create', 'App\Http\Controllers\GuruController@create')->name('guru.create');

Route::post('guru/store', 'App\Http\Controllers\GuruController@store')->name('guru.store');

Route::get('guru/edit/{id}', 'App\Http\Controllers\GuruController@edit')->name('guru.edit');

Route::post('guru/update/{id}', 'App\Http\Controllers\GuruController@update')->name('guru.update');

Route::post('guru/delete/{id}', 'App\Http\Controllers\GuruController@destroy')->name('guru.destroy');

//Penilaian
Route::get('penilaian', 'App\Http\Controllers\PenilaianController@index');

Route::get('penilaian/create/{id_periode}', 'App\Http\Controllers\PenilaianController@create')->name('penilaian.create');

Route::get('penilaian/home', 'App\Http\Controllers\PenilaianController@home')->name('penilaian.home');

Route::get('guru/search', 'App\Http\Controllers\GuruController@search')->name('guru.search');

//Route::get('sig/edit/{id}/{ticketid}', 'TicketsController@edit');