<?php
session_start();
include 'dbconnect.php';
$message=$amount=$action="";
if(!isset($_SESSION['fname'])||empty($_SESSION['fname']))
{
  header("location: login.php?er=loginfirst");
  exit();
}
elseif(isset($_SESSION['fname'])||!empty($_SESSION['fname']))
{
  $item_id=$_GET['id'];

  $useractions="<a class='mdl-navigation__link mdl-typography--text-uppercase mdl-typography--font-bold'>Hello ".$_SESSION['fname']."</a>
  <a class='mdl-navigation__link' href='index.php'>Home</a>
  <a class='mdl-navigation__link' href='logout.php'>Logout</a>";
  $sql="SELECT * from furniture_data WHERE item_id='$item_id'";
      $result=mysqli_query($link,$sql);
      if(mysqli_num_rows($result) == 1)
        {
          $row=mysqli_fetch_assoc($result);
        }
  $act=$_GET['act'];
  if($act=='btnRent')
  {
  $message=$row['item_name']." of rent Rs. ".$row['item_rent']." will be delivered to ".$_SESSION['fname']." on address :'".$_SESSION['addr']."'";  
  $action='RENT';
  $amount="Rs. ".$row['item_rent']." per month";
  }
  elseif ($act=="btnBuy") {
    $message=$row['item_name']." of price Rs. ".$row['item_price']." will be delivered to ".$_SESSION['fname']." on address : '".$_SESSION['addr']."'";
    $action='BUY';
    $amount="Rs. ".$row['item_price'];
  }
  $name=$_SESSION['fname'];
  $email=$_SESSION['email'];
  $addr=$_SESSION['addr'];
  $id=$row['item_id'];
  $item_name=$row['item_name'];
  $sql="INSERT into user_actions(user_name,user_email,action_type,amout_spend,del_addr)values('$name','$email','$action','$amount','$addr');";
  if(!mysqli_query($link,"INSERT INTO `user_actions` (`action_id`, `user_name`, `user_email`, `action_time`, `action_type`,`item_id`,`item_name`, `amount_spend`, `del_addr`) VALUES (NULL, '$name', '$email', CURRENT_TIMESTAMP, '$action','$id','$item_name', '$amount', '$addr');"))
  {
    $message="ERROR";
  }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Buy and Rent Furniture</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="css/material.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script defer src="js/material.js"></script>
    </head>
    <body>
        <!-- Uses a header that contracts as the page scrolls down. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header mdl-color--blue-500 mdl-layout__header--waterfall">
    <!-- Top row, always visible -->
    <div class="mdl-layout__header-row ">
      <!-- Title -->
      <span class="mdl-layout-title"><a href="index.php" class="mdl-color-text--white mdl-typography--font-medium">Buy & Rent Furniture</a></span>
      <div class="mdl-layout-spacer"></div>
      <form method="get" action="index.php">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon"
               for="fixed-header-drawer-exp">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" name="search"
                 id="fixed-header-drawer-exp">
        </div>
      </div>
    </form>
      </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">
<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    >
    
</ul></span>
    <nav class="mdl-navigation">
      <?php echo $useractions;?>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      <div class="mdl-grid">
        <div class="mdl-grid mdl-cell mdl-cell--12-col mdl-shadow--3dp mdl-typography--text-center">
          <h3 class="mdl-cell mdl-cell--12-col mdl-typography--text-uppercase mdl-typography--text-center mdl-typography--font-bold mdl-color-text--lime-700"><?php echo $message;?></h3>
          <h4 class="mdl-cell mdl-cell--12-col">Thank you for using BUY&RENT FURNTIURE!!</h4>
          <h6>You'll bew redirected to HOMEPAGE!</h6>
          <?php header("refresh:5;url=index.php");?>
        </div>
      </div>
</div> 
 <?php include('footer.php');?>
  </main>
</div>
    </body>
</html>