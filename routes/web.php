<?php

use App\Http\Controllers\{
    adminController,
    surat_cuti_pegawaiController,
    surat_dispen_siswaController,
    surat_tugas_pegawaiController,
    surat_keterangan_siswaController,
    surat_pensiun_pegawaiController,
    surat_home_visit_pegawaiController
};
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');




Route::group(['middleware' => 'auth'], function () {
    Route::get('', [adminController::class, 'index'])->name('dashboard');
    Route::get('table', [adminController::class, 'table'])->name('dashboard.table');
    Route::get('form', [adminController::class, 'surat_masuk'])->name('dashboard.surat.masuk');
    Route::post('store_surat_masuk', [adminController::class, 'store_surat_masuk'])->name('store_surat_masuk');
    Route::get('/show', [AdminController::class, 'show'])->name('show');
    Route::get('hapus_surat_masuk/{id}', [AdminController::class, 'hapus_surat_masuk'])->name('hapus_surat_masuk');


    // surat Cuti Kepegawaian
    Route::get('/pegawai-surat-cuti', [surat_cuti_pegawaiController::class, 'surat_cuti'])->name('pegawai-surat-cuti');
    Route::get('/form-pegawai-surat-cuti', [surat_cuti_pegawaiController::class, 'form_surat_cuti'])->name('form-pegawai-surat-cuti');
    Route::post('/store-pegawai-surat-cuti', [surat_cuti_pegawaiController::class, 'store_surat_cuti'])->name('store-pegawai-surat-cuti');
    Route::get('hapus_surat_cuti/{id}', [surat_cuti_pegawaiController::class, 'hapus_surat_cuti'])->name('hapus_surat_cuti');


    // surat dispen siswa
    Route::get('/siswa-surat-dispen', [surat_dispen_siswaController::class, 'surat_dispen'])->name('siswa-surat-dispen');
    Route::get('/form-siswa-surat-dispen', [surat_dispen_siswaController::class, 'form_surat_dispen'])->name('form-siswa-surat-dispen');
    Route::post('/store-siswa-surat-dispen', [surat_dispen_siswaController::class, 'store_surat_dispen'])->name('store-siswa-surat-dispen');
    Route::get('hapus_surat_dispen/{id}', [surat_dispen_siswaController::class, 'hapus_surat_dispen'])->name('hapus_surat_dispen');


    // surat Tugas guru
    Route::get('/pegawai-surat-tugas', [surat_tugas_pegawaiController::class, 'surat_tugas'])->name('pegawai-surat-tugas');
    Route::get('/form-pegawai-surat-tugas', [surat_tugas_pegawaiController::class, 'form_surat_tugas'])->name('form-pegawai-surat-tugas');
    Route::post('/store-pegawai-surat-tugas', [surat_tugas_pegawaiController::class, 'store_surat_tugas'])->name('store-pegawai-surat-tugas');
    Route::get('hapus_surat_tugas/{id}', [surat_tugas_pegawaiController::class, 'hapus_surat_tugas'])->name('hapus_surat_tugas');

    // surat keterangan siswa
    Route::get('/siswa-surat-keterangan', [surat_keterangan_siswaController::class, 'surat_keterangan'])->name('siswa-surat-keterangan');
    Route::get('/form-siswa-surat-keterangan', [surat_keterangan_siswaController::class, 'form_surat_keterangan'])->name('form-siswa-surat-keterangan');
    Route::post('/store-siswa-surat-keterangan', [surat_keterangan_siswaController::class, 'store_surat_keterangan'])->name('store-siswa-surat-keterangan');
    Route::get('hapus_surat_keterangan/{id}', [surat_keterangan_siswaController::class, 'hapus_surat_keterangan'])->name('hapus_surat_keterangan');

    // surat pensiun dini pegawai
    Route::get('/pegawai-surat-pensiun', [surat_pensiun_pegawaiController::class, 'surat_pensiun'])->name('pegawai-surat-pensiun');
    Route::get('/form-pegawai-surat-pensiun', [surat_pensiun_pegawaiController::class, 'form_surat_pensiun'])->name('form-pegawai-surat-pensiun');
    Route::post('/store-pegawai-surat-pensiun', [surat_pensiun_pegawaiController::class, 'store_surat_pensiun'])->name('store-pegawai-surat-pensiun');
    Route::get('hapus_surat_pensiun/{id}', [surat_pensiun_pegawaiController::class, 'hapus_surat_pensiun'])->name('hapus_surat_pensiun');

    // surat Home Visit Siswa
    Route::get('/pegawai-surat-home-visit', [surat_home_visit_pegawaiController::class, 'surat_home_visit'])->name('pegawai-surat-home-visit');
    Route::get('/form-pegawai-surat-home-visit', [surat_home_visit_pegawaiController::class, 'form_surat_home_visit'])->name('form-pegawai-surat-home-visit');
    Route::post('/store-pegawai-surat-home-visit', [surat_home_visit_pegawaiController::class, 'store_surat_home_visit'])->name('store-pegawai-surat-home-visit');
    Route::get('hapus_surat_home_visit/{id}', [surat_home_visit_pegawaiController::class, 'hapus_surat_home_visit'])->name('hapus_surat_home_visit');
});
