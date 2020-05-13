<?php
session_start();
include 'dbconnect.php';
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
    		<div class="mdl-grid mdl-cell mdl-cell--12-col">
          <img src='images/<?php echo $row['item_image'];?>' class='mdl-grid mdl-cell mdl-cell--middle mdl-shadow--3dp' border='0'>
          <div class="mdl-grid mdl-cell mdl-cell--5-col">
            <h3>Name : <?php echo $row['item_name'];?>
              Description : <?php echo $row['item_desc'];?><br>
          Price : RS. <?php echo $row['item_price'];?><br>Rent : RS. <?php echo $row['item_rent'];?><br>Manufacturer : <?php echo $row['item_manu'];?><br>Warranty : <?php echo $row['item_warr'];?> Year</h3><br>
          <a href="confirm.php?id=<?php echo $item_id;?>&act=btnRent" name='btnrent' class='mdl-button mdl-js-button mdl-button--raised mdl-color--lime-800 mdl-color-text--white mdl-cell mdl-cell--6-col'>RENT</a>
          <a href="confirm.php?id=<?php echo $item_id;?>&act=btnBuy" name='btnbuy' class='mdl-button mdl-js-button mdl-button--raised mdl-color--lime-800 mdl-color-text--white mdl-cell mdl-cell--6-col'>BUY</a>
          </div>
    </div>
  </div>
</div>
 <?php include('footer.php');?>
  </main>
</div>
    </body>
</html>