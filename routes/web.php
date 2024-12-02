<?php

use App\Http\Controllers\DaftarPengajuanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\ProgressBelajar;
use App\Http\Controllers\RoomBuyerController;
use App\Http\Controllers\RoomSellerController;
use Illuminate\Support\Facades\Route;

require_once __DIR__."/auth/login.php";

// after dashboard
Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardDosenController::class, 'index'])->name('dashboard');

    // pengajuan
    Route::resource('/pengajuan', PengajuanController::class);
    Route::get('/dosen/{courseId}', [PengajuanController::class, 'getDosenByCourse']);


    // endpoint feature dosen
    Route::resource('/daftarpengajuan', DaftarPengajuanController::class);
    Route::get('/daftarpengajuan/catatanhasil/{id}', [DaftarPengajuanController::class,'catatanKonsultasi'])->name('catatankonsultasi');
    Route::put('/catatanhasilkonsul/{id}', [DaftarPengajuanController::class,'storeCatatanHasil'])->name('addcatatankonsul');

        // progress belajar
    Route::get('/progress', function (){
        return view('pages.progress.index');
    })->name('progress');
    Route::resource('/daftar-pengajuan', DaftarPengajuanController::class);
    Route::get('/daftar-pengajuan/catatan-hasil/{id}', [DaftarPengajuanController::class,'catatanKonsultasi'])->name('catatankonsultasi');
    Route::put('/catatan-hasil-konsul/{id}', [DaftarPengajuanController::class,'storeCatatanHasil'])->name('addcatatankonsul');

    // endpoint progress belajar mahasiswa dosen
    Route::get('/progress-belajar-mhs', [ProgressBelajar::class,'index'])->name('progressbelajarmhs');
    Route::get('/progress/edit/{studentId}/{courseId}', [ProgressBelajar::class, 'editProgressMhs'])->name('progressbelajarmhs.edit');
    Route::put('/progress/edit/{id}', [ProgressBelajar::class, 'updateProgressMhs'])->name('progressbelajarmhs.update');
});


// landing
Route::get('/landing', function () {
    return view('pages.landing.index');
})->name('kontol');


require_once __DIR__."/auth/register.php";
