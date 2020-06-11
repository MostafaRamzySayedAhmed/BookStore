<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Config\Repository;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\Store;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Starting The User Routes

Route::get('/', 'BookController@show_books')->name('homepage');

Route::get('/login', function () {
    return view('login');
});

Route::post('/login_verify', 'UserController@login')->name('login');

Route::get('/logout', 'UserController@logout');

Route::get('/index', 'CategoryController@show_categories')->name('index')->middleware('guest');

Route::get('/home', 'CategoryController@show_categories')->middleware('guest');

Route::get('category_subcats/{category_id}', 'SubcategoryController@show_subcategories')
    ->name('category_subcategories')->middleware('guest');


Route::get('subcats_books/{subcategory_id}', 'SubcategoryController@show_subcategory_books')
    ->name('subcategory_books')->middleware('guest');

Route::get('book_details/{book_id}', 'BookController@show_book_details')
    ->name('book_details')->middleware('guest');

Route::get('cart/{book_detail_id}', 'CartController@show_cart')
    ->name('cart')->middleware('guest');

Route::post('/calculate/{book_id}', 'CartController@calculate')->name('calculate');

Route::post('/insert_cart/{book_id}}', 'CartController@insert_cart')->name('insert_cart');

Route::get('/cart_insert', function(){
    return view('cart_insert');
})->middleware('guest');

Route::get('/view_cart', 'CartController@view_cart')->name('view_cart')->middleware('guest');

Route::get('/proced', 'CartController@proced')->name('proced')->middleware('guest');

Route::post('/insert_details', 'DetailsController@insert_details')->name('insert_details');

Route::get('/payment_options', function(){
    return view ('payment_options');
})->name('payment_options')->middleware('guest');
    
Route::get('/delete_cart/{cart_id}', 'CartController@delete_cart')->name('delete_cart')
                                                                  ->middleware('guest');

Route::get('/edit_cart/{cart_id}', 'CartController@edit_cart')->name('edit_cart')
                                                              ->middleware('guest');

Route::post('/update_cart/{cart_id}', 'CartController@update_cart')->name('update_cart');

Route::get('/profile', 'UserController@show_profile')->middleware('guest');

Route::get('/user_edit', 'UserController@edit_user')->middleware('guest');

Route::post('/user_update', 'UserController@update_user');

Route::get('/register', function () {
    return view('register');
});

Route::post('/registration', 'UserController@register')->name('registration');

Route::get('/question', function () {
    return view('question');
})->middleware('guest');

Route::post('/question_insert', 'QuestionsController@question_insert')->name('question_insert');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// Starting The Admin Routes

Route::prefix('admin')->group(function () {
    
    Route::get('login', function(){
    return view('admin.login'); });
        
    Route::post('login_verify', 'admin\AdminUserController@login')->name('admin.login');

    Route::get('dashboard', 'admin\AdminStaticsController@show_statics')
            ->name('admin.dashboard')->middleware('guest');

    Route::get('logout', 'admin\AdminUserController@logout')->middleware('guest');
    
    Route::get('about', function(){
        return view('admin.about');
    })->middleware('guest');

    Route::get('categories', 'admin\AdminCategoryController@show_categories')
                ->middleware('guest');

    Route::get('books', 'admin\AdminBookController@show_books')->middleware('guest');

    Route::get('users', 'admin\AdminUserController@show_users')->name('show_users')
            ->middleware('guest');

    Route::get('subcategories', 'admin\AdminSubcategoryController@show_subcategories')
            ->middleware('guest');
    
    Route::get('carts', 'admin\AdminCartController@show_carts')->middleware('guest');
    
    Route::get('user_add', 'admin\AdminUserController@add_user')->middleware('guest');
    
    Route::post('user_insert', 'admin\AdminUserController@insert_user');
    
    Route::get('category_add', 'admin\AdminCategoryController@add_category')
            ->middleware('guest');
    
    Route::post('category_insert', 'admin\AdminCategoryController@insert_category');
    
    Route::get('subcategory_add', 'admin\AdminSubcategoryController@add_subcategory')
            ->middleware('guest');
    
    Route::post('subcategory_insert', 'admin\AdminSubcategoryController@insert_subcategory');
    
    Route::get('book_add', 'admin\AdminBookController@add_book')->middleware('guest');
    
    Route::post('book_insert', 'admin\AdminBookController@insert_book');
    
});

Route::get('category_subcategories/{category_id}', 'admin\AdminCategoryController@show_subcategories')->name('show_subcategories')
                                                   ->middleware('guest');

Route::get('subcategory_books/{subcategory_id}', 'admin\AdminSubcategoryController@show_books')
        ->name('show_books')->middleware('guest');

Route::get('user_delete/{user_id}', 'admin\AdminUserController@delete_user')
        ->name('user_delete')->middleware('guest');

Route::get('user_activate/{user_id}', 'admin\AdminUserController@activate_user')
        ->name('user_activate')->middleware('guest');

Route::get('user_deactivate/{user_id}', 'admin\AdminUserController@deactivate_user')
        ->name('user_deactivate')->middleware('guest');

Route::get('user_edit/{user_id}', 'admin\AdminUserController@edit_user')
        ->name('user_edit')->middleware('guest');

Route::post('user_update/{user_id}', 'admin\AdminUserController@update_user')->name('user_update');

Route::get('category_edit/{category_id}', 'admin\AdminCategoryController@edit_category')
        ->name('category_edit')->middleware('guest');

Route::get('subcategory_edit/{subcategory_id}', 'admin\AdminSubcategoryController@edit_subcategory')
        ->name('subcategory_edit')->middleware('guest');

Route::get('book_edit/{book_id}', 'admin\AdminBookController@edit_book')
        ->name('book_edit')->middleware('guest');

Route::post('category_update/{category_id}', 'admin\AdminCategoryController@update_category')
    ->name('category_update');

Route::post('subcategory_update/{subcategory_id}', 'admin\AdminSubcategoryController@update_subcategory')
    ->name('subcategory_update');

Route::post('book_update/{book_id}', 'admin\AdminBookController@update_book')
    ->name('book_update');

Route::get('category_delete/{category_id}', 'admin\AdminCategoryController@delete_category')
        ->name('category_delete')->middleware('guest');

Route::get('subcategory_delete/{subcategory_id}', 'admin\AdminSubcategoryController@delete_subcategory')
        ->name('subcategory_delete')->middleware('guest');

Route::get('book_delete/{book_id}', 'admin\AdminBookController@delete_book')
        ->name('book_delete')->middleware('guest');

Route::get('cart_delete/{cart_id}', 'admin\AdminCartController@delete_cart')->name('cart_delete')
                                                                        ->middleware('guest');
