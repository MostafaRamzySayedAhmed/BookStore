<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cart;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show_books()
    {
        $books = Book::select('id',
            'name',
            'description',
            'publisher',
            'edition',
            'number_pages',
            'price',
            'image'
        )->get();
        
        return view('homepage', compact('books'));
    }
    
    public function show_book_details($book_id)
    {
        $book_details = Book::where('id', $book_id)->get();
        return view('book_details', compact('book_details'));
    }
}
