<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');

});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
