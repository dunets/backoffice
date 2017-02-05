<?php

namespace App\Http\Controllers;
use App;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormsController extends Controller
{
	
	public function orders (Request $request) {
		
		$this->validate($request,
		[
			'name' => 'max:100|required',
			'locale' => 'max:2|required',
			'tel' => 'max:100|required',
			'email' => 'max:100|email|required',
			'mensagem' => 'max:20000|required',
			'typ' => 'max:3|required',
		]);
		
		$name = $request->input('name');
		$email= $request->input('email');
		$tel= $request->input('tel');
		$mensagem= $request->input('mensagem');
		$typ= $request->input('typ');
		
		App::setLocale($request->input('locale'));
		
		
		$my_mail = 'geral@magicube.pt';
		$subject = "Uma nova mensagem: Plantas/Encomendas"; 


		$message = view('mail.index', [
			'message_type' => 'Plantas/Encomendas',
			'name' => $name,
			'email' => $email,
			'tel' => $tel,
			'mensagem' => $mensagem,
			'typ' => $typ,
		]);
	
	
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: MAGICUBE.PT<". $my_mail .">\r\n";
	

		mail($my_mail, $subject, $message, $headers);
		

		/*Mail::send('mail.index', 
				   [
			'message_type' => 'Plantas/Encomendas',
			'name' => $name,
			'email' => $email,
			'tel' => $tel,
			'typ' => $typ,
			'mensagem' => $mensagem,
				   ], function ($message)
		{

            $message->from('info@magicube.pt', 'MAGICUBE.PT');

            $message->to('ivanxd@live.com.pt');
			
			$message->subject("Uma nova mensagem: Plantas/Encomendas");

        });*/
		
		return response()->json(['message' => trans('messages.form-success')]);
		
    }
	
	
	public function budget (Request $request) {
		
		$this->validate($request,
		[
			'name' => 'max:100|required',
			'locale' => 'max:2|required',
			'tel' => 'max:100|required',
			'email' => 'max:100|email|required',
			'mensagem' => 'max:20000|required',
		]);
		
		$name = $request->input('name');
		$email= $request->input('email');
		$tel= $request->input('tel');
		$mensagem= $request->input('mensagem');
		
		App::setLocale($request->input('locale'));
		
		$my_mail = 'geral@magicube.pt';
		$subject = "Uma nova mensagem: Orçamento"; 


		$message = view('mail.index', [
			'message_type' => 'Plantas/Encomendas',
			'name' => $name,
			'email' => $email,
			'tel' => $tel,
			'mensagem' => $mensagem,
		]);
	
	
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: MAGICUBE.PT<". $my_mail .">\r\n";
	

		mail($my_mail, $subject, $message, $headers);
		

		/*Mail::send('mail.index', 
				   [
			'message_type' => 'Orçamento',
			'name' => $name,
			'email' => $email,
			'tel' => $tel,
			'mensagem' => $mensagem,
				   ], function ($message)
		{

            $message->from('info@magicube.pt', 'MAGICUBE.PT');

            $message->to('ivanxd@live.com.pt');
			
			$message->subject("Uma nova mensagem: Orçamento");

        });*/
		
		return response()->json(['message' => trans('messages.form-success')]);
		
    }
}
