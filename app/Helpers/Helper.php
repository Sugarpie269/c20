<?php

namespace App\Helpers;

class Helper
{
    public static function format_number_in_k_notation($size,$round=2): string
    {
        $unit=['', 'K', 'M', 'G', 'T'];
        if($size!=0)
            return round($size/pow(1000,($i=floor(log($size,1000)))),$round).$unit[$i];
        else
            return $size;
    }
}
