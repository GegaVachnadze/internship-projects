<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    protected function prepareForValidation(): void
    {
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        }
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
        $locale = session('locale', app()->getLocale());

        if ($locale === 'ka') {
            return [
                'username'              => 'მომხმარებლის სახელი',
                'email'                 => 'ელ-ფოსტა',
                'password'              => 'პაროლი',
                'password_confirmation' => 'პაროლის დადასტურება',
            ];
        }

        return [
            'username'              => 'username',
            'email'                 => 'email',
            'password'              => 'password',
            'password_confirmation' => 'password confirmation',
        ];
    }
}
