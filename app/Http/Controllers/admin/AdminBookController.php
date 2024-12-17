<?php

namespace App\Http\Controllers\admin;
use App\Models\Book;
use App\Models\Subcategory;
use App\Http\Requests\admin\AdminBookRequest;
use App\Traits\AdminBookTrait;
use Illuminate\Support\Facades\DB;
    
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    use AdminBookTrait;
    
    public function show_books()
    {
        $books = Book::get();
        return view('admin.books', compact('books'));
    }
    
    public function add_book()
    {
        $subcategories = Subcategory::get();
        return view('admin.book_add', compact('subcategories'));
    }
    
    public function insert_book(AdminBookRequest $request)
    {
        /* Starting The Validation Phase */
        
        $name = $request->input('name');
        $description = $request->input('description');
        $publisher = $request->input('publisher');
        $edition = $request->input('edition');
        $number_pages = $request->input('number_pages');
        $price = $request->input('price');
        $subcategory_id = $request->input('subcategories');
        $file_name = $this->save_image($request->image, 'admin/layout/images/books');
        
        /* Starting The Filtration Phase */
        
        $filtered_name = filter_var($name, FILTER_SANITIZE_STRING);
        $filtered_description = filter_var($description, FILTER_SANITIZE_STRING);
        $filtered_publisher = filter_var($publisher, FILTER_SANITIZE_STRING);
        $filtered_edition = filter_var($edition, FILTER_SANITIZE_NUMBER_INT);
        $filtered_number_pages = filter_var($number_pages, FILTER_SANITIZE_NUMBER_INT);
        $filtered_price = filter_var($price, FILTER_SANITIZE_NUMBER_INT);
        
        Book::create([
            
            'name' => $filtered_name,
            'description' => $filtered_description,
            'publisher' => $filtered_publisher,
            'edition' => $filtered_edition,
            'number_pages' => $filtered_number_pages,
            'price' => $filtered_price,
            'subcategory_id' => $subcategory_id,
            'image' => $file_name
        ]);
        
        return redirect()->route('show_books', $subcategory_id)
                         ->with(['success' => 'The Book was Successfully Added']);
    }
    
    public function delete_book($book_id)
    {
        $book = Book::find($book_id);
        $subcategory = $book -> subcategory;
        
        $book->delete();
    
        /* 
        Redirecting The User To The General Books Whatever The Sub-Category Which Contains The Book The User Deleted
        
        $books = DB::table('books')->get();
        return view('admin.books', ['books' => $books, 'success' => 'The Book was Successfully Deleted']);
        */
         
    // Redirecting The User To A Specific Sub-Category Which Contains The Book The User Deleted
        
            return redirect()->action('admin\AdminSubcategoryController@show_books',
                                     ['subcategory_id' => $subcategory -> id])
                ->with(['success' => 'The Book Was Successfully Deleted']);
        
    }

        public function edit_book($book_id)
            {
                $book = Book::find($book_id);
                $subcategories = Subcategory::get();
                return view('admin.book_edit', ['book' => $book,
                                                       'subcategories' => $subcategories]);
            }
    
        public function update_book(AdminBookRequest $request, $book_id)
    {
            /* Starting The Validation Phase */
            
            $book = Book::find($book_id);
            $name = $request->input('name');
            $description = $request->input('description');
            $publisher = $request->input('publisher');
            $edition = $request->input('edition');
            $number_pages = $request->input('number_pages');
            $price = $request->input('price');
            $subcategory_id = $request->input('subcategories');
            $file_name = $this->save_image($request->image, 'admin/layout/images/books');

            /* Starting The Filtration Phase */

            $filtered_name = filter_var($name, FILTER_SANITIZE_STRING);
            $filtered_description = filter_var($description, FILTER_SANITIZE_STRING);
            $filtered_publisher = filter_var($publisher, FILTER_SANITIZE_STRING);
            $filtered_edition = filter_var($edition, FILTER_SANITIZE_NUMBER_INT);
            $filtered_number_pages = filter_var($number_pages, FILTER_SANITIZE_NUMBER_INT);
            $filtered_price = filter_var($price, FILTER_SANITIZE_NUMBER_INT);

            $book -> update([
                 'name' => $filtered_name,
                 'description' => $filtered_description,
                 'publisher' => $filtered_publisher,
                 'edition' => $filtered_edition,
                 'number_pages' => $filtered_number_pages,
                 'price' => $filtered_price,
                 'subcategory_id' => $subcategory_id,
                 'image' => $file_name
             ]);
        
        /* 
        Redirecting The User To The General Books Whatever The Sub-Category Which Contains The Book The User Edited
        
        $books = DB::table('books')->get();
        return view('admin.books', ['books' => $subcategories, 'success' => 'The Book was Successfully Updated']);
        */
         
    // Redirecting The User To A Specific Sub-Category Which Contains The Book The User Edited
        
        return redirect()->action(
                    'admin\AdminSubcategoryController@show_books', ['subcategory_id' => $book -> subcategory_id])->with(['success' => 'The Book Was Successfully Edited']);
    }
    
    
}