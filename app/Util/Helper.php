<?php

namespace App\Util;

class Helper
{
public static function dateConverter($date){
    return date ('d-m-Y',strtotime($date));
}
public static function rupiah($number){
    return "Rp " . number_format($number,2,',','.');
}
}
