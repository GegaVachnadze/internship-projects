<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Registration;



Route::get('/', function () {
    return view('welcome');
});



// Route::get('/register', function () {
//     return view("register");
// });


Route::get('/register', [Registration::class, 'ShowRegistrationForm'])->name('register');
Route::post('/register', [Registration::class, 'register']);



Route::get('/auth/google', function () {
    return 'Google Auth flow';
})->name('google.login');


Route::get('/login', function () {
    return view('login');
})->name('login');
