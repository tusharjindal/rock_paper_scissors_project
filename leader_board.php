<html>
<style>
  table, th, td {
        border:1px solid black;
    }
  body{
        min-height: 100vh;
        background: #eee;
        display: flex;
        font-family: sans-serif;
        background-image: url('pics/background.jpg');
    }
  .container{
            margin: auto;
            width: 800px;
            max-width: 90%;
        }   
  .container table{
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            height: 70%;
            padding: 20px;
            background: white;
            border-radius: 4px;
            box-shadow: 0 8px 16px rgba(0,0,0,.3);
        }
   .container table .main{
    height: 15%;
    font-size: 40px;
   }    
</style>
    <head>
        <title>LeaderBoard </title>
    </head>
  
    <body>
       
    <div class="container">
        <table style="width:70%">
          <thead class="main">
             <tr>
                <th colspan="5" >Leader Board</th>
             </tr>
          </thead>
            <tr>
                <th>Ranking</th>
                <th>ID</th>
                <th>Username</th>
                <th>Active</th>
                <th>Score</th>
            </tr>
            

<?php
include('config.php');  
session_start();
if(isset($_SESSION['email'])){
    $result = mysqli_query($db, "select ID,username, Active, Score from user ORDER BY Score DESC");

$ranking = 1;
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>{$ranking}</td>
        <td>{$row['ID']}</td>
        <td>{$row['username']}</td>
        <td>{$row['Active']}</td>
        <td>{$row['Score']}</td></tr>";
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

