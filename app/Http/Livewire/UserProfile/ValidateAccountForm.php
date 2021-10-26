<?php

namespace App\Http\Livewire\UserProfile;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ValidateAccountForm extends Component
{
    use WithFileUploads;

    public $valid_id;
    public $valid_id_path;

    public function getUser(){
        $account = Auth::user();
        return $account;
    }

    public function mount(){
        $this->valid_id_path = Auth::user()->valid_id_path;
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

        $file_name = 'Account_'.$account->id;

        $path = Storage::disk('do_spaces')->putFileAs('photos/id/'.$account->id,$this->valid_id,$file_name,'public');

        $account->update([
            'valid_id_path' => Storage::disk('do_spaces')->url($path),
        ]);

    }

    public function render()
    {
        return view('livewire.user-profile.validate-account-form');
    }
}
