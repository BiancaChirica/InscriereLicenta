<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Admini;

class AccountManagerController extends Controller
{
    //se ocupa cu functionalitatea pentru toate paginile account_manager
    //to do: leaga login si baza de date de logica controlerului
    //adauga viitoare noi functionalitati pentru paginile existente
    //adauga mesaje de confirmare si afiseaza erori in caz ca apar

    public function index_user()
    {
        // Get the currently authenticated user...
        $student = Student::where('email', Auth::user()->email)->first();

        return view('account_manager_user', ['student' => $student]);
    }

    public function update_user(Request $request)
    {
        // Get the currently authenticated user...
        $student = Student::where('email', Auth::user()->email)->first();

        //validate input
        $request->validate([
              'password' => 'required|min:1|max:50'
        ]);

        //change field
        $student->parola = $request->input('password');

        //update in database
        $student->save();
        session()->flash('message','password updated successfully');

        return redirect('/account_manager_user');
    }


    public function index_admin()
    {
        //return just a view with with the option of changing the password
        //only for logged admins
        return view('account_manager');
    }

    public function update_admin(Request $request)
    {
        // Get the currently authenticated user...
        $admin = Admini::where('email', Auth::user()->email)->first();

        //validate input
        $request->validate([
            'curr_pass' => 'required|min:1|max:50',
            'new_pass' => 'required|min:1|max:50|different:curr_pass',
            'ret_pass' => 'required|min:1|max:50|same:new_pass'
        ]);

        //change field
        $admin->parola = $request->input('new_pass');

        //update in database
        $admin->save();
        session()->flash('message','password updated successfully');

        return redirect('/account_manager');
    }

}
