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
  text-decoration: none;
  list-style-type: none;
  margin:-10;
  margin-top: -10;
  padding: 5;
  background-color: #333;
}


.active {
  background-color: #04AA6D;
}

img{
  margin:0;
  margin-top: 0;
  margin-left: -10;
  padding: 25;
  border-radius:10%;
}
.btn-group button{
  background-color: black;
  color: white; 
  border: 2px solid white;
  padding: 20px 24px; 
  cursor: pointer; 
  width: 200%; 
  display: block; 
 
}

</style>
<body> 
      
  <ul>
  <li><h1>THE GAME OF ROCK PAPER AND SCISSOR</h1> </li>
  <li> <?php echo "welcome ". $_SESSION['email']; ?></li>
  </ul>
  <img src="pics\game_pic.png" alt="Failed to load image">

  <div class='btn-group' style="position:absolute; left:1000px; top:310px;">
  <form >
  <button type="submit" formaction="game_radio.php" value="Submit">Play Game</button>
  <button type="submit" formaction="leader_board.php" value="Submit">Leader Board</button>
  <button type="submit" formaction="change_password.php" value="Submit">Change Password</button>
  <button type="submit" formaction="logout.php" value="Submit">Logout</button>

  </form>

</div>
</body>
</html>

   

