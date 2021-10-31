<?php

namespace App\Http\Livewire\Auth;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;


    public function getRules()
    {
        return [
            'username' => ['required'],
            'password' => ['required'],
        ];
    }

    public function alertError(){
        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Invalid Credentials!"
        ]);
    }

    public function login(){
        $this->validate($this->getRules());

        if(Auth::attempt(array('username' => $this->username, 'password' => $this->password ))){
            if(auth()->user()->account_type == 'Customer'){
                return redirect()->route('builder');
            }else if(auth()->user()->account_type == 'Seller'){
                return redirect()->route('myStore');
            }else{
                return redirect()->route('admin.dashboard');
            }
        }else{
            $this->reset('password');
            $this->alertError();
            return redirect()->back();
        }


    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
