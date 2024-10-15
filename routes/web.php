<?php

use App\Http\Controllers\customerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
return view('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home');

    // Edit User Routes
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');

    // Delete User Route
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('users/export/', [UserController::class, 'export'])->name('users.export');

    // Logout Route
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

// Authentication Routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::view('/login', 'login')->name('login.view');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('customer/import', [customerController::class, 'index'])->name('index');
    Route::post('customer/import', [customerController::class, 'importExcelData'])->name('customer.import');
});