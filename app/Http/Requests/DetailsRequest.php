<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailsRequest extends FormRequest
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
            'address' => 'required|max:100',
            'postal_code' => 'required|numeric',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'street' => 'required|max:100',
            'phone' => 'required|numeric|digits_between:9,11'
            ];
    }
    
    public function messages()
    {
        return 
            [
                'address.required' => 'The Address is Required',
                'address.max' => 'The Address Must Not Exceed 100 Characters',
                'postal_code.required' => 'The Postal Code Field is Required',
                'postal_code.numeric' => 'The Postal Code Field Must Be numbers Only',
                'city.required' => 'The City Field is Required',
                'city.max' => 'The City Field Must Not Exceed 100 Characters',
                'state.required' => 'The State Field is Required',
                'state.max' => 'The State Field Must Not Exceed 100 Characters',
                'street.required' => 'The Street Field is Required',
                'street.max' => 'The Street Field Must Not Exceed 100 Characters',
                'phone.required' => 'The Phone Field is Required',
                'phone.numeric' => 'The Phone Field Must Be Numbers Only',
                'phone.digits_between' => 'The Phone Field Must Be Digits of Length Between 9 & 11 Numbers'
            ];
    }
}
