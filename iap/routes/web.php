<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'ShowHome'])->name('home');
Route::get('/admin/dashboard',[AdminController::class, 'Dashboard'])->name('Admin.Dashboard');
Route::get('/admin/events',[AdminController::class, 'Events'])->name('Admin.Events');