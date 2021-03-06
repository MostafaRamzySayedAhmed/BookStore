<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = "details";
    protected $fillable=['id', 'name','address','postal_code','city', 'state', 'street', 'phone', 'user_id'];
    protected $hidden =[];
    public $timestamps = false;
    
    public function  user()
    {
        return $this ->  belongsTo('App\Models\User','user_id');
    }
}
