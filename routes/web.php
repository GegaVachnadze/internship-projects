<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/welcome', [WelcomeController::class, 'showWelcomePage'])->name('welcome');
Route::get('/register', [RegisterController::class, 'showRegisterPage'])->name('register');
Route::get('lang/{locale}', [LocalizationController::class, 'switch'])->name('lang.switch');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
