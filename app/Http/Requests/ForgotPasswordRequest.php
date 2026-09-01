<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class ForgotPasswordRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'exists:users,email',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'email'
        ];
    }
}
