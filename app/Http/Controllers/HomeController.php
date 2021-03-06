<?php

namespace App\Http\Controllers;
use App\WooCommerce;
use Illuminate\Http\Request;
use App\LandingPrincipal as Landing;
use App\SaleList;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		
		$data = Landing::first();
		$sales = SaleList::all();
		
		return view('home.index', compact('data', 'sales'));
	}
	
	public function store (Request $r)
	{
		
		
		$this->validate($r,
		[
			'name' => 'max:100|required',
			'email' => 'max:100|email|required',
			'mensagem' => 'max:20000|required',
		]);
		
		$name = $r->input('name');
		$email= $r->input('email');
		$mensagem= $r->input('mensagem');
		
		
		$my_mail = Landing::first()->receive_email;
		$subject = "Uma nova mensagem do site DIVANESSE";


		$message = view('mail.index', [
			'name' => $name,
			'email' => $email,
			'mensagem' => $mensagem,
		]);
	
	
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: DIVANESSE<". $my_mail .">\r\n";
	
		mail($my_mail, $subject, $message, $headers);
		
		return response()->json(['success'=>true], 200);
	}
}
