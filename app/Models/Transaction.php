<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable =[
        'transaction_code',
        'phone',
        'province_id',
        'district_id',
        'ward_id',
        'payment_method_id',
        'address',
        'user_id',
        'email',
        'name'
    ];
}
