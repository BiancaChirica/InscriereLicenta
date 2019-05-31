<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EditNewsController extends Controller
{
	public function edit_license() {
		return view('edit_news');
	}


	public function search_license_info(Request $request )
	{ 
	
		$id = $request->input('News-id') ;

		$request->validate([
			'News-id' => 'required|integer|min:1',
		]);


		$data = DB::table('info')->select('id','titlu','content')
		-> where('id',$id)
		->first();

		if(!isset($data))
		{
			return redirect()->back()->withErrors("Nu exista postare cu acest id");
		}

		return view('/edit_news',['data'=>$data] ) ;

	}

	public function update_license_info(Request $request )
	{
		$id = $request->input('ta-id');
	$id_admin ='1' ; // Auth::id();
	$title = $request->input('title') ;
	$content = $request->input('content') ;


	$request->validate([
		'ta-id' => 'required|integer|min:1',
		'title' => 'required|min:1|max:50',
		'content' => 'required|min:1|max:500',
	]);


	DB::table('info')
	->where('id', $id)
	->update(['id_admin' =>$id_admin,
		'titlu' => $title,
		'content' => $content ]);
	
	session(['messageInfo' => 'Edit was successful']);

	return redirect('/edit_news');
}

public function delete_license_info(Request $request )
{
	$id = $request->input('ta-id');

	$val=$request->validate([
		'ta-id' => 'required|integer|min:1',
	]);

	DB::table('info')-> where('id',$id)
	->delete();

	session(['messageInfo' => 'Delete was successful']);
	return redirect('/edit_news');
}
}