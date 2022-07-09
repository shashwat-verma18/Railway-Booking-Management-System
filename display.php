<?php
	session_start();
	
require('firstimport.php');
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}
$tbl_name="booking";

mysqli_select_db($conn,"$db_name") or die("cannot select db");
	$name1=$_SESSION['name'];
	$sql="SELECT DISTINCT pnr,Tnumber,class,doj,DOB,fromstn,tostn,Status FROM $tbl_name WHERE uname='$name1' ORDER BY doj ASC";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
$tnum=null;
$c1=null;
if($row!=null){ 
$tnum=$row['Tnumber'];
$cl=$row['class'];
}
$result=mysqli_query($conn,"SELECT * FROM train_list WHERE Number='$tnum'");

$row=mysqli_fetch_array($result);
if($row!=null){
$tname=$row['Name'];
}
$result=mysqli_query($conn,$sql);

			 if(isset($_SESSION['name']))
			 {
			 //echo "Welcome,".$_SESSION['name']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
			 }
			 else
			 {
				$_SESSION['error']=15;
				header("location:login1.php");
			 } 
?>
<!DOCTYPE html>
<html>
<head>
	<title> Booking History </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="css/home.css">
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
		<div  style="background-color: #ffffff; width:90%; padding: 20px; margin-top: 40px;opacity: 0.8;font-size: 17px;">
			<div align="center" style="border-bottom: 3px solid #ddd;">
				<h2>Booked Ticket History </h2>
			
			</div>
			<br>
			<?php
			if($row==null){
				?>
				<div >
					<table  class="table">
				<col width="90">
					<col width="90">
				<col width="90">
				<col width="110">
				<col width="90">
				<col width="90">
				<col width="90">
				<col width="90">
				<tr>
					<th style="width:10px;border-top:0px;">PNR</th>
					<th style="width:100px;border-top:0px;">Train Number</th>
					<th style="width:100px;border-top:0px;">Date of Journey</th>
					<th style="width:100px;border-top:0px;">From</th>
					<th style="width:100px;border-top:0px;">To</th>
					<th style="width:100px;border-top:0px;">Date of Booking</th>
					<th style="width:100px;border-top:0px;">Current Status</th>
				</tr>
			</table>
					<h3 style="color: red;font-family: cursive;">No Booking History Found !</h3>
				</div>
			<?php
			}
			else{
			?>
			
			<div >
				<table  class="table">
				<col width="90">
					<col width="90">
				<col width="90">
				<col width="110">
				<col width="90">
				<col width="90">
				<col width="90">
				<col width="90">
				<tr>
					<th style="width:10px;border-top:0px;">PNR</th>
					<th style="width:100px;border-top:0px;">Train Number</th>
					<th style="width:100px;border-top:0px;">Date of Journey</th>
					<th style="width:100px;border-top:0px;">From</th>
					<th style="width:100px;border-top:0px;">To</th>
					<th style="width:100px;border-top:0px;">Date of Booking</th>
					<th style="width:100px;border-top:0px;">Current Status</th>
				</tr>	
				<?php
				
				$n=1;
				while($row=mysqli_fetch_array($result)){
					if($n%2!=0)
					{
				?>
				<tr class="text-error">
					<td style="width:10px;"> <?php echo $row['pnr']; ?> </td>
					<td style="width:100px;"> <?php echo $row['Tnumber']; ?> </td>
					<td style="width:100px;"> <?php echo $row['doj']; ?> </td>
					<td style="width:100px;"> <?php echo $row['fromstn']; ?> </td>
					<td style="width:100px;"> <?php echo $row['tostn']; ?> </td>
					<td style="width:100px;"> <?php echo $row['DOB']; ?> </td>
					<td style="width:100px;"> <?php echo $row['Status']; ?> </td>
					<td style="width:100px;"><a href="ViewFullStatus.php?pnr=<?php echo $row['pnr'];?>&Tnumber=<?php echo $row['Tnumber'];?>&doj=<?php echo $row['doj'];?>&fromstn=<?php echo $row['fromstn']; ?>&tostn=<?php echo $row['tostn']; ?>&DOB=<?php echo $row['DOB'];?>" style="color: blue;font-family: monospace;font-weight: bold;text-decoration: none">View Full Status
					</a> </td>
				</tr>
				<?php 
					}
					else
					{
				?>
				<tr class="text-info">
					<td style="width:10px;"> <?php echo $row['pnr']; ?> </td>
					<td style="width:100px;"> <?php echo $row['Tnumber']; ?> </td>
					<td style="width:100px;"> <?php echo $row['doj']; ?> </td>
					<td style="width:100px;"> <?php echo $row['fromstn']; ?> </td>
					<td style="width:100px;"> <?php echo $row['tostn']; ?> </td>
					<td style="width:100px;"> <?php echo $row['DOB']; ?> </td>
					<td style="width:100px;"> <?php echo $row['Status']; ?> </td>
					<td style="width:100px;"><a href="ViewFullStatus.php?pnr=<?php echo $row['pnr'];?>&Tnumber=<?php echo $row['Tnumber'];?>&doj=<?php echo $row['doj'];?>&fromstn=<?php echo $row['fromstn']; ?>&tostn=<?php echo $row['tostn']; ?>&DOB=<?php echo $row['DOB'];?>" style="color: blue;font-family: monospace;font-weight: bold;text-decoration: none">View Full Status</a></td>
					
				</tr>
				<?php
					}
					$n++;
				}
				?>
				
				
				</table>

			</div>
			<?php
			}
			?>
		</div>
	</div>
			
		<div style="margin-top: 385px;background-color: #000000; font-size: 17px;padding: 6px">
			<p style="float: left; padding-left: 30px;color: #ffffff; margin: 5px">&copy; 2021 Copyright PVT Ltd.</p>
			<p style="float: right; padding-right: 30px;color: #ffffff; margin: 5px"> Designed By : Shashwat Verma</p>
	</div>
	</div>
</body>
</html>	












