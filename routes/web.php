<?php

use App\Http\Controllers\DaftarPengajuanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

require_once __DIR__."/auth/login.php";

// after dashboard
Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('home');

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
});


// landing
Route::get('/landing', function () {
    return view('pages.landing.index');
})->name('kontol');


require_once __DIR__."/auth/register.php";
