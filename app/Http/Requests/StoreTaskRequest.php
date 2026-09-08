<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_en' => ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s.,!?]+$/'],
            'title_ka' => ['required', 'string', 'min:3', 'regex:/^[ა-ჰ0-9\s.,!?]+$/'],
            'description_en' => ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s.,!?]+$/'],
            'description_ka' => ['required', 'string', 'min:3', 'regex:/^[ა-ჰ0-9\s.,!?]+$/'],
            'due_date' => ['required', 'date'],
        ];
    }
}
