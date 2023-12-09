<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailCheck;
use App\Models\Transaction;
use App\Models\Order;
use Mail;

use Str;


class MailController extends Controller
{
    //
    public function confirm(Request $request){
        // dd($request->cartTotal);
        $transaction_id=$request->transaction_id;
        $transaction=Transaction::find($transaction_id);
        $orders=Order::where('transaction_id',$transaction_id)->get();
        $token=Str::upper(Str::random());
        session(["order$transaction_id"=>$token]);
        $mailData=[
            'orders'=>$orders,
            'transaction'=>$transaction,
            'cartTotal'=>$request->cartTotal
        ];
        Mail::to("$transaction->email")->send(new MailCheck($mailData));
        return view('client.thanks');
    }
}