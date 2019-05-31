<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Info;

class NewsController extends Controller
{
    public function admin_index()
    {
        $news = Info::orderBy('id')->get();

        return  view('admin_dashboard', ['news' => $news]);
    }

    public function prof_index()
    {
        $news = Info::orderBy('id')->get();

        return  view('profs_dashboard', ['news' => $news]);
    }

    public function stud_index()
    {
        $news = Info::orderBy('id')->get();

        return  view('user_dashboard', ['news' => $news]);
    }
}
