<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Storage;

class ImageController extends Controller
{

	public function upload()
	{
		$this->middleware('auth');
		
		$file = request()->file('file')->store('wordpress');
		$response = response()->make($file, 200)->header('Content-Type', 'image/jpeg');
		
		if(!Storage::disk('local')->has($file))
			return response()->json([], 500);
		
		return response()->json(['location' => '/' . $file], 200);
		
	}
	
	public function showWordpress($image_name)
	{
		
		$path = 'wordpress/'.$image_name;

		if(!Storage::disk('local')->has($path))
			abort(404);

		$file = Storage::disk('local')->get($path);
		$type = Storage::mimeType($path);

		$response = response()->make($file, 200);
		$response->header("Content-Type", $type);

		return $response;
	}
	
}