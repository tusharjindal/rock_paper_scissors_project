<?php
session_start();
if(isset($_SESSION['email'])){
   echo "welcome ". $_SESSION['email'];
}
else{
   header("Location: login.php");
}
?>

<html>
   <body> <h1>welcome to the game of stone, paper and scissor <h1> 
   <img src="pics\game_pic.png" alt="Failed to load image">
   <form>
   <button type="button">Play Game</button>
   <button type="button">Dashboard</button>
   <button type="button">change password</button>
   <a href='logout.php' ><input type=button value=logout name=logout></a>
   </form>
   </body>
   </html>

   

