<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Blogcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('loginIn');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [AuthController::class, 'showregister'])->name('showregister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');



//dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

//userlist
Route::get('/userlist', [Usercontroller::class, 'list'])->name('users.list');
Route::get('/users/create', [Usercontroller::class, 'create'])->name('users.create');
Route::post('/users/store', [Usercontroller::class, 'store'])->name('users.store');
Route::get('/users/edit/{user_id}', [Usercontroller::class, 'edit'])->name('users.edit');
Route::post('/users/update/{user_id}', [Usercontroller::class, 'update'])->name('users.update');
Route::post('/users/delete/{user_id}', [Usercontroller::class, 'delete'])->name('users.delete'); 

//bloglist
Route::get('/blogs', [Blogcontroller::class, 'bloglist'])->name('blogs.list');
Route::get('/blogs/create', [Blogcontroller::class, 'blogcreate'])->name('blogs.create');
Route::post('/blogs/store', [Blogcontroller::class, 'blogstore'])->name('blogs.store');
Route::get('/blogs/show/{id}', [Blogcontroller::class, 'blogshow'])->name('blogs.show');
// Route::post('/blogs/update/{id}', [Blogcontroller::class, 'blogupdate'])->name('blogs.update');
// Route::post('/blogs/delete/{id}', [Blogcontroller::class, 'blogdelete'])->name('blogs.delete'); 

