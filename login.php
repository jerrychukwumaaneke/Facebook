<?php
session_start();
error_reporting(0);
include('include/config.php');

if(isset($_POST['submit']))
  {
    $number=$_POST['number'];
    $password=$_POST['password'];
    $query=mysqli_query($con,"select ID from reg where  number='$number' && password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['uid']=$ret['ID'];
      $_SESSION["login_time_stamp"]= time();
     header('location:welcome.php');
    }
    else{
      $msg="Invalid Details.";
    }
  }
  ?>


<!DOCTYPE html>
<html>
<head>
  <title>WWW.facebook.com</title>
  <link rel="stylesheet" type="text/css" href="font/css/all.css">
  <link rel="stylesheet" type="text/css" href="styless.css">
</head>
<body>
<div id="container">

<center><h1>LOGIN!!</h1></center>

                          <form class="form-login" method="post">
        <fieldset >
              <legend style="color: #4267b2;">
                Sign in to your account
              </legend><br>
              <div
              <div>Please enter your email and password to log in</div>
              <div>
                <br><br>
<span class="input-icon">
  <div class="why"><i class="fa fa-user" style="color:#4267b2 ;"></i></div>
<div class="ba"><input type="text" name="number" class="form-control" required="true" placeholder="mobile/phone number" style="width: 60%; height: 2em;" autofocus="true"/>  </div>
</span>
</div>
<br>
        <div>
            <span class="input-icon">
              <div class="why"><i class="fa fa-lock" style="color:#4267b2";></i></div>
        <div class="ba"><input type="password" class="form-control" required="true" name="password" style="width: 60%;height: 2em;" placeholder="Password" /></div>
        <br>
         </span><a href="#" style="list-style: none;text-decoration: none;">
                  Forgot Password ?
                </a>
              </div><br>
              <div class="form-actions" style="padding-left: 30em;">
                
                <button type="submit" class="btn btn-primary pull-right" name="submit" style="background-color: #4267b2;color: white;column-width: 6em;height: 3em;">
                  Login <i class="fa fa-arrow-circle-right"></i>
                </button>
              </div><br><br>
              <div class="new-account">
                Don't have an account yet?
                <a href="reg.php">
                  Create an account
                </a>
              </div>
            </fieldset>
</form>
    

</div>
</body>
</html>