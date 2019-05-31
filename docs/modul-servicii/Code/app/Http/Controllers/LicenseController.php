<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LicenseController extends Controller
{
    // public function insertLicenseInfo(){
    //     //conectare la baza de date
    //     $conn = mysql_connect('localhost', 'root', '');
    //     $db = mysql_select_db('LicenseProject');

    //     //preluare date din textbox
    //     $title = $_POST["title"];
    //     $content = $_POST["content"];


    //     //pastrare date in textbox
    //     if(isset($_POST['title'])&&isset($_POST['content'])){
    //         $title = $_POST['title'];
    //         $content = $_POST['content'];
    //     }

    //     //inserare in baza de date
    //     $sql = "INSERT into Informatii(title, content) values("$title", "$content");"
    //     $qry = mysql_query($sql);
    //     if(!qry)
    //         echo mysql_error();
    //     else echo "Succesfully inserted your info";
    // }


    // public function editLicenseInfo(){
    //     if(isset($_POST["idNews"] ) )
    // {
    //     $id= $_POST["idNews"];
    // if(!is_int($id) || $id < 0)
    // {
    //     echo "dateate invalide";
    //     //stop here
    // }

    //     $conn = OpenCon();
    //     if($id > GetLastId() )
    //     {
    //         echo "Date invalide, id prea mare";
    //     //stop here
    //     }

    //     //look for id
    //     $result = GetDataId ($id);
    //     CloseCon($conn);

    //     if($result == "0 results")
    //     {
    //         echo "Nu am putut gasi anuntul. ";
    //         // stop here
    //     }
    //     else {

    // $pieces = explode(" ", $result);
    // // returneaza asta ca sa fie afiseze

    // echo $pieces[0]; // id
    // echo $pieces[1]; // title
    // echo $pieces[2]; // content

    //     }



    // }
    //     }
}
