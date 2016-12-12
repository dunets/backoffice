<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WooCommerce;

class StoreController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		$w = new WooCommerce;
		$data = $w->getProductList([
			'status' => 'any'
		]);
		return view('auth.store.index', compact('data'));
	}
	
	public function show($product_id)
	{
		$w = new WooCommerce;
		$produto = $w->getProduct($product_id);
		return view('auth.store.show', compact('produto'));
	}
	
	public function upload(Request $request)
	{
		$this->validate($request, [
					'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);

			$imageName = time().'.'.$request->image->getClientOriginalExtension();
			$request->image->move(public_path('images'), $imageName);

		/*return back()
			->with('success','Image Uploaded successfully.')
			->with('location',$imageName);*/
		
		return json_encode(array('location' => $imageName));
		//return $imageName;
	}
}
