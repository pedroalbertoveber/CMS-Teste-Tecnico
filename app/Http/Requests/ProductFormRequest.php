<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:1', 'max:255'],
            'brand' => ['required', 'max:255'],
            'price' => ['required'],
            'description' => ['required', 'min:5'],
            'categories' => ['required'],
        ];
    }

    public function messages() {
        return [
            'name.required' => "O nome da categoria é obrigatório!",
        ];
    }
}