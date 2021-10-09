<?php

namespace App\Http\Livewire\UserProfile;



use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileForm extends Component
{
    use WithFileUploads;

    public $username;
    public $email;
    public $photo;


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

        $file_name = $this->photo->getClientOriginalName('photo');

        $this->photo->storeAs('public/photos', $file_name);



        $account->update([
            'username' => $this->username,
            'email' => $this->email,
            'profile_path' => $file_name
        ]);

    }

    public function render()
    {
        return view('livewire.user-profile.update-profile-form');
    }
}
