<?php
include('dbconnect.php');
session_start();
$Fname=$Lname=$Sname=$Mname=$Dob=$Inco=$uid=$Gender=$Religion=$City=$Nat=$Loc=$perm=$Loc_state=$Prem_state=$Can=$Par=$C_email=$Applicant=$Perc=$hsc_perc=$Dse_perc="";
if(!isset($_SESSION['email'])||empty($_SESSION['email']))
{
  header("location: index.php");
}
elseif($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['btnReg']))
  {
    $fname=$_POST['name'];
    $lname=$_POST['lname'];
    $sname=$_POST['fname'];
    $mname=$_POST['mname'];
    $dob=$_POST['dob'];
    $inco=$_POST['inco'];
    $uid=$_POST['uid'];
    $gender=$_POST['gender'];
    $religion=$_POST['religion'];
    $city=$_POST['city'];
    $nat=$_POST['nat'];
    $loc=$_POST['loc'];
    $perm=$_POST['perm'];
    $loc_state=$_POST['loc_state'];
    $perm_state=$_POST['perm_state'];
    $can=$_POST['can'];
    $par=$_POST['par'];
    $c_email=$_POST['c_email'];
    $applicant=$_POST['applicant'];
    $perc=$_POST['perc'];
    $hsc_perc=$_POST['hsc_perc'];
    $dse_perc=$_POST['dse_perc'];
    $user_id=$_SESSION['user_id'];
    $sql="INSERT INTO `student` (`user_id`, `unique_id`, `fname`, `lname`, `sname`, `mname`, `dob`, `inco`, `uid`, `gender`, `religion`, `city`, `nat`, `loc`, `perm`, `loc_state`, `perm_state`, `can`, `par`, `c_email`, `applicant`, `perc`, `hsc_perc`, `dse_perc`) VALUES ('$user_id', NULL, '$name', '$lname', '$sname', '$mname', '$dob', '$inco', '$uid', '$gender', '$religion', '$city', '$nat', '$loc', '$perm', '$loc_state', '$perm_state', '$can', '$par', '$c_email', 'applicant', '$perc', '$hsc_perc', '$dse_perc')";
    if(mysqli_query($link,$sql))
    {
      echo "<h1>Data added</h1>";
    }
    else{
      echo "<h1>Something went wrong</h1>";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Desk</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
</head>
<body>
<div class="w3-container w3-red">
  <h1 align="center">Signup-Form</h1>
</div>

<div class="w3-container ">
<form name="form1 mdl-grid">
<fieldset>
<legend>Personal Details</legend>
<h6 class="mdl-color-text--red-600">*Red fields are mandatory.</h6>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2.5-col" >
    <input class="mdl-textfield__input" type="text" name="name" pattern="[A-Z,a-z, ]*" required>
    <label class="mdl-textfield__label" for="name">First Name</label>
    <span class="mdl-textfield__error">Characters Only</span>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2.5-col">
    <input class="mdl-textfield__input" type="text" name="lname" pattern="[A-Z,a-z, ]*" required>
    <label class="mdl-textfield__label" for="lname">Last Name</label>
    <span class="mdl-textfield__error">Characters Only</span>
  </div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2.5-col">
    <input class="mdl-textfield__input" type="text" name="fname" required pattern="[A-Z,a-z, ]*">
    <label class="mdl-textfield__label" for="fname">Father Name</label>
    <span class="mdl-textfield__error">Characters Only</span>
  </div>


<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2.5-col">
    <input class="mdl-textfield__input" type="text" name="mname" required pattern="[A-Z,a-z, ]*">
    <label class="mdl-textfield__label" for="mname">Mother's Name</label>
    <span class="mdl-textfield__error">Characters Only</span>
  </div>


<br><br>
Gender : 
 <input type="radio" name="gender" value="Male">Male
 <input type="radio" name="gender" value="Female"> Female <br>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
    <input class="mdl-textfield__input" type="DATE" name="dob" placeholder="" required>
     <label class="mdl-textfield__label" for="dob">Date Of Birth</label>
</div>
 
<br>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" name="religion" required="">
      <option value="1">Hindu</option>
      <option value="2">Muslim</option>
      <option value="3">Christian</option>
      <option value="4">Sikh</option>
      <option value="5">Buddhist</option>   
</select>
<label class="mdl-textfield__label" for="Religion">Religion</label>
</div>  

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" name="caste">
      <option value="1">Open</option>
      <option value="2">ST</option>
      <option value="3">SC</option>
      <option value="4">DT</option>
      <option value="5">VJ</option>
      <option value="6">NT</option>
      <option value="7">OBC</option>
      <option value="8">SBC</option>   
</select>
<label class="mdl-textfield__label" for="caste">Caste</label>
</div>  

<br> 

<br><br>
Rural/Urban : 
 <input type="radio" name="city" value="rural">Rural
 <input type="radio" name="city" value="urban">Urban<br>


<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--3-col mdl-textfield--floating-label mdl-cell--3-col" >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="inco" required>
    <label class="mdl-textfield__label" for="inco">Annual Income</label>
    <span class="mdl-textfield__error">Input is not a number!</span>
</div>

<br>
<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--3-col mdl-textfield--floating-label mdl-cell--4-col" >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="uid" required >
    <label class="mdl-textfield__label" for="uid">Adhaar Card Number</label>
    <span class="mdl-textfield__error">Input is not a number!</span>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col" >
    <input class="mdl-textfield__input" type="text" name="nat" pattern="[A-Z,a-z, ]*" required>
   <label class="mdl-textfield__label" for="nat">Nationality</label>
   <span class="mdl-textfield__error">Characters Only</span>
</div>

</fieldset>

<!--Communication Details !-->

<fieldset>
<legend>Communication Details</legend>

<b>Address with Telephone Number Any, </b> <br>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--4-col">
<textarea class="mdl-textfield__input" type="text" rows="3" maxrows="6" name="loc"></textarea>
<label class="mdl-textfield__label" for="loc">Local Address</label>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--4-col">
<textarea class="mdl-textfield__input" type="text" rows="3" maxrows="6" name="perm" required></textarea>
<label class="mdl-textfield__label" for="perm">Permanent Address</label>
</div>

<br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
  <input class="mdl-textfield__input" type="text" name="loc_state" pattern="[A-Z,a-z, ]*" required>
  <label class="mdl-textfield__label" for="loc_state">Local State Address</label>
  <span class="mdl-textfield__error">Characters Only</span>
</div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell  mdl-cell--4-col">
  <input class="mdl-textfield__input" type="text" name="perm_state" pattern="[A-Z,a-z, ]*" required>
  <label class="mdl-textfield__label" for="perm_state">Permanent State Address</label>
  <span class="mdl-textfield__error">Characters Only</span>
</div>
<br>

<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--3-col mdl-textfield--floating-label mdl-cell--4-col" >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="can" required >
    <label class="mdl-textfield__label" for="can">Candidate Mobile No : </label>
    <span class="mdl-textfield__error">Input is not a number!</span>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--3-col mdl-textfield--floating-label mdl-cell--4-col" >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="par" required >
    <label class="mdl-textfield__label" for="par">Parent Mobile No : </label>
    <span class="mdl-textfield__error">Input is not a number!</span>
</div>

<br>
<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--3-col mdl-textfield--floating-label mdl-cell--4-col" >
<input class="mdl-textfield__input" type="email" name="c_email" required >
<label class="mdl-textfield__label" for="c_email">Email Id : </label>
</div>

</fieldset>

<!--Education Details !-->

<fieldset>
<legend>Education Details</legend>
<br>
<br>
Is Applicant A Hsc Applicant / Diploma Applicant : 
 <input type="radio" name="applicant" value="HSC">HSC
 <input type="radio" name="applicant" value="DSE">DIPLOMA <br>

<br>
<br>
<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
      <thead>
        <tr>
          <th class="mdl-data-table__cell--non-numeric"></th>
          
         <th><div class="mdl-typography--text-center">Percentage</div></th>
        </tr>
      </thead>
      <tbody>
    
    <tr>
          <td class="mdl-data-table__cell--non-numeric">SSC</td>
    
    
   <td><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label " >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="perc" required placeholder="Enter Percentage">
    <span class="mdl-textfield__error">Input is not a number!</span>
    </div> 
   </td>
    </tr>
        <tr>
          <td class="mdl-data-table__cell--non-numeric">HSC</td>
         <td>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label " >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="hsc_perc" required placeholder="Enter Percentage">
    <span class="mdl-textfield__error">Input is not a number!</span>
	</td>
        </tr>
        <tr>
          <td class="mdl-data-table__cell--non-numeric">Diploma Direct Second Year</td>
    
        <td><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label " >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="dse_perc" required placeholder="Enter Aggregate-Percentage">
    <span class="mdl-textfield__error">Input is not a number!</span></td>
        </tr>
      </tbody>
    </table>

</fieldset>
<br>
<br>
<div class="center-align">
  <button name="btnReg" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
  Submit
</button>
</div>
</form>
</div>
<br>
<br>
<div class="w3-container w3-red">
  <h5 align="center">BHARATI VIDYAPEETH COLLEGE OF ENGINEERING</h5>
</div>
</body>
</html>
