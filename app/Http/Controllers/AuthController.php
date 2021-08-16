<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function getUser(){
        $users = User::get();
        $response = array(
            'status'=>true,
            'message'=>'User List',
            'code'=>203,
            'results'=>$users
        );
        return response()->json($response);
    }
}
