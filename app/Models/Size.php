<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'size_number',
        'category_id',
    ];
    public function category (){
        return $this->belongsTo(Category::class);
    }
    public function products () {
        return $this->belongsToMany(Size::class,'product_sizes','size_id','product_id');
    }
}
