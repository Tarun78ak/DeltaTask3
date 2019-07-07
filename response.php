<?php
session_start();
require 'config.php';
$query="SELECT * FROM response";
    $data=mysqli_query($con,$query);
    $row=mysqli_fetch_array($data);
    if(isset($_GET['ID2'])){
      require_once 'config.php';
      $ID=mysqli_real_escape_string($con,$_GET['ID2']);
  
      $query="SELECT * FROM response where id='$ID'";
      $data=mysqli_query($con,$query);
      $row=mysqli_fetch_array($data);
  
  }
  else header("location: response.php");
if(isset($_POST['logout'])){
  session_destroy();
  header("location: index.php");
  }
?> 
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Responses</title>  
      <link href="https://fonts.googleapis.com/css?family=Anton|Ubuntu+Condensed&display=swap" rel="stylesheet">
      <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <div id="responses">    
        <header>Check out the responses</header><br>
        <form class="myform" action="<?php if(isset($_GET['ID2'])){
    require_once 'config.php';
    $ID=mysqli_real_escape_string($con,$_GET['ID2']);
    echo "response.php? ID2='$ID'";} 
     else echo "response.php";?>" method="POST">
        <div id="content">
        <?php
            echo $row['answer1']."<br>";
            echo $row['answer2']."<br>";
            echo $row['answer3']."<br>";
            echo $row['answer4']."<br>";
            echo $row['answer5']."<br>";
        ?>
        </div>
        <a href="profile.php"><input id="btop_btn" type="button" value="Back to profile"></a>
        <input name="logout" id="logout_btn" type="submit" value="Logout">
        
        </form>
        
        </div>
    </body>
</html>