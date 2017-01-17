<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\World;
use Illuminate\Http\Request;

class WorldController extends Controller
{
	public function index()
	{
		$countries = World::all()->sortBy("id");
        
		return view("world.index", ["countries" => $countries]);
	}
	
	public function create ()
	{
		return view("world.create");
	}
	
	public function store (Request $r)
	{

		$this->validate($r,
		[
			'country' => 'required',
			'capital' => 'required',
			'population' => 'required',
		]);

		$c = new World();
		$c->country = $r->country;
		$c->population = $r->population;
		$c->capital = $r->capital;
		$c->save();

		return redirect('/world');
	}
	
	public function destroy($id)
	{
		$c = World::find($id);
		$c->delete();
		return redirect('/world');
	}
}
