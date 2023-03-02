<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PilihMapelController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KomentarController;



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

Route::get('/',[LoginController::class, 'login'])->name('login');
Route::post('/post/login',[LoginController::class, 'post_login']);
Route::get('logout',[LoginController::class, 'logout'])->middleware('auth');

Route::get('/register/account',[RegisterController::class, 'register'])->middleware('guest');
Route::post('/post/register',[RegisterController::class, 'post_register'])->middleware('guest');

Route::middleware('auth')->group(function () {
	Route::get('home',[HomeController::class, 'home']);
	//route guru
	Route::get('/data/guru',[GuruController::class, 'data_guru']);
	Route::get('/tambah/guru',[GuruController::class, 'tambah_guru']);
	Route::post('/post/guru',[GuruController::class, 'post_guru']);
	Route::get('/edit/guru/{id}',[GuruController::class, 'edit_guru']);
	Route::post('/update/guru/{id}',[GuruController::class, 'update_guru']);
	Route::get('/hapus/guru/{id}',[GuruController::class, 'hapus_guru']);

    //route siswa
	Route::get('/data/siswa',[SiswaController::class, 'data_siswa']);
	Route::get('/tambah/siswa',[SiswaController::class, 'tambah_siswa']);
	Route::post('/post/siswa',[SiswaController::class, 'post_siswa']);
	Route::get('/edit/siswa/{id}',[SiswaController::class, 'edit_siswa']);
	Route::post('/update/siswa/{id}',[SiswaController::class, 'update_siswa']);
	Route::get('/hapus/siswa/{id}',[SiswaController::class, 'hapus_siswa']);
	//route pengguna
	Route::get('pengguna',[PenggunaController::class, 'pengguna']);
	Route::post('/post/pengguna/guru',[PenggunaController::class, 'post_pengguna_guru']);
	Route::post('/update/pengguna/guru/{id}',[PenggunaController::class, 'update_pengguna_guru']);
	Route::get('profil',[PenggunaController::class, 'profil']);
	Route::post('/post/pengguna/siswa',[PenggunaController::class, 'post_pengguna_siswa']);
	Route::post('/update/pengguna/siswa/{id}',[PenggunaController::class, 'update_pengguna_siswa']);


	//route mapel
	Route::get('mapel',[MapelController::class, 'mapel']);
	Route::get('/tambah/mapel',[MapelController::class, 'tambah_mapel']);
	Route::post('/post/mapel',[MapelController::class, 'post_mapel']);
	Route::get('/hapus/mapel/{id}',[MapelController::class, 'hapus_mapel']);
	Route::get('/edit/mapel/{id}',[MapelController::class, 'edit_mapel']);
	Route::post('/update/mapel/{id}',[MapelController::class, 'update_mapel']);

	Route::get('/soal/ujian',[UjianController::class, 'soal']);
	Route::get('/tambah/soal',[UjianController::class, 'tambah_soal']);
	Route::post('/post/soal',[UjianController::class, 'post_soal']);
	Route::get('/edit/soal/{id}',[UjianController::class, 'edit_soal']);
	Route::post('/ubah/soal/{id}',[UjianController::class, 'ubah_soal']);
	Route::get('/hapus/soal/{id}',[UjianController::class, 'hapus_soal']);

	Route::get('/ujian/online',[UjianController::class, 'ujian_online']);
	Route::get('/materi/ujian/online/{id}',[UjianController::class, 'materi_ujian_online']);


//Route Pilih kelas
	Route::get('/pilih/mapel',[PilihMapelController::class, 'pilih_kelas']);
	Route::post('/post/pilih/mapel',[PilihMapelController::class, 'post_pilih_mapel']);


//route presensi
	Route::post('/post/presensi',[PresensiController::class, 'post_presensi']);
	Route::get('/riwayat/presensi',[PresensiController::class, 'riwayat_presensi']);

//route update tugas
	Route::get('/riwayat/tugas',[TugasController::class, 'riwayat_tugas']);
	Route::post('/post/tugas',[TugasController::class, 'post_tugas']);

//route hasil ujian siswa
	Route::get('/hasil/ujian/siswa',[TugasController::class, 'hasil_ujian']);

//route post nilai siswa
	Route::post('/post/nilai/{id}',[NilaiController::class, 'post_nilai']);

//Route komentar
	Route::post('/post/komentar',[KomentarController::class, 'post_komentar']);
	Route::post('/balas/komentar',[KomentarController::class, 'balas_komentar']);

});