<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{locale}', [LocalizationController::class, 'switch'])->name('lang.switch');
