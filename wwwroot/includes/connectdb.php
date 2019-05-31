<?php

//CONSTANTE PENTRU CONECTARE

define("HOST","localhost");
define("USER","root");
define("PASSWORD","");
define("DB","LicenseProject");

class DataBase
{
    public $con;
    function __construct() // CONSTRUCTOR - Ne conectam la baza de date LicenseProject.
    {
        $this->con = mysqli_connect(HOST,USER,PASSWORD,DB);
        if(!$this->con)
        {
            echo "Eroare la conexiune " .mysqli_connect_error();
        }
    }
}

?>
