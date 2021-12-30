<?php
session_start();
include 'config.php';
include 'time.php';
$email=$_SESSION['email'];
if(isset($_SESSION['email'])){
  // echo "welcome ". $_SESSION['email'];
}
else{
   header("Location: login.php");
}
$names = array('Rock', 'Paper', 'Scissors','Not selected');
$user=3;  //defaultvalue
$computer=3;
$select_sc="select Score from user where email='$email'";
$run_qry=mysqli_query($db, $select_sc) or die( mysqli_error($db));
$row=mysqli_fetch_assoc($run_qry);
$score=$row['Score'];
$result=array();
$result[0]="No option selected";
$result[1]=$score;

if ($_SERVER["REQUEST_METHOD"]== "POST"){
  if(isset($_POST['user'])==0){
    $user=3;
    $computer=3;
  }
  else{
$user =$_POST['user'];
$computer = rand(0,2);
  }

function check($computer, $user, $result, $email,$db) {

  if($user==3 || $computer==3){
    $result[1]=$result[1];  
    $result[0]="Kidly select a valid option";
    return $result;
  }
  elseif ( $user == $computer ) {
      $result[0]= "Tie";
      return $result;
  } 
  else if ( $user == 0 && $computer == 2) {
    $result[1]=$result[1]+1;  
    $result[0]= "You Win";
    $sql_score="UPDATE `user` SET `Score`=$result[1] WHERE email='$email'";
    $result_score = mysqli_query($db, $sql_score);
    return $result;
  } 
  else if ( $user == 1 && $computer == 0) {
    $result[1]=$result[1]+1;  
    $result[0]= "You Win";
    $sql_score="UPDATE `user` SET `Score`=$result[1] WHERE email='$email'";
    $result_score = mysqli_query($db, $sql_score);
    return $result;
     
  } 
  else if ( $user == 2 && $computer == 1) {
    $result[1]=$result[1]+1;  
    $result[0]="You Win";
    $sql_score="UPDATE `user` SET `Score`=$result[1] WHERE email='$email'";
    $result_score = mysqli_query($db, $sql_score);
    return $result;
  } 
  else if ( $user == 0 && $computer == 1) {
    $result[1]=$result[1];  
    $result[0]="You Lose";
    return $result;
  } 
  else if ( $user == 1 && $computer == 2) {
    $result[1]=$result[1];  
    $result[0]="You Lose";
    return $result;
  } 
  else if ( $user == 2 && $computer == 0) {
    $result[1]=$result[1];  
    $result[0]="You Lose";
    return $result;
  }
  
}
// Check who win
$final_result = check($computer, $user, $result, $email,$db);
}
else{
    $final_result=array("Not selected",0);
}
?>
<html>
<style>
  ul {
    display: block;
    color:white;
    text-align: center;
    text-decoration: none;
    list-style-type: none;
    margin:-10;
    margin-top: -10;
    padding: 10;
    background-color: #333;
  }
  body{
   background-image: url('pics/background.jpg');
  }
  .container{
      text-align: center;
      width: 300;
      height: 650px;
      margin-top: 50px;
      margin-left: 450px;

  }
 
  .container form{
      width: 200%;
      height: 80%;
      padding: 30px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 8px 16px rgba(0,0,0,.3);
  }
  .btns .right{
          float: left;
          margin-top: -15;
          margin-left: -10;
        }
  .btns button{
  background-color:white;
  color: black; 
  border: 2px solid black;
  padding: 3px 5px; 
  cursor: pointer; 
  width: 5%; 
  display: block; 
 
}
.container form .btns2{
    
    height: 35px;
    border: none;
    outline: none;
    background: #27a327;
    cursor: pointer;
    text-transform: uppercase;
    color: white;
    border-radius: 4px;
    text-align: center;
    font-size: 20px;
    width: auto;
    
}
.custom-select{
  margin-top: 30;
}

.container form .low{
  margin-top:30;
  text-align: center;
    font-size: x-large;
}
.img {
        display: inline-block;
        padding: 20px;
    }

.stbtn {
  display: block;
  text-align: center;
  padding:20px;
}   
h3{
  font-size: 25px;
  color:green;
}
</style>
<head>
<title>Rock, Paper, Scissors Game</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<ul>
<li><h1>ROCK PAPER SCISSOR</h1> </li> 
<div class='btns'>
<form>
<button type="submit" formaction="logout.php" value="Submit" class="right">Logout</button>
<button type="submit" formaction="home_page.php" value="Submit" class="right">Home</button>
</form>
</div>
</ul>
<div class="container">
<form method="post">
<ul><li><h1> Select your option </h1></li></ul>

<div class="low">
  <div class="img">
<input type="radio"  id="user" name="user" value=0>
<label for="user" <i class="fas fa-hand-rock" style="font-size:100px"></i></label><br>
</div>
<div class="img">
<input type="radio" id="user" name="user" value=1>
<label for="user" <i class="fas fa-hand-paper" style="font-size:100px"></i></label><br>
</div>
<div class="img">
<input type="radio" id="user" name="user" value=2>
<label for="user" <i class="fas fa-hand-scissors" style="font-size:100px"></i></label>
</div>
</div>
<div class="stbtn">
<input type="submit" class="btns2" value="submit">
  </div>
<?php

print "<br><b> You Played: $names[$user] </b><br><br><b> Computer Played: $names[$computer] </b><br>";
print "<h2 style= color:red>$final_result[0] </h2><h3> Score: $final_result[1]</h3>";
?>

</form>
</div>
</body>
</html>
