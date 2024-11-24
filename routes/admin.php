<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CaroselController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\BlogController;
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

// User Section
Route::get('/Admin/Add-User', [AdminController::class, 'user_index'])->name('add.user');
Route::post('/Admin/Save-User', [AdminController::class, 'save'])->name('user.save');
Route::get('/Admin/All-User', [AdminController::class, 'table'])->name('all.user');
Route::post('/Admin/USer-status/{id}', [AdminController::class, 'UpdateStatus'])->name('user.updatestatus');
Route::get('/Admin/Edit-User/{id}', [AdminController::class, 'edit'])->name('user.edit');

// User_Type
Route::get('/Admin/Add-User-Type', [AdminController::class, 'type_index'])->name('add.user_rule');
Route::post('/Admin/Save-user_role', [AdminController::class, 'user_role'])->name('save.user_role');

// Package
Route::get('/Admin/Add-Package', [PackageController::class, 'index'])->name('add.package');
Route::post('/Admin/Save-Package', [PackageController::class, 'save'])->name('save.package');
Route::get('/Admin/All-Package', [PackageController::class, 'table'])->name('all.package');
Route::post('/Admin/Package-status/{id}', [PackageController::class, 'UpdateStatus'])->name('package.updatestatus');
Route::get('/Admin/Edit-Package/{id}', [PackageController::class, 'edit'])->name('package.edit');
Route::post('/Admin/Update-Package', [PackageController::class, 'update'])->name('update.package');
Route::get('/Admin/Delete-Package/{id}', [PackageController::class, 'del'])->name('package.del');

// Destination Section
Route::get('/Admin/Add-Destination', [DestinationController::class, 'index'])->name('add.destination');
Route::post('/Admin/Save-Destination', [DestinationController::class, 'Save'])->name('save.destination');
Route::get('/Admin/All-Destination', [DestinationController::class, 'table'])->name('all.destination');
Route::post('/Admin/Destination-Update-status/{id}', [DestinationController::class, 'UpdateStatus'])->name('destination.updateStatus');
Route::get('/Admin/Destination-Edit/{id}', [DestinationController::class, 'edit'])->name('destination.edit');
Route::post('/Admin/Update-Destination', [DestinationController::class, 'update'])->name('update.destination');
Route::get('/Admin/Destination-Delete/{id}', [DestinationController::class, 'del'])->name('destination.del');

// Guide Section
Route::get('/Admin/Add-Guide', [GuideController::class, 'index'])->name('add.guide');
Route::post('/Admin/Save-Guide', [GuideController::class, 'Save'])->name('save.guide');
Route::get('/Admin/All-Guide', [GuideController::class, 'table'])->name('all.guide');
Route::post('/Admin/Guide-status/{id}', [GuideController::class, 'UpdateStatus'])->name('guide.updatestatus');
Route::get('/Admin/Guide-Edit/{id}', [GuideController::class, 'edit'])->name('guide.edit');
Route::post('/Admin/Update-Guide', [GuideController::class, 'update'])->name('update.guide');
Route::get('/Admin/Guide-Delete/{id}', [GuideController::class, 'del'])->name('guide.del');

// Blog Section
Route::get('/Admin/Add-Blog', [BlogController::class, 'index'])->name('add.blog');
Route::post('/Admin/Save-Blog', [BlogController::class, 'Save'])->name('save.blog');
Route::get('/Admin/All-Blog', [BlogController::class, 'table'])->name('all.blog');


Route::get('/Admin-logout', [AuthenticatedSessionController::class, 'destroy'])
->name('out');

require __DIR__.'/auth.php';