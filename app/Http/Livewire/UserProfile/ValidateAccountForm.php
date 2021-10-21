<?php

namespace App\Http\Livewire\UserProfile;



use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ValidateAccountForm extends Component
{
    use WithFileUploads;

    public $valid_id;


    public function getUser(){
        $account = Auth::user();
        return $account;
    }

    public function mount(){

    }


    public function getRules(){
        return [
            //

            'valid_id' => ['nullable','image','max:1024']

        ];
    }

    public function getMessages(){
        return [
            'unique' => ':Attribute is already taken!',

        ];
    }


    public function submit_id(){

        $this->validate($this->getRules(),$this->getMessages());

        $account = $this->getUser();


        $file_name = $this->valid_id->getClientOriginalName('photo');

        $this->valid_id->storeAs('public/photos/id', $file_name);


        $account->update([
            'valid_id_path' => $file_name
        ]);

    }

    public function render()
    {
        return view('livewire.user-profile.validate-account-form');
    }
}
