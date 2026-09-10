<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\AuthController;
use Illuminate\View\View;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GoogleAuthController;

Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])
    ->name('google.callback');

Route::post('/logout', [LogOutController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'visit'])->name('profile.edit');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::match(['put', 'patch'], '/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/task-details/{id}', [TaskController::class, 'show'])->name('tasks.show');

Route::get('/profile', [ProfileController::class, 'visit'])->name('profile');
Route::get('/my-tasks', [TaskController::class, 'myTasks'])->name('mytasks');
Route::get('/', [RegisterController::class, 'showRegistrationForm'])->name('home');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/authorize', [AuthController::class, 'showLogin'])->name('authorize');
Route::post('/authorize', [AuthController::class, 'login'])->name('login.submit');

Route::get('/forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

Route::get('lang/{locale}', [LocalizationController::class, 'switch'])->name('lang.switch');

Route::get('/admin-panel', [TaskController::class, 'showAssignments'])->name('admin.panel');

Route::get('/due-tasks', [TaskController::class, 'showPage'])->name('tasks.due-tasks');
Route::delete('/due-tasks/clear-old', [TaskController::class, 'clearOldTasks'])->name('tasks.clearOld');
Route::delete('/due-tasks/{id}', [TaskController::class, 'clearTask'])->name('tasks.clearSingle');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
