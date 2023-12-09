<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;
class OrderController extends Controller
{
    public function index(Request $request){
        $query=Transaction::orderBy('id','desc');
        $status=$request->status;
        if($status){
            switch($status){
                case "waiting":
                    $query->where('status',0);
                    break;
                case "pending":
                    $query->where('status',1);
                    break;
                case "processing":
                    $query->where('status',2);

                    break;
                case "success":
                    $query->where('status',3);

                    break;
                case "canceled":
                    $query->where('status',4);
                    break;
            }
        }
        $transactions=$query->paginate(5)->withQueryString();
        return view('admin.order.list',compact('transactions'));
    }
    public function changeStatus($transaction_id,$status){
        $transaction=Transaction::find($transaction_id);
        $transaction->status=$status;
        $transaction->save();
        return redirect()->back()->with('success','Thay đổi tình trạng đơn hàng thành công');
    }
    public function detail($transaction_id){
        $transaction=Transaction::find($transaction_id);
        return view('admin.order.detail',compact('transaction'));
    }

}