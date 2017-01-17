<?php

namespace App\Http\Controllers;
use App\WooCommerce;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//return view('auth.home.index');
		$d = new WooCommerce;
		//return $d->getProductList();
		return $d->getProduct('9');
		return $d->getProductList([
			'status' => 'any'
		]);
	}
}
