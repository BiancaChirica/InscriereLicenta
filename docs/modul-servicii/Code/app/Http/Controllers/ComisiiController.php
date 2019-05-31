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

class ComisiiController extends Controller
{


    public function display_comisii(){

        $programari = DB::table('orar')
                            ->join('profesori as p', 'orar.id_prof', '=', 'p.id')
                            ->join('comisii as c', 'orar.id_comisie', '=', 'c.id')
                            ->join('studenti as s', 'orar.id_student', '=', 's.id')
                            ->select('orar.ora as o_ora', 'orar.data as o_data', 
                            's.nume as s_studn', 's.prenume as s_studp',  
                            'p.nume as p_profn', 'p.prenume as p_profp',
                            's.id_comisie as s_comisie')
                            ->get();
        $nr_comisie = DB::table('comisii')->get();

        if(count($nr_comisie) == 0){
            $mesaj = "Nu exista comisii.";
            return view('exam_schedule', ['Errormessage'=>$mesaj]);
        }

        if(count($programari) == 0){
            $mesaj = "Nu s-a stabilit programul.";
            return view('exam_schedule', ['Errormessage'=>$mesaj]);
        }
        
        return view('exam_schedule', ['programari'=>$programari], ['nr_comisie'=>$nr_comisie]);
        
        
        }
}