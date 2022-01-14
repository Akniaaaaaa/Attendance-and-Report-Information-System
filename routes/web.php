<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Imports\SoalImport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'authenticate']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homee')->middleware('auth');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('auth');


//KATEGORI
Route::get('/admin/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori')->middleware('auth');
Route::get('/waktu/{id}', [App\Http\Controllers\KategoriController::class, 'waktu'])->name('waktu')->middleware('auth');
Route::get('/admin/tambah_kategori', [App\Http\Controllers\KategoriController::class, 'create'])->name('tambah_kategori')->middleware('auth');
Route::post('/admin/store_kategori', [App\Http\Controllers\KategoriController::class, 'store_kategori'])->name('simpan_kategori')->middleware('auth');
Route::get('/admin/hapus/{id}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('admin/hapus')->middleware('auth');
Route::get('/admin/ubah/{id}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('admin/edit')->middleware('auth');
Route::post('/admin/update_kt/{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('ubah_kategori')->middleware('auth');

//PENGGUNA
Route::get('/admin/pengguna', [App\Http\Controllers\UserController::class, 'index'])->name('pengguna')->middleware('auth');
Route::get('/admin/hapus_pengguna/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('hapus_pengguna')->middleware('auth');
//JADWAL
Route::get('/admin/jadwal', [App\Http\Controllers\JadwaladminController::class, 'index'])->name('jadwal')->middleware('auth');
Route::get('/admin/tambah_jadwal', [App\Http\Controllers\JadwaladminController::class, 'create'])->name('tambah_jadwal')->middleware('auth');
Route::post('/admin/store_jadwal', [App\Http\Controllers\JadwaladminController::class, 'store_jadwal'])->name('simpan_jadwal')->middleware('auth');
Route::get('/admin/hapus_jadwal', [App\Http\Controllers\JadwaladminController::class, 'destroy'])->name('admin/hapus_jadwal')->middleware('auth');
Route::get('/admin/ubah_jadwal/{id}', [App\Http\Controllers\JadwaladminController::class, 'edit'])->name('admin/ubah_jadwal')->middleware('auth');
Route::post('/admin/update/{id}', [App\Http\Controllers\JadwaladminController::class, 'update'])->name('update_jadwal')->middleware('auth');

Route::get('/admin/jadwal_kecermatan', [App\Http\Controllers\JadwalController::class, 'jadwal_kecermatan'])->name('jadwal_kecermatan')->middleware('auth');
Route::post('/admin/Sjadwal_kecermatan', [App\Http\Controllers\JadwalController::class, 'Sjadwal_kecermatan'])->name('Sjadwal_kecermatan')->middleware('auth');
Route::get('/admin/Ejadwal_kecermatan/{id_peserta}', [App\Http\Controllers\JadwalController::class, 'Ejadwal_kecermatan'])->name('Ejadwal_kecermatan')->middleware('auth');
Route::post('/admin/Ujadwal_kecermatan/{id_peserta}', [App\Http\Controllers\JadwalController::class, 'Ujadwal_kecermatan'])->name('Ujadwal_kecermatan')->middleware('auth');

//SOAL
Route::get('/admin/soal/{id_kategori}', [App\Http\Controllers\SoalController::class, 'index'])->name('soal')->middleware('auth');
Route::get('/admin/ssoal', [App\Http\Controllers\SoalController::class, 'indexx'])->name('ssoal')->middleware('auth');
Route::get('/admin/tambah_soal', [App\Http\Controllers\SoalController::class, 'create'])->name('tambah_soal')->middleware('auth');
Route::post('/admin/store_soal', [App\Http\Controllers\SoalController::class, 'store'])->name('simpan_soal')->middleware('auth');
Route::get('/admin/ubah_soal/{id}', [App\Http\Controllers\SoalController::class, 'edit'])->name('ubah_soal')->middleware('auth');
Route::post('/admin/update_soal/{id}', [App\Http\Controllers\SoalController::class, 'update'])->name('update_soal')->middleware('auth');
Route::get('/admin/hapus_soal/{id}', [App\Http\Controllers\SoalController::class, 'destroy'])->name('hapus_soal')->middleware('auth');
Route::get('/admin/soal_export', [App\Http\Controllers\SoalController::class, 'soalexport'])->name('soal_export')->middleware('auth');
Route::post('/admin/soal_import', [App\Http\Controllers\SoalController::class, 'soalimport'])->name('soal_import')->middleware('auth');

Route::get('/dashboard', [App\Http\Controllers\PesertaController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/paket_soal', [App\Http\Controllers\PesertaController::class, 'index_paket'])->name('paket')->middleware('auth');
Route::get('/jadwal_peserta/{paket}/{id_peserta}', [App\Http\Controllers\JadwaladminController::class, 'index_peserta'])->name('jadwal_peserta')->middleware('auth');
Route::get('/kategori_soal/{paket}', [App\Http\Controllers\PesertaController::class, 'index_kt'])->name('kategori_soal')->middleware('auth');
Route::get('/petunjuk/{paket}/{id_kategori}/{tes}', [App\Http\Controllers\PesertaController::class, 'petunjuk'])->name('petunjuk')->middleware('auth');
Route::get('/soal/{paket}/{id_kategori}/{tes}/{nomor_soal}', [App\Http\Controllers\PesertaController::class, 'soal_kt'])->name('soal_kt')->middleware('auth');
Route::get('/soal_kc/{paket}/{id_kategori}/{tes}/{nomor_soal}', [App\Http\Controllers\PesertaController::class, 'soal_kc'])->name('soal_kc')->middleware('auth');
Route::get('/soalKecermatan/{paket}/{id_kategori}/{tes}/{nomor_soal}', [App\Http\Livewire\SoalKecermatan::class, 'mount'])->name('soalKecermatan')->middleware('auth');
Route::get('/simpanjawaban/{paket}/{id_kategori}/{tes}/{nomor_soal}', [App\Http\Controllers\PesertaController::class, 'simpanjawaban'])->name('simpanjawaban')->middleware('auth');
Route::get('/hasil_peserta/{id_peserta}', [App\Http\Controllers\HasilController::class, 'hasil_peserta'])->name('hasil_peserta')->middleware('auth');
Route::get('/lihat_hasil/{id_peserta}/{paket}', [App\Http\Controllers\HasilController::class, 'lihat_hasil'])->name('lihat_hasil')->middleware('auth');
Route::get('/info_hasil/{id_peserta}/{paket}/{id_kategori}', [App\Http\Controllers\HasilController::class, 'info_hasil_peserta'])->name('info_hasil_peserta')->middleware('auth');
Route::get('/detail_hasil/{id_peserta}/{paket}/{tes}/{id_kategori}', [App\Http\Controllers\HasilController::class, 'detail_hasil'])->name('detail_hasil')->middleware('auth');
//HAsil
Route::get('/admin/hasil', [App\Http\Controllers\HasilController::class, 'index'])->name('hasil')->middleware('auth');
Route::get('/admin/info_hasil/{id_user}', [App\Http\Controllers\HasilController::class, 'info_hasil'])->name('info_hasil')->middleware('auth');
