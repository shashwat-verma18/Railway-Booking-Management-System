<?php
	$val=$_GET['value'];
	if($val==1){
	?>
	<h3>User already exists</h3>
	<?php
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title> Signup </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/home.css" rel="stylesheet">

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
		<div  style="background-color: #ffffff; width:40%; padding: 20px; margin-top: 80px;opacity: 0.8;font-size: 17px;">
		<div style="font-size:30px;text-align: center;"> Signup </div>
		<br>
		
		<div style="font-size: 18px">
		
		<form name="signup"  method="post" action="register.php">

		<table class="table">
		<tr>
			<td style="border-top:0px;"> First Name <font color=red>*  &emsp; &emsp; &emsp; &emsp; &emsp;</font></td>
			<td style="border-top:0px;"><input type="text" name="fname" class="input-block" placeholder="Enter the First name" onblur="return name1()" required><span id="fn"></span></td>
		</tr>
		<tr>
			<td style="border-top:0px;"> Last Name <font color=red>* </font> </td>
			<td style="border-top:0px;"><input type="text" name="lname" class="input-block" placeholder="Enter the Last name" onblur="return name12()" required><span id="ln"></span></td>
		</tr>
		<tr>
			<td style="border-top:0px;"> Email ID <font color=red>* </font> </td>
			<td style="border-top:0px;"><input type="email" class="input-block" name="eid" placeholder="Enter the valid email id" required></td>
		</tr>
		<tr>
			<td style="border-top:0px;"> Password <font color=red>* </font> </td>
			<td style="border-top:0px;"><input type="password" class="input-block" name="psd" placeholder="Enter the password" minlength="8" onblur="return confirm()" required> <span id="ps" ></span></td>
		</tr>
		
		<tr>
			<td style="border-top:0px;"> Confirm Password <font color=red>* </font> </td>
			<td style="border-top:0px;"><input type="password" class="input-block" name="cpsd" placeholder="Re-type the password" onblur="return confirm()" required> <span id="cps" ></span></td>
		</tr>
		<script>
			function confirm(){
				var c=document.forms["signup"]["cpsd"].value;
				var pass = document.forms["signup"]["psd"].value;
				if(c!=pass)
				{
					document.getElementById("cps").innerHTML="<br/><font color=red>Password not match </font>";
				}
				else
				{
					document.getElementById("cps").innerHTML="";
				}
			}
		</script>
		<tr>
			<td style="border-top:0px;"> Gender <font color=red>* </font> </td>
			<td style="border-top:0px;"><select name="gnd" class="input-block">
				<option value="male">Male</option>
				<option value="female">Female</option>
			    </select>
			</td>
		</tr>
		
		<tr>
			<td style="border-top:0px;">Marital Status <font color=red>* </font> </td>
			<td style="border-top:0px;"><select name="mrt" class="input-block">
				<option value="married">Married</option>
				<option value="unmarried">Unmarried</option>
			    </select>
			</td>
		</tr>
		<tr>
			<td style="border-top:0px;"> Date of Birth <font color=red>* </font></td>
			<td style="border-top:0px;"><input type="date" class="input-block"  name="dob" max="<?php echo date('Y-m-d',time()-60*60*24*365*18);?>" value="<?php echo date('Y-m-d',time()-60*60*24*365*18);?>"> </td>
		</tr>
		
		<tr>
			<td style="border-top:0px;"> Mobile No. <font color=red>*</font> </td>
			<td style="border-top:0px;"> +91 <input type="tel" class="input-block"  name="mobile" placeholder="Enter mobile number" pattern="[6-9]{1}[0-9]{9}" required> <span id="mn"></span></td>
		</tr>
		<tr>
			<td style="border-top:0px;"> Security Question <font color=red>* </font></td>
			<td style="border-top:0px;">
				<select name="ques" class="input-block">
				<option value="What is your pets name ?">What is your pets name ?</option>				
				<option value="What was the name of your first school?">What was the name of your first school?</option>				
				<option value="What is your favorite hero?">What is your favorite hero?</option>
				<option value="What is your favorite movie?">What is your favorite movie?</option>
				</select>
			</td>
		</tr>
		<tr>
			<td style="border-top:0px;"> Your Answer <font color=red>* </font></td>
			<td style="border-top:0px;"> <input type="text" name="ans" class="input-block" placeholder="Enter the your answer" onblur="return ans1()" required><span id="an"></span></td>
		</tr>
		<tr>
			<td style="border-top:0px;"><button class="btn" type="submit" value="Submit" id="subb" >Submit</button></td>
			<td></td>
			<td style="border-top:0px;"><button class="btn" type="reset" value="Reset">Reset</button></td>
		</tr>
		
		</table>
		</form>
		</div>
		</div>
		</div>
		
		<div style="margin-top: 143px;background-color: #000000; font-size: 17px;padding: 6px">
			<p style="float: left; padding-left: 30px;color: #ffffff; margin: 5px">&copy; 2021 Copyright PVT Ltd.</p>
			<p style="float: right; padding-right: 30px;color: #ffffff; margin: 5px"> Designed By : Shashwat Verma</p>
		</div>	
	
	</div>

</body>
</html>