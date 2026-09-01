<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class RegisterRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function attributes(): array
    {
        return [
            'username'              => __('auth.username'),
            'email'                 => __('auth.email'),
            'password'              => __('auth.password'),
            'password_confirmation' => __('auth.password_confirmation'),
        ];
    }
}
