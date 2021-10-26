<?php

namespace App\Http\Controllers;



use App\Models\Account;

class UserProfileController extends Controller
{
    public function index(){
        return view('user-profile.profile');
    }

    public function index_user(Account $account){
        return view('user-profile.index',[
            'account' => $account
        ]);
    }

    public function validate_account(){
        return view('user-profile.validate-account');
    }
}
