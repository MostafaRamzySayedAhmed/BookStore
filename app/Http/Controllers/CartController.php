<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cart;
use App\Models\User;
use App\Http\Requests\CartRequest;

use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function show_cart($book_detail_id)
    {
        // No Returning For Collections So We Won't Loop Through It
        $book = Book::find($book_detail_id); 
        
        // $books = Book::where('id', $book_detail_id)->get(); // Returning Collection So We Will Need To Loop Through It
        
        $subcategory = $book->subcategory;
        $cat_id = $subcategory->category_id;
        $subcat = Subcategory::find($cat_id);
        $category = $subcat->Category;
        
        return view('cart', compact(['book', 'subcategory', 'category']));
    }
    
    public function calculate($book_id, CartRequest $request)
    {
        $book = Book::find($book_id);
        
        $subcategory = $book->subcategory;
        $cat_id = $subcategory->category_id;
        $subcat = Subcategory::find($cat_id);
        $category = $subcat->Category;
        
        $price = $book->price;
        $quantity = $request->input('quantity');
        $total = $quantity * $price;
        
        return view('calculate', compact('total', 'quantity', 'book', 'subcategory', 'category'));
    }
    
    public function insert_cart($book_id, CartRequest $request)
    {  
        $book = Book::find($book_id);
        
        $subcategory = $book->subcategory;
        $cat_id = $subcategory->category_id;
        $subcat = Subcategory::find($cat_id);
        $category = $subcat->Category;
 
        $quantity = $request->input('quantity');
        $price = $book->price;
        $total = $quantity * $price;
        $user_id = session('ID');
        
        // Starting The Insert Process
        
        Cart::create([
             'category_name' => $category->name,
             'subcategory_name' => $subcategory->name,
             'book_name' => $book->name,
             'quantity' => $quantity,
             'price' => $price,
             'total' => $total,
             'user_id' => $user_id
         ]);
        
        return redirect()->action(
                    'CartController@view_cart')->with(['success' => 'Your Book was Successfully Added to the Cart']);
    }
    
    public function view_cart()
    {
        $carts = Cart::select('id', 'book_name', 'category_name', 'subcategory_name', 'quantity', 'price', 'total')->get();
        return view('view_cart', ['carts' => $carts, 'error' => 'You Have No Carts']);
    }
    
    public function proced()
    {
        $user_id = session('ID');
        $user = User::find($user_id);
        $carts = $user -> carts;
        if(count($carts) == 0)
        {
           return redirect()->action('CartController@view_cart')
               ->with(['error' => 'You Have to Make a a Cart to Proced to Buy']); 
        }
        else
        {
            return view('proced');
        }  
    }
    
    public function delete_cart($cart_id)
    {
            $cart = Cart::find($cart_id);
            if(!empty($cart))
            {
                $cart->delete();
                $carts = Cart::select('id', 'book_name', 'category_name', 'subcategory_name', 'quantity', 'price', 'total')->get();
                return view('view_cart', compact('carts'));
            }
            else
            {
                $carts = Cart::select('id', 'book_name', 'category_name', 'subcategory_name', 'quantity', 'price', 'total')->get();
                return view('view_cart', compact('carts'));
            }  
    }
    
    public function edit_cart($cart_id)
    {
        $cart = Cart::find($cart_id);
        return view('edit_cart', compact('cart'));
    }
    
    public function update_cart($cart_id, CartRequest $request)
    {
        $quantity = $request->input('quantity');
        $cart = Cart::find($cart_id);
        $price = $cart -> price;
        $total = $quantity * $price;
        $cart->update(['quantity' => $quantity, 'total' => $total]);
        $carts = Cart::select('id', 'book_name', 'category_name', 'subcategory_name', 'quantity', 'price', 'total')->get();
        return view('view_cart', compact('carts'));
    }
}
