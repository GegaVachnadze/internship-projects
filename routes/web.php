<?php

use App\Http\Controllers\DueTasksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeleteTableController;
use Illuminate\View\View;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\TaskAddController;
use App\Http\Controllers\EditTaskController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/authorize', [AuthController::class, 'showLogin'])->name('authorize');
Route::post('/authorize', [AuthController::class, 'login'])->name('login.submit');

Route::get('/forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

Route::get('lang/{locale}', [LocalizationController::class, 'switch'])->name('lang.switch');

Route::get('/admin-panel', [TaskAddController::class, 'showAssignments'])->name('admin.panel');

Route::get('/due-tasks', [DueTasksController::class, 'showPage'])->name('tasks.due-tasks');
Route::delete('/due-tasks/clear-old', [DueTasksController::class, 'clearOldTasks'])->name('tasks.clearOld');
Route::delete('/due-tasks/{id}', [DeleteTableController::class, 'clearTask'])->name('tasks.clearSingle');

Route::get('/tasks', [TaskAddController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskAddController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskAddController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}', [TaskAddController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{id}/edit', [EditTaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [EditTaskController::class, 'update'])->name('tasks.update');

Route::get('/auth/google', function (): View {
    return view('google.login');
})->name('google.login');
