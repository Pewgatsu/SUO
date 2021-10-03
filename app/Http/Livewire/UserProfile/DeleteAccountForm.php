<?php

namespace App\Http\Livewire\UserProfile;

use App\Models\Account;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteAccountForm extends Component
{
    public $password;

    public $userid;

    public function getRules()
    {
        return [
            'password' => ['required',new MatchOldPassword(Auth::user())],
        ];
    }

    public function getMessages()
    {
        return [
            'required' => 'Password must not be empty!',
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function confirmUserDeletion(){

        $this->userid = Auth::user()->id;

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser(){

        $this->validate($this->getRules(),$this->getMessages());

        $account = Account::findOrFail($this->userid);


        $account->delete();

        $this->dispatchBrowserEvent('hide-delete-modal');

        Auth::logout();

        return $this->redirect('/');

    }

    public function render()
    {
        return view('livewire.user-profile.delete-account-form');
    }
}
