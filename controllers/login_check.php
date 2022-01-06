<?php
require_once ("../models/user_mod.php");
class login_done{
 

    function valid($email, $password){

        if(filter_var($email, FILTER_VALIDATE_EMAIL)==0){
            return false;
        }

        elseif(empty($email) || empty($password)){
            return false;
        }

        else{
            return true;
        }
    }


    function now_count($email,$password,$db){
        $count=new user();
        $no_of_email=$count->get_count($email,$db);
        if($no_of_email==1){
            $is_pass_valid=$this->valid_pass($email,$password,$db);
        }
    }

    function valid_pass($email,$password,$db){
            
        $info=new user();
        $pass=$info->get_password($email,$db);
        if ($pass==null){
            return false;
        }
        elseif(md5($password)==$pass){
            header("Location: ../views/home_page.php");
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Wrong password!")';  
            echo '</script>';
        }
    }

    // function now_login($email,$password,$db){

    //     $is_pass_valid=$this->valid_pass($email,$password,$db);
    //     if($is_pass_valid==true){
    //         header("Location: ../views/home_page.php");
    //     }
    //     else{
    //         echo '<script type ="text/JavaScript">';  
    //         echo 'alert("Wrong password!")';  
    //         echo '</script>';
    //     }

    // }

  

}

?>