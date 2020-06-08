<?php

namespace App\Http\Controllers\Admin;
use App\Models\Cart;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCartController extends Controller
{
    public function show_carts()
    {
        $carts = Cart::get();
        foreach($carts as $cart)
        {
            $user_id = $cart -> user_id;
            $user = User::find($user_id);
            $username = $user -> username;
        }
        
        if(count($carts) == 0)
                {
                    $carts = Cart::select('id', 'book_name', 'category_name', 'subcategory_name', 'quantity', 'price', 'total')->get();
                    return view('admin.carts', ['carts' => $carts,
                                                'error' => 'There are No Carts']);
                }
        
        return view('admin.carts', ['carts' => $carts, 'username' => $username,
                                    'error' => 'There are No Carts']);  
    }
    
    public function delete_cart($cart_id)
    {
            $cart_deleted = Cart::find($cart_id);
            $carts_general = Cart::get();
            if(!empty($cart_deleted))
            {
                foreach($carts_general as $cart_general)
                {
                    $user_id = $cart_general -> user_id;
                    $user = User::find($user_id);
                    $username = $user -> username;
                }
                
                $cart_deleted->delete();
                $carts = Cart::select('id', 'book_name', 'category_name', 'subcategory_name', 'quantity', 'price', 'total')->get();
                return view('admin.carts', ['carts' => $carts, 'username' => $username,
                                            'error' => 'There are No Carts']);
            }
            else
            {
                $carts_general = Cart::get();
                foreach($carts_general as $cart_general)
                {
                    $user_id = $cart_general -> user_id;
                    $user = User::find($user_id);
                    $username = $user -> username;
                }
                
                if(count($carts_general) == 0)
                {
                    $carts = Cart::select('id', 'book_name', 'category_name', 'subcategory_name', 'quantity', 'price', 'total')->get();
                    return view('admin.carts', ['carts' => $carts,
                                                'error' => 'There are No Carts']);
                }
                
                $carts = Cart::select('id', 'book_name', 'category_name', 'subcategory_name', 'quantity', 'price', 'total')->get();
                return view('admin.carts', ['carts' => $carts, 'username' => $username,
                                            'error' => 'There are No Carts']);
            }  
    }
    
}