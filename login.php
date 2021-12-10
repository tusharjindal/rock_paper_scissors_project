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
<head></head>
<body> 

   <h1>Welcome to stone paper scissors game. Login to proceed </h1>
   <form name="Login" action = " " onsubmit = "return check()" method = "POST">  
            <p>  
                <label> email: </label>  
                <input type = "text" id ="email" name  = "email" />
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" id = "submit" value = "Login" />  
            </p>  
   </form>  
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

