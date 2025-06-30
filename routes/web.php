<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

// Authentication routes
Route::middleware('auth')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create/{schedule}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings/{schedule}', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('movies', App\Http\Controllers\Admin\MovieController::class);
    Route::resource('cinemas', App\Http\Controllers\Admin\CinemaController::class);
    Route::resource('theaters', App\Http\Controllers\Admin\TheaterController::class);
    // Route resource lain bisa ditambahkan di sini (schedules, users)
});

require __DIR__.'/auth.php';
