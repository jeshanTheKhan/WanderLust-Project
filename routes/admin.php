<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CaroselController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/Admin/Admin-Dashboard', [AdminController::class, 'index'])->name('home');
// Carosel Section
Route::get('/Admin/Add-Carosel', [CaroselController::class, 'index'])->name('add.carosel');
Route::get('/Admin/All-Carosel', [CaroselController::class, 'table'])->name('all.carosel');
Route::post('/Admin/Save-Carosel', [CaroselController::class, 'addSave'])->name('save.carosel');
Route::post('/Admin/Update-status/{id}', [CaroselController::class, 'UpdateStatus'])->name('updateStatus');
Route::get('/Admin/Edit-Carosel/{id}', [CaroselController::class, 'edit'])->name('edit.carosel');
Route::post('/Admin/Update-Carosel', [CaroselController::class, 'update'])->name('update.carosel');
Route::get('/Admin/Delete-Carosel/{id}', [CaroselController::class, 'del'])->name('del.carosel');


// Place Added
Route::get('/Admin/Add-Place', [PlaceController::class, 'index'])->name('add.place');
Route::post('/Admin/Save-Place', [PlaceController::class, 'save'])->name('place.save');
Route::get('/Admin/All-Place', [PlaceController::class, 'table'])->name('all.place');
Route::post('/Admin/Place-status/{id}', [PlaceController::class, 'UpdateStatus'])->name('place.updatestatus');
Route::get('/Admin/Edit-Place/{id}', [PlaceController::class, 'edit'])->name('edit.place');
Route::post('/Admin/Update-Place', [PlaceController::class, 'update'])->name('place.update');
Route::get('/Admin/Delete-Place/{id}', [PlaceController::class, 'del'])->name('del.place');

// Services Section
Route::get('/Admin/Add-Services', [ServiceController::class, 'index'])->name('add.services');
Route::post('/Admin/Save-Service', [ServiceController::class, 'save'])->name('service.save');
Route::get('/Admin/All-Services', [ServiceController::class, 'table'])->name('all.services');
Route::post('/Admin/Service-Update-status/{id}', [ServiceController::class, 'UpdateStatus'])->name('service.updatestatus');
Route::get('/Admin/Edit-Service/{id}', [ServiceController::class, 'edit'])->name('service.edit');
Route::post('/Admin/Update-Services', [ServiceController::class, 'update'])->name('service.update');
Route::get('/Admin/Delete-Service/{id}', [ServiceController::class, 'del'])->name('service.del');

Route::get('/Admin-logout', [AuthenticatedSessionController::class, 'destroy'])
->name('out');

require __DIR__.'/auth.php';