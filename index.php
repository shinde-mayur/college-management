<?php
include 'dbconnect.php';
$email=$pass=$error="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['btnlogin'])){
        $email=$_POST['mail'];
        $pass=$_POST['pass'];
    if(!empty($email)||!empty($pass))
    {
       if(mysqli_num_rows(mysqli_query($link,"SELECT * from user WHERE user_email='$email'"))<1 )
        {
          $error="--".$email." is not registered.--";
        }
        elseif(strlen($pass)<8)
        {
          $error="--Password must be longer than 8 characters.--";
        }
        else
            {
                $result=mysqli_query($link,"SELECT * from user WHERE user_email='$email'");
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result)== 1) {
                    if($row['user_pass']==$pass){
                            /* Password is correct, so start a new session and
                            save the fname to the session */
                            //session_destroy();
                           session_start();
                            $_SESSION['name'] = $row['user_name'];
                            $_SESSION['email']=$row['user_email'];
                            $_SESSION['user_id']=$row['user_id'];
                            if($_SESSION['email']=="admin@project")
                            {
                                $_SESSION['isAdmin']="true";
                                header("location: home.php");
                            }  
                            else
                            {
                                 $_SESSION['isAdmin']="false";
                                 header("location: feadmission.php");
                            }
                           
                        } else{
                            // Display an error message if password is not valid
                            $error = 'The password you entered was not valid.';
                        }
            # code...
        }
    }
        
    }
    else
    {
        $error="--Email or Password cannot be empty.--";
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
            <h5 class="mdl-color-text--blue-400">Sign in</h5><h6>Not a user? <a href="signup.php">Signup Now!</a></h6>
             <h6 class="mdl-color-text--red-500"><?php echo $error ?></h6>
    		<form method="post" action="<?php echo($_SERVER["PHP_SELF"]); ?>">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="mail">
    <label class="mdl-textfield__label" for="mail">Enter Email</label>
  </div>
  <div style="text-align: left;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" name="pass">
    <label class="mdl-textfield__label" for="pass">Enter Password</label>
  </div>
    <div>
    <a style="padding: 20px;">Forgot Password??</a>
<button name="btnlogin" class="mdl-button mdl-js-button mdl-button--raised mdl-color--accent mdl-color-text--white">
  Login
</button>
  </div>
  

</form>
</div>
    </div>
    </body>
</html>