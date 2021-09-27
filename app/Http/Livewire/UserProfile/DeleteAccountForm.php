<?php

namespace App\Http\Livewire\UserProfile;

use App\Models\Account;
use Livewire\Component;

class DeleteAccountForm extends Component
{

    public $userid;

    public function confirmUserDeletion($id){

        $this->userid = $id;

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser(){

        $account = Account::findOrFail($this->userid);

        $account->delete();

        $this->dispatchBrowserEvent('hide-delete-modal');

    }

    public function render()
    {
        return view('livewire.user-profile.delete-account-form');
    }
}
