<?php
session_start();
require 'config.php';
?> 
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Login</title>  
      <link href="https://fonts.googleapis.com/css?family=Anton|Ubuntu+Condensed&display=swap" rel="stylesheet">
      <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <div id="login">
        <header>Login Here</header><br>
        <form class="myform" action="index.php" method="POST">
        <img src="profile.png" class="profile"><br>
        <label>UserName :</label><br>
        <input name="username"  class="inputvalues" placeholder="Type your username" type="text" required><br>
        <label>Password :</label><br>
        <input name="password"  class="inputvalues" placeholder="Type your password" type="password" required><br><br>
        <input name="login" id="login_btn"  type="submit" value="Login">
        <a href="register.php"><input id="register_btn" type="button" value="Register"></a>
        </form>
        <?php
        if(isset($_POST['login'])){
          $username=mysqli_real_escape_string($con,$_POST['username']);
          $password=mysqli_real_escape_string($con,$_POST['password']);
          $encrypted_password=md5($password);
          $query="SELECT * from user WHERE username='$username' AND password='$encrypted_password'";
          $query_run=mysqli_query($con,$query);
          if(mysqli_num_rows($query_run)>0){
            $_SESSION['username']=$username;
            header("location: profile.php");
          }
          else
          echo "<script type='text/javascript'>alert('Wrong credentials')</script> ";
        }
        ?>
        </div>
    </body>
</html>