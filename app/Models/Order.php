<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;
use App\Models\Product;
use App\Models\Transaction;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_code',
        'product_id',
        'quantity',
        'transaction_id',
        'size_id'
    ];
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

}