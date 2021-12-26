<?php
session_start();
if(isset($_SESSION['email'])){
  // echo "welcome ". $_SESSION['email'];
}
else{
   header("Location: login.php");
}
?>

<html>
   <style>
body{
     
        background-image: url('pics/background.jpg');
    }
ul {
  display: block;
  color:white;
  text-align: center;
  /* padding: 10px 10px; */
  text-decoration: none;
  list-style-type: none;
  margin:-10;
  margin-top: 0;
  padding: 10;
  /* overflow: hidden; */
  background-color: #333;
}


.active {
  background-color: #04AA6D;
}
</style>
<body> 
      
  <ul>
  <li><h1>welcome to the game of stone, paper and scissor </h1> </li>
  <li> <?php echo "welcome ". $_SESSION['email']; ?></li>
  
  </ul>

   <img src="pics\game_pic.png" alt="Failed to load image">
   <form>
   <a href='try_code.php' ><input type=button value=playgame name=playgame></a>
   <a href='leader_board.php' ><input type=button value=leaderboard name=leader_board></a>
   <a href='change_password.php' ><input type=button value='change password' name=change_password></a>
   <a href='logout.php' ><input type=button value=logout name=logout></a>
   </form>
   </body>
   </html>

   

