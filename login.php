<?php
  session_start();
  
  include("db.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $phoneno = $_POST['phone'];
    $password = $_POST['pword'];

    if(!empty($phoneno) && !empty($password))
    {
      $query = "select * from form where phone = '$phoneno' limit 1";
      $result = mysqli_query($con, $query);

      if($result){
        if($result && mysqli_num_rows($result) > 0)
        {
           $user_data = mysqli_fetch_assoc($result);

           if($user_data['pword'] == $password)
           {
              header("location: index.html");
              die;
           }

        }
      }
      echo "<script type='text/javascript'> alert('Wrong phone number or password')</script>";
    }
    else{
      echo "<script type='text/javascript'> alert('Wrong phone number or password')</script>";
    }

  }

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>OncoCare</title> 
    <link rel="stylesheet" href="ideaS.css">
    
  </head>
  <body class="content">
 	<header>
        <button class="back-button" onclick="history.back()">Back</button>
    </header>
	
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form method="POST">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="phone"placeholder="Phone" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="pword" placeholder="Password" required>
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="signup.php">Signup now</a></div>
        </form>
      </div>
    </div>
  </body>
</html>