<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $fillable=['id', 'first_name','last_name','full_name','username', 'email', 'password', 'group_id', 'registration_status', 'created_at','updated_at'];
    protected $hidden =['created_at','updated_at'];
    public $timestamps = true;
    
    public function  detail()
    {
        return $this ->  hasOne('App\Models\Detail','user_id');
    }
    
    public function books()
    {
        return $this -> belongsToMany('App\Models\Book','user_book','user_id','book_id','id','id');
    }
    
    public function questions()
    {
        return $this -> hasMany('App\Models\Question','user_id','id');
    }
    
    public function carts()
    {
        return $this -> hasMany('App\Models\Cart','user_id','id');
    }
    
}
