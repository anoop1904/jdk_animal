<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }

    public function login_with_otp(){
        return view('admin.auth.login_otp');
    }

    public function enter_otp(){
        return view('admin.auth.enter_otp');
    }
    
}
