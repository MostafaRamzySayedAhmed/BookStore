<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryRequest extends FormRequest
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
                'name' => 'required|max:100',
                'description' => 'required|max:500',
                'image' => 'required|mimes:png,jpg,jpeg,gif|dimensions:min_width=100,min_height=100,
                            max_width=1000,max_height=1000|image|max:4096'
            ];
    }
    
    public function messages()
    {
        return 
            [ 
            'name.required' => 'The Category Name Can Not Be Empty',
            'name.max' => 'The Category Name Must Not Exceed 100 Characters',
            'description.required' => 'The Category Description Can Not Be Empty',
            'description.max' => 'The Description Name Must Not Exceed 500 Characters',
            'image.required' =>  'The Category Image Can Not Be Empty',
            'image.mimes' =>  'The Category Image Must Have an Extension Of png, jpg ,jpeg & gif Only',
            'image.dimensions' => 'The Uploaded Image Must Be Of Width Between 100px & 1000px and Must Be Of Height Between 100px & 1000px',
            'image.image' => 'The Uploaded File Must Be an Image',
            'image.size' => 'The Category Image Size Can Not Exceed 4MB'
            ];
    }
}