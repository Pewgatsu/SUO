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

        if($this->valid_id === null){
            $old_path = $account->valid_id_path;
            $path = $old_path;
        }else{
            $new_path = Storage::disk('do_spaces')->putFileAs('photos/id/'.$account->id,$this->valid_id,$file_name,'public');
            $path = Storage::disk('do_spaces')->url($new_path);
        }

        $account->update([
            'valid_id_path' => $path
        ]);

        session()->flash('alert_message','ID submitted!');

    }

    public function render()
    {
        return view('livewire.user-profile.validate-account-form');
    }
}
