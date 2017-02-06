<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WooCommerce;
use App\SaleList;

class LandingPrincipalPromotions extends Controller
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
			
		$data = $w->getProductDiscountList($page);
		$pages = $w->getProductDiscountTotalPages();
		
		$sales = SaleList::all();
		
		return view('auth.landing-principal-prom.index', compact(array('data', 'pages', 'page', 'sales')));
	}
	
	public function store (Request $r)
	{
		
		$this->validate($r,
		[
			'product_id' => 'max:15|unique:sale_lists|required',
		]);
		$sale = new SaleList();
		$sale->product_id = $r->input('product_id');
		$sale->save();
		
		return response()->json(['message' => 'O produto foi ADICIONADO à lista a apresentar no site'], 200);
	}
	
	public function destroy(Request $r)
	{
		$this->validate($r,
		[
			'product_id' => 'max:15|required',
		]);
		
		$sale = SaleList::where('product_id', '=' ,$r->input('product_id'))->firstOrFail();
		$sale->delete();
		
		return response()->json(['message' => 'O produto foi RETIRADO da lista a apresentar no site'], 200);
	}
}
