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
//     return view('user.index');
// });

Route::get('/', 'DashboardController@publicindex')->name('public.index');

Auth::routes();

// Route::get('/register', function(){
//   return redirect()->route('login');
// });
Route::middleware('auth')->group(function(){
  Route::get('/home', function(){
    return redirect()->route('dashboard');
  })->name('home');

  //routing dashboard admin
  Route::get('/admin', 'DashboardController@index')->name('dashboard');

  //routing kegiatan
  Route::get('/admin/kegiatan', 'KegiatanController@index')->name('kegiatan');
  Route::get('/admin/kegiatan/create', 'KegiatanController@create')->name('kegiatan.create');
  Route::post('/admin/kegiatan/create', 'KegiatanController@store')->name('kegiatan.store');
  Route::get('/admin/kegiatan/{kegiatan}/edit', 'KegiatanController@edit')->name('kegiatan.edit');
  Route::patch('/admin/kegiatan/{kegiatan}/edit', 'KegiatanController@update')->name('kegiatan.update');
  Route::delete('/admin/kegiatan/{kegiatan}/delete', 'KegiatanController@destroy')->name('kegiatan.destroy');

  //routing data alumni
  Route::get('/admin/alumni', 'AlumniController@index')->name('alumni');
  Route::post('/admin/alumi/create', 'AlumniController@store')->name('alumni.store');
  Route::delete('/admin/alumni/{alumni}/delete', 'AlumniController@destroy')->name('alumni.destroy');

  //routing dokumentasi
  Route::get('/admin/dokumentasi', 'DokumentasiController@index')->name('dokumentasi');
  Route::get('/admin/dokumentasi/create', 'DokumentasiController@create')->name('dokumentasi.create');
  Route::post('/admin/dokumentasi/create', 'DokumentasiController@store')->name('dokumentasi.store');
  Route::get('/admin/dokumentasi/{nama_kegiatan}/view', 'DokumentasiController@view')->name('dokumentasi.view');
  Route::delete('/admin/dokumentasi/{dokumentasi}/delete', 'DokumentasiController@destroy')->name('dokumentasi.destroy');
});
