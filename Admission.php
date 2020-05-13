<!DOCTYPE html>
<html>
<head>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
    border-collapse: collapse;
}


th, td {
    border: 2px solid blue;
    width: 100px;
    height: 140px;
    padding: 0.1px;
    text-align: right;
    vertical-align: center;
 text-align:center;}


tr:nth-child(even) {background-color: lightblue;}

tr:nth-child(odd) {background-color: lightgreen;}


</style>
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

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2.5-col" >
    <input class="mdl-textfield__input" type="text" id="fname" pattern="[A-Z,a-z, ]*" required>
    <label class="mdl-textfield__label" for="fname">First Name</label>
    <span class="mdl-textfield__error">Characters Only</span>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2.5-col">
    <input class="mdl-textfield__input" type="text" id="lname" pattern="[A-Z,a-z, ]*" required>
    <label class="mdl-textfield__label" for="lname">Last Name</label>
    <span class="mdl-textfield__error">Characters Only</span>
  </div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2.5-col">
    <input class="mdl-textfield__input" type="text" id="fname" required pattern="[A-Z,a-z, ]*">
    <label class="mdl-textfield__label" for="fname">Father Name</label>
    <span class="mdl-textfield__error">Characters Only</span>
  </div>


<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--2.5-col">
    <input class="mdl-textfield__input" type="text" id="mname" required pattern="[A-Z,a-z, ]*">
    <label class="mdl-textfield__label" for="mname">Mother's Name</label>
    <span class="mdl-textfield__error">Characters Only</span>
  </div>


<br><br>
Gender : 
 <input type="radio" name="gender" value="Male">Male
 <input type="radio" name="gender" value="Female"> Female <br>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
    <input class="mdl-textfield__input" type="DATE" id="dob" required>
     <label class="mdl-textfield__label" for="dob">Date Of Birth</label>
</div>
 
<br>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" id="religion" >
      <option value="1">Hindu</option>
      <option value="2">Muslim</option>
      <option value="3">Christian</option>
      <option value="4">Sikh</option>
      <option value="5">Buddhist</option>   
</select>
<label class="mdl-textfield__label" for="Religion">Religion</label>
</div>  

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <select class="mdl-textfield__input" id="caste">
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
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="inco" required>
    <label class="mdl-textfield__label" for="inco">Annual Income</label>
    <span class="mdl-textfield__error">Input is not a number!</span>
</div>

<br>
<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--3-col mdl-textfield--floating-label mdl-cell--4-col" >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="uid" required >
    <label class="mdl-textfield__label" for="uid">Adhaar Card Number</label>
    <span class="mdl-textfield__error">Input is not a number!</span>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col" >
    <input class="mdl-textfield__input" type="text" id="nat" pattern="[A-Z,a-z, ]*" required>
   <label class="mdl-textfield__label" for="nat">Nationality</label>
   <span class="mdl-textfield__error">Characters Only</span>
</div>

</fieldset>

<!--Communication Details !-->

<fieldset>
<legend>Communication Details</legend>

<b>Address with Telephone Number Any, </b> <br>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--4-col">
<textarea class="mdl-textfield__input" type="text" rows="3" maxrows="6" id="loc"></textarea>
<label class="mdl-textfield__label" for="loc">Local Address</label>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label  mdl-cell--4-col">
<textarea class="mdl-textfield__input" type="text" rows="3" maxrows="6" id="perm" required></textarea>
<label class="mdl-textfield__label" for="perm">Permanent Address</label>
</div>

<br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
  <input class="mdl-textfield__input" type="text" id="loc_state" pattern="[A-Z,a-z, ]*" required>
  <label class="mdl-textfield__label" for="loc_state">Local State Address</label>
  <span class="mdl-textfield__error">Characters Only</span>
</div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell  mdl-cell--4-col">
  <input class="mdl-textfield__input" type="text" id="perm_state" pattern="[A-Z,a-z, ]*" required>
  <label class="mdl-textfield__label" for="perm_state">Permanent State Address</label>
  <span class="mdl-textfield__error">Characters Only</span>
</div>
<br>

<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--3-col mdl-textfield--floating-label mdl-cell--4-col" >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="can" required >
    <label class="mdl-textfield__label" for="can">Candidate Mobile No : </label>
    <span class="mdl-textfield__error">Input is not a number!</span>
</div>

<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--3-col mdl-textfield--floating-label mdl-cell--4-col" >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="par" required >
    <label class="mdl-textfield__label" for="par">Parent Mobile No : </label>
    <span class="mdl-textfield__error">Input is not a number!</span>
</div>

<br>
<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--3-col mdl-textfield--floating-label mdl-cell--4-col" >
<input class="mdl-textfield__input" type="email" id="c_email" required >
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

<table> 
  		

<tr>
			
<th>Year</th> 
			<th align="center" colspan="2">FIRST Year</th> <th colspan="2">SECOND YEAR</th> <th colspan="2">THIRD Year</th>
			
		</tr> 
		

<tr>
			
<th>Semester</th>
			<td> 1ST SEM
</td> 
			<td>2ND SEM</td> 
			
<td>3RD SEM</td>
	<td>4TH SEM</td> <td>5TH SEM</td> <td>6TH SEM</td>	</tr> 
		

<tr>
			
<th>Month And Year Of Passing</th> 

<td><div class="mdl-textfield mdl-cell mdl-cell--2-col mdl-js-textfield mdl-textfield--floating-label"><input class="mdl-textfield__input" type="MONTH" id="dob" required></div></td> 
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label"><input class="mdl-textfield__input" type="MONTH" id="dob" required></div></td> 
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label"><input class="mdl-textfield__input" type="MONTH" id="dob" required></div></td> 
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label"><input class="mdl-textfield__input" type="MONTH" id="dob" required></div></td> 
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label"><input class="mdl-textfield__input" type="MONTH" id="dob" required></div></td> 
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label"><input class="mdl-textfield__input" type="MONTH" id="dob" required></div></td> 
</tr>
  		

<tr>
<th>No.Of KTs if any</th>
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label " >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="can" required >
    <span class="mdl-textfield__error">Mention in numbers</span>
</div>
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label " >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="can" required >
    <span class="mdl-textfield__error">Mention in numbers</span>
</div>
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label " >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="can" required >
    <span class="mdl-textfield__error">Mention in numbers</span>
</div>
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label " >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="can" required >
    <span class="mdl-textfield__error">Mention in numbers</span>
</div>
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label " >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="can" required >
    <span class="mdl-textfield__error">Mention in numbers</span>
</div>
<td><div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--2-col mdl-textfield--floating-label " >
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="can" required >
    <span class="mdl-textfield__error">Mention in numbers</span>
</div>

</tr>
	

<tr>
			<th>Result</th> 
			
<td>Serial</td>
			<td>News</td>
			<td>Current Affairs</td>
  	<td></td> <td></td> <td></td>	</tr>
	



</table>

</fieldset>
<br>
<br>
<div class="center-align">
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
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
