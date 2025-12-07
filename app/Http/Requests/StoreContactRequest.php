<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'number' => ['required', 'string', 'size:9', 'unique:contacts,number'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:contacts,email'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            '*.required' => 'The :attribute field is required.',
            '*.unique' => 'The :attribute has already been taken.',
            '*.min' => 'The :attribute must be at least :min characters.',
            '*.max' => 'The :attribute may not be greater than :max characters.',
            'number.size' => 'The number must be exactly :size characters.',
            'email.email' => 'The email must be a valid email address.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [];
    }
}
