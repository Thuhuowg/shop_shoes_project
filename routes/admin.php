<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\OrderController;

use Illuminate\Support\Facades\Route;
Route::get('/login-admin',[AdminController::class,'login'])->name('admin.login');
Route::post('/login-admin',[AdminController::class,'postLogin'])->name('admin.post-login');
Route::get('/register-admin',[AdminController::class,'register'])->name('admin.register');
Route::post('/register-admin',[AdminController::class,'postRegister'])->name('admin.post-register');
Route::get('/logout-admin',[AdminController::class,'logout'])->name('admin.logout');
Route::prefix('/statistic')->group(function(){
    Route::get('/inventory',[ProductController::class,'inventory'])->name('admin.inventory');
    Route::get('/revenue',[ProductController::class,'revenue'])->name('admin.revenue');
});


Route::prefix('/order')->group(function(){
    Route::get('/list',[OrderController::class,'index'])->name('admin.order.list');
    Route::get('/changeStatus/{transaction_id}/{status}',[OrderController::class,'changeStatus'])->name('admin.order.changeStatus');
    Route::get('/detail/{transaction_id}',[OrderController::class,'detail'])->name('admin.order.detail');
});
