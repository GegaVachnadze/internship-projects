<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class ResetPasswordRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => [
                'required',
                'min:8',
                'max:15',
                'regex:/^[a-z0-9]+$/',
                'confirmed',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'email'    => __('auth.email'),
            'password' => __('auth.password'),
        ];
    }
}
