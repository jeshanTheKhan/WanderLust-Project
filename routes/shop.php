<?php

use App\Http\Controllers\Shop\ShopAdminController;
use App\Http\Controllers\Shop\PackageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/Shop/Admin-Dashboard', [ShopAdminController::class, 'index'])->name('home');

// Package
Route::get('/Shop/Add-Package', [PackageController::class, 'index'])->name('add.package');
Route::post('/Shop/Save-Package', [PackageController::class, 'save'])->name('save.package');
Route::get('/Shop/All-Package', [PackageController::class, 'table'])->name('all.package');
Route::post('/Shop/Package-status/{id}', [PackageController::class, 'UpdateStatus'])->name('package.updatestatus');;
Route::post('/Shop/Update-Package', [PackageController::class, 'update'])->name('update.package');
Route::get('/Shop/Delete-Package/{id}', [PackageController::class, 'del'])->name('package.del');


Route::get('/Shop-logout', [AuthenticatedSessionController::class, 'destroy'])
->name('out');