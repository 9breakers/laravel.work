<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
{
    /**
     * Determine if the auth is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'card-number' => [
                'required',
                'credit_card',
            ],

            'card-holder' => [
                'required',
                'string', // Введене значення має бути рядком
                'max:255', // Максимальна довжина рядка
            ],

        ];
    }
}
