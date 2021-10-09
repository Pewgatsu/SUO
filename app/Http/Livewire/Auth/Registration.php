<?php

namespace App\Http\Livewire\Auth;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Registration extends Component
{
    public $username;
    public $password;
    public $confirmPass;
    public $email;
    public $accountType;
    public $firstname;
    public $lastname;
    public $gender;
    public $date;
    public $address;
    public $contact;



    public function getRules()
    {
        $date_now = date('m/d/Y');
        return [
            //
            'username' => ['required','unique:accounts,username'],
            'password' => ['required','min:6','alpha_num'],
            'confirmPass' => ['required','same:password'],
            'email' => ['required','email','unique:accounts','email'],
            'accountType' => ['required'],
            'firstname' => ['required', 'alpha'],
            'lastname' => ['required', 'alpha'],
            'date' => ['nullable','date_format:m/d/Y','before_or_equal:'.$date_now],
            'address' => ['nullable','alpha'],
            'contact' => ['nullable','min:11']
        ];

    }

    public function getMessages()
    {
        return [
            'required' => 'Field must not be empty!',
            'unique' => ':Attribute already exists!',
            'confirmPass.required' => 'Password does not match!',
            'password.required' => 'Password does not match!',
            'accountType.required' => 'You must select an account type!',
            'date.before_or_equal' => 'Date cannot be ahead of time!',
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function register(){

        $this->validate($this->getRules(),$this->getMessages());

        $account = Account::create([
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'email' => $this->email,
            'account_type' => $this->accountType,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'gender' => $this->gender,
            'birthdate' => $this->date,
            'address' => $this->address,
            'contact' => $this->contact,
            'is_active' => true
        ]);

        Auth::login($account);

        if(auth()->user()->account_type == 'Customer'){
            return redirect()->route('builder');
        }else if(auth()->user()->account_type == 'Seller'){
            return redirect()->route('myStore');
        }else{
            return redirect()->route('admin.dashboard');
        }


    }

    public function render()
    {
        return view('livewire.auth.registration');
    }
}
