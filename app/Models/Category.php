<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable=['id', 'name', 'description', 'image'];
    protected $hidden =[];
    public $timestamps = false;
    
    public function subcategories()
    {
        return $this -> hasMany('App\Models\Subcategory','category_id','id');
    }
}
