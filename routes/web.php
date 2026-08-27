<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/register', function () {
    return view("register");
});


Route::get('/register', [RegisterController::class, 'ShowRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



Route::get('/auth/google', function () {
    return 'Google Auth flow';
})->name('google.login');


Route::get('/login', function () {
    return view('login');
})->name('login');
