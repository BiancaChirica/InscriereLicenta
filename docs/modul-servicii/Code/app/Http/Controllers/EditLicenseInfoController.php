<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class infoController extends Controller
{


	public function search_info_ID(Request $request )
	{
	// utilizatorul introduce id-ul si functia ii returneaza postarea din bd corespunzatoare acelui id

		$id = $request->input('id') ;

		if ( !ctype_digit($id)) {
			$mesaj="Date invalide";
			return view('edit', ['mesaj'=>$mesaj]);
		}

		$request->validate([
			'id' => 'required|min:1',
		]);



		$result = DB::table('info')->select('id_admin','titlu','content')
		-> where('id',$id)
		->first();

		if(!isset($result))
			{$mesaj= "Nu exist postarea cu id-ul :" . $id ;
		return view('edit', ['mesaj'=>$mesaj]);
	}

	$data=array('id'=>$id,'id_admin'=>$result->id_admin,'titlu'=>$result->titlu,'content'=>$result->content);
	return view('edit',['titlu'=> $result->titlu,'content'=>$result->content]);

}

public function update_info(Request $request )
{
		// functia trebuie sa primesaca toti parametri chiar daca userul nu i-a modificat pe toti, view-ul ii trimite inapoi asa cum i-a primit, si id-ul nu ar trebui sa poata fi modificat
	$id = $request->input('id');
	$id_admin =  Auth::id();
	$title = $request->input('titlu') ;
	$content = $request->input('content') ;


	if ( !ctype_digit($id) || !ctype_digit($id_admin) ) {
		$mesaj='Date invalide ';
		return view('edit', ['mesaj'=>$mesaj]);
	}

	$request->validate([
		'id' => 'required|min:1',
		'titlu' => 'required|min:1|max:50',
		'content' => 'required|min:1|max:500',
	]);


	DB::table('info')
	->where('id', $id)
	->update(['id_admin' =>$id_admin,
		'titlu' => $title,
		'content' => $content ]);

	$mesaj='Succes';
	return view('edit', ['mesaj'=>$mesaj]);
}


}
