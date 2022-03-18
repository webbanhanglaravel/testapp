<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'amount' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Dữ liệu không được để trống',
            'price.required' => 'Dữ liệu không được để trống',
            'amount.required' => 'Dữ liệu không được để trống',
        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
