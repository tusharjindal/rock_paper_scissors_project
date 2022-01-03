<?php      
    include('config.php');  
    session_start();
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $email = $_POST['email'];  
    $password = $_POST['pass'];  
    if(filter_var($email, FILTER_VALIDATE_EMAIL)==0){
        echo "<script>
        alert('Kindly enter a valid Email');
        window.location.href='login.php';
        </script>";
    }
    $email_alreadyyy="SELECT COUNT(*) FROM user where email='$email'";
    $run_qry_emaill=mysqli_query($db, $email_alreadyyy) or die( mysqli_error($db));
    $row_email=mysqli_fetch_assoc($run_qry_emaill);
        if(empty($email) || empty($password)){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("empty login or password. Kindly login again ")';  
            echo '</script>';
        }
        elseif($row_email['COUNT(*)']==0){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Email does not exists. Kindly sign up!!")';  
            echo '</script>';
        }
       
        else{
        $select_user="select password,Score from user where email='$email'";
        $run_qry=mysqli_query($db, $select_user) or die( mysqli_error($db));
        $row=mysqli_fetch_assoc($run_qry);
        if(md5($password)==$row['password']){
            $_SESSION['email']=$email;
            $_SESSION['Score']=$row['Score'];
            $now = new DateTime('Asia/Kolkata');
            $_SESSION['updated']= $now->format('Y-m-d H:i:s');
            $sql_active="UPDATE `user` SET `Active`='online',`updated`=current_timestamp() WHERE email='$email'";
            $result_active = mysqli_query($db, $sql_active);
            header("Location: home_page.php");
        }
      
        else{  
           echo '<script type ="text/JavaScript">';  
           echo 'alert("  Invalid username or password ! Kindly login again ")';  
           echo '</script>';  
        }
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

