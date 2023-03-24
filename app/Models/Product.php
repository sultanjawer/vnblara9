<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use HasFactory, SoftDeletes;

	public $table = 'products';

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at',
		'published_at',
	];

	protected $fillable = [
		'product_name', // product name. text
		'product_variant', //variant of product. id. leave empty
		'product_category', //category of product. id
		'product_specs', //specs for the post. string
		'product_desc', //desc of the post. text
		'product_short', //short desct for product. text
		'product_mime', //attachment media for the post. string
		'tags', //product tags, string
		'created_at',
		'updated_at',
		'deleted_at',
		'published_at',
	];
}
