<?php
if(isset($_SESSION['email'])){
    header("Location: login.php");
}
if ($_SERVER["REQUEST_METHOD"]== "POST"){
 include 'config.php';
 $username= $_POST['user'];
 $email= $_POST['email'];
 $password= $_POST['pass'];
 $ucl = preg_match('/[A-Z]/', $password); // Uppercase Letter
 $lcl = preg_match('/[a-z]/', $password); // Lowercase Letter
 $dig = preg_match('/\d/', $password); // Numeral
 $nos = preg_match('/\W/', $password); // Non-alpha/num characters (allows underscore)
 if (empty($email) || empty($password) || empty($username)){
   
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Kindly fill all three fields")';  
    echo '</script>';

 }
 elseif(strlen($password)<8){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Password should have atleat 8 characters")';  
    echo '</script>';
 }
 elseif(!$ucl){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Kindly match the requested format for the password")';  
    echo '</script>';
 }
 elseif(!$lcl){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Kindly match the requested format for the password")';  
    echo '</script>';
}
elseif(!$dig){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Kindly match the requested format for the password")';  
    echo '</script>';
}
elseif(!$nos){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Kindly match the requested format for the password")';  
    echo '</script>';
}
 else{
 $email_already="SELECT COUNT(*) FROM user where email='$email'";
 $run_qry_email=mysqli_query($db, $email_already) or die( mysqli_error($db));
 $row_email=mysqli_fetch_assoc($run_qry_email);
 if($row_email['COUNT(*)']==0){
 $password_encrypt=md5($password);
 $sql= "INSERT INTO `user` (email, password, username) VALUES ('$email', '$password_encrypt', '$username')";
 $result = mysqli_query($db, $sql);
 header("Location: login.php");
 }
 else{
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Email already exists. Kindly Login")';  
    echo '</script>';  
 }
}
}
?>
<html>
    <link rel="stylesheet" type="text/css" href="signup_style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    
</head>
<body> 

<div class="container">
   
   <form name="signup" action = " "  method = "POST">  
       <h1> Sign up </h1>
            <div class="form-group">  
                <label> Username: </label>  
                <input type = "text" class="form-control" id ="user" name  = "user" required/>
            </div>  
            <div class="form-group">  
                <label> email </label>  
                <input type = "text" class="form-control" id ="email" name  = "email" required/>
            </div> 
            <div class="form-group2">  
                <label> Password: </label>  
                <input type = "password" class="form-control" id ="pass" name  = "pass" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" required/>  
                <span class="tooltiptext">Should be of min 8 char, a special symbol</span>
            </div>  
       
            <div>     
                <input type =  "submit" class="btn" id = "submit" value = "signup" />  
            </div>  
            <p class="para">Already have a account? <a href="login.php">Log in here</a></p>
   </form>  

</div>  

</body>

</html>

