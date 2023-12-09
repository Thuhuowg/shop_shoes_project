<?php
namespace App\Helpers\function;
function percent($sale_str,$default_str){
    $sale=intval($sale_str);
    $default=intval($default_str);
    if ($default != 0){
        return (($default-$sale)*100)/$default;
    }
    return 0;
}
function price_sale($price,$discount){
    if ($discount !=0 ){
       return  $price - ($price * $discount/100);
    }
    return 0;
}
function minus($a,$b) {
    return $a-$b;
}
?>
