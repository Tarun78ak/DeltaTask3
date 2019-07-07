<?php
session_start();
if(isset($_POST['logout'])){
  session_destroy();
  header("location: index.php");
  }
?> 
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Home Page</title>  
      <link href="https://fonts.googleapis.com/css?family=Anton|Ubuntu+Condensed&display=swap" rel="stylesheet">
      <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <div id="profile">    
        <header>Your profile</header><br>
        <form class="myform" action="profile.php" method="POST">
        <h1>Welcome <?php echo $_SESSION['username']?></h1>
        <img src="profile.png" class="profile"><br>
        <a href="noqns.php"><input id="create_btn" type="button" value="Create forms"></a><br>
        <a href='otherforms.php'><input id="otherforms_btn" type="button" value="Other forms"></a><br>
        <a href='seeresponse.php'><input id="response_btn" type="button" value="Responses"></a><br>
        <input name="logout" id="logout_btn" type="submit" value="Logout">
        
        </form>
        
        </div>
    </body>
</html>