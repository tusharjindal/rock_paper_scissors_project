<?php
require_once("config.php");

class user extends data{

    function get_count($email){

        $email_already="SELECT COUNT(*) FROM user where email='$email'";
        $result  = mysqli_query($this->connect(), $email_already);
        $num = mysqli_num_rows($result);
        return $num;
    }

    function get_password($email){

        $email_alreadyy="SELECT `password` FROM user where email='$email'";
        $result  = mysqli_query($this->connect(), $email_alreadyy);
        $row_emaill=mysqli_fetch_assoc($result);
        return $row_emaill['password'];
    }
        
}

?>