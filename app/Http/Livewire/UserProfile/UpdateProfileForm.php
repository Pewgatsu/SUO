<?php

namespace App\Http\Livewire\UserProfile;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileForm extends Component
{
    use WithFileUploads;

    public $username;
    public $email;
    public $photo;
    public $profile_path;


    public function getUser(){
        $account = Auth::user();
        return $account;
    }

    public function mount(){
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->profile_path = Auth::user()->profile_path;
    }


    public function getRules(){
        return [
            //
            'username' => ['required','string', Rule::unique('accounts','username')->ignore(Auth::id())],
            'email' => ['required','email', Rule::unique('accounts','email')->ignore(Auth::id())],
            'photo' => ['nullable','image','max:1024']

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

        $file_name = 'Account_'.$account->id;


        if(isset($this->photo)){
            $new_path = Storage::disk('do_spaces')->putFileAs('photos/profile/'.$account->id,$this->photo,$file_name,'public');
            $path = Storage::disk('do_spaces')->url($new_path);
        }else{
            $path = $account->profile_path;
        }

        $account->update([
            'username' => $this->username,
            'email' => $this->email,
            'profile_path' => $path
        ]);

        session()->flash('alert_message','Account successfully saved!');

    }

    public function render()
    {
        return view('livewire.user-profile.update-profile-form');
    }
}
