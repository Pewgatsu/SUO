<?php

namespace App\Http\Livewire\UserProfile;

use App\Models\Account;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePasswordForm extends Component
{
    public $password;
    public $confirmPassword;
    public $newPassword;

    public function getRules(){

        return[
            'password' => ['required',new MatchOldPassword(Auth::user())],
            'confirmPassword' => ['required','same:newPassword'],
            'newPassword' => ['required','min:6','alpha_num'],
        ];
    }

    public function getMessages()
    {
        return [
            'same' => 'Password does not match!',
            'required' => 'Field must not be empty!',
            'password.same' => 'Does not match the current password!',
            'min' => 'Password must be at least 6 characters!'
        ];

    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate($this->getRules(),$this->getMessages());
        $account = Auth::user();

        $account->update([
            'password' => Hash::make($this->newPassword)
        ]);

        $this->reset();
    }


    public function render()
    {

        return view('livewire.user-profile.update-password-form');
    }
}
