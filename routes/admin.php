<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
Route::get('/login-admin',[AdminController::class,'login'])->name('admin.login');
Route::post('/login-admin',[AdminController::class,'postLogin'])->name('admin.post-login');
Route::post('/register-admin',[AdminController::class,'postRegister'])->name('admin.post-register');
Route::get('/logout-admin',[AdminController::class,'logout'])->name('admin.logout');
Route::prefix('/statistic')->group(function(){
    Route::get('/inventory',[ProductController::class,'inventory'])->name('admin.inventory');
    Route::get('/revenue',[ProductController::class,'revenue'])->name('admin.revenue');
});
