<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'fullname' => 'required|max:100',
            'username' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|max:50'
            ];
    }
    
    public function messages()
    {
        return 
            [
                'firstname.required' => 'Your First Name is Required',
                'firstname.max' => 'Your First Name Must Not Exceed 100 Characters',
                'lastname.required' => 'Your Last Name is Required',
                'lastname.max' => 'Your Last Name Must Not Exceed 100 Characters',
                'fullname.required' => 'Your Full Name is Required',
                'fullname.max' => 'Your Full Name Must Not Exceed 100 Characters',
                'username.required' => 'Your Username is Required',
                'username.max' => 'Your Username Must Not Exceed 100 Characters',
                'email.required' => 'Your E-Mail is Required',
                'email.max' => 'Your E-Mail Must Not Exceed 100 Characters',
                'password.required' => 'Your Password is Required',
                'password.max' => 'Your Password Must Not Exceed 50 Characters'
            ];
    }
}
