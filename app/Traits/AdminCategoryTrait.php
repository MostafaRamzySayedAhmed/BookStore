<?php

namespace App\Traits;

Trait  AdminCategoryTrait
{
     function save_image($image, $location)
    {
         
        $file_extension = $image -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $location;
        $image -> move($path,$file_name);

        return $file_name;
    }
}