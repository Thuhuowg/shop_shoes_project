<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
Route::get('/login-admin',[AdminController::class,'login'])->name('admin.login');
Route::post('/login-admin',[AdminController::class,'postLogin'])->name('admin.post-login');
Route::get('/register-admin',[AdminController::class,'register'])->name('admin.register');
Route::post('/register-admin',[AdminController::class,'postRegister'])->name('admin.post-register');
Route::get('/logout-admin',[AdminController::class,'logout'])->name('admin.logout');



