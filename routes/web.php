<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomBuyerController;
use App\Http\Controllers\RoomSellerController;
use App\Http\Middleware\CheckProfile;
use Illuminate\Support\Facades\Route;

require_once __DIR__."/auth/login.php";

// after dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard.index');
    })->name('home');

    // progress belajar
    Route::get('/progress', function (){
        return view('pages.progress.index');
    })->name('progress');

    Route::get('/pengajuan', function (){
        return view('pages.pengajuan.index');
    })->name('pengajuan');

    Route::get('/room', function (){
        return view('pages.room.index');
    })->name('room');

    Route::get('/ajukan', function (){
        return view('pages.pengajuan.create');
    })->name('ajukan');


    // history transaksi
    Route::get('/transaksi/penjual', function () {
        return view('pages.transaksi.index');
    })->name('transaksi.penjual');
    Route::get('/transaksi/pembeli', function () {
        return view('pages.transaksi.index');
    })->name('transaksi.pembeli');

    // history transaksi details
    Route::get('/transaksi/penjual/detail', function () {
        return view('pages.transaksi.detail');
    })->name('transaksi.detail.penjual');
    Route::get('/transaksi/pembeli/detail', function () {
        return view('pages.transaksi.detail');
    })->name('transaksi.detail.pembeli');

    // Room Seller
    Route::resource('/room-seller', RoomSellerController::class);
    Route::get('/get-code/{id}', [RoomSellerController::class, 'getCode'])->name('get-code');
    Route::post('/chat/', [RoomSellerController::class, 'chat'])->name('chat.store');

    // Room Buyer
    Route::resource('/room-buyer', RoomBuyerController::class);


    // invoice
    Route::get('/invoice', function () {
        return view('pages.invoice.index');
    })->name('invoice');

    // invoice details
    Route::get('/invoice/detail', function () {
        return view('pages.invoice.detail');
    })->name('invoice.detail');

    // profile cteate
    Route::get('/biodata', function () {
        return view('pages.profile.create');
    })->name('biodata');
});


// landing
Route::get('/', function () {
    return view('pages.landing.index');
})->name('kontol');


require_once __DIR__."/auth/register.php";
