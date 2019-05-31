<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use Illuminate\Routing\Redirector__call;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class InsertController extends Controller
{
    public function home(){
        return view('insert_license');
    }


    public function insert_license_info(Request $request){
        
        $titlevar = $request->input('titlu');
        $contentvar = $request->input('content');
        
        $request->validate([
        'titlu' => 'required|string|min:3|max:50, NOT_NULL',
        'content' => 'required|string|min:3|max:500, NOT_NULL',
        ]);
        

        $data=array('titlu'=>$titlevar,'content'=>$contentvar, 'id_admin'=>Auth::id());
        DB::table('info')->insert($data);
        return redirect()->action('InsertController@home')->with('succes', 'S-a postat cu succes!');
        
    }
}