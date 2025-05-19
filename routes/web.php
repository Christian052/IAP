<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'ShowHome'])->name('Home');







Route::get('/admin/dashboard',[AdminController::class, 'Dashboard'])->name('Admin.Dashboard');

Route::get('/admin/events',[AdminController::class, 'Events'])->name('Admin.Events');

Route::get('/admin/events/create',[AdminController::class, 'EventsCreate'])->name('Admin.Events.Create');

Route::post('/admin/events/store',[AdminController::class, 'EventStore'])->name('Admin.Events.Store');

Route::get('/admin/events/{id}/edit', [AdminController::class, 'edit'])->name('admin.events.edit');

Route::delete('/admin/events/{id}', [AdminController::class, 'destroy'])->name('admin.events.destroy');
