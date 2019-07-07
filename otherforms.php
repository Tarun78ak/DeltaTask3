<?php
session_start();
require 'config.php';
$query="SELECT * from form";
        $data=mysqli_query($con,$query);
if(isset($_POST['logout'])){
  session_destroy();
  header("location: index.php");
  }
?> 
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Fill forms</title>  
      <link href="https://fonts.googleapis.com/css?family=Anton|Ubuntu+Condensed&display=swap" rel="stylesheet">
      <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <div id="otherforms">    
        <header>Other forms</header><br>
        <form class="myform" action="otherforms.php" method="POST">
        <div id="contents">
        <?php

        if(mysqli_num_rows($data)>0){
          while($row=mysqli_fetch_array($data)){
            echo"<a href='forms.php? ID={$row['id']}'>{$row['title']}</a><br>";
          }
        } 
        ?>
        </div>
        <a href="profile.php"><input id="btop_btn" type="button" value="Back to profile"></a>
        <input name="logout" id="logout_btn" type="submit" value="Logout">
        
        </form>
        
        </div>
    </body>
</html>