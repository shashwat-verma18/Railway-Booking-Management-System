<?php
session_start();
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}
$tbl_name="users"; // Table name
$name=$_SESSION['name'];

require('firstimport.php');

mysqli_select_db($conn,"$db_name") or die("cannot select db");

$result=mysqli_query($conn,"SELECT * FROM $tbl_name WHERE f_name='$name'");
$row=mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html>
<head>
	<title> Edit Profile </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/home.css" rel="stylesheet">
	</link>
	<script>
			function confirm(){
				var c=document.forms["edit"]["rpsd"].value;
				var pass = document.forms["edit"]["psd"].value;
				if(c!=pass)
				{
					document.getElementById("cps").innerHTML="<br/><font color=red>Password not match </font>";
				}
				else
				{
					document.getElementById("cps").innerHTML="";
				}
			}

			function myFunction() {
			  alert("Please Login First !");
			}

			function myMsg() {
				alert("Profile updated successfully !");
			}
	</script>
	
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
		<div  style="background-color: #ffffff; width:70%; padding: 20px; margin-top: 80px;opacity: 0.8;font-size: 17px;">
				
				<table style="width:100%;">
				<tr>
					<td><span style="font-weight:bold;font-size:25px;">Edit Profile</span>

				<tr/>
				
				<tr>
					<td>
						<form name="edit" action="editprofile.php" method="post" enctype="multipart/form-data">
						<div class="span6" style="float:left;width:80%;">
						<table class="table">
						
						<tr><td >First Name </td> <td><input class="input-block"name="fn" type="text" value="<?php echo $name;?>"></td></tr>
						<tr><td> Last name </td> <td><input class="input-block" name="ln" type="text" value="<?php echo $row['l_name'];?>"></td></tr>
						<tr><td>E-Mail  </td> <td><input class="input-block" name="mail1" type="mail" value="<?php echo $row['email'];?>"></td></tr>
						<tr><td>Dob  </td> <td><input class="input-block" name="dob1" type="text" value="<?php echo $row['dob'];?>"></td></tr>
						<tr><td>Gender  </td>  <td><input class="input-block" name="gnd1" type="text" value="<?php echo $row['gender'];?>"></td></tr>
						<tr><td>Marital Status </td>  <td><input class="input-block" name="mrt1" type="text" value="<?php echo $row['marital'];?>"></td></tr>
						<tr><td>Mobile No.  </td>  <td><input class="input-block" name="mon1" type="text" value="<?php echo $row['mobile'];?>"></td></tr>
						<tr><td>Security Question  </td>  <td><input class="input-block" name="que1" type="text" value="<?php echo $row['ques'];?>"></td></tr>
						<tr><td>Answer  </td>  <td><input class="input-block" name="ans1" type="text" value="<?php echo $row['ans'];?>"></td></tr>

						<tr><td >New Password </td> <td><input type="password" class="input-block" name="psd" placeholder="Enter new password" minlength="8" onblur="return confirm()"></td></tr>

						<tr><td >Confirm Password </td> <td><input type="password" class="input-block" name="rpsd" placeholder="Retype the password" onblur="return confirm()"><span id="cps" ></span></td></tr>			
						<tr><td></td> <td><button class ="btn" type="submit" value="Update Profile" onclick="myMsg()">Update Profile</button></td></tr>
						
						</table>
						</div>
						</form>
					</td>
				</tr>
				</table>
			</div>
		</div>
	
		<div style="margin-top: 143px;background-color: #000000; font-size: 17px;padding: 6px">
			<p style="float: left; padding-left: 30px;color: #ffffff; margin: 5px">&copy; 2021 Copyright PVT Ltd.</p>
			<p style="float: right; padding-right: 30px;color: #ffffff; margin: 5px"> Designed By : Shashwat Verma</p>
		</div>	
	
	</div>

  
<?php mysqli_close($conn); ?>

<?php

if(isset($_SESSION['error']))
{
if($_SESSION['error']==6)
{echo "<script>document.getElementById(\"chang\").style.display=\"\";</script>";
 }
//unset($_SESSION['error']);
}
?>

</body>
  
  
</html>