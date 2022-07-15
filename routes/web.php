<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SaleOrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\ServiceOrderSiteController;
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
    Route::put('orden-de-venta/{id}/actualizada', [SaleOrderController::class, 'update_order'])->name('saleOrder.update.order');
    Route::put('orden-de-venta/anticipo/{id}', [SaleOrderController::class, 'add_advance'])->name('saleOrder.update.advance');
    Route::get('orden-de-venta/producto/{slug}', [SaleOrderController::class, 'show_product'])->name('saleOrder.showProduct');
    Route::post('orden-de-venta/{id}/nuevo-producto', [SaleOrderController::class, 'add_product'])->name('saleOrder.addProduct');
    Route::delete('orden-de-venta/producto/{slug}/eliminado', [SaleOrderController::class, 'destroy_product'])->name('saleOrder.destroyProduct');
    Route::post('orden-de-venta/{id}/cancelada', [SaleOrderController::class, 'update_status'])->name('saleOrder.updateStatus');

    //Orden de servicio
    Route::get('nueva-orden-de-servicio/{slug}', [ServiceOrderController::class, 'create'])->name('serviceOrder.create');
    Route::post('nueva-orden-de-servicio/{slug}', [ServiceOrderController::class, 'store'])->name('serviceOrder.store');
    Route::get('ordenes-de-servicio', [ServiceOrderController::class, 'index'])->name('serviceOrder.index');
    Route::get('orden-de-servicio/{id}', [ServiceOrderController::class, 'show'])->name('serviceOrder.show');
    Route::put('orden-de-servicio/{id}', [ServiceOrderController::class, 'update'])->name('serviceOrder.update');
    Route::post('orden-de-servicio/{id}/cancelada', [ServiceOrderController::class, 'update_status'])->name('serviceOrder.updateStatus');
    Route::post('orden-de-servicio/{id}/reporte-tecnico', [ServiceOrderController::class, 'report'])->name('serviceOrder.report');
    Route::put('orden-de-servicio/{id}/reporte-tecnico-editado', [ServiceOrderController::class, 'report_update'])->name('serviceOrder.reportUpdate');

    //Orden de servicio en sitio
    Route::get('ordenes-de-servicio-en-sitio', [ServiceOrderSiteController::class, 'index'])->name('serviceSite.index');
    Route::get('nueva-ordenes-de-servicio-en-sitio/{slug}', [ServiceOrderSiteController::class, 'create'])->name('serviceSite.create');
    Route::get('orden-de-servicio-en-sitio/{slug}', [ServiceOrderSiteController::class, 'show'])->name('serviceSite.show');
    Route::post('nueva-ordenes-de-servicio-en-sitio/{slug}', [ServiceOrderSiteController::class, 'store'])->name('serviceSite.store');
    Route::put('orden-de-servicio-en-sitio/anticipo/{id}', [ServiceOrderSiteController::class, 'add_advance'])->name('siteOrder.update.advance');
    Route::post('orden-de-servicio-en-sitio/{id}/nuevo-servicio', [ServiceOrderSiteController::class, 'add_service'])->name('siteOrder.addService');
    Route::post('orden-de-servicio-en-sitio/{id}/cancelada', [ServiceOrderSiteController::class, 'update_status'])->name('siteOrder.updateStatus');
    Route::put('orden-de-servicio-en-sitio/{id}/datos-actualizados', [ServiceOrderSiteController::class, 'update'])->name('siteOrder.update');
    Route::put('orden-de-servicio-en-sitio/servicio/{id}/datos-actualizados', [ServiceOrderSiteController::class, 'update_service'])->name('siteOrder.updateService');
    Route::delete('orden-de-servicio-en-sitio/servicio/{id}/eliminado', [ServiceOrderSiteController::class, 'destroy_service'])->name('siteOrder.destroyService');

    //PDF
    Route::get('orden-de-venta/{id}/PDF', [PDFController::class, 'saleOrder'])->name('pdf.saleOrder');
    Route::get('orden-de-servicio/{id}/PDF', [PDFController::class, 'serviceOrder'])->name('pdf.serviceOrder');
    Route::get('orden-de-servicio-en-sitio/{id}/PDF', [PDFController::class, 'serviceOnSite'])->name('pdf.serviceOnSite');

});
