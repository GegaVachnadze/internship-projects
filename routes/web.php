<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\AuthController;

Route::get('/lang/{lang}', function (string $lang): RedirectResponse {
    if (in_array($lang, ['en', 'ka'])) {
        session()->put('locale', $lang);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/auth/google', function () {
    return 'Google Auth flow';
})->name('google.login');

Route::get('/authorize', function () {
    return view('authorize');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/recover-password', function () {
    return view('recover-password');
});

Route::get('/authorize', [AuthController::class, 'showLogin']);
Route::post('/authorize', [AuthController::class, 'login'])->name('login.submit');
