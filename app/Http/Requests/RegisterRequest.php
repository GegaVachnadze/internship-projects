<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "username" => [
                'required',
                'string',
                'min:3',
                'max:15',
                'regex:/^[a-z0-9]+$/',
                'unique:users,username'
            ],
            "email" => [
                'required',
                'email',
                'unique:users,email'
            ],
            "password" => [
                'required',
                'min:8',
                'max:15',
                'regex:/^[a-z0-9]+$/',
                'confirmed'
            ],

            'password_confirmation' => ['required'],
        ];
    }

    public function massages(): array
    {
        return [
            'username.required' => 'username must be filled.',
            'username.min' => 'username must have min:3 symbols.',
            'username.max' => 'username only can have max:15 symbols.',
            'username.regex' => 'username must be in lowercase',

            'email.required' => 'email must be filled.',
            'email.Email' => 'please provide a valid email address.',
            'email.unique' => 'already exists',


            'password.required' => "password must be filled,",
            'password.min' => "password must have min: 8 symbols.",
            'password.max' => "password can have max: 15 symbols.",
            'password.regex' => "password must be in lowercase",
            'password.confirm' => "passwords doesn't match",
        ];
    }
}
