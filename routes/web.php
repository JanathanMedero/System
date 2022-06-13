<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\ControlAccessMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');

    //Empleados
    Route::get('empleados', [EmployeController::class, 'index'])->middleware(ControlAccessMiddleware::class)->name('employe.index');
    Route::post('empleado', [EmployeController::class, 'store'])->name('employe.store');
    Route::put('empleado/{id}/eliminado', [EmployeController::class, 'suspend_account'])->name('employe.suspend');
    Route::put('empleado/{id}/actualizado', [EmployeController::class, 'update'])->name('employe.update');

    //Clientes
    Route::get('clientes', [ClientController::class, 'index'])->name('client.index');
    Route::post('cliente', [ClientController::class, 'store'])->name('client.store');
    Route::put('cliente/{slug}/actualizado', [ClientController::class, 'update'])->name('client.update');

    //servicios
    Route::get('servicio/{slug}', [ServiceController::class, 'all_services'])->name('service.all');

});
