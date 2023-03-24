<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
		$page_modul = 'Product';
		$heading_class = 'fal fa-newspaper';
		$page_title = 'Product List';
		$page_desc = 'Short description for this page'; //
		$defaultimg = url('storage/img/image/default-100.jpg');
		$products = Product::all();

		return view('admin.products.index', compact('page_modul', 'heading_class', 'page_title', 'page_desc', 'products', 'defaultimg'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
		$page_modul = 'Product';
		$heading_class = 'fal fa-cart-plus';
		$page_title = 'Add Product';
		$page_desc = 'Short description for this page'; //
		return view('admin.products.create', compact('page_modul', 'heading_class', 'page_title', 'page_desc'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
		$product = new Product();

		$detail = $request->summernoteInput;

		$product->product_name = $request->input('product_name');
		$product->product_desc = $detail;
		$product->product_short = $request->input('product_short');
		$product->product_specs = $request->input('product_specs');
		$product->product_name = $request->input('product_name');

		if ($request->hasFile('product_mime')) {
			$image = $request->file('product_mime');
			$image_name =  $product->id . '_' . time() . '.' . $image->getClientOriginalExtension();
			Storage::disk('public')->putFileAs('img/product_img', $image, $image_name);
			$product->product_mime = $image_name;
		}
		// dd($request->all());
		$product->save();
		return redirect()->route('products.index')->with('success', 'Product added successfully');
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
		$page_modul = 'Product';
		$heading_class = 'fal fa-edit';
		$page_title = 'Edit Product';
		$page_desc = 'Short description for this page'; //
		$defaultimg = url('storage/img/images/default-100.jpg');
		$product = Product::findOrFail($id);

		return view('admin.products.edit', compact('page_modul', 'heading_class', 'page_title', 'page_desc', 'product', 'defaultimg'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Product $product)
	{
		//
		$detail = $request->summernoteInput;

		$product->product_name = $request->input('product_name');
		$product->product_desc = $detail;
		$product->product_short = $request->input('product_short');
		$product->product_specs = $request->input('product_specs');
		$product->product_name = $request->input('product_name');

		if ($request->hasFile('product_mime')) {
			$image = $request->file('product_mime');
			$image_name =  $product->id . '_' . time() . '.' . $image->getClientOriginalExtension();
			Storage::disk('public')->putFileAs('img/product_img', $image, $image_name);
			$product->product_mime = $image_name;
		}
		// dd($request->all());
		$product->update();
		return redirect()->route('products.index')->with('success', 'Product updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
		$product = Product::findOrFail($id);
		$product->delete();
		return redirect()->route('product.index')->with('success', 'Your product deleted successfully');
	}
}
