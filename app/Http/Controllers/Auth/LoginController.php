<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{

//    use AuthenticatesUsers;

    public function loginForm($type){

        return view('auth.login',compact('type'));
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
