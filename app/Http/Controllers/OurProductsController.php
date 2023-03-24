<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class OurProductsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$page_title = 'Our Products';
		$ourproducts = Product::all();
		// dd($ourproducts);
		return view('guess.products', compact('page_title', 'ourproducts'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$page_title = 'Our Products';
		$product = Product::find($id);
		return view('guess.product', compact('page_title', 'product'));
	}
}
