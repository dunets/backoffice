<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
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
}
