<?php

namespace App\Http\Requests;

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
            'username' => [
                'required',
                'string',
                'min:3',
                'max:15',
                'regex:/^[a-z0-9]+$/',
                'unique:users,username',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'min:8',
                'max:15',
                'regex:/^[a-z0-9]+$/',
                'confirmed',
            ],
            'password_confirmation' => [
                'required',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'username'              => __('Username'),
            'email'                 => __('Email'),
            'password'              => __('Password'),
            'password_confirmation' => __('Repeat Password'),
        ];
    }
}
