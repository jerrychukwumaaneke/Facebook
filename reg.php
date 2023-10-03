<?php

include('include/config.php');
session_start();
error_reporting(0);

if(isset($_POST['login']))
  {
    $number=$_POST['number'];
    $password=$_POST['password'];
    $query=mysqli_query($con,"select ID from reg where number='$number' && password='$password' ");
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
  <title>Facebook.com</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" type="text/css" href="styless.css">
</head>
<body>
  <header>
    <div id="facebooklogo">
      <h1><a href="#">facebook</a></h1>
      
    </div>
    <div id="signin-form">
      <form  class="user" name="register" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" onsubmit="return checkpass();">
      	 <div>
            <label for="number"></label>
            <input type="text" name="number"
            placeholder="Mobile/ Phone number" id="input" required="true">
          </div>
          <div>
            <label for="newpassword"></label>
            <input type="password" name="password" placeholder="passowrd" id="input" required="true"  pattern="(?=.*[A-Z]).{3,}" title="must contain uppercase letter(s) and at least 3 or more character required">
          </div>



      <!-- <div>
        <label for="username">Email or Phone</label><br>
        <input type="text" name="username">
      </div>
      <div>
        <label for="password">Password</label><br>
        <input type="Password" name="Password">
      </div> -->
      <div>
        <label for="submit"></label><br>
        <input type="submit" name="login" value="Log in ">
      </div>
      <br>
      <a href="#" id="forgotten">Forgotten account?</a>
      </form>
    </div>
  </header>
  



<?php 

if(isset($_POST['submit']))
{
   $firstname=$_POST['firstname'];
   $lastname=$_POST['lastname'];
   $number=$_POST['number'];
   $password=$_POST['password'];
   $cpassword=$_POST['cpassword'];
   $birth=$_POST['birth'];
   $gender=$_POST['gender'];
   $file_name=$_FILES['image']['name'];
   $file_path= '../img/regimg/'. $file_name;
 move_uploaded_file($_FILES['image']['tmp_name'], $file_path);
// $password=md5($_POST['password']);
// $password_again=md5($_POST['password_again']);

$ret=mysqli_query($con, "select number from reg where number='$number' || password='$password'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('Phone number / password already associated with another account!');</script>";
}
else{
  if($_POST['password']==$_POST['cpassword']){
$query=mysqli_query($con,"insert into reg(firstname,lastname,number,password,cpassword,date,gender,image) value('$firstname','$lastname','$number','$password','$cpassword','$birth','$gender','$file_name')");

  if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	 echo "<script>window.location.href ='login.php'</script>";
}
else{

	echo "<script>alert('Please correctly fill in your datails and try again!');</script>";
       echo "<script>window.location.href ='reg.php'</script>";
   }
     }
   else{
   	 echo  "<script>alert('password did not match!');</script>" ;
   }
}
}



?>







<section>


    <main>
      <p>
        Facebook helps you connect and share with the people in your life.
      </p>
      <img src="facebook.png">
    </main>
    <aside>
      <h1>Create an account</h1>
      <p>It's quick and easy.</p>
      <div>
        <form  class="user" name="register" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" onsubmit="return checkpass();">
          <div>
            <label for="firstname"></label>
            <input type="text" name="firstname" placeholder="First name" id="name" required="true"   pattern="^[a-zA-z ]*$" title="only letters and blankspace required">
        
            <label for="surname"></label>
            <input type="text" name="lastname"
            placeholder="lastname" id="name" required="true"   pattern="^[a-zA-z ]*$" title="only letters and blankspace required">
          </div>
          <div>
            <label for="number"></label>
            <input type="text" name="number"
            placeholder="Mobile/ Phone number" id="input" required="true">
          </div>
          <div>
            <label for="newpassword"></label>
            <input type="password" name="password" placeholder="Passowrd" id="input" required="true"  pattern="(?=.*[A-Z]).{3,}" title="must contain uppercase letter(s) and at least 3 or more character required">
          </div>
          <div>
            <label for="newpassword"></label>
            <input type="password" name="cpassword" placeholder="Confirm Passowrd" id="input" required="true" pattern="(?=.*[A-Z]).{3,}" title="must contain uppercase letter(s) and at least 3 or more character required">
          </div>
          <div>
            <label for="Birthday">Birthday</label><br>
            	<input type="text"  required="true" id="jDate" name="birth"  placeholder="birthday">
            	  </div>
          <div>
            <label for="gender">Gender</label><br>
            <input type="radio" name="gender" value="Male" required="true">Male
            <input type="radio" name="gender" value="female" required="true"><span>Female</span>
            <input type="radio" name="gender" value="custom" required="true"><span>Custom</span>
          </div>
          <div class="form-group">
                <p>Image</p>
                <input type="file" name="image" class="form-control" size="60" required>
              </div>
          <div>
            <p>
              By clicking Sign Up, you agree to our<br> Terms, Data Policy and Cookie Policy.<br> You may receive SMS notifications<br> from us and can opt out at any time.
            </p>
          </div>
          <br>
          <div>
            <input type="submit" name="submit" value="Sign Up" id="submit">
          </div>
          <div>
            <p>
              <a href="#">Create a Page</a> for a celebrity, band<br> or business.
            </p>
          </div>
        </form>
      </div>
    </aside>
  </section>
  <footer>
    <ul>
      <li><a href="#">English (uk)</a></li>
      <li><a href="#">Hausa</a></li>
    </ul>
    <div class="clear-float"></div>
    <hr style="margin: auto;">
    <ul>
      <li><a href="#">Sign Up</a></li>
      <li><a href="#">Login</a></li>
    </ul>
    <div class="clear-float"></div>
    <p>Facebook © 2019</p>
  </footer>
</body>
</html>