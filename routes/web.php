<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\QuantityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', function(){
    return view('layoutClient.fe');
})->name('home');
Route::get('/product',[ProductController::class,'index'])->name('client.products');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//admin route
Route::middleware('admin')->group(function () {
    Route::get('/homes',function () {
        return view('admin.home');
    })->name('admin');
    Route::get('/info',[\App\Http\Controllers\AdminController::class,'index'])->name('info');
    Route::get('/list-categories',[CategoryController::class,'index'])->name('list.categories');
    Route::get('/list-size',[SizeController::class,'index'])->name('list.sizes');
    Route::get('/list-type',[TypeController::class,'index'])->name('list.types');
    Route::get('/list-product',[ProductController::class,'index_admin'])->name('list.products');
    Route::get('/list-product-quantity',[QuantityController::class,'index'])->name('list.quantities');
    Route::get('/list-banners',[\App\Http\Controllers\BannerController::class,'index'])->name('list.banners');
});
Route::middleware('admin')->group(function () {
    Route::get('/add-category',[CategoryController::class,'create'])->name('add.category');
    Route::post('/add-category',[CategoryController::class,'store'])->name('post-add.category');
    Route::get('/add-size',[SizeController::class,'create'])->name('add.size');
    Route::post('/add-size',[SizeController::class,'store'])->name('post-add.size');
    Route::get('/add-type',[TypeController::class,'create'])->name('add.type');
    Route::post('/add-type',[TypeController::class,'store'])->name('post-add.type');
    Route::get('/add-product',[ProductController::class,'create'])->name('add.product');
    Route::post('/add-product',[ProductController::class,'store'])->name('post-add.product');
    Route::get('/add-quantity',[QuantityController::class,'create'])->name('add.quantity');
    Route::post('/add-quantity',[QuantityController::class,'store'])->name('post-add.quantity');
    Route::get('/add-banner',[\App\Http\Controllers\BannerController::class,'create'])->name('add.banner');
    Route::post('/add-banner',[\App\Http\Controllers\BannerController::class,'store'])->name('post-add.banner');
});
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
