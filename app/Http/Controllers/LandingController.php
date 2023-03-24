<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class LandingController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
		$page_title = 'Home';
		$posts = Post::latest()
			->limit(3)
			->where('post_status', 'Published')
			->get();
		$moreposts = Post::latest()
			->limit(4)
			->where('post_status', 'Published')
			->get();
		$products = Product::latest()
			->limit(3)
			->get();
		$moreproducts = Product::latest()
			->limit(4)
			->get();
		// dd($posts);
		return view('guess.welcome', compact('page_title', 'posts', 'moreposts', 'products', 'moreproducts'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
