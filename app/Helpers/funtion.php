<?php
namespace App\Helpers\function;
function percent($sale,$default){
    return ($default-$sale)*100/$default;
}
?>
