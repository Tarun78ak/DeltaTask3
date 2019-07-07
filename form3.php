<?php
session_start();
require 'config.php';
$query="CREATE TABLE IF NOT EXISTS form (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  title TEXT (30) NOT NULL ,
  descriptions TEXT(30) NOT NULL,
  question1 TEXT(50),
  question2 TEXT(50),
  question3 TEXT(50),
  question4 TEXT(50),
  question5 TEXT(50)
  )";
$query_run=mysqli_query($con,$query);
if(isset($_POST['logout'])){
  session_destroy();
  header("location: index.php");
  }
?> 
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Create form</title>  
      <link href="https://fonts.googleapis.com/css?family=Anton|Ubuntu+Condensed&display=swap" rel="stylesheet">
      <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <div id="form3">    
        <header>Build your own forms!!!</header><br>
        <form class="myform" action="form3.php" method="POST">
        <label>Title :</label><br>
        <input name="title" class="inputvalues" placeholder="Write the title" type="text" required><br>
        <label>Description :</label><br>
        <input name="descriptions" class="inputvalues" placeholder="Write the description" type="text" required><br>
        <label>Question 1</label><br>
        <input name="qone" class="inputvalues" placeholder="Write the question" type="text" required><br>
        <label>Question 2</label><br>
        <input name="qtwo" class="inputvalues" placeholder="Write the question" type="text" required><br>
        <label>Question 3</label><br>
        <input name="qthree" class="inputvalues" placeholder="Write the question" type="text" required><br>
        <input name="submit_form" id="submitform_btn" type="submit" value="Submit form">
        <a href="profile.php"><input id="backtp_btn" type="button" value="Back to profile"></a>
        <input name="logout" id="logout_btn" type="submit" value="Logout">
        </form>
        <?php
        if(isset($_POST['submit_form'])){ 
            $title=$_POST['title'];
            $description=$_POST['descriptions'];
            $question1=$_POST['qone'];
            $question2=$_POST['qtwo'];
            $question3=$_POST['qthree'];
            $query="SELECT title from form where title='$title'";
            $query_run=mysqli_query($con,$query);
            if(mysqli_num_rows($query_run)>0){
              echo "<script>alert('Use a different title for your form');</script>";
            }
            else{
            $query="INSERT INTO form (title,descriptions,question1,question2,question3)
            values('$title','$description','$question1','$question2','$question3')";
            $query_run=mysqli_query($con,$query);
            echo "<script>alert('Form has been created');</script>";
          }
        }
        ?>
        
        </div>
    </body>
</html>