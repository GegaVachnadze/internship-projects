<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;

Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['ka', 'en'])) {
        session()->put('locale', $lang);
    }
    return redirect()->back();
})->name('lang.switch');




Route::get('/test-lang', function () {
    return __('validation.required', ['attribute' => 'username']);
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/auth/google', function () {
    return 'Google Auth flow';
})->name('google.login');

Route::get('/login', function () {
    return view('login');
})->name('login');
