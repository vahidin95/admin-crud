<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //protected $guarded = [];

    protected $fillable = ['course_name'];

    public function students(){
      return $this->belongsToMany(Student::class);
    }
}
