<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('loginIn');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


//dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

//userlist
Route::get('/userlist', [Usercontroller::class, 'list'])->name('users.list');
Route::get('/users/create', [Usercontroller::class, 'create'])->name('users.create');
Route::post('/users/store', [Usercontroller::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [Usercontroller::class, 'edit'])->name('users.edit');
Route::post('/users/update/{id}', [Usercontroller::class, 'update'])->name('users.update');
Route::post('/users/delete/{id}', [Usercontroller::class, 'delete'])->name('users.delete'); 

//bloglist
Route::get('/blogs', [Usercontroller::class, 'bloglist'])->name('blogs.list');
Route::get('/blogs/create', [Usercontroller::class, 'blogcreate'])->name('blogs.create');
Route::post('/blogs/store', [Usercontroller::class, 'blogstore'])->name('blogs.store');
Route::get('/blogs/edit/{id}', [Usercontroller::class, 'blogedit'])->name('blogs.edit');
Route::post('/blogs/update/{id}', [Usercontroller::class, 'blogupdate'])->name('blogs.update');
Route::post('/blogs/delete/{id}', [Usercontroller::class, 'blogdelete'])->name('blogs.delete'); 

