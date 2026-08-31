<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\AuthController;
use Illuminate\View\View;

Route::get('/lang/{lang}', function (string $lang): RedirectResponse {
    if (in_array($lang, ['en', 'ka'])) {
        session()->put('locale', $lang);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/authorize', [AuthController::class, 'showLogin'])->name('authorize');
Route::post('/authorize', [AuthController::class, 'login'])->name('login.submit');

Route::get('/forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

Route::get('/auth/google', function () {
    return 'Google Auth flow';
})->name('google.login');


Route::get('/authorize', function (): View {
    return view('authorize');
});


Route::get('/forgot-password', function (): View {
    return view('/forgot-password');
});

Route::get('/reset-password', function (): View {
    return view('reset-password');
});

Route::get('/welcome', function (): View {
    return view('welcome');
});
