<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\QuantityController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;

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
Route::get('/trang-chu',[ProductController::class,'home'])->name('home');
Route::get('/product',[ProductController::class,'index'])->name('client.products');
Route::get('/danh-muc-san-pham/{name}',[CategoryController::class,'show'])->name('client.category');
Route::get('/danh-muc/{name}/loai/{slug}',[TypeController::class,'show'])->name('client.type');

Route::get('/test',function (){

    $orders=\App\Models\Order::all();
    foreach ($orders as $order){
        $quantity=DB::table('product_sizes')->where(['product_id'=>$order->product_id,'size_id'=>$order->size_id])->first();

        var_dump($quantity);
        DB::table('product_sizes')->where(['product_id'=>$order->product_id,'size_id'=>$order->size_id])
            ->update([
                'product_id'=>$order->product_id,
                'size_id'=>$order->size_id,
                'quantity'=>\App\Helpers\function\minus($quantity->quantity,$order->quantity)
                    //($quantity->quantity - $order->quantity)
            ]);
    }
    return view('welcome');
});
Route::get('/product-detail/{slug}',[ProductController::class,'show'])->name('product_detail');
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
    Route::get('/list-admin',[\App\Http\Controllers\AdminController::class,'list'])->name('list.admin');
    Route::get('/list-client',[\App\Http\Controllers\UserController::class,'index'])->name('list.client');
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
    Route::get('/register-admin',[\App\Http\Controllers\AdminController::class,'register'])->name('admin.register');

});
Route::middleware('admin')->group(function (){
    Route::get('/delete-product/{id}',[ProductController::class,'destroy'])->name('delete.product');
    Route::get('/trash-product',[ProductController::class,'trash'])->name('trash.product');
    Route::get('/restore-product/{id}',[ProductController::class,'restore'])->name('restore.product');
});
Route::middleware('admin')->group(function (){
    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit.product');
    Route::post('/edit-product/{id}',[ProductController::class,'update'])->name('update.product');
});
Route::prefix('/cart')->group(function(){
    Route::post('/addToCart',[CartController::class,'addToCart'])->name('fe.cart.addToCart');
    Route::post('/update/{rowId}',[CartController::class,'update'])->name('fe.cart.update');
    Route::get('/list',[CartController::class,'index'])->name('fe.cart.list');
    Route::get('/destroy',[CartController::class,'destroy'])->name('fe.cart.destroy');
    Route::get('/delete/{rowId}',[CartController::class,'delete'])->name('fe.cart.delete');
});
Route::prefix('/order')->group(function(){
    Route::get('/checkout',[OrderController::class,'checkout'])->name('fe.order.checkout');
    Route::get('/thanks',[OrderController::class,'thanks'])->name('fe.order.thanks');
    Route::post('/doCheckout',[OrderController::class,'doCheckout'])->name('fe.order.doCheckout');
    Route::get('/filterDistrictByProvince',[OrderController::class,'filterDistrictByProvince'])->name('fe.order.filterDistrictByProvince');
    Route::get('/filterDistrictByDistrict',[OrderController::class,'filterDistrictByDistrict'])->name('fe.order.filterDistrictByDistrict');

});
Route::prefix('/mail')->group(function(){
   Route::get('/confirm',[MailController::class,'confirm'])->name('fe.mail.confirm');
   Route::get('/indexConfirm/{transaction_id}',[MailController::class,'indexConfirm'])->name('fe.mail.indexConfirm');
   Route::get('/confirmSuccessMail/{transaction_id}/{cartTotal}',[MailController::class,'confirmSuccessMail'])->name('fe.mail.confirmSuccessMail');
});
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
