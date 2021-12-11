<?php
session_start();
if(isset($_SESSION['email'])){

  session_destroy();   // function that Destroys Session 
  header("Location: Login.php");

}
else{
 header("Location: Login.php");
}
?>