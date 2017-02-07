<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleList extends Model
{
	protected $fillable = [
		'product_id',
		'url',
		'img',
		'price',
	];
}
