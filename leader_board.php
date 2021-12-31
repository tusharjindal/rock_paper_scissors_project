<html>
<link rel="stylesheet" type="text/css" href="leader_board_style.css">

    <head>
        <title>LeaderBoard </title>
    </head>
  
    <body>
       
    <div class="container">
        <table style="width:70%">
          <thead class="main">
             <tr>
                <th colspan="6" >Leader Board</th>
             </tr>
          </thead>
            <tr>
                <th>Ranking</th>
                <th>ID</th>
                <th>Username</th>
                <th>Active</th>
                <th>wins</th>
                <th>lost</th>
            </tr>

<?php
include('config.php');  
session_start();
if(isset($_SESSION['email'])){
    $result = mysqli_query($db, "select ID,username, Active, Score, losses from user ORDER BY (losses/Score) DESC");

$ranking = 1;
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>{$ranking}</td>
        <td>{$row['ID']}</td>
        <td>{$row['username']}</td>
        <td>{$row['Active']}</td>
        <td>{$row['Score']}</td>
        <td>{$row['losses']}</td></tr>";
        $ranking++;
    }
}
}
else{
    header("Location: Login.php");
}
?>
</table>
</div>
</body>
</html>

