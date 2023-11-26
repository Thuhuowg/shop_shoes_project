<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
Route::get('/login',[AdminController::class,'login'])->name('admin.login');
Route::post('/login',[AdminController::class,'postLogin'])->name('admin.post-login');
Route::get('/register',[AdminController::class,'register'])->name('admin.register');
Route::post('/register',[AdminController::class,'postRegister'])->name('admin.post-register');
Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::get('/homes',function () {
    return view('admin.home');
})->name('admin');


