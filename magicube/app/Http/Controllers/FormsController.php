<?php

namespace App\Http\Controllers;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class FormsController
{
	public function orders (Request $r) {
		
		$this->validate($r,
		[
			'name' => 'max:100|required',
			'tel' => 'max:100|required',
			'email' => 'max:100|email|required',
			'mensagem' => 'max:10000|required',
			'type' => 'max:3|required',
		]);
		
		$data = [
			'name' => $r->name,
			'tel' => $r->tel,
			'email' => $r->email,
			'mensagem' => $r->mensagem,
			'type' => $r->type,
			'message-type' => 'Plantas/Encomendas'
		]
		
		Mail::to('ivanxd@live.com.pt')
 			->send(new Contact($data));
		
		return redirect('/budget');
	}
	
	public function budget (Request $r) {
		$this->validate($r,
		[
			'name' => 'max:100|required',
			'tel' => 'max:100|required',
			'email' => 'max:100|email|required',
			'mensagem' => 'max:10000|required',
			'type' => 'max:3|required',
		]);
		
		$data = [
			'name' => $r->name,
			'tel' => $r->tel,
			'email' => $r->email,
			'mensagem' => $r->mensagem,
			'message-type' => 'Orçamento'
		]
		
		Mail::to('ivanxd@live.com.pt')
 			->send(new Contact($data));
		
		return redirect('/budget');
	}
}
