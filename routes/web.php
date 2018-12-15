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
    return view('beranda');
});
Route::get('contact','ContactController@index');
Route::get('lihatjadwal','LihatjadwalController@index');
	Route::get('/lihatjadwal/get-jadwal/{id_poli}','LihatjadwalController@postCreatePoli');


Route::get('daftar','DaftarController@index');
	Route::post('/daftar','DaftarController@postCreate');
	Route::get('/daftar/info','DaftarController@infoPasien');
	Route::get('/daftar/get-jadwal/{id_poli}/{id_pasien}','DaftarController@postCreatePoli');
	Route::get('/daftar/jadwal/{id_hj}/{id_pasien}/{tgl}','DaftarController@pilihJadwal');
	Route::get('/daftar/print/{id_pasien}/{id_jadwal}','DaftarController@printKartu');

Route::get('login','LoginController@index');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::group(['middleware' => ['auth']],function(){


	//Pasien Route
	Route::match(['get','post'],'/petugas/tambah-pasien','PasienController@tambahPasien');
	Route::get('/view-pasiens','PasienController@viewPasiens');
	Route::match(['get','post'],'/petugas/detail-pasiens/{id}','PasienController@detailPasiens');
	Route::match(['get','post'],'/petugas/edit-pasien/{id}','PasienController@editPasien');
	Route::match(['get','post'],'/petugas/delete-pasien/{id}','PasienController@deletePasien');

	//Polyclinics Route
	Route::match(['get','post'],'/tambah-polyclinic','PolyclinicController@tambahPolyclinic');
	Route::get('/view-polyclinics','PolyclinicController@viewPolyclinics');
	Route::match(['get','post'],'/edit-polyclinic/{id}','PolyclinicController@editPolyclinic');
	Route::match(['get','post'],'/delete-polyclinic/{id}','PolyclinicController@deletePolyclinic');

	//doctors Route
	Route::get('/view-doctors','DoctorController@viewDoctors');
	Route::match(['get','post'],'/tambah-doctor','DoctorController@tambahDoctor');
	Route::match(['get','post'],'/edit-doctor/{id}','DoctorController@editDoctor');
	Route::match(['get','post'],'/detail-doctor/{id}','DoctorController@detailDoctor');
	Route::match(['get','post'],'/delete-doctor/{id}','DoctorController@deleteDoctor');

	//doctors2 Route
	Route::get('/view-doctors2','DoctorController2@viewDoctors2');
	Route::match(['get','post'],'/tambah-doctor2','DoctorController2@tambahDoctor2');
	Route::match(['get','post'],'/edit-doctor2/{id}','DoctorController2@editDoctor2');
	Route::match(['get','post'],'/detail-doctor2/{id}','DoctorController2@detailDoctor2');
	Route::match(['get','post'],'/delete-doctor2/{id}','DoctorController2@deleteDoctor2');


	//jadwal Route
	Route::get('/view-jadwal','JadwalController@viewJadwal');
	Route::match(['get','post'],'/tambah-jadwal','JadwalController@tambahJadwal');
	Route::match(['get','post'],'/delete-jadwal/{id}/{id_hari}','JadwalController@deleteJadwal');
	Route::match(['get','post'],'/edit-jadwal/{id}/{id_hari}','JadwalController@editJadwal');

	//jadwal2 Route
	Route::get('/view-jadwal2','JadwalController2@viewJadwal2');
	Route::match(['get','post'],'/tambah-jadwal2','JadwalController2@tambahJadwal2');
	Route::match(['get','post'],'/delete-jadwal2/{id}/{id_hari}','JadwalController2@deleteJadwal2');
	Route::match(['get','post'],'/edit-jadwal2/{id}/{id_hari}','JadwalController2@editJadwal2');

	//akun user Route
	Route::get('/view-user','UserController@viewUser');
	Route::resource('user', 'UserController');

	//laporan route
	Route::get('/report', 'ReportController@index');
	Route::post('petugas/report/search', 'ReportController@search')->name('report.search');
	Route::post('report/excel', 'ReportController@exportExcel')->name('report.excel');

	//pendaftaran Route
	Route::get('/view-pendaftaran','PendaftaranController@viewPendaftaran');
	Route::get('/pendaftaran','PendaftaranController@index');
	Route::get('/pendaftaran/print/{id_pasien}/{id_jadwal}','PendaftaranController@printKartu');
	Route::post('/pendaftaran','PendaftaranController@postCreate');
	Route::get('/pendaftaran/get-jadwal/{id_poli}/{id_pasien}','PendaftaranController@postCreatePoli');
	Route::get('/pendaftaran/info','PendaftaranController@infoPasien');
	Route::get('/pendaftaran/jadwal/{id_hj}/{id_pasien}/{tgl}','PendaftaranController@pilihJadwal');
	Route::get('/pendaftaran/destroy/{id_booking}','PendaftaranController@destroy');

	//Sedang periksa
	Route::get('/pemeriksaan','PendaftaranController@readPemeriksaan');
	Route::get('/pendaftaran/done/{id_booking}','PendaftaranController@donePemeriksaan');

});
