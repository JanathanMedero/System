<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');

    //Sistema de ordenes
    Route::get('empleados', [EmployeController::class, 'index'])->name('employe.index');

});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
