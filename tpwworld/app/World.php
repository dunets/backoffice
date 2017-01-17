<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class World extends Model
{
	protected $table = "world";
	protected $fillable = array("id", "country", "capital", "population");
	
}
