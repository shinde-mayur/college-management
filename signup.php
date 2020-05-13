<?php
include 'dbconnect.php';
$error="";
if(isset($_SESSION)){
	header("Location: index.php");
}
$name=$email=$pass=$confirm="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $confirm=$_POST['cpass'];
    if(isset($_POST['btnsignup']))
    {
      if(!empty($fname)||!empty($lname)||!empty($email)||!empty($pass)||!empty($cpass)||!empty($addr))
      {

        if(mysqli_num_rows(mysqli_query($link,"SELECT * from user WHERE user_email='$email'"))>0 )
        {
          $error="--".$email." is already registered.--";
        }
        elseif(strlen($pass)<8)
        {
          $error="--Password must be longer than 8 characters.--";
        }
        elseif($pass!=$confirm)
        {
          $error="--Passwords do not match.--";
        }
        elseif(mysqli_query($link,"INSERT INTO user(user_name,user_email,user_pass)values('$name','$email','$pass');")){
          $error="--".$name." you'll be redirected to login page now.--";
          header( "refresh:5;url=index.php" );
        }
        else {
          $error="--Something went wrong.--";
        }
      }
      else{
        $error="--Fill all the details please.--";
      }
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Desk</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="css/material.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script defer src="js/material.js"></script>
    </head>
    <body class="container">
    	<div class="layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
    	<div class="login mdl-color--white mdl-shadow--4dp  mdl-color-text--grey-800 mdl-cell mdl-cell--middle">
        
           <a href="index.php"><h4 class="mdl-color-text--lime-800">Student Desk</h4></a>
            <h5 class="mdl-color-text--blue-400">Sign up</h5><h6>Already a registered user? <a href="index.php">Sign in here.</a></h6>
            <h6 class="mdl-color-text--red-500"><?php echo $error ?></h6>
    		<form method="post" action="<?php echo($_SERVER["PHP_SELF"]); ?>">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="name">
    <label class="mdl-textfield__label" for="name">Name</label>
  </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="email" name="email">
    <label class="mdl-textfield__label" for="email">Enter email</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" name="pass">
    <label class="mdl-textfield__label" for="pass">Enter Password</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" name="cpass">
    <label class="mdl-textfield__label" for="cpass">Confirm Password</label>
  </div>
    <div>
<button name="btnsignup" class="mdl-button mdl-js-button mdl-button--raised mdl-color--accent mdl-color-text--white">
  Sign Up
</button>

  </div>
</form>

</div>
    </div>
   </body>
</html>