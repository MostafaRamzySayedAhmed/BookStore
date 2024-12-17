<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";
    protected $fillable=['id', 'category_name','subcategory_name', 'book_name', 'quantity', 'price', 'total', 'user_id'];
    protected $hidden =[];
    public $timestamps = false;
    
    public function user()
    {
        return $this -> belongsTo('App\Models\User','user_id','id');
    }
    
    public function book()
    {
        return $this -> belongsTo('App\Models\Book','book_id','id');
    }
}
