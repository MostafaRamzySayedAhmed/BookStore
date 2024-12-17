<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = "subcategories";
    protected $fillable=['id', 'name', 'description', 'image', 'category_id'];
    protected $hidden =[];
    public $timestamps = false;
    
    public function category()
    {
        return $this -> belongsTo('App\Models\Category','category_id','id');
    }
    
    public function books()
    {
        return $this -> hasMany('App\Models\Book','subcategory_id','id');
    }
}
