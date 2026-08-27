<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ka', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');


Route::get('/debug-lang', function () {
    return response()->json([
        'current_locale' => app()->getLocale(),
        'lang_path' => lang_path(),
        'ka_file_exists' => file_exists(lang_path('ka.json')),
        'translation_test' => __('Register'),
    ]);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/auth/google', function () {
    return 'Google Auth flow';
})->name('google.login');

Route::get('/login', function () {
    return view('login');
})->name('login');
