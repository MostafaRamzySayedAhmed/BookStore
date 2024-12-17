<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminBookRequest extends FormRequest
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
            'description' => 'required|max:100',
            'publisher' => 'required|max:100',
            'edition' => 'required|numeric|digits_between:1,10',
            'number_pages' => 'required|numeric|digits_between:1,10',
            'price' => 'required|numeric|digits_between:1,10',
            'subcategories' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif|dimensions:min_width=100,min_height=100,
                        max_width=1000,max_height=1000|image|max:4096'
            ];
    }
    
    public function messages()
    {
        return 
            [
                'name.required' => 'The Book Name is Required',
                'name.max' => 'The Book Name Must Not Exceed 100 Characters',
                'description.required' => 'The Book Description is Required',
                'description.max' => 'The Book Description Must Not Exceed 100 Characters',
                'publisher.required' => 'The Book Publisher is Required',
                'publisher.max' => 'The Book Publisher Must Not Exceed 100 Characters',
                'edition.required' => 'The Book Edition is Required',
                'edition.numeric' => 'The Book Edition Must Be of Numbers Only',
                'edition.digits_between' => 'The Book Edition Must Not Exceed 10 Characters',
                'number_pages.required' => 'The Number of Pages is Required',
                'number_pages.numeric' => 'The Number of Pages Must Be of Numbers Only',
                'number_pages.digits_between' => 'The Number of Pages Must Not Exceed 10 Characters',
                'price.required' => 'The Book Price is Required',
                'price.numeric' => 'The Book Price Must Be of Numbers Only',
                'price.digits_between' => 'The Book Price Must Not Exceed 10 Characters',
                'subcategories.required' => 'You Have To Select an Option',
                'image.required' =>  'The Book Image Can Not Be Empty',
                'image.mimes' =>  'The Book Image Must Have an Extension Of png, jpg ,jpeg & gif Only',
                'image.dimensions' => 'The Uploaded Image Must Be Of Width Between 100px & 1000px and Must Be Of Height Between 100px & 1000px',
                'image.image' => 'The Uploaded File Must Be an Image',
                'image.size' => 'The Book Image Size Can Not Exceed 4MB'
            ];
    }
}
