<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;


use Str;

class OrderController extends Controller
{
    //
    public function checkout(){

        $provinces=Province::all();

        return view('client.payment',compact('provinces'));
    }
    public function filterDistrictByProvince(Request $request){
        $provinceId=$request->provinceId;
        $districts=District::where('province_id',$provinceId)->get();
        return response()->json(['districts'=>$districts]);
    }
    public function filterDistrictByDistrict(Request $request){
        $districtId=$request->districtId;
        $wards=Ward::where('district_id',$districtId)->get();
        return response()->json(['wards'=>$wards]);
    }
    public function doCheckout(Request $request){
        // dd(Cart::content());
        $cartTotal=Cart::total();
        $phone=$request->phone;
        $address=$request->address;
        $provinceId=$request->province_id;
        $wardId=$request->ward_id;
        $districtId=$request->district_id;
        $name=$request->name;
        $transactionCode=Str::random(15);
        $transaction=null;

        try{
            if(Auth::check()){
                $transaction=Transaction::create([
                    'phone'=>$phone,
                    'province_id'=>$provinceId,
                    'ward_id'=>$wardId,
                    'district_id'=>$districtId,
                    'address'=>$address,
                    'name'=>$name,
                    'payment_method_id'=>$request->payment_method_id,
                    'user_id'=>Auth::user()->id,
                    'transaction_code'=>$transactionCode,
                    'email'=>$request->email
                ]);


            }
            else{
                $transaction=Transaction::create([
                    'phone'=>$phone,
                    'province_id'=>$provinceId,
                    'ward_id'=>$wardId,
                    'district_id'=>$districtId,
                    'address'=>$address,
                    'name'=>$name,
                    'payment_method_id'=>$request->payment_method_id,
                    'transaction_code'=>$transactionCode,
                    'email'=>$request->email

                ]);
            }
            foreach(Cart::content() as $item){
                $orderCode="Order".Str::random(10);
                Order::create([
                    'order_code'=>$orderCode,
                    'product_id'=>$item->id,
                    'quantity'=>$item->qty,
                    'transaction_id'=>$transaction->id,
                    'size_id'=>$item->options->size->id
                ]);
            }
            Cart::destroy();

        }
        catch(Exception $e){
            return redirect()->back()->with('error','Đặt hàng thất bại');
        }
        return redirect()->route('fe.mail.confirm',['transaction_id'=>$transaction->id,'cartTotal'=>$cartTotal]);
    }
    public function thanks(){

        return view('client.thanks');
    }
}
