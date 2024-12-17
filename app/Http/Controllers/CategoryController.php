<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_categories()
    {
        $categories = Category::get();
        return view('index', compact('categories'));
    }
}