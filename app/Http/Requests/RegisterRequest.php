<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $date_now = date('m/d/Y');
        return [
            //
            'regUsername' => ['required','unique:accounts,username'],
            'regPassword' => ['required','min:6','alpha_num'],
            'regConfirmPass' => ['required','same:regPassword'],
            'email' => ['required','email','unique:accounts','email'],
            'accountType' => ['required'],
            'firstname' => ['required', 'alpha'],
            'lastname' => ['required', 'alpha'],
            'date' => ['required', 'date_format:m/d/Y','before_or_equal:'.$date_now],
            'gender' => ['required'],
            'address' => ['required'],
            'contact' => ['required', 'min:11']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field must not be empty!',
            'unique' => ':Attribute already exists!',
            'regConfirmPass.required' => 'Password does not match!',
            'regPassword.required' => 'Password does not match!',
            'accountType.required' => 'You must select an account type!',
            'gender.required' => 'You must specify your gender!',
            'date.before_or_equal' => 'Date cannot be ahead of time!',
            'contact.digits_between' => 'Contact number must start with 639 or 09'
        ];
    }


}
