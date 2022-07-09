<?php


session_start();
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title> Passenger Details </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    
</head>
<body>

	<div style="display: flex;flex-direction: column">
		<div class="div1" style="padding-top: 5px;">
			<div style="display: flex;flex-direction: column">
				<div style=" display: flex; justify-content: space-between; color: #ffffff">
					<div style="padding-left: 15px">
							<img src="images/f1.jpg" width="67px" height="" />
					</div>
					<div></div>
					<div style="font-size:19px;margin-top:20px;">
						<a href="index.php" class="nav">HOME</a>&emsp;|&emsp; 
						<a href="train.php" class="nav">FIND TRAIN</a>&emsp;|&emsp;
						<?php
						 if(isset($_SESSION['name']))	
						 {
						 ?>
						<a href="reservation.php" class="nav">RESERVATION</a>&emsp;|&emsp;
						<?php
						 }
						 else
						 {
						 ?>
						 <a class="nav" onclick="myFunction()">RESERVATION</a>&emsp;|&emsp;
						 <?php } ?>

						 <?php
						 if(isset($_SESSION['name']))	
						 {
						 ?>
						<a href="profile.php" class="nav">PROFILE</a>&emsp;|&emsp;
						<?php
						 }
						 else
						 {
						 ?>
						 <a class="nav" onclick="myFunction()">PROFILE</a>&emsp;|&emsp;
						 <?php } ?>

						 <?php
						 if(isset($_SESSION['name']))	
						 {
						 ?>
						<a href="booking.php" class="nav">BOOKING HISTORY</a>&emsp;&emsp;
						<?php
						 }
						 else
						 {
						 ?>
						 <a class="nav" onclick="myFunction()">BOOKING HISTORY</a>&emsp;&emsp;
						 <?php } ?>
					</div>
					<div style="font-size:19px;margin-top:15px;padding-right: 20px">
						<?php
						 if(isset($_SESSION['name']))	
						 {
						 ?>
						 <span align="center" style="font-family: cursive; color: #ffffff;font-size: 20px">
							<b>Welcome , <?php
							echo ucfirst($_SESSION['name']) ?> ! </b></span>
						 <a href="logout.php">
						 	<button class="button" style="vertical-align:middle;">
						 	<div style=" display: flex; justify-content: space-between;" class="button">
						 	<img src="images/user.png" style="width: 25px">
						 	<div style="padding:5px;color: #000000">
						 		<b>Logout</b>
						 	</div>
							 </div>
						 </button></a>
						 <?php
						 }
						 ?>
					</div>
				</div>
		<div align="center">
		<div  style="background-color: #ffffff; width:80%; padding: 20px; margin-top: 40px;opacity: 0.8;font-size: 17px;">
		
		
		
		
		<form method="get" action="booking.php">
				
				<table class="table" style="border-style:ridge;padding-left: 70px">
				<col width="99">
				<col width="50">
				<col width="50">
				<col width="80">
				<col width="80">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="90">
				<tr>
					<th style="border-top:0px;width:200px">Journey date:</th>
					<th style="border-top:0px;width:200px">Train No:</th>
					<th style="border-top:0px;width:200px">From Station:</th>
					<th style="border-top:0px;width:200px">To Station:</th>
					<th style="border-top:0px;width:200px">Quota:</th>
					<th style="border-top:0px;width:100px"> 1A</th>
					<th style="border-top:0px;width:100px"> 2A </th>
					<th style="border-top:0px;width:100px"> 3A </th>
					<th style="border-top:0px;width:100px"> SL </th>
					<th style="border-top:0px;width:100px"> CC </th>
					<th style="border-top:0px;width:100px"> 2S </th>
				</tr>
				<tr>
					<td style="border-top:0px;"> <?php echo $_GET['doj'];?> </td>
					<input name="doj" style="display:none;" type="text" value="<?php echo $_GET['doj'];?>">
					<input name="dob" style="display:none;" type="text" value="<?php echo date("Y-m-d");?>">
					<input type="text" name="quota" style="display: none;" value="<?php echo $_GET['quota'];?>">
					<td style="border-top:0px;"> <?php echo $_GET['tno'];?> </td>
					<input name="tno" style="display:none;" type="text" value="<?php echo $_GET['tno'];?>">
					<td style="border-top:0px;"><?php echo $_GET['fromstn'];?></td>
					<input name="fromstn" style="display:none;" type="text" value="<?php echo $_GET['fromstn'];?>">
					
					<td style="border-top:0px;"><?php echo $_GET['tostn'];?></td>
					<input name="tostn" style="display:none;" type="text" value="<?php echo $_GET['tostn'];?>">
		
					<td style="border-top:0px;"><?php echo $_GET['quota'];?></td>
					<input name="quota" style="display:none;" type="text" value="<?php echo $_GET['quota'];?>">
		
					<td style="border-top:0px;"> <input type="radio" name="selct" value="1A" onclick="return false;" <?php if($_GET['class']=='1A') {echo 'checked';}?>> </td>
					
					<td style="border-top:0px;"> <input type="radio" name="selct" value="2A" onclick="return false;" <?php if($_GET['class']=='2A') echo 'checked';?>> </td>
					
					<td style="border-top:0px;"> <input type="radio" name="selct" value="3A" onclick="return false;" <?php if($_GET['class']=='3A') echo 'checked';?>> </td>
					
					<td style="border-top:0px;"> <input type="radio" name="selct" value="SL" onclick="return false;" <?php if($_GET['class']=='SL') echo 'checked';?>> </td>

					<td style="border-top:0px;"> <input type="radio" name="selct" value="CC" onclick="return false;" <?php if($_GET['class']=='CC') echo 'checked';?>> </td>

					<td style="border-top:0px;"> <input type="radio" name="selct" value="2S" onclick="return false;" <?php if($_GET['class']=='2S') echo 'checked';?>> </td>
				</tr>
				</table>
		<div class="display" style="margin-top:0px;height:415px;">
		<h2><font color="blue">Passenger Detail</font></h2>
			
			<table class="table">
				<tr>
					<th style="width:100px;border-top:0px;">SNo.</th>
					<th style="width:200px;border-top:0px;"> Name</th>
					<th style="width:100px;border-top:0px;"> Age </th>
					<th style="width:100px;border-top:0px;"> Sex </th>
				</tr>
				<tr>
					<td > 1</td>
					<td ><input type="text" name="name1" ></td>
					<td ><input type="text" name="age1" class="input-small"></td>
					<td ><select name="sex1" class="input-small">
						<option value="male">Male</option>
						<option value="female">Female</option>
						</select>
					</td>
				</tr>
				<tr>
					<td > 2</td>
					<td ><input type="text" name="name2" ></td>
					<td ><input type="text" name="age2" class="input-small"></td>
					<td ><select name="sex2" class="input-small">
						<option value="male">Male</option>
						<option value="female">Female</option>
						</select>
					</td>
				</tr>
				<tr>
					<td > 3</td>
					<td ><input type="text" name="name3" ></td>
					<td ><input type="text" name="age3" class="input-small"></td>
					<td ><select name="sex3" class="input-small">
						<option value="male">Male</option>
						<option value="female">Female</option>
						</select>
					</td>
				</tr>
				<tr>
					<td > 4</td>
					<td ><input type="text" name="name4" ></td>
					<td ><input type="text" name="age4" class="input-small"></td>
					<td ><select name="sex4" class="input-small">
						<option value="male">Male</option>
						<option value="female">Female</option>
						</select>
					</td>
				</tr>
				<tr>
					<td > 5</td>
					<td ><input type="text" name="name5" ></td>
					<td ><input type="text" name="age5" class="input-small"></td>
					<td ><select name="sex5" class="input-small">
						<option value="male">Male</option>
						<option value="female">Female</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td style="border-top:0px;"><input class="btn btn-info"type="submit" value="Submit" id="subb" ></td>
					<td style="border-top:0px;"><input class="btn btn-info"type="reset" value="Reset"></td>
				</tr>	
				
			</table>
			</div>
			</form>
		
		<div>
		<br  />
		<p> <font color="red"> CHILDREN BELOW 5 YEAR (FOR WHOM TICKET IS NOT TO BE ISSUED). </font> </p>
		</div>
		
		</div>
	</div>
		
		
	<div style="margin-top: 60px;background-color: #000000; font-size: 17px;padding: 6px">
			<p style="float: left; padding-left: 30px;color: #ffffff; margin: 5px">&copy; 2021 Copyright PVT Ltd.</p>
			<p style="float: right; padding-right: 30px;color: #ffffff; margin: 5px"> Designed By : Shashwat Verma</p>
	</div>
</div>
</body>
</html>