<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommanController extends Controller
{
    public function validateNumber($number){
        $number = str_replace(' ', '', $number);
        $ext = substr($number, 0, 1);
        $country_code = substr($number, 0, 3);
        $number = str_replace('+', '', $number);
        $number_length = 10;
        $code = 91;
        // if($ext == '+'){
        //     //
        //     if($country_code == '+91'){
        //         $number_length = 10;
        //         $code = 91;
        //     }else{
        //         return ['status'=>false];
        //     }
        // } else if(strlen($number) >= 10){
        //     $number_length = 10;
        //     $code = 91;
        //     if(substr($number, 0, 2) == 91){
        //         $number_length = 10;
        //         $code = 91;
        //     }else{
        //         return ['status'=>false];
        //     } 
        // }else{
        //     return ['status'=>false];
        // }
        if(strlen($number) >= 10){
            $start = strlen($number) - $number_length; 
            $mobile_number = substr($number, $start);
            return ['status'=>true,'number'=>$mobile_number,'country_code'=>$code];
        }else{
            return ['status'=>false];
        }
    }
}
