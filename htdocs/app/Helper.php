<?php

namespace App;

class Helper{
public static function same($value1,$value2,$value3){
    if($value1===$value2&&$value1===$value3){
        return true;
    } else{
        return false;
    }
}
}