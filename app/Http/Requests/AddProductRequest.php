<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:50|min:10',
            'price' => 'required',
            'code' => 'required',
            'image_1' => 'required|mimes:jpg,jpeg,png,gif',
            'image_2' => 'required|mimes:jpg,jpeg,png,gif',
            'image_3' => 'required|mimes:jpg,jpeg,png,gif',
            'category_id' => 'required',
            'quantity' => 'required',
            'slug' => 'required|unique:products',
            'short_content' => 'required|max:200',
            'long_content' => 'required'
        ];
    }
}
