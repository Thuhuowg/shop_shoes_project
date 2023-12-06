<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSize;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'type_id',
        'category_id',
        'quantity',
        'price_default',
        'price_sale',
        'description',
        'image',
        'image_list',
        'star_counter',
        'slug',
        'voucher_sale'
    ];
    public function category () {
        return $this->belongsTo(Category::class);
    }
    public function sizes () {
        return $this->belongsToMany(Size::class,'product_sizes','product_id','size_id')->wherePivot('product_id');
    }
    public function productSizes(){
            return $this->hasMany(ProductSize::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
