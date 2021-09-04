<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function loginPage(){
        return view('auth.login');
    }

    public function registerPage(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){

        $credentials = $request->only('username','password');
        $account = Account::where('username',$request->username)->first();

        if(Auth::attempt($credentials)){
            return view('systemBuilder.builder');
        }else{
            return redirect()->back()->with('error','Invalid Credentials');
        }
    }

    //validate the input in request
    public function registerUser(RegisterRequest $request){

        $account = Account::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input()['password']),
            'email' => $request->input('email'),
            'account_type' => $request->input('accountType'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'gender' => $request->input('gender'),
            'birthdate' =>$request->input('date'),
            'contact' => $request->input('contact'),
            'address' =>$request->input('address'),
        ]);

        return redirect()->route('login');
    }

}
