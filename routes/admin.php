<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CaroselController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/Admin-Dashboard', [AdminController::class, 'index'])->name('home');
// Carosel Section
Route::get('/Add-Carosel', [CaroselController::class, 'index'])->name('add.carosel');
Route::get('/All-Carosel', [CaroselController::class, 'table'])->name('all.carosel');
Route::post('/All-Carosel', [CaroselController::class, 'addSave'])->name('save.carosel');
Route::post('/Update-status/{id}', [CaroselController::class, 'UpdateStatus'])->name('updateStatus');
Route::get('/Edit-Carosel/{id}', [CaroselController::class, 'edit'])->name('edit.carosel');
Route::post('/Update-Carosel', [CaroselController::class, 'update'])->name('update.carosel');
Route::get('/Delete-Carosel/{id}', [CaroselController::class, 'del'])->name('del.carosel');

Route::get('/Admin-logout', [AuthenticatedSessionController::class, 'destroy'])
->name('out');

require __DIR__.'/auth.php';