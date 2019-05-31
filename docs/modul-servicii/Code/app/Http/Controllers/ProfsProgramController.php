<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Profesor;

class ProfsProgramController extends Controller
{
    public function show($id){
        $profesor = Profesor::with(['comisie.studenti', 'comisie.studenti.orar', 'comisie.profesori'])->find($id);
        if($profesor){
            return view('view_program', ['profesor'=> $profesor]);
            Redirect::back();
        }
        return redirect('profs_dashboard');
    }
}
