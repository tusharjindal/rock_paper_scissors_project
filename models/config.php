<?php

class data{

    function connect()
    {
        $dbserver = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $database = "project";
        $port = 3306;

        $db = mysqli_connect($dbserver, $dbusername, $dbpassword, $database, $port);

        if ($db) {
            return $db;
        } 
        else 
        {
            die("error" . mysqli_connect_error());
        }
    }
}
?>