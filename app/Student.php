<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    //protected $fillable = ['name', 'email', 'place'];

    public function courses(){
      return $this->belongsToMany(Course::class);
    }
}
