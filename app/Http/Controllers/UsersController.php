<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		
		$data = User::all();
		
		return view('auth.users.index', compact('data'));
	}
	
	public function create ()
	{
		return view('auth.users.create');
	}
	
	public function show ($id)
	{
		
		$user = User::find($id);
		
		return view('auth.users.show', compact('user'));
	}
	
	public function store (Request $r)
	{
		$this->validate($r,
		[
			'name' => 'max:60|required',
			'email' => 'max:30|unique:users,email|email|required',
			'password' => 'max:30|min:3|required',
			'password_repeat' => 'max:30|min:3|required|same:password',
		]);

		$data = $r->all();

		$data['password'] = bcrypt($data['password']);

		User::create($data);

		return redirect('/users');
	}
	
	public function update (Request $r, $id)
	{
		$this->validate($r,
		[
			'name' => 'max:60',
			'email' => 'max:30|email',
			'password' => 'max:30|min:3',
			'password_repeat' => 'max:30|min:3|same:password',
		]);

		$data = $r->all();
		
		$user = User::find($id);
		
		if(!empty($data['name']))
			$user->name = $data['name'];
		if(!empty($data['email']))
			$user->email = $data['email'];
		
		if(!empty($data['password']))
			$user->password = bcrypt($data['password']);
		
		$user->save();

		return redirect('/users');
	}
	
	public function destroy ($id)
	{
		$user = User::find($id);
		$user_count = sizeof(User::all());
		
		
		if(Auth::user()->id == $user['id'])
			return redirect()->back()->withErrors(['Não pode eliminar a sua própria conta']);
		
		if($user_count == 1)
			return redirect()->back()->withErrors(['Impossível eliminar a última conta de utilizador, crie outra antes de eliminar esta']);
		
		$user->delete();
		return redirect('/users');
	}
}
