<?php      
    include('config.php');  
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $email = $_POST['email'];  
    $password = $_POST['pass'];  
      
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($db,$email);  
        $password = mysqli_real_escape_string($db,$password);  
      
        $sql = "select *from user where email = '$email' and password = '$password'";  
     
        $result=mysqli_query($db, $sql) or die( mysqli_error($db));;  
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        if($count == 1){  
           echo "<h1><center> Login successful </center></h1>";  
           header("Location: home_page.php");
        }  
        else{  
           echo "<h1> Login failed. Invalid username or password.</h1>";  
        }   
   }
          
?>  
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            height: 44%;
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
        .container form .para-2{
            margin: 15px 0 18px 0;
        }
    </style>
</head>
<body style="background-color:blue;"> 

   
<div class="container">
   <form name="Login" action = " " onsubmit = "return check()" method = "POST">  
           <h1>Login</h1>
            <div class="form-group">  
                <label> Email: </label>  
                <input type = "text" class="form-control" id ="email" name  = "email" />
            </div>  
            <div class="form-group">  
                <label> Password: </label>  
                <input type = "password" class="form-control" id ="pass" name  = "pass" />  
            </div>  
            <div>     
                <input type =  "submit" class="btn" id = "submit" value = "Login" />  
            </div>  
            <p class="para-2">Not have a account? <a href="signup.php">Sign up here</a></p>
   </form>  
</div>
   <!--  -->
   <script>  
            function check()  
            {  
                var id=document.Login.email.value;  
                var ps=document.Login.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>

</html>

