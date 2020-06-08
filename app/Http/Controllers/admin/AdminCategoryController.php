<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use App\Traits\AdminCategoryTrait;
use App\Http\Requests\admin\AdminCategoryRequest;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    use AdminCategoryTrait;
    
    public function show_categories()
    {
        $categories = Category::get();
        return view('admin.categories', compact('categories'));
    }
    
    public function show_subcategories($category_id)
    {
        $category = Category::find($category_id);
        
        // For Deleting The Sub-Category Itself Not Through It's Parent
        
        if(empty($category))
        {
            return view('admin.category_subcategories', ['category' => $category,
                                                         'error' => 'There are No Categories']);
        }
        else
        {
            $subcategories = $category -> subcategories;
            return view('admin.category_subcategories', ['subcategories' => $subcategories,
                                                         'category' => $category,
                                                         'error' => 'There are No Categories']);
        }
        
    }
    
    public function add_category()
    {
        return view('admin.category_add');
    }
    
    public function insert_category(AdminCategoryRequest $request)
    {
        /* Starting The Validation Phase */
        
        $name = $request->input('name');
        $description = $request->input('description');
        $file_name = $this->save_image($request->image, 'admin/layout/images/categories');
        
        /* Starting The Filtration Phase */
        
        $filtered_name = filter_var($name, FILTER_SANITIZE_STRING);
        $filtered_description = filter_var($description, FILTER_SANITIZE_STRING);
        
        Category::create([
            
            'name' => $filtered_name,
            'description' => $filtered_description,
            'image' => $file_name
        ]);
        
        return redirect('admin/categories')
                         ->with(['success' => 'The Category was Successfully Added']);
    }
    
    public function edit_category($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category_edit', ['category' => $category]);
    }
    
    public function update_category(AdminCategoryRequest $request, $category_id)
    {
        $category = Category::find($category_id);
        $name = $request->input('name');
        $description = $request->input('description');
        $file_name = $this->save_image($request->image, 'admin/layout/images/categories');
        
        /* Starting The Filtration Phase */
        
        $filtered_name = filter_var($name, FILTER_SANITIZE_STRING);
        $filtered_description = filter_var($description, FILTER_SANITIZE_STRING);

        $category -> update([
             'name' => $filtered_name,
             'description' => $filtered_description,
             'image' => $file_name
         ]);
            
        $categories = DB::table('categories')->get();
        return view('admin.categories', ['categories' => $categories, 'success' => 'The Category was Successfully Updated']);
    }
    
    public function delete_category($ctegory_id)
    {
        $category = Category::find($ctegory_id);
        $subcategories = $category -> subcategories;
        
        if(!empty($category))
            {
                
                foreach($subcategories as $subcategory)
                {
                    $subcategory_id = $subcategory -> id;
                    $subcategory_specific = Subcategory::find($subcategory_id);
                    $books = $subcategory_specific -> books;
                    foreach($books as $book)
                    {
                        $book->delete();
                    }
                    
                    $subcategory->delete();
                    
                    $category->delete();
                }
            
                $categories = DB::table('categories')->get();
                return view('admin.categories', ['categories' => $categories, 
                                                 'success' => 'The Category was Successfully Deleted']);
            }
            else
            {
                $categories = DB::table('categories')->get();
                return view('admin.categories', ['categories' => $categories]);
            } 
        
    }
}
