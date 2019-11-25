<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Guarded example
      protected $guarded = [];
     // protected $fillable = ['name', 'body', 'status', 'image', 'category_id', 'user_id',];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query){

    	return $query->where('status', 1);
    }

    public function scopeInactive($query){

    	return $query->where('status', 0);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

}
