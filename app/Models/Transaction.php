<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Ward;
use App\Models\Province;
use App\Models\District;


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

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
