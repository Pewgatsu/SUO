<?php

namespace App\Http\Controllers;



use App\Models\Account;

class UserProfileController extends Controller
{
    public function index(){
        return view('userProfile.profile');
    }

    public function index_user(Account $account){
        return view('userProfile.index',[
            'account' => $account
        ]);
    }
}
