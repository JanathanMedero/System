<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleOrderController;
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

    //Orden de venta
    Route::get('nueva-orden-de-venta/{slug}', [SaleOrderController::class, 'create'])->name('saleOrder.create');
    Route::get('ordenes-de-venta', [SaleOrderController::class, 'index'])->name('saleOrder.index');
    Route::post('venta-completada/{slug}', [SaleOrderController::class, 'store'])->name('saleOrder.store');
    Route::get('orden-de-venta/{id}', [SaleOrderController::class, 'edit'])->name('saleOrder.edit');
    Route::put('orden-de-venta/producto/{slug}', [SaleOrderController::class, 'update'])->name('saleOrder.update');
    Route::get('orden-de-venta/producto/{slug}', [SaleOrderController::class, 'show_product'])->name('saleOrder.showProduct');
    Route::post('orden-de-venta/{id}/nuevo-producto', [SaleOrderController::class, 'add_product'])->name('saleOrder.addProduct');

});
