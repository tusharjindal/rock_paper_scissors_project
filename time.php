<?php
include('config.php');  
$email=$_SESSION['email'];
$select_active="select updated from user where email='$email'";
$run_qry=mysqli_query($db, $select_active) or die( mysqli_error($db));
$row=mysqli_fetch_assoc($run_qry);

function Activity($timestamp,$email,$db)
{
    $now = new DateTime('Asia/Kolkata');
    $current=strtotime($now->format('Y-m-d H:i:s'));
    $last = strtotime($timestamp);
    $difference =abs($last - $current);
    if ($difference > 600) {
      
        // echo '<script type ="text/JavaScript">';  
        // echo 'alert("5 mins of inactivity recorded. you will be logged out in case of another 5 mins of inactivity")';  
        // echo '</script>';  
        return false;
    }
    // elseif ($difference > 600) {
    //     return false;
    // }
    else{
        $sql2="UPDATE `user` SET `updated`=current_timestamp() WHERE email='$email'";
        $result2 = mysqli_query($db, $sql2);
        return true;
    }
}
$status = Activity($row['updated'],$email,$db);
if($status==false){
    header("Location: Logout.php");
}

?>
