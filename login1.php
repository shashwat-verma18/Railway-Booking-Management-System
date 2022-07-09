<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/home.css" rel="stylesheet" ></link>
</head>
<body>
		<div style="display: flex;flex-direction: column">
		<div class="div1" style="padding-top: 5px;">
			<div style="display: flex;flex-direction: column">
				<div style=" display: flex; justify-content: space-between; color: #ffffff">
					<div style="padding-left: 15px">
							<img src="images/f1.jpg" width="67px" height="" />
					</div>
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

						<script>
							function myFunction() {
							  alert("Please Login First !");
							}
						</script>
					</div>
					<div style="font-size:19px;margin-top:15px;padding-right: 20px">
						<?php
						 if(isset($_SESSION['name']))	
						 {
						 ?>
						 
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
		<div  style="background-color: #ffffff; width:23%; padding: 20px; margin-top: 80px;opacity: 0.8;font-size: 17px;">
			<form class="form-signin " method="post" action="login.php">
		
			<table class="table" style="margin-bottom:4px;padding: 5px;border-spacing: 10px">
			
			<tr>
			<td style="border-top:0px;"><label> Username&emsp;</label></td>
			<td style="border-top:0px;"> <input type="text" name="user" class="input-block-level" placeholder="Username"></td>
			</tr>
			<tr >
			<td style="border-top:0px;"> <label>Password&emsp;</label></td>
			<td style="border-top:0px;"><input type="password" name="psd" class="input-block-level" placeholder="Password"></td>
			</tr>
			<tr>
			<td colspan=2 style="border-top:0px; visibility:hidden;color: red;text-align: center;" id="wrong"  class="label label-important">Username and Password Wrong !!!</td>
			</tr>
			<tr>
			<td style="border-top:0px;"></td>
			<td style="border-top:0px;"> <button class="btn" type="submit" value="Login">Login</button></td>
			</tr>
			<tr>
			<td colspan="2" style="border-top:0px;"><p style="text-align: center;">You don't have register?</p></td>
			</tr>
			<tr>
			<td style="border-top:0px;"></td>
			<td style="border-top:0px;"> <button class="btn"><a href="signup.php?value=0" style="text-decoration: none;color: white;">Signup</a></button></td>
			</tr>
			
			</table>
			</form>
		</div>
		</div>
		<div style="margin-top:80px; font-size: 25px">
			<p style="color:#ffffff; text-align: center;font-family: monospace;font-weight: bold;"><b>SAFETY&emsp;|&emsp;SECURITY&emsp;|&emsp;PUNCTUALITY</b></p>
		</div>
		<div style="margin-top: 143px;background-color: #000000; font-size: 17px;padding: 6px">
			<p style="float: left; padding-left: 30px;color: #ffffff; margin: 5px">&copy; 2021 Copyright PVT Ltd.</p>
			<p style="float: right; padding-right: 30px;color: #ffffff; margin: 5px"> Designed By : Shashwat Verma</p>
		</div>		
	</div>
</body>
</html>
<?php
if(isset($_SESSION['error']))
{
if($_SESSION['error']==1)
echo "<script>document.getElementById(\"wrong\").style.visibility=\"\";</script>";
session_destroy();
}

?>	