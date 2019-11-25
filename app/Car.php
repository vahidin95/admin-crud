<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name','type','color','people_id'];

    //protected $guarded = [];

    public function people (){

    	return $this->belongsTo(People::class);
    } 

}
