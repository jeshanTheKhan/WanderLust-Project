<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModerateProfileController;
use App\Http\Controllers\Moderator\ModerateAdminController;
use App\Http\Controllers\Moderator\CaroselController;
use App\Http\Controllers\Moderator\PlaceController;
use App\Http\Controllers\Moderator\ServiceController;
use App\Http\Controllers\Moderator\PackageController;
use App\Http\Controllers\Moderator\DestinationController;
use App\Http\Controllers\Moderator\GuideController;
use App\Http\Controllers\Moderator\BlogController;
use App\Http\Controllers\Moderator\TestimonialController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/Moderator/Admin-Dashboard', [ModerateAdminController::class, 'index'])->name('home');

// Place Added
Route::get('/Moderator/Add-Place', [PlaceController::class, 'index'])->name('add.place');
Route::post('/Moderator/Save-Place', [PlaceController::class, 'save'])->name('place.save');
Route::get('/Moderator/All-Place', [PlaceController::class, 'table'])->name('all.place');
Route::post('/Moderator/Place-status/{id}', [PlaceController::class, 'UpdateStatus'])->name('place.updatestatus');
Route::get('/Moderator/Edit-Place/{id}', [PlaceController::class, 'edit'])->name('edit.place');
Route::post('/Moderator/Update-Place', [PlaceController::class, 'update'])->name('place.update');
Route::get('/Moderator/Delete-Place/{id}', [PlaceController::class, 'del'])->name('del.place');

// Carosel Section
Route::get('/Moderator/Add-Carosel', [CaroselController::class, 'index'])->name('add.carosel');
Route::post('/Moderator/Save-Carosel', [CaroselController::class, 'addSave'])->name('save.carosel');
Route::get('/Moderator/All-Carosel', [CaroselController::class, 'table'])->name('all.carosel');
Route::post('/Moderator/Update-status/{id}', [CaroselController::class, 'UpdateStatus'])->name('updateStatus');
Route::get('/Moderator/Edit-Carosel/{id}', [CaroselController::class, 'edit'])->name('edit.carosel');
Route::post('/Moderator/Update-Carosel', [CaroselController::class, 'update'])->name('update.carosel');
Route::get('/Moderator/Delete-Carosel/{id}', [CaroselController::class, 'del'])->name('del.carosel');

// Services Section
Route::get('/Moderator/Add-Services', [ServiceController::class, 'index'])->name('add.services');
Route::post('/Moderator/Save-Service', [ServiceController::class, 'save'])->name('service.save');
Route::get('/Moderator/All-Services', [ServiceController::class, 'table'])->name('all.services');
Route::post('/Moderator/Service-Update-status/{id}', [ServiceController::class, 'UpdateStatus'])->name('service.updatestatus');
Route::get('/Moderator/Edit-Service/{id}', [ServiceController::class, 'edit'])->name('service.edit');
Route::post('/Moderator/Update-Services', [ServiceController::class, 'update'])->name('service.update');
Route::get('/Moderator/Delete-Service/{id}', [ServiceController::class, 'del'])->name('service.del');

// Package
Route::get('/Moderator/Add-Package', [PackageController::class, 'index'])->name('add.package');
Route::post('/Moderator/Save-Package', [PackageController::class, 'save'])->name('save.package');
Route::get('/Moderator/All-Package', [PackageController::class, 'table'])->name('all.package');
Route::post('/Moderator/Package-status/{id}', [PackageController::class, 'UpdateStatus'])->name('package.updatestatus');
Route::get('/Moderator/Edit-Package/{id}', [PackageController::class, 'edit'])->name('package.edit');
Route::post('/Moderator/Update-Package', [PackageController::class, 'update'])->name('update.package');
Route::get('/Moderator/Delete-Package/{id}', [PackageController::class, 'del'])->name('package.del');

// Destination Section
Route::get('/Moderator/Add-Destination', [DestinationController::class, 'index'])->name('add.destination');
Route::post('/Moderator/Save-Destination', [DestinationController::class, 'Save'])->name('save.destination');
Route::get('/Moderator/All-Destination', [DestinationController::class, 'table'])->name('all.destination');
Route::post('/Moderator/Destination-Update-status/{id}', [DestinationController::class, 'UpdateStatus'])->name('destination.updateStatus');
Route::get('/Moderator/Destination-Edit/{id}', [DestinationController::class, 'edit'])->name('destination.edit');
Route::post('/Moderator/Update-Destination', [DestinationController::class, 'update'])->name('update.destination');
Route::get('/Moderator/Destination-Delete/{id}', [DestinationController::class, 'del'])->name('destination.del');

// Guide Section
Route::get('/Moderator/Add-Guide', [GuideController::class, 'index'])->name('add.guide');
Route::post('/Moderator/Save-Guide', [GuideController::class, 'Save'])->name('save.guide');
Route::get('/Moderator/All-Guide', [GuideController::class, 'table'])->name('all.guide');
Route::post('/Moderator/Guide-status/{id}', [GuideController::class, 'UpdateStatus'])->name('guide.updatestatus');
Route::get('/Moderator/Guide-Edit/{id}', [GuideController::class, 'edit'])->name('guide.edit');
Route::post('/Moderator/Update-Guide', [GuideController::class, 'update'])->name('update.guide');
Route::get('/Moderator/Guide-Delete/{id}', [GuideController::class, 'del'])->name('guide.del');

// Blog Section
Route::get('/Moderator/Add-Blog', [BlogController::class, 'index'])->name('add.blog');
Route::post('/Moderator/Save-Blog', [BlogController::class, 'Save'])->name('save.blog');
Route::get('/Moderator/All-Blog', [BlogController::class, 'table'])->name('all.blog');
Route::post('/Moderator/blog-status/{id}', [BlogController::class, 'blogUpdateStatus'])->name('blog.updatestatus');
Route::get('/Moderator/Edit-blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/Moderator/Update-blog', [BlogController::class, 'update'])->name('update.blog');
Route::get('/Moderator/Edit-Delete/{id}', [BlogController::class, 'del'])->name('blog.del');

// Testimonial
Route::get('/Moderator/Add-testimonial', [TestimonialController::class, 'index'])->name('add.testimonial');
Route::post('/Moderator/Save-testimonial', [TestimonialController::class, 'Save'])->name('save.testimonial');
Route::get('/Moderator/All-testimonial', [TestimonialController::class, 'table'])->name('all.testimonial');
Route::post('/Moderator/testimonial-Update-status/{id}', [TestimonialController::class, 'UpdateStatus'])->name('testimonial.updatestatus');
Route::get('/Moderator/Edit-testimonial/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
Route::post('/Moderator/Update-testimonial', [TestimonialController::class, 'update'])->name('update.testimonial');
Route::get('/Moderator/Delete-testimonial/{id}', [TestimonialController::class, 'del'])->name('testimonial.del');


Route::middleware('auth')->group(function () {
    Route::get('/Moderator/profile', [ModerateProfileController::class, 'moderator_edit'])->name('profile.edit');
    Route::post('/Moderator/profile', [ModerateProfileController::class, 'moderator_upload'])->name('profile.upload');
});

Route::get('/Moderator-logout', [AuthenticatedSessionController::class, 'destroy'])
->name('out');