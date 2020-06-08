<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";
    protected $fillable=['id', 'name','description','publisher','edition', 'number_pages', 'price', 'image', 'created_at','updated_at', 'subcategory_id'];
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    
    public function subcategory()
    {
        return $this -> belongsTo('App\Models\Subcategory','subcategory_id','id');
    }
    
    public function users()
    {
        return $this -> belongsToMany('App\Models\User','user_book','book_id','user_id','id','id');
    }
    
    public function carts()
    {
        return $this -> hasMany('App\Models\Cart','book_id','id');
    }
}
