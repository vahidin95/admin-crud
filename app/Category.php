<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //protected $fillable = ['title', 'description']; //if I turned on $fillable than I can access to any relationships //fixed :D

    protected $guarded = [];

    public function post(){

   		return $this->hasMany(Post::class);
    }
}
