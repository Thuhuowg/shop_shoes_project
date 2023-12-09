<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailCheck;
use App\Mail\ConfirmSuccessMail;
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
    public function indexConfirm($transaction_id){
        return view('client.mail.thanksMail',compact('transaction_id'));
    }


    public function confirmSuccessMail(Request $request,$transaction_id,$cartTotal){
        if(session()->has("order$transaction_id")){
            $transaction=Transaction::find($transaction_id);
            $orders=Order::where('transaction_id',$transaction_id)->get();
            $mailData=[
                'orders'=>$orders,
                'transaction'=>$transaction,
                'cartTotal'=>$cartTotal
            ];
           Mail::to("$transaction->email")->send(new ConfirmSuccessMail($mailData));
        //    if(isset($request->user_id)){
        //     $user=User::where('id',$request->user_id)->first();
        //     $coin=$user->coin+300;
        //     $user->update([
        //         'coin'=>$coin
        //     ]);
        //    }
        //    session()->forget("order$transaction_id");
        }
        return redirect()->route('fe.mail.indexConfirm',$transaction_id);


    }
}
