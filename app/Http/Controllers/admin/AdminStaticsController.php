<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminStaticsController extends Controller
{
    public function show_statics()
    {
        // Getting The Number Of Users
        $users = User::get();
        $users_number = count($users);
        
        // Getting The Number Of Categories
        $categories = Category::get();
        $categories_number = count($categories);
        
        // Getting The Number Of Sub-Categories
        $subcategories = Subcategory::get();
        $subcategories_number = count($subcategories);
        
        // Getting The Number Of Books
        $books = User::get();
        $books_number = count($books);
        
        // Getting The Latest 5 Users
        
        $latest_users = DB::table('users')
                ->limit(5)
                ->get();
        
        // Getting The Latest 5 Books
        
        $latest_books = DB::table('books')
                ->limit(5)
                ->get();
        
        // Getting The Latest 5 Categories
        
        $latest_categories = DB::table('categories')
                ->limit(5)
                ->get();
        
        // Getting The Latest 5 Sub-Categories
        
        $latest_subcategories = DB::table('subcategories')
                ->limit(5)
                ->get();
        
        return view('admin.dashboard', compact('users_number', 'categories_number', 'subcategories_number', 'books_number', 'latest_users', 'latest_books', 'latest_categories', 'latest_subcategories'));
    }
}
