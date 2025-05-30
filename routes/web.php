<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*========================== User all Routes ==========================*/
Route::get('/', [UserController::class, 'ShowHome'])->name('Home');
Route::get('/userprofile', [UserController::class, 'UserProfile'])->name('Profile');
Route::get('/book', [UserController::class,'book'])->name('book');
Route::get('/signin' , [UserController::class,'signIn'])->name('signin');
Route::post('/signin' , [UserController::class,'signIn'])->name('signin.store');
Route::get('/signin/password.request' , [UserController::class,'password.request'])->name('password.request');
Route::get('/signup' , [UserController::class,'signup'])->name('signup');
Route::post('/signup', [UserController::class, 'register'])->name('signup.store');
Route::get('/contactUs',[UserController::class, 'contactUs'])->name('contactUs');







/*========================== Admin all Routes ==========================*/

Route::get('/admin/dashboard',[AdminController::class, 'Dashboard'])->name('Admin.Dashboard');

Route::get('/admin/events',[AdminController::class, 'Events'])->name('Admin.Events');

Route::get('/admin/events/create',[AdminController::class, 'EventsCreate'])->name('Admin.Events.Create');

Route::post('/admin/events/store',[AdminController::class, 'EventStore'])->name('Admin.Events.Store');

Route::get('/admin/events/{id}/edit', [AdminController::class, 'edit'])->name('admin.events.edit');

Route::delete('/admin/events/{id}', [AdminController::class, 'destroy'])->name('admin.events.destroy');

Route::put('/admin/events/{event}', [AdminController::class, 'update'])->name('Admin.Events.Update');
