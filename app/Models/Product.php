<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
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
}
