<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\EnsureUserIsValid;
use Illuminate\Support\Facades\Route;

// GET ROUTE
Route::get('/login', [AuthController::class, 'loginIndex']);

Route::get('/user', [AntrianController::class, 'index']);

Route::get('/user/antri', [AntrianController::class, 'addAntrian'])->name('antri');

// POST ROUTE
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['validUser'])->group(function(){    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', [DashboardController::class, 'homeIndex'])->name('dashboard');
    Route::get('/dashboard/antrian', [DashboardController::class, 'antrianIndex'])->name('antrian');
    Route::get('/dashboard/log', [DashboardController::class, 'logIndex'])->name('log');
    
    Route::post('/dashboard/panggil/{id}', [AntrianController::class, 'updateAntrian'])->name('panggil');
    Route::post('/dashboard/antrian/selesai/{id}', [AntrianController::class, 'finishAntrian'])->name('antri_selesai');
});