<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
		$page_modul = 'Articles';
		$heading_class = 'fal fa-newspaper';
		$page_title = 'Articels';
		$page_desc = 'Short description for this page'; //
		$posts = Post::with('Category')->get();

		return view('admin.posts.index', compact('page_modul', 'heading_class', 'page_title', 'page_desc', 'posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
		$page_modul = 'Articles';
		$heading_class = 'fal fa-newspaper';
		$page_title = 'Create Article';
		$page_desc = 'Short description for this page'; //
		$categories = Category::all();

		return view('admin.posts.create', compact('page_modul', 'heading_class', 'page_title', 'page_desc', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//dd($request->all());
		$detail = $request->summernoteInput;

		$post = new Post();
		$post->post_title = $request->input('post_title');
		$post->post_content = $detail;
		$post->category_id = $request->input('category_id');
		$post->post_exerpt = $request->input('post_exerpt');
		$post->tags = $request->input('tags');

		if ($request->hasFile('mime')) {
			$image = $request->file('mime');
			$image_name =  $post->id . '_' . time() . '.' . $image->getClientOriginalExtension();
			Storage::disk('public')->putFileAs('img/post_img', $image, $image_name);
			$post->mime = $image_name;
			$post->post_status = 'Published';
			$post->published_at = Carbon::now();
		}
		// dd($post);
		$post->save();
		return redirect()->route('posts.index')
			->with('success', 'Post created');
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
		$page_modul = 'Articles';
		$heading_class = 'fal fa-edit';
		$page_title = 'Edit Article';
		$page_desc = 'Short description for this page'; //
		$categories = Category::all();
		$post = Post::findOrFail($id);
		$defaultimg = url('storage/img/images/default-100.jpg');

		return view('admin.posts.edit', compact('page_modul', 'heading_class', 'page_title', 'page_desc', 'post', 'defaultimg', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Post $post)
	{
		$detail = $request->summernoteInput;

		$post->post_title = $request->input('post_title');
		$post->post_content = $detail;
		$post->category_id = $request->input('category_id');
		$post->post_exerpt = $request->input('post_exerpt');
		$post->tags = $request->input('tags');

		if ($request->hasFile('mime')) {
			$image = $request->file('mime');
			$image_name = $post->id . '_' . time() . '.' . $image->getClientOriginalExtension();
			Storage::disk('public')->putFileAs('img/post_img', $image, $image_name);
			$post->mime = $image_name;
			$post->post_status = 'Published';
		}

		$post->update();

		return redirect()->route('posts.index')->with('success', 'Article updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
		$post = Post::findOrFail($id);
		$post->delete();
		return redirect()->route('posts.index')->with('success', 'Article deleted successfully');
	}
}
