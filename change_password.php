<?php

if ($_SERVER["REQUEST_METHOD"]== "POST"){
 session_start();
 include 'config.php';
 $old= $_POST['pass'];
 $pass_new= $_POST['pass_new'];
 $pass_new_re= $_POST['pass_new_re'];
 $email=$_SESSION['email'];
 $select_user="select password from user where email='$email'";
 $run_qry=mysqli_query($db, $select_user) or die( mysqli_error($db));
 $row=mysqli_fetch_assoc($run_qry);
 if(md5($old)==$row['password']){
      if($pass_new==$pass_new_re){
        $password_encrypt=md5($pass_new);
        $sql="UPDATE `user` SET `password`='$password_encrypt' WHERE email='$email'";
        $result = mysqli_query($db, $sql);
        echo '<script type ="text/JavaScript">';  
        echo 'alert("password changes sucessfully. Kindly login again")';  
        echo '</script>';  
        header("Location: logout.php");
      }

      else{
        echo '<script type ="text/JavaScript">';  
        echo 'alert("your passwords do not match. kidly enter again")';  
        echo '</script>';  
      }
 }
 else{
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Incorrect password!")';  
    echo '</script>';  
  }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        body{
            min-height: 100vh;
            background: #eee;
            display: flex;
            font-family: sans-serif;
            background-image: url('pics/background.jpg');

        }

        .container{
            margin: auto;
            width: 500px;
            max-width: 90%;
        }
        .container form{
            width: 100%;
            height: 55%;
            padding: 20px;
            background: white;
            border-radius: 4px;
            box-shadow: 0 8px 16px rgba(0,0,0,.3);
        }
        .container form h1{
            text-align: center;
            margin-bottom: 24px;
            color: #222;

        }
        .container form .form-control{
            width:100%;
            height: 40px;
            background: white;
            border-radius: 4px;
            border: 1px solid silver;
            margin: 10px 0 18px 0;
            padding: 0 10px;

        }
        .container form .btn{
            margin-left: 38%;
            width: 120px;
            height: 34px;
            border: none;
            outline: none;
            background: #27a327;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            color: white;
            border-radius: 4px;
            transition: .3s;
            
        }
        .container form .btn:hover{
            opacity: .7;

        }
        .container form .para{
            margin: 15px 0 18px 0;
        }
    </style>
</head>
<body>
    <div class="container">
    <form name="Change password" action = " "  method = "POST">  
       <h1> Change password </h1>
            <div class="form-group">  
                <label> Old Password </label>  
                <input type = "password" class="form-control" id ="pass" name  = "pass" required/>
            </div>  
            <div class="form-group">  
                <label> New Password </label>  
                <input type = "password" class="form-control" id ="pass_new" name  = "pass_new" required/>
            </div> 
            <div class="form-group">  
                <label> Re-enter new password </label>  
                <input type = "password" class="form-control" id ="pass_new_re" name  = "pass_new_re" required/>  
            </div>  
       
            <div>     
                <input type =  "submit" class="btn" id = "submit" value = "change" />  
            </div>  
            <p class="para">Don't want to change password? <a href="home_page.php">Go back to Home</a></p>
   </form>  
   </div>
</body>
</html>