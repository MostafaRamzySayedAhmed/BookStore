<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable=['id', 'email','question','user_id'];
    protected $hidden =[];
    public $timestamps = false;
    
    public function user()
    {
        return $this -> belongsTo('App\Models\User','user_id','id');
    }
}
