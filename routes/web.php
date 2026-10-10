<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// ===== PUBLIC =====
Route::get('/', function () {
    return view('portofolio');
});

Route::get('/portofolio', function () {
    return view('portofolio');
});

Route::get('/project/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// ===== AUTH =====
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// ===== ADMIN (WAJIB LOGIN + WAJIB ADMIN) =====
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => redirect()->route('admin.projects.index'));

    Route::resource('projects', ProjectController::class)->except(['show']);
});

// ===== REGISTER (dari Breeze) =====
Route::get('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);