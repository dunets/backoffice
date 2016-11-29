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
			$d = new WooCommerce;
			$data = $d->getList();
      return view('home', compact('data'));
			//return $data;
    }
}
