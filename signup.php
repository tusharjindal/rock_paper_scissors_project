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
            transforn: translateX(-50%);
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
<body style="background-color:blue;"> 

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
            <div class="form-group">  
                <label> Password: </label>  
                <input type = "password" class="form-control" id ="pass" name  = "pass" required/>  
            </div>  
       
            <div>     
                <input type =  "submit" class="btn" id = "submit" value = "signup" />  
            </div>  
            <p class="para">Already have an account? <a href="login.php">Log in here</a></p>
   </form>  

</div>  

</body>

</html>

