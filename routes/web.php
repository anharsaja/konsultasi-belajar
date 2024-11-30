<?php

use App\Http\Controllers\DaftarPengajuanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RoomBuyerController;
use App\Http\Controllers\RoomSellerController;
use Illuminate\Support\Facades\Route;

require_once __DIR__."/auth/login.php";

// after dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard.index');
    })->name('home');

    // progress belajar
    Route::get('/progress', function (){
        return view('pages.progress.index');
    })->name('progress');


    Route::get('/room', function (){
        return view('pages.room.index');
    })->name('room');

    Route::resource('/pengajuan', PengajuanController::class);
    Route::get('/dosen/{courseId}', [PengajuanController::class, 'getDosenByCourse']);


    // endpoint feature dosen
    Route::resource('/daftarpengajuan', DaftarPengajuanController::class);
    Route::get('/daftarpengajuan/catatanhasil/{id}', [DaftarPengajuanController::class,'catatanKonsultasi'])->name('catatankonsultasi');
    Route::put('/catatanhasilkonsul/{id}', [DaftarPengajuanController::class,'storeCatatanHasil'])->name('addcatatankonsul');
});


// landing
Route::get('/landing', function () {
    return view('pages.landing.index');
})->name('kontol');


require_once __DIR__."/auth/register.php";
