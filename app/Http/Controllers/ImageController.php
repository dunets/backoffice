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
			return response()->make('Error', 500);
		return json_encode(
			array(
			'location' => $response
			)
		);
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
	
	public function imageUploadPost(Request $request)
	{
		$this->validate($request, [
					'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);

			$imageName = time().'.'.$request->image->getClientOriginalExtension();
			$request->image->move(public_path('images'), $imageName);

		/*return back()
			->with('success','Image Uploaded successfully.')
			->with('location',$imageName);*/
		
		//return json_encode(array('location' => $imageName));
		return $imageName;
	}
}
