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
	
	public function index(Request $r)
	{
		$w = new WooCommerce;
		
		$page = $r->input('page');
		if(empty($page) || $page < 1)
			$page = 1;
			
		$data = $w->getProductList($page);
		$pages = $w->getProductTotalPages();
		return view('auth.store.index', compact(array('data', 'pages', 'page')));
	}
	
	public function show($product_id)
	{
		$w = new WooCommerce;
		$product = $w->getProduct($product_id);
		return view('auth.store.show', compact('product'));
	}
	
	public function update(Request $data, $product_id)
	{
		$w = new WooCommerce;
		$data = $w->validateProduct($this, $data);
		$w->updateProduct($product_id, $data);
		return redirect('/store');
	}
	
	public function destroy($product_id)
	{
		$w = new WooCommerce;
		$w->deleteProduct($product_id);
		return redirect('/store');
	}
}
