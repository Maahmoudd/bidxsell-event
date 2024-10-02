<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NumberToExcelRequest extends FormRequest
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
            'index' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'index.required' => 'The index parameter is required.',
            'index.integer'  => 'The index must be an integer.',
            'index.min'      => 'The index must be at least 1.'
        ];
    }
}
