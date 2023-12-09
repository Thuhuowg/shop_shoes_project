<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function index(){
        return  view('client.cart');

    }

    public function addToCart(Request $request)
    {
        $size=Size::find($request->size_id);
        $product=Product::find($request->product_id);
        Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>$request->quantity,
            'price'=> number_format($product->price_sale,0,'.',''),
            'options'=>['size'=>$size,
                        'image_path'=>$product->image,

            ]
        ]);
        $cartCount=Cart::count();
        return response()->json([ 'message'=>"Add To Cart Successfully",'cartCount'=>$cartCount]);
    }
    public function update(Request $request,$rowId){
        Cart::update($rowId,$request->qty);
        $cartCount=Cart::count();
        $currentCart=Cart::get($rowId);
        $cartTotal=Cart::total();

        return response()->json(['cartCount'=>$cartCount,'cartTotal'=>$cartTotal,'currentCart'=>$currentCart]);
    }
    public function destroy(){
        try{
            Cart::destroy();
        }
        catch(Exception $e){
            return redirect()->back()->with('error','Xóa thất bại');

        }
       return redirect()->back()->with('success','Xóa toàn bộ giỏ hàng thành công');
    }

    public function delete($rowId){
        Cart::remove($rowId);
        $cartCount=Cart::count();
        $cartTotal=Cart::total();
        return response()->json(['message'=>'xóa sản phẩm thành công','cartCount'=>$cartCount,'cartTotal'=>$cartTotal]);
    }
}
