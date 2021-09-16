<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    //
    public function index(){

        if (Auth::check())
        {
            $userId = Auth::user()->getAuthIdentifier();
            $type =Account::where('id',$userId)->get('account_type');
            $type =$type[0]->account_type;
            if($type == "seller"){
                session(['userId' => $userId]);
                session(['seller' => 'seller']);
            }

        }else{
            session()->forget(['userId','seller']);
        }

        return view('store.store');


    }

    public function view($id){

        $type =Account::findOrFail($id)->where('id',$id)->get('account_type');
        $type =$type[0]->account_type;
        if($type == 'seller'){
            session()->forget(['userId','seller']);
            return view('store.store');
        }else{
            return Account::findOrFail($id);
        }



    }
}
