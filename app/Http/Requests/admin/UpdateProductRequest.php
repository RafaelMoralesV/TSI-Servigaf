<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'max:255',
            'brand' => 'max:255',
            'category' => 'present',
            'price' => 'numeric|integer|min:0',
            'image' => 'image|nullable',
            'description' => 'string|nullable',
            'stock' => 'numeric|integer|min:0',
        ];
    }
}
