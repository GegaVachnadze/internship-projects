<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EditTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title_en' => ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s]+$/'],
            'title_ka' => ['required', 'string', 'min:3', 'regex:/^[ა-ჰ0-9\s]+$/'],
            'description_en' => ['required', 'string', 'min:3', 'regex:/^[A-Za-z\s]+$/'],
            'description_ka' => ['required', 'string', 'min:3', 'regex:/^[ა-ჰ\s]+$/'],
            'due_date' => ['required', 'date'],
        ];
    }
}
