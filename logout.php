<?php
session_start();
include 'config.php';
if(isset($_SESSION['email'])){
  $email=$_SESSION['email'];
  $sql_active="UPDATE `user` SET `Active`='offline' WHERE email='$email'";
  $result_active = mysqli_query($db, $sql_active);
  session_destroy();   // function that Destroys Session 
  header("Location: Login.php");

}
else{
 header("Location: Login.php");
}
?>