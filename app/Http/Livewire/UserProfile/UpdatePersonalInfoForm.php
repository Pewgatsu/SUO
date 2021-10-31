<?php

namespace App\Http\Livewire\UserProfile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class UpdatePersonalInfoForm extends Component
{
    public $firstname;
    public $lastname;
    public $birthdate;
    public $gender;
    public $address;
    public $contact;



    public function getUser(){
        $account = Auth::user();
        return $account;
    }



    public function mount(){
        $this->firstname = Auth::user()->firstname;
        $this->lastname = Auth::user()->lastname;
        $this->birthdate = Auth::user()->birthdate;
        $this->gender = Auth::user()->gender;
        $this->address = Auth::user()->address;
        $this->contact = Auth::user()->contact;
    }

    public function getRules(){
        $date_now = date('m/d/Y');

        return[
            'firstname' => ['required', 'alpha'],
            'lastname' => ['required', 'alpha'],
            'birthdate' => ['nullable', 'date_format:m/d/Y','before_or_equal:'.$date_now],
            'gender' => ['nullable'],
            'address' => ['nullable'],
            'contact' => ['nullable', 'min:11', 'regex:/^[0-9]+$/']
        ];
    }

    public function getMessages(){

        return [
            'required' => 'Field must not be empty!',
            'gender.required' => 'You must specify your gender!',
            'date.before_or_equal' => 'Date cannot be ahead of time!',
            'contact.digits_between' => 'Contact number must start with 639 or 09',
            'regex' => 'Invalid format!'
        ];
    }

    public function update($propertyName){
        $this->validateOnly($propertyName);
    }

    public function alertSuccess()
    {
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Account Updated!"
        ]);
    }



    public function savePersonalInfo(){

        $this->validate($this->getRules(),$this->getMessages());

        $account = $this->getUser();

        $account->update([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'address' => $this->address,
            'contact' => $this->contact,
        ]);
        $this->alertSuccess();


    }


    public function render()
    {
        return view('livewire.user-profile.update-personal-info-form');
    }
}
