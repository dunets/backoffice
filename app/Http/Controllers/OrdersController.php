<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WooCommerce;

class OrdersController extends Controller
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
			
		$data = $w->getOrdersList($page);
		$pages = $w->getOrdersTotalPages();
		return view('auth.orders.index', compact(array('data', 'pages', 'page')));
	}
	
	public function show($id)
	{
		$w = new WooCommerce;
		$order = $w->getOrder($id);
		return view('auth.orders.show', compact('order'));
	}
	
	public function update(Request $data, $id)
	{
		$w = new WooCommerce;
		$data = $w->validateOrder($this, $data);
		$w->updateOrder($id, $data);
		return redirect('/orders');
	}
	
	public function destroy($id)
	{
		$w = new WooCommerce;
		$w->deleteOrder($id);
		return redirect('/orders');
	}
}
