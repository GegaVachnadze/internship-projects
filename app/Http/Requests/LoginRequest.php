<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class LoginRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => [
                'required',
                'string',
            ],
            'password' => [
                'required',
                'string',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'login'    => __('auth.username_or_email'),
            'password' => __('auth.password'),
        ];
    }
}
