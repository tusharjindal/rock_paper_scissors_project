<?php
session_start();
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
   <form name="Login" action = "../middleware/middleware.php" method = "POST">  
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