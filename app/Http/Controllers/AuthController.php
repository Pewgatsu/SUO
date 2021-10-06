<?php

namespace App\Http\Controllers;



class AuthController extends Controller
{

    public function loginPage(){
        return view('auth.show-login');
    }

    public function registerPage(){
        return view('auth.show-registration');
    }

}
