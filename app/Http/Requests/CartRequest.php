<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
        return
            [
            'quantity' => 'required|numeric|max:100'
            ];
    }
    
    public function messages()
    {
        return
            [
            'quantity.required' => 'The Quantity Field is Required',
            'quantity.numeric' => 'The Quantity Field Must Be Numbers Only',
            'quantity.max' => 'The Quantity Field Must Not Exceed 100 Numbers'
            ];
    }
}
