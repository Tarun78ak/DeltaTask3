<?php
require 'config.php';
?> 
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Registration</title>  
      <link href="https://fonts.googleapis.com/css?family=Anton|Ubuntu+Condensed&display=swap" rel="stylesheet">
      <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <div id="register">
        <header>Register Here</header><br>
        <form class="myform" action="register.php" method="POST">
        <img src="profile.png" class="profile"><br>
        <label>UserName :</label><br>
        <input name="username" class="inputvalues" placeholder="Type your username" type="text" required><br>
        <label>Password :</label><br>
        <input name="password" class="inputvalues" placeholder="Type your password" type="password" required><br>
        <label>Confirm Password :</label><br>
        <input name="cpassword" class="inputvalues" placeholder="Confirm" type="password" required><br><br>
        <input name="signup" id="signup_btn"  type="submit" value="Sign up">
        <a href="index.php"><input id="back_btn" type="button" value="Go to login"></a>
        </form>
        <?php 
        if(isset($_POST['signup'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            $cpassword=$_POST['cpassword'];
            if (!preg_match("/^[a-zA-Z ]*$/",$username)){
                echo "<script type='text/javascript'>alert('Only letters and white space allowed as usernames')</script>"; 
              }
            
                elseif($password==$cpassword){
                    $encrypted_password=md5($password);
                    $query="SELECT * from user WHERE username='$username'";
                    $query_run=mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run)>0){
                        echo "<script type='text/javascript'>alert('Username already exists.. try another one')</script>";
                    }
                    else
                    {
                    $query="INSERT into user values('$username','$encrypted_password')";
                    $query_run= mysqli_query($con,$query);
                    if($query_run){
                        echo "<script type='text/javascript'>alert('User Registered... go to login page')</script> ";
                    }
                    else{
                    echo "<script type='text/javascript'>alert('Error')</script> ";
                    }
                    }
                }    
                else{
                echo "<script type='text/javascript'>alert('Passwords dont match')</script>" ;
                }     
        }
        ?>
        </div>
    </body>
</html>