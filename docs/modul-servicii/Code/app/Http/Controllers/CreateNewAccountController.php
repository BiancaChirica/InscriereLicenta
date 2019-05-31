<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;

class CreateNewAccountController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function display_teachers()
    {
        $result = DB::table('profesori')->get();
        if(count($result)=='0')
        {
            $mesaj= "Nu exista inregistrari pentru profesori in baza de date!" ;
            return view('create_new_account', ['mesaj'=>$mesaj]);
        }
        return view('create_new_account',['accounts_p'=> $result]);
    }

    function create_new_account(Request $request)
    {
    	$first_name = $request->get('last-name');
    	$last_name = $request->get('first-name');
    	$degree = $request->input('degree');
    	$email= $request->input('email');
        $password= $request->input('password');

        $request->validate([
            'last-name' => 'required|min:1|max:50|alpha',
            'first-name' => 'required|min:1|max:50|alpha',
            'degree'=>'required|min:1|max:30|alpha',
            'email' => 'required|min:1|max:50|unique:profesori,email',
            'password' => 'required|min:1|max:50',
        ]);

        if(!DB::table('profesori')->where('email', $email)->exists())
        {
            $id=rand(1,30);
            while(DB::table('profesori')->where('id', $id)->exists())
            {
                $id=rand(1,30);
            }

    	$data=array('id_comisie'=>NULL,'nume'=>$last_name,'prenume'=>$first_name,'grad_didactic'=>$degree,'rol'=>"rol",'email'=>$email,'parola'=>$password);
    	DB::table('profesori')->insert($data);
        $mesaj="New account has been successfully created!";
    }
    return redirect()->route('create_new_account')->with('mesaj_succes', 'Cont creat cu succes!');

    }
}
