<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Profesor;

class ProfsEditStudents extends Controller
{
    public function show($id){
        $profesor = Profesor::with(['comisie.studenti', 'studenti'])->find($id);
        if($profesor){
            return view('edit_students', ['profesor'=> $profesor]);
        }
        return redirect('profs_dashboard');
    }

}
