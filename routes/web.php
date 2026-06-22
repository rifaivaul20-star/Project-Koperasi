<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController; // Tambahkan ini
use App\Http\Controllers\Admin\AnggotaController;    // Tambahkan ini
use App\Http\Controllers\Admin\SimpananController;   // Tambahkan ini
use App\Http\Controllers\Admin\PinjamanController;   // Tambahkan ini
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Khusus Admin (Wajib Login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Ini dashboard koperasi yang sudah kita desain
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route CRUD untuk koperasi
    Route::resource('admin/anggota', AnggotaController::class)->names('admin.anggota');
    Route::resource('admin/simpanan', SimpananController::class)->names('admin.simpanan');
    Route::resource('admin/pinjaman', PinjamanController::class)->names('admin.pinjaman');

    // Route Profile (dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
