<?php

namespace App\Http\Livewire\UserProfile;


use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateProfileForm extends Component
{
    public $username;
    public $email;


    public function getUser(){
        $account = Auth::user();
        return $account;
    }

    public function mount(){
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
    }

    public function getRules(){
        return [
            //
            'username' => ['required','string', Rule::unique('accounts','username')->ignore(Auth::id())],
            'email' => ['required','email', Rule::unique('accounts','email')->ignore(Auth::id())],
        ];
    }

    public function getMessages(){
        return [
            'unique' => ':Attribute is already taken!',
            'required' => 'Field must not be empty!'
        ];
    }



    public function saveProfile(){
        $this->validate($this->getRules(),$this->getMessages());

        $account = $this->getUser();

        $account->update([
            'username' => $this->username,
            'email' => $this->email
        ]);


//        Account::find(Auth::id())->forceFill([
//            'username' => $this->username,
//            'email' => $this->email
//        ])->save();


    }

    public function render()
    {
        return view('livewire.user-profile.update-profile-form');
    }
}
