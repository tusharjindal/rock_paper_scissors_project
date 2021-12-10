<?php
if ($_SERVER["REQUEST_METHOD"]== "POST"){
 include 'config.php';
 $username= $_POST['user'];
 $email= $_POST['email'];
 $password= $_POST['pass'];
 $sql= "INSERT INTO `user` (email, password, username) VALUES ('$email', '$password', '$username')";
 $result = mysqli_query($db, $sql);
 header("Location: login.php");
}
?>
<html>
<head></head>
<body> 
    <h1> Sign up <h1>
   <form name="signup" action = " "  method = "POST">  
            <p>  
                <label> UserName: </label>  
                <input type = "text" id ="user" name  = "user" />
            </p>  
            <p>  
                <label> email </label>  
                <input type = "text" id ="email" name  = "email" />
            </p> 
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
       
            <p>     
                <input type =  "submit" id = "submit" value = "signup" />  
            </p>  
   </form>  

</body>

</html>

