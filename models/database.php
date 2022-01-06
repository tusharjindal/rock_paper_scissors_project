<?php

class data{
    function __construct() {
        $user = "root";
        $pass = "";
        $db= "project";
        $db = new mysqli('localhost', $user, $pass,$db) or die("Connection failed");
    }
}


?>