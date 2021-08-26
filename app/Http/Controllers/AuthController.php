<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //

    public function loginPage(){
        return view('login');
    }

    public function registerPage(){
        return view('registration');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('username','password');
        $account = Account::where('username',$request->username)->first();

        if(Auth::attempt($credentials)){
            return view('dashboard');
        }else{
            return redirect()->back()->with('error','Invalid Credentials');
        }
    }

    //validate the input in request
    public function registerUser(Request $request){

        $date_now = date('m/d/Y');

        $request->validate([
            'username' => 'required|unique:accounts,username',
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'password_confirmation' => 'required|same:password',
            'email' => 'required|email|unique:accounts,email',
            'accountType' => 'required',
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'date' => 'required|date_format:m/d/Y|before_or_equal:'.$date_now,
            'gender' => 'required',
            'address' => 'required',
            'contact' => 'required|digits_between:11,12'
        ],[
            'required' => 'Field must not be empty!',
             'unique' => ':Attribute already exists!',
             'password_confirmation.required' => 'Does not match!',
            'accountType.required' => 'You must select an account type!',
            'gender.required' => 'You must specify your gender!',
            'date.before_or_equal' => 'Date cannot be ahead of time!',
            'contact.digits_between' => 'Contact number must start with +639 or +09'

        ]);



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
