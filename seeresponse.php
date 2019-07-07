<?php
session_start();
require 'config.php';
$query="SELECT * from response";
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
      <title>Check out the response</title>  
      <link href="https://fonts.googleapis.com/css?family=Anton|Ubuntu+Condensed&display=swap" rel="stylesheet">
      <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <div id="response">    
        <header>Check out the response</header><br>
        <form class="myform" action="seeresponse.php" method="POST">
        <div id="content">
        <?php

        if(mysqli_num_rows($data)>0){
          $response_no=1;
          
          while($row=mysqli_fetch_array($data)){
            $response_name='Response'.$response_no;
            echo"<a href='response.php? ID2={$row['id']}'>{$response_name}</a><br>";
            $response_no++;
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