<?php
session_start();
require 'config.php';
$query="CREATE TABLE IF NOT EXISTS response (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  answer1 TEXT(50),
  answer2 TEXT(50),
  answer3 TEXT(50),
  answer4 TEXT(50),
  answer5 TEXT(50)
  )";
$query_run=mysqli_query($con,$query);
if(isset($_GET['ID'])){
    require_once 'config.php';
    $ID=mysqli_real_escape_string($con,$_GET['ID']);

    $query="SELECT * FROM form where id='$ID'";
    $data=mysqli_query($con,$query);
    $row=mysqli_fetch_array($data);

}
else header("location: forms.php");

if(isset($_POST['logout'])){
  session_destroy();
  header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Fill the form</title>  
      <link href="https://fonts.googleapis.com/css?family=Anton|Ubuntu+Condensed&display=swap" rel="stylesheet">
      <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <div id="filling">    
        <form class="myform" action="<?php if(isset($_GET['ID'])){
    require_once 'config.php';
    $ID=mysqli_real_escape_string($con,$_GET['ID']);
    echo "forms.php? ID='$ID'";} 
     else echo "forms.php";?>" method="POST">
        <fieldset>  
        <h1><?php echo $row['title']; ?></h1>
        <h2><?php echo $row['descriptions']?></h2>
        <label><?php echo $row['question1']?></label><br>
        <input name="answer1" class="inputvalues" placeholder="Write your answer" type="text" required><br>
        <label><?php echo $row['question2']?></label><br>
        <input name="answer2" class="inputvalues" placeholder="Write your answer" type="text" required><br>
        <label><?php echo $row['question3']?></label><br>
        <input name="answer3" class="inputvalues" placeholder="Write your answer" type="text" required><br>
        <label><?php if($row['question4']) 
        echo $row['question4'];
        else {
          echo"</fieldset>";
          echo "JUST TYPE xxxx for suggestion boxes";
          echo "<label>Suggestion</label>";}?></label><br>
        <input name="answer4" class="inputvalues" placeholder="Write your answer" type="text" required><br>
        <label><?php if($row['question5']) 
        echo $row['question5'];
        else {
          echo"</fieldset>";
          echo "JUST TYPE xxxx for suggestion boxes";
          echo "<label>Suggestion</label>";}?></label><br>
        <input name="answer5" class="inputvalues" placeholder="Write your answer" type="text" required><br>
        <input name="submit_form" id="submitform_btn" type="submit" value="Submit form">
        <a href="profile.php"><input id="btop_btn" type="button" value="Back to profile"></a>
        <input name="logout" id="logout_btn" type="submit" value="Logout">
        
        </form>
        <?php
        if(isset($_POST['submit_form'])){
          $answer1=$_POST['answer1'];
          $answer2=$_POST['answer2'];
          $answer3=$_POST['answer3'];
          $answer4=$_POST['answer4'];
          $answer5=$_POST['answer5'];
          $query="INSERT into response (answer1,answer2,answer3,answer4,answer5)
                  values('$answer1','$answer2','$answer3','$answer4','$answer5');";     
          $data=mysqli_query($con,$query);
        header("location: profile.php");
        }
        ?>
        </div>
    </body>
</html>