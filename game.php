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
$user =$_POST['user'];
$computer = rand(0,2);
function check($computer, $user, $result, $email,$db) {
  if ( $user == $computer ) {
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
  else if($user==3){
    $result[1]=$result[1];  
    $result[0]="Kidly select a valid option";
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

<head>
<title>Rock, Paper, Scissors Game</title>
</head>
<body>
<ul>
<!-- <li><h1>Play Game</h1> </li> -->
<div class='btns'>
<form><button type="submit" formaction="logout.php" value="Submit" class="right">Logout</button>
<button type="submit" formaction="home_page.php" value="Submit" class="right">Home</button></form>
</div>
</ul>
<div class="container">
<form method="post">
<h1> Select your option </h1>
<div class="custom-select" style="width:200px">  
<select name="user">
<option value="3">Not Selected</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
</select>
<input type="submit" value="Play">
</div>
<?php

print "<br> You Played =$names[$user] <br><br> Computer Played =$names[$computer] <br>";
print "<h2 style= color:red>$final_result[0] </h2><h3 h2 style= color:green> Score= $final_result[1]</h3>";
?>

</form>
</div>
</body>
</html>
