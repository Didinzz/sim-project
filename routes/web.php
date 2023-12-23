<?php

use App\Http\Controllers\{
    adminController,
    kepsekController,
    pegawaiController,
    siswaController,
    surat_cuti_pegawaiController,
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
    Route::get('pengajuan_ttd/{id}', [AdminController::class, 'pengajuan_ttd'])->name('pengajuan_ttd');
    Route::get('diterima/{id}', [AdminController::class, 'diterima'])->name('diterima');
    Route::get('hapusSuratKeluar/{id}', [AdminController::class, 'hapusSuratKeluar'])->name('hapus.surat.keluar');


    // tot surat belu
    Route::get('/Total_surat_belum', [AdminController::class, 'totSuratBelum'])->name('total-surat-belum');




    // Kepsek Controller
    Route::get('pengajuan', [kepsekController::class, 'index'])->name('pengajuan');
    Route::get('profile', [kepsekController::class, 'profile'])->name('profile');
    Route::put('update_profile', [kepsekController::class, 'update_profile'])->name('update_profile');
    Route::get('surat_acc', [kepsekController::class, 'surat_acc'])->name('surat.acc');

    Route::get('gantipass', [AuthController::class, 'gantiPass'])->name('gantipass');
    Route::put('ganti-pass-baru', [AuthController::class, 'proses_ganti_pass'])->name('ganti-pass-baru');





    // surat Cuti Kepegawaian
    Route::get('/pegawai-surat-cuti', [pegawaiController::class, 'surat_cuti'])->name('pegawai-surat-cuti');
    Route::get('/form-pegawai-surat-cuti', [pegawaiController::class, 'form_surat_cuti'])->name('form-pegawai-surat-cuti');
    Route::post('/store-pegawai-surat-cuti', [pegawaiController::class, 'store_surat_cuti'])->name('store-pegawai-surat-cuti');


    // surat dispen siswa
    Route::get('/siswa-surat-dispen', [siswaController::class, 'surat_dispen'])->name('siswa-surat-dispen');
    Route::get('/form-siswa-surat-dispen', [siswaController::class, 'form_surat_dispen'])->name('form-siswa-surat-dispen');
    Route::post('/store-siswa-surat-dispen', [siswaController::class, 'store_surat_dispen'])->name('store-siswa-surat-dispen');


    // surat Tugas guru
    Route::get('/pegawai-surat-tugas', [pegawaiController::class, 'surat_tugas'])->name('pegawai-surat-tugas');
    Route::get('/form-pegawai-surat-tugas', [pegawaiController::class, 'form_surat_tugas'])->name('form-pegawai-surat-tugas');
    Route::post('/store-pegawai-surat-tugas', [pegawaiController::class, 'store_surat_tugas'])->name('store-pegawai-surat-tugas');

    // surat keterangan siswa
    Route::get('/siswa-surat-keterangan', [siswaController::class, 'surat_keterangan'])->name('siswa-surat-keterangan');
    Route::get('/form-siswa-surat-keterangan', [siswaController::class, 'form_surat_keterangan'])->name('form-siswa-surat-keterangan');
    Route::post('/store-siswa-surat-keterangan', [siswaController::class, 'store_surat_keterangan'])->name('store-siswa-surat-keterangan');

    // surat pensiun dini pegawai
    Route::get('/pegawai-surat-pensiun', [pegawaiController::class, 'surat_pensiun'])->name('pegawai-surat-pensiun');
    Route::get('/form-pegawai-surat-pensiun', [pegawaiController::class, 'form_surat_pensiun'])->name('form-pegawai-surat-pensiun');
    Route::post('/store-pegawai-surat-pensiun', [pegawaiController::class, 'store_surat_pensiun'])->name('store-pegawai-surat-pensiun');

    // surat Home Visit Siswa
    Route::get('/pegawai-surat-home-visit', [pegawaiController::class, 'surat_home_visit'])->name('pegawai-surat-home-visit');
    Route::get('/form-pegawai-surat-home-visit', [pegawaiController::class, 'form_surat_home_visit'])->name('form-pegawai-surat-home-visit');
    Route::post('/store-pegawai-surat-home-visit', [pegawaiController::class, 'store_surat_home_visit'])->name('store-pegawai-surat-home-visit');

    // surat pindah siswa
    Route::get('/siswa-surat-pindah', [siswaController::class, 'surat_pindah'])->name('siswa-surat-pindah');
    Route::get('/form-siswa-surat-pindah', [siswaController::class, 'form_surat_pindah'])->name('form-siswa-surat-pindah');
    Route::post('/store-siswa-surat-pindah', [siswaController::class, 'store_surat_pindah'])->name('store-siswa-surat-pindah');

    // surat Rekomendasi Beasiswa
    Route::get('/siswa-surat-rekomendasi-beasiswa', [siswaController::class, 'surat_rekomendasi_beasiswa'])->name('siswa-surat-rekomendasi-beasiswa');
    Route::get('/form-siswa-surat-rekomendasi-beasiswa', [siswaController::class, 'form_surat_rekomendasi_beasiswa'])->name('form-siswa-surat-rekomendasi-beasiswa');
    Route::post('/store-siswa-surat-rekomendasi-beasiswa', [siswaController::class, 'store_surat_rekomendasi_beasiswa'])->name('store-siswa-surat-rekomendasi-beasiswa');

    // surat Rekomendasi Ptn
    Route::get('/siswa-surat-rekomendasi-ptn', [siswaController::class, 'surat_rekomendasi_ptn'])->name('siswa-surat-rekomendasi-ptn');
    Route::get('/form-siswa-surat-rekomendasi-ptn', [siswaController::class, 'form_surat_rekomendasi_ptn'])->name('form-siswa-surat-rekomendasi-ptn');
    Route::post('/store-siswa-surat-rekomendasi-ptn', [siswaController::class, 'store_surat_rekomendasi_ptn'])->name('store-siswa-surat-rekomendasi-ptn');

    // surat Dispen guru
    Route::get('/pegawai-surat-dispen-guru', [pegawaiController::class, 'surat_dispen_guru'])->name('pegawai-surat-dispen-guru');
    Route::get('/form-pegawai-surat-dispen-guru', [pegawaiController::class, 'form_surat_dispen_guru'])->name('form-pegawai-surat-dispen-guru');
    Route::post('/store-pegawai-surat-dispen-guru', [pegawaiController::class, 'store_surat_dispen_guru'])->name('store-pegawai-surat-dispen-guru');
});
