<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function insert_license_info(Request $request)
    {
    	$titlevar = $request->input('titlu');
    	$contentvar = $request->input('content');
		$idadminvar = $request->input('id_admin');

		$request->validate([
		'titlu' => 'required|string|min:3|max:50, NOT_NULL',
		'content' => 'required|string|min:3|max:500, NOT_NULL',
		]);

        // id is autoincremented from db, no need to increment yourself
		$idvar = DB::select('select count(*) from info');
		$idvar += 1;

    	$data=array('id'=>$idvar, 'id_admin'=>Auth::id(), 'titlu'=>$titlevar,'content'=>$contentvar);
    	DB::table('info')->insert($data);
    	// echo "Informatiile au fost publicate!";

    }
}
?>
