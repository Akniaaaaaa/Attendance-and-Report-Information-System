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
// Route::redirect('/', '/dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index2'])->name('homee')->middleware('auth');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile')->middleware('auth');


//KATEGORI
Route::get('/admin/kids', [App\Http\Controllers\KidsController::class, 'index'])->name('kids')->middleware('auth');
Route::get('/admin/add_kids', [App\Http\Controllers\KidsController::class, 'create'])->name('add_kids')->middleware('auth');
Route::post('/admin/store_kids', [App\Http\Controllers\KidsController::class, 'store'])->name('save_kids')->middleware('auth');
Route::get('/admin/ubahh/{id}', [App\Http\Controllers\KidsController::class, 'edit'])->name('edit_kids')->middleware('auth');
Route::post('/admin/update_kss/{id}', [App\Http\Controllers\KidsController::class, 'update'])->name('ubah_kids')->middleware('auth');
Route::get('/admin/hapus/{id}', [App\Http\Controllers\KidsController::class, 'destroy'])->name('admin/hapus')->middleware('auth');
//Subject
Route::get('/admin/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject')->middleware('auth', 'isAdmin');
Route::get('/admin/add_subject', [App\Http\Controllers\SubjectController::class, 'create'])->name('add_subject')->middleware('auth', 'isAdmin');
Route::post('/admin/store_subject', [App\Http\Controllers\SubjectController::class, 'store'])->name('save_subject')->middleware('auth', 'isAdmin');
Route::get('/admin/ubah/{id}', [App\Http\Controllers\SubjectController::class, 'edit'])->name('edit_subject')->middleware('auth', 'isAdmin');
Route::post('/admin/update_ks/{id}', [App\Http\Controllers\SubjectController::class, 'update'])->name('ubah_subject')->middleware('auth', 'isAdmin');
Route::get('/admin/hapus/{id}', [App\Http\Controllers\SubjectController::class, 'destroy'])->name('admin/hapus')->middleware('auth', 'isAdmin');
Route::get('/admin/tutor', [App\Http\Controllers\UserController::class, 'index_tutor'])->name('tutor')->middleware('auth', 'isAdmin');
Route::get('/admin/filter', [App\Http\Controllers\UserController::class, 'filter'])->name('filter')->middleware('auth', 'isAdmin');

//PENGGUNA
Route::get('/level', [App\Http\Controllers\AbsenController::class, 'index'])->name('level')->middleware('auth');
Route::get('/absen/{level}', [App\Http\Controllers\AbsenController::class, 'index_absen'])->name('absen')->middleware('auth');
Route::post('/absen/store/{level}', [App\Http\Controllers\AbsenController::class, 'store'])->name('save_absen')->middleware('auth');

// scoring
Route::get('/scoring', [App\Http\Controllers\RaporController::class, 'index'])->name('scoring')->middleware('auth');
Route::get('/scoring_level/{level}', [App\Http\Controllers\RaporController::class, 'index_name'])->name('scoring.level')->middleware('auth');
Route::get('/scoring_kids/{level}/{id_anak}', [App\Http\Controllers\RaporController::class, 'detail_scoring'])->name('scoring.detail')->middleware('auth');
Route::post('/scoring/store/{level}/{id_anak}', [App\Http\Controllers\RaporController::class, 'store'])->name('save_score1')->middleware('auth');
Route::post('/scoring/store2/{level}/{id_anak}', [App\Http\Controllers\RaporController::class, 'store2'])->name('save_score2')->middleware('auth');

//PENGGUNA
Route::get('/admin/pengguna', [App\Http\Controllers\UserController::class, 'index'])->name('pengguna')->middleware('auth');
Route::get('/admin/hapus_pengguna/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('hapus_pengguna')->middleware('auth');

Route::get('/admin/ubah_password', [App\Http\Controllers\UserController::class, 'edit'])->name('ubah_password')->middleware('isAdmin');
Route::put('/admin/ubah_password', [App\Http\Controllers\UserController::class, 'update'])->middleware('isAdmin');
Route::get('/loadview/{level}/{id_anak}', [App\Http\Controllers\PDFController::class, 'view'])->name('view');
Route::get('/generate-pdf/{level}/{id_anak}', [App\Http\Controllers\PDFController::class, 'generatePDF'])->name('generate.pdf');
