<?php
session_start();
include 'dbconnect.php';
$item_name=$item_price=$item_type=$item_id=$item_rent=$item_desc=$item_manu=$item_image=$item_warr=$error=$inventoryContent=$btn_search_id="";
$isDisable="disabled";
$active1="is-active";
$active2="";
if($_SESSION['isAdmin']=='false' || empty($_SESSION['isAdmin']))
{
	header('location: index.php');
	exit();
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['btnadd']))
  {
    $item_name=$_POST['item_name'];
    $item_warr=$_POST['item_warr'];
    $item_manu=$_POST['item_manu'];
    $item_desc=$_POST['item_desc'];
    $item_price=$_POST['item_price'];
    $item_rent=$_POST['item_rent'];
    $item_type=$_POST['item_type'];
    $item_image=$_FILES['item_image']['name'];
    $target = "images/".basename($item_image);
    //$error=$item_image;
    if(empty($item_name)||empty($item_price)||empty($item_rent)||empty($item_desc)||empty($item_manu)||empty($item_warr)||empty($item_image)||empty($item_type))
    {
      $error="Please fill all the details.";
    }
    else
    {
      if(move_uploaded_file($_FILES['item_image']['tmp_name'], $target)&& mysqli_query($link,"INSERT INTO `furniture_data` (`item_id`, `item_name`,`item_type`, `item_price`, `item_rent`, `item_desc`, `item_manu`,  `item_warr`, `item_image`) VALUES (NULL, '$item_name','$item_type', '$item_price', '$item_rent', '$item_desc', '$item_manu', '$item_warr', '$item_image')"))
      {
        $error=$item_name." added successfully.";
      }
      else
      {
      $error="Something went wrong."; 
      }
    }
  }
  if(isset($_POST['btnsearch']))
  {
    if(empty($_POST['item_id']))
    {
      
  $error="Enter Item ID and search item.";
    }else {
      $item_id=$_POST['item_id'];
      //$error= $item_id;
      $sql="SELECT * from furniture_data WHERE item_id='$item_id'";
    $row = mysqli_fetch_assoc(mysqli_query($link,$sql));
    if(mysqli_num_rows(mysqli_query($link,$sql))>0 )
    {
      $item_id=$row['item_id'];
      $item_name=$row['item_name'];
      $item_price=$row['item_price'];
      $item_rent=$row['item_rent'];
      $item_desc=$row['item_desc'];
      $item_manu=$row['item_manu'];
      $item_warr=$row['item_warr'];
      $item_type=$row['item_type'];
    }
    }
    $isDisable="";
}
if(isset($_POST['btndel']))
{
   $item_id=$_POST['item_id'];
   $sql="DELETE from furniture_data where item_id='".$item_id."'";
   if(mysqli_query($link,$sql))
    {
      $error=$_POST['item_name']." deleted.";
    }
    else {
      $error="Something went wrong";
    }

}
if(isset($_POST['btnupdate']))
{
 $item_name=$_POST['item_name'];
    $item_warr=$_POST['item_warr'];
    $item_manu=$_POST['item_manu'];
    $item_desc=$_POST['item_desc'];
    $item_price=$_POST['item_price'];
    $item_rent=$_POST['item_rent'];
    $item_image=$_FILES['item_image']['name'];
    $item_id=$_POST['item_id'];
    $target = "images/".basename($item_image);
    //$error=$item_image;
    if(empty($item_name)||empty($item_price)||empty($item_rent)||empty($item_desc)||empty($item_manu)||empty($item_warr))
    {
      $error="Please fill all the details.";
    }
    else
    {
      $sql = "UPDATE furniture_data SET 
      item_name='$item_name',
      item_price='$item_price',
      item_rent='$item_rent',
      item_desc='$item_desc',
      item_manu='$item_manu',
      item_warr='$item_warr',
      item_image='$item_image'
WHERE item_id='$item_id'";
if(mysqli_query($link,$sql))
{
  $error=$item_name." updated.";
}
    } 
}
  $active2="is-active";
  $active1="";
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ADMIN PANEL</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="css/material.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script defer src="js/material.js"></script>
    </head>
    <body class="container">
<!-- Simple header with fixed tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row ">

      <a class="mdl-layout-title mdl-typography--font-medium mdl-color-text--white" href="logout.php">ADMIN PANEL</a>

    </div>
    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <a href="#fixed-tab-1" class="mdl-layout__tab  <?php echo $active1;?>">INVENOTRY</a>
      <a href="#fixed-tab-2" class="mdl-layout__tab">SELLS</a>
      <a href="#fixed-tab-3" class="mdl-layout__tab  <?php echo $active2;?>">MANAGE</a>
    </div>
  </header>
  <main class="mdl-layout__content ">
    <section class="mdl-layout__tab-panel <?php echo $active1;?>" id="fixed-tab-1">
      <div class="page-content">
        <div class="mdl-grid">
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
  <thead>
    <tr >
      <th>ID</th>
      <th>ITEM NAME</th>
      <th>ITEM TYPE</th>
      <th>ITEM PRICE</th>
      <th>ITEM RENT</th>
      <th>ITEM DESCRIPTION</th>
      <th>ITEM MANUFACTURER</th>
      <th>ITEM WARRANTY</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $result=mysqli_query($link,"SELECT * from furniture_data");
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    echo "<tr class='mdl-typography--text-uppercase'>
    <td>".$row['item_id']."</td>
    <td>".$row['item_name']."</td>
    <td>".$row['item_type']."</td>
    <td>Rs. ".$row['item_price']."</td>
    <td>Rs. ".$row['item_rent']."</td>
    <td>".$row['item_desc']."</td>
    <td>".$row['item_manu']."</td>
    <td>".$row['item_warr']." Years</td>
    </tr>";
   }
}
else
{
  echo "Records not found.";
}
    ?>
  </tbody>
</table>
</div>
      </div>
    </section>
    <!--SELLS SECTION-->
    <section class="mdl-layout__tab-panel" id="fixed-tab-2">
      <div class="page-content">
      <div class="mdl-grid">
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
  <thead >
    <tr>
      <th>SELL ID</th>
      <th>PURCHASED BY</th>
      <th>EMAIL</th>
      <th>TIME</th>
      <th>RENT/BUY</th>
      <th>ITEM ID</th>
      <th>ITEM NAME</th>
      <th>AMOUNT</th>
      <th>DELIVERY ADDRES</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $result=mysqli_query($link,"SELECT * from user_actions");
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    echo "<tr class='mdl-typography--text-uppercase'>
    <td>".$row['action_id']."</td>
    <td>".$row['user_name']."</td>
    <td>".$row['user_email']."</td>
    <td>".$row['action_time']."</td>
    <td>".$row['action_type']."</td>
    <td>".$row['item_id']."</td>
    <td>".$row['item_name']."</td>
    <td>".$row['amount_spend']."</td>
    <td>".$row['del_addr']."</td>
    </tr>";
   }
}
else
{
  echo "Records not found.";
}
    ?>
  </tbody>
</table>
</div></div>
    </section>
    <section class="mdl-layout__tab-panel  <?php echo $active2;?>" id="fixed-tab-3">
      <div class="page-content mdl-grid">
        <form class=" mdl-cell mdl-cell--12-col" enctype="multipart/form-data" style="padding: 20px;" method="post" action="<?php echo($_SERVER["PHP_SELF"]); ?>">
          <h4 class="mdl-typography--text-center"><?php echo $error;?></h4>
         <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col'>
    <input class='mdl-textfield__input' type='number' name='item_id' value='<?php echo $item_id;?>' <?php echo $isDisable;?>>
    <label class='mdl-textfield__label' for='item_id'>Item ID</label>
  </div>Press search button to enable.<br>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col">
    <input class="mdl-textfield__input " type="text" name="item_name" value="<?php echo $item_name;?>">
    <label class="mdl-textfield__label" for="item_name">Item Name</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
    <input class="mdl-textfield__input " type="number" name="item_price" value="<?php echo $item_price;?>">
    <label class="mdl-textfield__label" for="item_price" >Price</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2-col">
    <input class="mdl-textfield__input " type="number" name="item_rent" value="<?php echo $item_rent;?>">
    <label class="mdl-textfield__label" for="item_rent">Rent</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--6-col">
     <textarea class="mdl-textfield__input" type="text" rows= "3" name="item_desc" ><?php echo $item_desc;?></textarea>
    <label class="mdl-textfield__label" for="item_desc">Description</label>
  </div><br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
    <input class="mdl-textfield__input " type="text" name="item_type" value="<?php echo $item_type;?>">
    <label class="mdl-textfield__label" for="item_type">Type</label>
  </div>  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
    <input class="mdl-textfield__input " type="text" name="item_manu" value="<?php echo $item_manu;?>">
    <label class="mdl-textfield__label" for="item_manu">Manufacturer</label>
  </div>                               
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--3-col">
    <input class="mdl-textfield__input " type="number" name="item_warr" value="<?php echo $item_warr;?>">
    <label class="mdl-textfield__label" for="item_warr">Warranty Period</label>
  </div> 
  <div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--6-col">
    <input class="mdl-textfield__input "  type="file" name="item_image">
    
  </div>
  <br>
  <button name="btnadd" class="mdl-button mdl-js-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-cell mdl-cell--2-col">
  Add
</button>
<button name="btnsearch" class="mdl-button mdl-js-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-cell mdl-cell--2-col">
  Search
</button>
<button name="btnupdate" class="mdl-button mdl-js-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-cell mdl-cell--2-col" <?php echo $isDisable;?>>
  Update
</button> 
<button name="btndel" class="mdl-button mdl-js-button mdl-button--raised mdl-color--accent mdl-color-text--white mdl-cell mdl-cell--2-col" <?php echo $isDisable;?>>
  Delete
</button>
    </form>
      </div>
    </section>
  </main>
</div>
    </body>
</html>

