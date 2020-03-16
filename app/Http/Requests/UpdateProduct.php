<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'sku' => 'required',
            'regular_price' => 'required',
            'slug' => 'required',
            'categories' => 'required',
            'name' => 'required',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên sản phẩm',
        ];
    }
}
