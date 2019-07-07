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
      <title>Forms</title>  
      <link href="https://fonts.googleapis.com/css?family=Anton|Ubuntu+Condensed&display=swap" rel="stylesheet">
      <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <div id="noqns">    
        <header>Build your own forms!!!</header><br>
        <form class="myform" action="noqns.php" method="POST">
        <h1>Welcome <?php echo $_SESSION['username']?></h1>
        <img src="profile.png" class="profile"><br>
        <label>Number of questions :</label><br>
        <input name="no_question" class="inputvalues" placeholder="No of questions" type="number"><br>
        
        <input name="submit" id="submit_btn" type="submit" value="Submit">
        <a href="profile.php"><input id="btp_btn" type="button" value="Back to profile"></a>
        <input name="logout" id="logout_btn" type="submit" value="Logout">
        
        </form>
        <?php
        if(isset($_POST['submit'])){
          $no_question=$_POST['no_question'];
          if($no_question>2&&$no_question<6){
             $_SESSION['no_question']=$no_question;
             if($no_question==3){
              header("location: form3.php");
             }
             if($no_question==4){
              header("location: form4.php");
             }
             if($no_question==5){
              header("location: form5.php");
             }
          }
          elseif($no_question<3){
            echo"<script type='text/javascript'>alert('Min no of questions is 3')</script>";
          }
          else{
            echo"<script type='text/javascript'>alert('Max no of questions is 5')</script>";
          }
          
        }
        ?>
        </div>
    </body>
</html>