<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'category' => 'required|max:255',
            'price' => 'required|numeric|integer|min:0',
            'image' => 'image|nullable',
            'description' => 'string|nullable',
            'stock' => 'required|numeric|integer|min:0',
        ];
    }
}
