<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// GET ROUTE
Route::get('/login', function () {
    return view('login_admin');
});
Route::get('/user', [AntrianController::class, 'index']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// POST ROUTE
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/user/antri', [AntrianController::class, 'addAntrian'])->name('antri');