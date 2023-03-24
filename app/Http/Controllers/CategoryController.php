<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
		$page_modul = 'Category';
		$heading_class = 'fal fa-list';
		$page_title = 'Post Categories';
		$page_desc = 'Short description for this page'; //
		$categories = Category::all();
		return view('admin.category.index', compact('page_modul', 'heading_class', 'page_title', 'page_desc', 'categories'));
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
		$category = new Category();
		$category->name = $request->input('category_name');
		$category->hexcolor = $request->input('hexcolor');
		$category->textcolor = $request->input('textcolor');

		// dd($request->all());
		$category->save();

		return redirect()->route('categories.index')->with('success', 'Category saved successfully');
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
	public function update(Request $request, Category $category)
	{
		//
		$category->name = $request->input('category_name');
		$category->hexcolor = $request->input('hexcolor');
		$category->textcolor = $request->input('textcolor');

		// dd($request->all());
		$category->update();

		return redirect()->route('categories.index')->with('success', 'Category updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
		$category = Category::findOrFail($id);
		$category->post()->delete();
		$category->delete();
		return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
	}
}
