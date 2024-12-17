<?php

namespace App\Http\Controllers\admin;
use App\Models\Subcategory;
use App\Models\Category;
use App\Traits\AdminSubcategoryTrait;
use App\Http\Requests\admin\AdminSubcategoryRequest;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSubcategoryController extends Controller
{
    use AdminSubcategoryTrait;
    
    public function show_subcategories()
    {
        $subcategories = Subcategory::get();
        return view('admin.subcategories', ['subcategories' => $subcategories,
                                             'error' => 'There are No Sub-Categories']);
    }
    
    public function show_books($subcategory_id)
    {
        $subcategory = Subcategory::find($subcategory_id);
        $books = $subcategory -> books;
        return view('admin.subcategory_books',
                    ['books' => $books, 'error' => 'There are No Books']);
    }
    
    public function add_subcategory()
    {
        $categories = Category::get();
        return view('admin.subcategory_add', compact('categories'));
    }
    
    public function insert_subcategory(AdminSubcategoryRequest $request)
    {
        /* Starting The Validation Phase */
        
        $name = $request->input('name');
        $description = $request->input('description');
        $category_id = $request->input('categories');
        $file_name = $this->save_image($request->image, 'admin/layout/images/subcategories');
        
        /* Starting The Filtration Phase */
        
        $filtered_name = filter_var($name, FILTER_SANITIZE_STRING);
        $filtered_description = filter_var($description, FILTER_SANITIZE_STRING);
        
        Subcategory::create([
            
            'name' => $filtered_name,
            'description' => $filtered_description,
            'category_id' => $category_id,
            'image' => $file_name
        ]);
        
        return redirect()->route('show_subcategories', $category_id)
                         ->with(['success' => 'The Sub-Category was Successfully Added']);
    }
    
    public function delete_subcategory($subcategory_id)
    {
        $subcategory = Subcategory::find($subcategory_id);
        $books = $subcategory -> books;
        $subcategory ->delete();
        
        foreach($books as $book)
                {
                    $book->delete();
                }
        /* 
        Redirecting The User To The General Sub-Categories Whatever The Category Which Contains The Sub-Category The User Deleted
        
        $subcategories = DB::table('subcategories')->get();
        return view('admin.subcategories', ['subcategories' => $subcategories, 'success' => 'The Sub-Category was Successfully Deleted']);
        */
         
    // Redirecting The User To A Specific Category Which Contains The Sub-Category The User Deleted
        
            return redirect()->action(
                    'admin\AdminCategoryController@show_subcategories', ['category_id' => $subcategory -> category_id])->with(['success' => 'The Sub-Category Was Successfully Deleted']);
        
    }
    
    public function edit_subcategory($subcategory_id)
    {
        $subcategory = Subcategory::find($subcategory_id);
        $categories = Category::get();
        return view('admin.subcategory_edit', ['subcategory' => $subcategory,
                                               'categories' => $categories]);
    }
    
    public function update_subcategory(AdminSubcategoryRequest $request, $subcategory_id)
    {
        /* Starting The Validation Phase */
        
        $subcategory = Subcategory::find($subcategory_id);
        $name = $request->input('name');
        $description = $request->input('description');
        $category_id = $request->input('categories');
        $file_name = $this->save_image($request->image, 'admin/layout/images/subcategories');
        
        /* Starting The Filtration Phase */
        
        $filtered_name = filter_var($name, FILTER_SANITIZE_STRING);
        $filtered_description = filter_var($description, FILTER_SANITIZE_STRING);

        $subcategory -> update([
             'name' => $filtered_name,
             'description' => $filtered_description,
             'category_id' => $category_id,
             'image' => $file_name
         ]);
        
        /* 
        Redirecting The User To The General Sub-Categories Whatever The Category Which Contains The Sub-Category The User Edited
        
        $subcategories = DB::table('subcategories')->get();
        return view('admin.subcategories', ['subcategories' => $subcategories, 'success' => 'The Sub-Category was Successfully Updated']);
        */
         
    // Redirecting The User To A Specific Category Which Contains The Sub-Category The User Edited
        
        return redirect()->action(
                    'admin\AdminCategoryController@show_subcategories', ['category_id' => $subcategory -> category_id])->with(['success' => 'The Sub-Category Was Successfully Edited']);
    }
    
}
