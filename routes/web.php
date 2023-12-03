<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});
Route::get('/home', function(){
    return view('layoutClient.fe');
});
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
    Route::get('/list-categories',[\App\Http\Controllers\CategoryController::class,'index'])->name('list.categories');
    Route::get('/list-size',[ProductController::class,'list_size'])->name('list.sizes');
    Route::get('/list-type',[ProductController::class,'list_types'])->name('list.types');
    Route::get('/list-product',[ProductController::class,'index_admin'])->name('list.products');
    Route::get('/list-product-quantity',[ProductController::class,'list_quantities'])->name('list.quantities');
});
Route::middleware('admin')->group(function () {
    Route::get('/add-category',[\App\Http\Controllers\CategoryController::class,'create'])->name('add.category');
    Route::post('/add-category',[\App\Http\Controllers\CategoryController::class,'store'])->name('post-add.category');
    Route::get('/add-size',[ProductController::class,'add_size'])->name('add.size');
    Route::post('/add-size',[ProductController::class,'post_add_size'])->name('post-add.size');
    Route::get('/add-type',[ProductController::class,'create_type'])->name('add.type');
    Route::post('/add-type',[ProductController::class,'post_create_type'])->name('post-add.type');
    Route::get('/add-product',[ProductController::class,'create'])->name('add.product');
    Route::post('/add-product',[ProductController::class,'store'])->name('post-add.product');
    Route::get('/add-quantity',[ProductController::class,'create_quantity'])->name('add.quantity');
    Route::post('/add-quantity',[ProductController::class,'store_quantity'])->name('post-add.quantity');
});
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
