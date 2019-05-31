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

class EditAccountsController extends Controller
{


	public function edit_accounts() {
		return view('edit_accounts');
	}

	public function display_accounts_p( )
	{

		$result = DB::table('profesori')->get();
		if(count($result)=='0')
		{
			$mesaj= "Nu exist inregistrari pentru profesori in baza de date:" ;
			return view('edit_accounts', ['mesaj'=>$mesaj]);
		}
		return view('edit_accounts',['accounts_p'=> $result]);

	}

	public function display_accounts_s( )
	{
		$result = DB::table('studenti')->get();
		if(count($result)=='0')
		{
			$mesaj= "Nu exist inregistrari pentru studenti in baza de date:" ;
			return view('edit_accounts', ['mesaj'=>$mesaj]);
		}


		return view('edit_accounts',['accounts_s'=> $result]);

	}

	public function destroy_profs($id)
	{
		DB::table("profesori")->where('id',$id)->delete() ;

		session(['messageEditAccounts' => 'Delete was successful']);

		return redirect()->action('editAccountsController@display_accounts_p');

	}
	public function destroy_studs($id)
	{
		DB::table("studenti")->where('id',$id)->delete() ;

		session(['messageEditAccounts' => 'Delete was successful']);

		return redirect()->action('editAccountsController@display_accounts_s');
	}

	public function edit_profs($id)
	{
		$result=DB::table("profesori")->where('id',$id)->first() ;
		if(isset($result))
			return  view('editAccountProfs',['account_edit'=> $result]);
	}

	public function edit_studs($id)
	{
		$result=DB::table("studenti")->where('id',$id)->first() ;
		if(isset($result))
			return  view('editAccountStuds',['account_edit'=> $result]);
	}

	public function save_acc_profs(Request $request)
	{
		$id = $request->input('id');
		$id_comisie=$request->input('id_comisie');
		$nume= $request->input('nume');
		$prenume = $request->input('prenume');
		$grad_didactic =$request->input('grad_didactic');
		$rol = $request->input('rol');
		$email = $request->input('email');
		$parola = $request->input('parola');

		$request->validate([
			'id_comisie' => 'nullable|integer',
			'nume' => 'required|min:1|max:50',
			'prenume' => 'required|min:1|max:50',
			'grad_didactic' => 'required|min:1|max:50',
			'email' => 'required|min:1|max:50',
			'parola' => 'required|min:1|max:50',
		]);
if(is_null($rol))
	$rol=" ";

if(!is_null($id_comisie))
	if(! DB::table('comisii')
		->where('id', $id_comisie)
		->exists() )
			return redirect()->back()->withErrors("Nu exista comisia cu acest id.");

if(is_null($id_comisie) ) {
		DB::table('profesori')
		->where('id', $id)
		->update([ 'id_comisie' => NULL,
			'nume' => $nume,
			'prenume' => $prenume,
			'grad_didactic' =>$grad_didactic,
			'rol'=>$rol,
			'email' => $email,
			'parola' => $parola ]);

	}
else
	DB::table('profesori')
		->where('id', $id)
		->update(['id_comisie' => $id_comisie,
			'nume' => $nume,
			'prenume' => $prenume,
			'grad_didactic' =>$grad_didactic,
			'rol' => $rol,
			'email' => $email,
			'parola' => $parola ]);

		session(['messageEditAccounts' => 'Edit was successful']);

		return redirect()->action('editAccountsController@display_accounts_p');
	}


	public function save_acc_studs(Request $request)
	{
		$id = $request->input('id');
		$id_comisie = $request->input('id_comisie');
		$id_prof = $request->input('id_prof');
		$nr_matricol = $request->input('nr_matricol');
		$nume= $request->input('nume');
		$prenume = $request->input('prenume');
		$repository =$request->input('repository');
		$email = $request->input('email');
		$parola = $request->input('parola');
		$email_optional = $request->input('email_optional');



		$request->validate([
			'id' => 'required|integer|min:1',
			'id_comisie' => 'nullable|integer',
			'id_prof' => 'required|integer|min:1',
			'nr_matricol' => 'required|min:1|max:50',
			'nume' => 'required|min:1|max:50',
			'prenume' => 'required|min:1|max:50',
			'repository' => 'required',
			'email' => 'required|min:1|max:50',
			'parola' => 'required|min:1|max:50',
		]);

if(!is_null($id_comisie))
	if(! DB::table('comisii')
		->where('id', $id_comisie)
		->exists() )
			return redirect()->back()->withErrors("Nu exista comisia cu acest id.");

if(! DB::table('profesori')
		->where('id', $id_prof)
		->exists() )
			return redirect()->back()->withErrors("Nu exista profesor cu acest id.");



if(is_null($id_comisie))
		DB::table('studenti')
		->where('id', $id)
		->update(['id_comisie' => NULL,
			'id_prof' => $id_prof,
			'nr_matricol' =>$nr_matricol,
			'nume'=> $nume,
			'prenume' => $prenume,
			'repository' =>$repository,
			'email' => $email,
			'parola' => $parola,
			'email_optional' => $email_optional]);
else
	DB::table('studenti')
		->where('id', $id)
		->update(['id_comisie' => $id_comisie,
			'id_prof' => $id_prof,
			'nr_matricol' => $nr_matricol,
			'nume'=> $nume,
			'prenume' => $prenume,
			'repository' =>$repository,
			'email' => $email,
			'parola' => $parola,
			'email_optional' => $email_optional]);

session(['messageEditAccounts' => 'Edit was successful']);
		return redirect()->action('editAccountsController@display_accounts_s');
	}

}
