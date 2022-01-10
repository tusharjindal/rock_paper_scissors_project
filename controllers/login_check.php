<?php
require_once ("../models/user_mod.php");
class login_done{

    function now_count($email,$password){
        $count=new user();
        $no_of_email=$count->get_count($email);
        if($no_of_email==1){
            $is_pass_valid=$this->valid_pass($email,$password);
        }
    }

    function valid_pass($email,$password){
            
        $info=new user();
        $pass=$info->get_password($email);
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
  

}

?>