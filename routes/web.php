<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware('auth')->group(function(){
    Route::resource('dashboard','DashboardController');
    Route::resource('piket','PiketController');
    Route::resource('kumpul_rayon','KumpulRayonController');
    Route::resource('absen_piket','AbsenPiketController');
    Route::resource('absen_rayon','AbsenRayonController');
    Route::resource('rayon','RayonController');
    Route::resource('user','UserController');
    Route::resource('siswa', 'SiswaController');
    Route::resource('kegiatan', 'KegiatanController');
    Route::resource('prestasi', 'PrestasiController');
    Route::get('/jadwalpiket', 'PenggunaController@jadwal_piket')->name('pengguna.jadwal_piket');
    Route::get('/jadwalkumpul', 'PenggunaController@jadwal_kumpul')->name('pengguna.jadwal_kumpul');
    Route::get('/absenpiket', 'PenggunaController@absen_piket')->name('pengguna.absen_piket');
    Route::get('/absenrayon', 'PenggunaController@absen_rayon')->name('pengguna.absen_rayon');
    Route::get('/data-siswa','RayonController@dataSiswa')->name('data-siswa.index');
    Route::get('/export-excel', 'SiswaController@export')->name('siswa.export');
    Route::get('/cetak-pdf', 'SiswaController@cetak_pdf')->name('siswa.pdf');
    Route::get('/export-excel-rayon','RayonController@export_excel')->name('rayon.excel');
    Route::post('/import-excel-rayon','RayonController@importExcel')->name('rayon-import.excel');
    Route::get('/export-pdf-rayon','RayonController@exportPdf')->name('rayon.pdf');
    Route::get('/export/pdf-piket','PiketController@exportPdf')->name('piket.pdf');
    Route::get('/export/pdf-kumpul','KumpulRayonController@exportPdf')->name('kumpul.pdf');
    Route::get('/export/pdf-absen-piket','AbsenPiketController@exportPdf')->name('absen-piket.pdf');
    Route::get('/export/pdf-absen-kumpulrayon','AbsenRayonController@exportPdf')->name('absen-rayon.pdf');
    Route::post('/import-excel-siswa','SiswaController@importExcel')->name('siswa-import.excel');
    Route::get('/admin/kegiatan','PenggunaController@kegiatan')->name('kegiatan-admin.index');
    Route::get('/admin/prestasi','PenggunaController@prestasi')->name('prestasi-admin.index');
    Route::get('/export-pdf-kegiatan','KegiatanController@exportPdf')->name('kegiatan.pdf');
    Route::get('/export-pdf-prestasi','PrestasiController@exportPdf')->name('prestasi.pdf');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
