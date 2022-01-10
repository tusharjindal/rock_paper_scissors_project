<?php

require_once ("../controllers/login_check.php");

if ($_SERVER["REQUEST_METHOD"]== "POST"){

    $email = $_POST['email'];  
    $password = $_POST['pass'];  

    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       header("Location: ../views/login.php");
    }

    elseif(empty($email) || empty($password)){

        header("Location: ../views/login.php");
    }

    else{
        $check= new login_done();
        $check->now_count($email,$password);

    }

}

else{
    header("Location: ../views/login.php");
}


?>