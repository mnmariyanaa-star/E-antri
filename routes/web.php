<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PenilaianController;

Route::get('/', function () {
    return view('home');
});

Route::get('/ambil-antrian', [AntrianController::class, 'create'])->name('antrian.create');
Route::post('/ambil-antrian', [AntrianController::class, 'store'])->name('antrian.store');

Route::get('/cek-antrian', [AntrianController::class, 'cek'])->name('antrian.cek');

Route::get('/penilaian-masyarakat', [PenilaianController::class, 'index'])->name('penilaian.index');
Route::get('/penilaian/{antrian}', [PenilaianController::class, 'create'])->name('penilaian.create');
Route::post('/penilaian/{antrian}', [PenilaianController::class, 'store'])->name('penilaian.store');

Route::get('/login-petugas', [PetugasController::class, 'login'])->name('petugas.login');
Route::post('/login-petugas', [PetugasController::class, 'prosesLogin'])->name('petugas.prosesLogin');
Route::post('/logout-petugas', [PetugasController::class, 'logout'])->name('petugas.logout');

Route::get('/dashboard-petugas', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');
Route::post('/dashboard-petugas/panggil', [PetugasController::class, 'panggilBerikutnya'])->name('petugas.panggil');
Route::post('/dashboard-petugas/status/{antrian}', [PetugasController::class, 'ubahStatus'])->name('petugas.status');
Route::delete('/dashboard-petugas/hapus-semua', [PetugasController::class, 'hapusSemua'])->name('petugas.hapusSemua');