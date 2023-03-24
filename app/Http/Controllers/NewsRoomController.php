<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class NewsRoomController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */



	public function index()
	{
		$page_modul = 'Articles';
		$heading_class = 'fal fa-newspaper';
		$page_title = 'Articles';
		$page_desc = 'Short description for this page';
		$posts = Post::with('Category')->paginate(10);
		$posts->setPath(request()->url());

		return view('guess.news', compact('page_modul', 'heading_class', 'page_title', 'page_desc', 'posts'))->with('pagination_view', 'guess.pagination');
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
		$page_modul = 'Articles';
		$heading_class = 'fal fa-newspaper';
		$page_title = 'Article';
		$page_desc = 'Short description for this page';
		$post = Post::findOrFail($id);
		return view('guess.article', compact('page_modul', 'heading_class', 'page_title', 'page_desc', 'post'));
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
