<?php

/**
 * Toata logica care tine de verificare datelor , inregistrare etc.
 * 1) Validarea datelor , procesari .
 * 2) Inserare inregistrare din formular in baza de date studenti.
 */

include "connectdb.php";
class Logic extends DataBase
{

    public function getConnection()
    {
        return $this->con;
    }

    public function email_check($table, $email)
    {
        $regexp = "/^[a-z]+(\.[a-z]+)@info\.uaic\.ro/";
        if (!preg_match($regexp, $email)) {
            return "invalid email";
        }
        
        //Verificam daca mail-ul este folosit.
        $sql = "SELECT id FROM $table WHERE email = ?";
        $stmt = mysqli_stmt_init($this->con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0)
            {
                return "already_exist";
            }else
            {
                return "Valid email";
            }
        }
    }

    public function insert_record($table,$matricol,$first_name,$last_name,$password,$email)
    { 
        $sql = "INSERT INTO $table(nr_matricol,nume,prenume,email,parola) VALUES (?,?,?,?,?)";
        $stmt = mysqli_stmt_init($this->con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "sssss",$matricol,$last_name,$first_name,$email,$password);
            mysqli_stmt_execute($stmt);
            $last_id = mysqli_insert_id($this->con);
            return $last_id;
        }
    }
}

$obj = new Logic;


if (isset($_POST['check_email'])) {
    $email = $_POST['email'];
    $value = $obj->email_check("studenti",$email);

    if($value == "invalid email")
    {
        echo "Invalid email";
    }else if($value == "already_exist")
    {
        echo "Email already exist";
    }
    else{
        echo "Valid email";
    }
}

if(isset($_POST['u_email']))
{
    $first_name = preg_replace("#[^A-Za-z ]#i","",$_POST['first-name']);
    $last_name = preg_replace("#[^A-Za-z]#i","",$_POST['last-name']);
    $registration_number = preg_replace("#[^A-Za-z0-9]#i","",$_POST['nr_matricol']);
    $value = $obj -> email_check("studenti",$_POST['u_email']);
    if($value == "invalid email")
    {
        echo "Invalid email";
        exit();
    }else if($value == "already_exist")
    {
        echo "Email already exist";
        exit();
    }
    else{
        $email = $_POST['u_email'];
    }
    $password = $_POST['password'];
    $password_repeat = $_POST['password2'];

    //INCEPE VALIDAREA DATELOR
    if(empty($first_name) || empty($last_name) || empty($password) || empty($password_repeat) || empty($registration_number))
    {
        echo "empty_fields or invalid format!";
        exit();
    }

    if(strlen($password) < 6){
        echo "Password short";
        exit();
    }

    if($password != $password_repeat)
    {
        echo "Not same password";
        exit();
    }else
    {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    }
    $id = $obj->insert_record("studenti",$registration_number,$first_name,$last_name,$hashedPwd,$email);
    if($id)
    {
        echo "V-ati inregistrat cu succes!";
    }
}

?>