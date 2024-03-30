<?php
  session_start();
  
  include("db.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $username = $_POST['fname'];
    $emailid = $_POST['email'];
    $phoneno = $_POST['phone'];
    $password = $_POST['pword'];

    if(!empty($phoneno) && !empty($password))
    {
      $query = "insert into form (fname, email, phone, pword) values ('$username', '$emailid', '$phoneno', '$password')";
      
      mysqli_query($con, $query);

      echo "<script type='text/javascript'> alert('Successfully Register')</script>";
    }
    else{
      echo "<script type='text/javascript'> alert('Please enter some valid information')</script>";
    }
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OncoCare - Sign Up</title>
    <link rel="stylesheet" href="ideaS.css">
  </head>
  <body class="content">
    <header>
        <button class="back-button" onclick="history.back()">Back</button>
    </header>
    
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Sign Up Form</span></div>
        <form method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="fname" placeholder="Full Name" required>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="email" placeholder="Email" required>
          </div>
	<div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="phone" placeholder="Phone" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="pword" placeholder="Password" required>
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" value="Sign Up">
          </div>
          <div class="signup-link">Already a member? <a href="login.php">Log In</a></div>
        </form>
      </div>
    </div>
  </body>
</html>
