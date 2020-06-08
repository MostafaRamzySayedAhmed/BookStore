<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subcategory;

use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function show_subcategories($category_id)
    {
        $category = Category::find($category_id);
        $subcategores = $category->subcategories;
        return view('subcategores', compact('subcategores'));
    }
    
    public function show_subcategory_books($subcategory_id)
    {
        $subcategory = Subcategory::find($subcategory_id);
        $books = $subcategory->books;
        return view('books', compact('books'));
    }
}
