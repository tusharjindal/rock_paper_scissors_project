<?php
require_once ("../models/config.php");
require_once ("../controllers/login_check.php");
require_once ("../models/user_mod.php");
session_start();
////post method
if ($_SERVER["REQUEST_METHOD"]== "POST"){
$email = $_POST['email'];  
$password = $_POST['pass'];  

///function to check validation
$check= new login_done();
$is_valid=$check->valid($email, $password);

if($is_valid==true){   //if all email and pass are valid
    $check->now_count($email,$password,$db);  //check for email and password
}
else{
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Kindly enter valid email or password!!")';  
    echo '</script>';
}


}
?>

<html>
<link rel="stylesheet" type="text/css" href="login_style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body> 
<div class="container">
   <form name="Login" action = " " onsubmit = "return check()" method = "POST">  
           <h1>Login</h1>
            <div class="form-group">  
                <label> Email: </label>  
                <input type = "text" class="form-control" id ="email" name  = "email" required/>
            </div>  
            <div class="form-group">  
                <label> Password: </label>  
                <input type = "password" class="form-control" id ="pass" name  = "pass" required/>  
            </div>  
            <div>     
                <input type =  "submit" class="btn" id = "submit" value = "Login" />  
            </div>  
            <p class="para-2">don't have an account? <a href="signup.php">Sign up here</a></p>
   </form>  
</div>
   
</body>

</html>