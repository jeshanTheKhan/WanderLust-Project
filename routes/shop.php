<?php

use App\Http\Controllers\Shop\ShopAdminController;
use App\Http\Controllers\Shop\PackageController;
use App\Http\Controllers\Shop\DestinationController;
use App\Http\Controllers\Shop\GuideController;
use App\Http\Controllers\Shop\BlogController;
use App\Http\Controllers\Shop\TestimonialController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/Shop/Admin-Dashboard', [ShopAdminController::class, 'index'])->name('home');

// Package
Route::get('/Shop/Add-Package', [PackageController::class, 'index'])->name('add.package');
Route::post('/Shop/Save-Package', [PackageController::class, 'save'])->name('save.package');
Route::get('/Shop/All-Package', [PackageController::class, 'table'])->name('all.package');
Route::post('/Shop/Package-status/{id}', [PackageController::class, 'UpdateStatus'])->name('package.updatestatus');;
Route::get('/Shop/Edit-Package/{id}', [PackageController::class, 'edit'])->name('package.edit');
Route::post('/Shop/Update-Package', [PackageController::class, 'update'])->name('update.package');
Route::get('/Shop/Delete-Package/{id}', [PackageController::class, 'del'])->name('package.del');

// Destination Section
Route::get('/Shop/Add-Destination', [DestinationController::class, 'index'])->name('add.destination');
Route::post('/Shop/Save-Destination', [DestinationController::class, 'Save'])->name('save.destination');
Route::get('/Shop/All-Destination', [DestinationController::class, 'table'])->name('all.destination');
Route::post('/Shop/Destination-Update-status/{id}', [DestinationController::class, 'UpdateStatus'])->name('destination.updateStatus');
Route::get('/Shop/Destination-Edit/{id}', [DestinationController::class, 'edit'])->name('destination.edit');
Route::post('/Shop/Update-Destination', [DestinationController::class, 'update'])->name('update.destination');
Route::get('/Shop/Destination-Delete/{id}', [DestinationController::class, 'del'])->name('destination.del');

// Blog Section
Route::get('/Shop/Add-Blog', [BlogController::class, 'index'])->name('add.blog');
Route::post('/Shop/Save-Blog', [BlogController::class, 'Save'])->name('save.blog');
Route::get('/Shop/All-Blog', [BlogController::class, 'table'])->name('all.blog');
Route::post('/Shop/blog-status/{id}', [BlogController::class, 'blogUpdateStatus'])->name('blog.updatestatus');
Route::get('/Shop/Edit-blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/Shop/Update-blog', [BlogController::class, 'update'])->name('update.blog');
Route::get('/Shop/Edit-Delete/{id}', [BlogController::class, 'del'])->name('blog.del');

// Guide Section
Route::get('/Shop/Add-Guide', [GuideController::class, 'index'])->name('add.guide');
Route::post('/Shop/Save-Guide', [GuideController::class, 'Save'])->name('save.guide');
Route::get('/Shop/All-Guide', [GuideController::class, 'table'])->name('all.guide');
Route::post('/Shop/Guide-status/{id}', [GuideController::class, 'UpdateStatus'])->name('guide.updatestatus');
Route::get('/Shop/Guide-Edit/{id}', [GuideController::class, 'edit'])->name('guide.edit');
Route::post('/Shop/Update-Guide', [GuideController::class, 'update'])->name('update.guide');
Route::get('/Shop/Guide-Delete/{id}', [GuideController::class, 'del'])->name('guide.del');

// Testimonial
Route::get('/Shop/Add-testimonial', [TestimonialController::class, 'index'])->name('add.testimonial');
Route::post('/Shop/Save-testimonial', [TestimonialController::class, 'Save'])->name('save.testimonial');
Route::get('/Shop/All-testimonial', [TestimonialController::class, 'table'])->name('all.testimonial');
Route::post('/Shop/testimonial-Update-status/{id}', [TestimonialController::class, 'UpdateStatus'])->name('testimonial.updatestatus');
Route::get('/Shop/Edit-testimonial/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
Route::post('/Shop/Update-testimonial', [TestimonialController::class, 'update'])->name('update.testimonial');
Route::get('/Shop/Delete-testimonial/{id}', [TestimonialController::class, 'del'])->name('testimonial.del');

Route::middleware('auth')->group(function () {
    Route::get('/Shop/profile', [ShopAdminController::class, 'edit'])->name('profile.edit');
    Route::post('/Shop/profile', [ShopAdminController::class, 'upload'])->name('profile.upload');
    Route::delete('/Shop/profile', [ShopAdminController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/Shop-logout', [AuthenticatedSessionController::class, 'destroy'])
->name('out');