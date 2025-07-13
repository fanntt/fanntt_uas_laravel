<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view('welcome');
});

// Hapus atau ubah route ini jika tidak dipakai
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes manual
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // Route admin lainnya
    Route::resource('barang', App\Http\Controllers\BarangController::class);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/homepage', [HomeController::class, 'index'])->name('homepage');
    // Route peminjaman barang user
    Route::get('/peminjaman/{barang}/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman/{barang}', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    // Route user lainnya
});

// Nonaktifkan route auth bawaan
// require __DIR__.'/auth.php';
