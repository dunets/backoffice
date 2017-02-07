<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WooCommerce;
use App\SaleList;
use App\LandingPrincipal as Landing;
use Exception;

class LandingPrincipal extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index(Request $r)
	{
		$w = new WooCommerce;
		
		$sales = SaleList::all();
		
		$data = Landing::first();
		
		return view('auth.landing_principal.index', compact('data'));
	}
	
	public function update (Request $r)
	{
		$this->validate($r,
		[
			'id_destaque' => 'integer|required|max:15',
			'titulo_destaque' => 'required|max:255',
			'desc_destaque' => 'required|max:255',
			'img_destaque' => 'required|max:255',
			'url_destaque' => 'required|max:255',
			
			'img_destaque_down' => 'required|max:255',
			'features_title_1' => 'required|max:255',
			'features_desc_1' => 'required|max:600',
			'features_title_2' => 'required|max:255',
			'features_desc_2' => 'required|max:600',
			'features_title_3' => 'required|max:255',
			'features_desc_3' => 'required|max:600',
			'features_title_4' => 'required|max:255',
			'features_desc_4' => 'required|max:600',
			'features_title_5' => 'required|max:255',
			'features_desc_5' => 'required|max:600',
			'features_title_6' => 'required|max:255',
			'features_desc_6' => 'required|max:600',
			
			
			'img_destaque_line' => 'required|max:255',
			'title_destaque_line' => 'required|max:255',
			'desc_destaque_line' => 'required|max:900',
			'url_destaque_line' => 'required|max:255',
			
			'receive_email' => 'required|max:60|email',
			'contact_text' => 'required|max:900',
			
			'seo_title' => 'required|max:255',
			'seo_keywords' => 'required|max:255',
			'seo_desc' => 'required|max:900',
			'seo_og_title' => 'required|max:255',
			'seo_og_desc' => 'required|max:900',
			'seo_og_url' => 'required|max:255',
		]);
		
		$w = new WooCommerce;
		
		$data = $r->all();
		try{
			$data['price_destaque'] = $w->getProductPrice($r->input('id_destaque'));
		} 
		catch(\Exception $e){
			return redirect()->back()->withErrors(['Produto com este ID não existe, altere o ID do produto em destaque']);
		}
		unset($data['_method']);
		unset($data['_token']);
		
		$landing = Landing::first();
		$landing->update($data);
		
		$landing->save();
		
		return redirect()->back()->with('success', 'Os campos foram editados com sucesso');
		
	}
}
