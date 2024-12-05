<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePepperRequest extends FormRequest
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
            'name' => 'required|string|max:40',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0|max:999999.99',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Dodano walidację dla obrazu
        ];
    }

}
