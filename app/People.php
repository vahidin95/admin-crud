<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
	//protected $fillable = ['name', 'email', 'phone',];

    protected $guarded = [];

    public function car (){

    	return $this->hasMany(Car::class);
    }
}
