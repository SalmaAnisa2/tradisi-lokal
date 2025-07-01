<?php

use App\Http\Controllers\TraditionController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [TraditionController::class, 'homepage']);

// Detail tradition
Route::get('/aa_traditions/{id}', [TraditionController::class, 'show'])->name('aa_traditions.show');

// Form create tradition
Route::get('/create', [TraditionController::class, 'create'])->name('aa_traditions.create')->middleware('auth');

// Simpan data tradition baru
Route::post('/aa_traditions/store', [TraditionController::class, 'store'])
    ->name('aa_traditions.store')
    ->middleware('auth');

// Login dan Logout
Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

// Tambahkan nama untuk logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Edit tradition (hanya admin)
Route::get('/aa_traditions/{id}/edit', [TraditionController::class, 'edit'])
    ->name('aa_traditions.edit')
    ->middleware('auth', RoleAdmin::class);

// Update tradition
Route::put('/aa_traditions/{id}', [TraditionController::class, 'update'])
    ->name('aa_traditions.update')
    ->middleware('auth', RoleAdmin::class);

// Hapus tradition
Route::delete('/aa_traditions/{id}', [TraditionController::class, 'destroy'])
    ->name('aa_traditions.destroy')
    ->middleware('auth');
