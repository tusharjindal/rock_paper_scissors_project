<?php
require_once("config.php");
require_once("database.php");
class user{

    function __construct(){
        $temp=new data();
    }

    function get_count($email,$db){

        $email_already="SELECT COUNT(*) FROM user where email='$email'";
        $run_qry_email=mysqli_query($db, $email_already) or die( mysqli_error($db));
        $row_email=mysqli_fetch_assoc($run_qry_email);
        return $row_email['COUNT(*)'];
    }

    function get_password($email,$db){

        $email_alreadyy="SELECT `password` FROM user where email='$email'";
        $run_qry_emaill=mysqli_query($db, $email_alreadyy) or die( mysqli_error($db));
        $row_emaill=mysqli_fetch_assoc($run_qry_emaill);
        return $row_emaill['password'];
    }
        
}

?>