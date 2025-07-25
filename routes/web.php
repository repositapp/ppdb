<?php

use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CalonsiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KartuujianController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

// Route untuk Admin
Route::middleware('guest:web')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/authentication', [AuthController::class, 'authenticate'])->name('authentication');
});

// Route untuk Calon Siswa
Route::middleware('guest:user')->group(function () {
    Route::get('/user/login', [UserAuthController::class, 'index'])->name('user.login');
    Route::post('/user/authentication', [UserAuthController::class, 'authenticate'])->name('user.authentication');

    // Route Registrasi
    Route::get('/user/register', [UserAuthController::class, 'registrasi'])->name('user.register');
    Route::post('/user/register', [UserAuthController::class, 'register'])->name('user.register.post');
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/pengumuman/{slug}', [PengumumanController::class, 'show'])->name('pengumuman.show');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/{slug}', [MenuController::class, 'show'])->name('menu.show');

Route::prefix('panel')->middleware(['auth:web', 'role:admin, petugas'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kategori', KategoriController::class)->except(['show']);
    // Calon Siswa
    Route::get('calonsiswa', [CalonsiswaController::class, 'index'])->name('calonsiswa.index');
    Route::get('calonsiswa/{id}', [CalonsiswaController::class, 'show'])->name('calonsiswa.show');
    Route::get('verifikasi', [CalonsiswaController::class, 'verifikasi'])->name('verifikasi.index');
    Route::put('calonsiswa/update/{id}', [CalonsiswaController::class, 'updateStatus'])->name('calonsiswa.updateStatus');
    // Pengumuman
    Route::resource('pengumuman', PengumumanController::class)->except(['show']);
    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.export-excel');
    Route::get('/laporan/statistik', [LaporanController::class, 'statistik'])->name('laporan.statistik');
    Route::get('/laporan/cetak/{from?}/{to?}', [LaporanController::class, 'cetak'])->name('laporan.cetak');
    Route::get('/cetak-kartu/{id}', [KartuujianController::class, 'print'])->name('cetak.kartu');
    // Modul
    Route::resource('halaman', HalamanController::class)->except(['show']);
    Route::resource('menu', MenuController::class)->except(['show']);
    Route::get('/menu/load-targets', [MenuController::class, 'loadTargets'])->name('menu.target');
    // Settings
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('aplikasi', AplikasiController::class)->except(['show', 'create', 'store', 'destroy', 'edit']);
});

Route::prefix('mobile')->middleware(['auth:user', 'role:siswa'])->group(function () {
    Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
    // Dashboard
    Route::get('dashboard', [DashboardSiswaController::class, 'index'])->name('dashboard');
    // Pengumuman atau Informasi PPDB
    Route::get('pengumuman', [PengumumanController::class, 'pengumuman'])->name('pengumuman');
    Route::get('pengumuman/detail/{slug}', [PengumumanController::class, 'detail'])->name('pengumuman.detail');
    // Pendaftaran
    Route::get('pendaftaran', [CalonSiswaController::class, 'pendaftaran'])->name('pendaftaran');
    Route::get('/pendaftaran/detail/{id}', [CalonSiswaController::class, 'detail'])->name('pendaftaran.detail');
    Route::get('/pendaftaran/{id}/edit', [CalonSiswaController::class, 'edit'])->name('pendaftaran.edit');
    Route::put('/pendaftaran/{id}', [CalonSiswaController::class, 'update'])->name('pendaftaran.update');
    // Isi Biodata Calon Siswa
    Route::get('/pendaftaran/create', [CalonSiswaController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran/create', [CalonSiswaController::class, 'store'])->name('pendaftaran.store');
    // Profil
    Route::get('profil', [UserController::class, 'profil'])->name('profil');
});
