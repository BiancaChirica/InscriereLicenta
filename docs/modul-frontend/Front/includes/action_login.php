<?php
    /**
     * LOGIN PROCESS FOR INDEX PAGE.
     */

    include "action_register.php";
    $type = 0 ; // IF IS STUDENT $type = 1 , IF IS TEACHER $type = 2 , IF IS ADMINISTRATOR $type = 3

    if(isset($_POST['log_email']) && isset($_POST['log_password']))
    {
        $email = $_POST['log_email'];
        $password = $_POST['log_password'];
        //SETAM VARIABILA $TYPE IN FUNCTIE DE TIPUL USERULUI.
        $value = $obj->email_check("studenti",$_POST['log_email']);
        if($value == "invalid email")
        {
            echo "Invalid email";
        }else if($value == "already_exist")
        {
            $type = 1;
        }
        //Daca nu e invalid si nu exista deja in baza de date studenti , cautam in profesori.
        else{
            $value = $obj->email_check("profesori",$_POST['log_email']);
            if($value == "invalid email")
            {
                echo "Invalid email";
            }else if($value == "already_exist")
            {
                $type = 2;
            }
            //Daca nu e invalid si nu exista deja in baza de date studenti si profesori , cautam in admini.
            else{
                $value = $obj->email_check("admini",$_POST['log_email']);
                if($value == "invalid email")
                {
                    echo "Invalid email";
                }else if($value == "already_exist")
                {
                    $type = 3;
                }
                else{
                    echo "User is not registred in database!";
                }
            }
        }

        
        //LOGICA DUPA CE AM SETAT VARIABILA TYPE , VERIFICAM DACA PAROLA ESTE CORECTA.

        //DACA EMAILUL ESTE A UNUI STUDENT CAUTAM IN BAZA DE DATE A STUDENTILOR.
        if($type == 1)
        {
            $sql = "SELECT * FROM studenti WHERE email = ?";
            $stmt = mysqli_stmt_init($obj->getConnection());
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result))
                {
                    $pwdCheck = password_verify($password,$row['parola']);
                    if($pwdCheck == false)
                    {
                        echo "Wrong password";
                        exit();
                    }
                    else if($pwdCheck == true)
                    {
                        //TREBUIE PORNITA SESIUNEA SI SALVATE IN $_SESSION INFORMATIILE DESPRE USERI
                        //DE ASEMENEA PAGINILE TREBUIE ACCESATE DOAR DACA SUNT LOGATI USERII.
                        //FIECARE UTILIZATOR ACCESEAZA PAGINA LUI DOAR!
                        echo "Te-ai connectat cu succes!";
                        exit();
                    }
                }
            }
        }

        //DACA EMAILUL ESTE A UNUI PROFESOR CAUTAM IN BAZA DE DATE A PROFESORILOR.
        //DE CONTINUAT.
        
    }
?>
