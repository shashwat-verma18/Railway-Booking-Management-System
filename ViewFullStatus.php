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
	$pnr=$_GET['pnr'];
	$tno=$_GET['Tnumber'];
	$doj=$_GET['doj'];
	$fromstn=$_GET['fromstn'];
	$tostn=$_GET['tostn'];
	$DOB=$_GET['DOB'];
	$sql="SELECT Tnumber,doj,Name,Age,Sex,Status,DOB,class,seat,quota FROM $tbl_name WHERE (uname='$name1' and PNR='$pnr')";
	$result=mysqli_query($conn,$sql);
	$ext = mysqli_fetch_array($result);
	$result=mysqli_query($conn,$sql); 

	$x=1;
	$z=7;
	$mysql1="SELECT st1,st2,st3,st4,st5,ori,dest from interlist where Number='$tno'";
	$res1=mysqli_query($conn,$mysql1);
	$myrow=mysqli_fetch_array($res1);
	if($fromstn==$myrow['st1']){
		$x=2;
	}
	else if($fromstn==$myrow['st2']){
		$x=3;
	}
	else if($fromstn==$myrow['st3']){
		$x=4;
	}
	else if($fromstn==$myrow['st4']){
		$x=5;
	}
	else if($fromstn==$myrow['st5']){
		$x=6;
	}
	if($tostn==$myrow['st1']){
		$z=2;
	}
	else if($tostn==$myrow['st2']){
		$z=3;
	}
	else if($tostn==$myrow['st3']){
		$z=4;
	}
	else if($tostn==$myrow['st4']){
		$z=5;
	}
	else if($tostn==$myrow['st5']){
		$z=6;
	}
	$fare=($z-$x)/6;

	$mysql2="SELECT Name from train_list where Number='$tno'";
	$res2=mysqli_query($conn,$mysql2);
	$myrow2 = mysqli_fetch_array($res2);
	$tname=$myrow2['Name'];

?>
	<!DOCTYPE html>
<html>
<head>
	<title> Ticket </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="css/home.css">
	</link>
	<script>
		function printDiv(){
			var divContents = document.getElementById("logo").innerHTML+document.getElementById("print").innerHTML;
			
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = divContents;
            window.print();
            document.body.innerHTML = originalContents;
		}
	</script>

	
</head>
<body>
	<div style="display: flex;flex-direction: column">
		<div class="div1" style="padding-top: 5px;">
			<div style="display: flex;flex-direction: column">
				<div style=" display: flex; justify-content: space-between; color: #ffffff">
					<div style="padding-left: 15px" id="logo">
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
		<div  style="background-color: #ffffff; width:70%; padding: 20px; margin-top: 40px;opacity: 0.8;font-size: 17px;" id="print">
			<div align="center" style="border-bottom: 3px solid #ddd;padding: 5px">
				<h1 style="font-family: monospace;color: #2E3192">RAILWAY BOOKING MANAGEMENT SYSTEM</h1>
				<h2>Booked Ticket History  - <?php echo $pnr;?></h2>
				<h4 style="width: 100%;font-weight: normal;">
					<div style="display: flex;justify-content: space-between;">
					<span>Train Number : <?php echo $ext['Tnumber']; ?></span>
					<span>Date of Journey : <?php echo $ext['doj']; ?></span>
					</div>
				</h4>
				<h4 style="width: 100%;font-weight: normal;">
					<div style="display: flex;justify-content: space-between;">
					<span>Train Name : <?php echo $tname; ?></span>
					<span>Date of Booking : <?php echo $ext['DOB']; ?></span>
					</div>
				</h4>
				<h4 style="width: 100%;font-weight: normal;">
					<div style="display: flex;justify-content: space-between;">
					<span>From : <?php echo $fromstn; ?></span>
					<span>To : <?php echo $tostn; ?></span>
					</div>
				</h4>
				

			
			</div>
			<br>
		
	<div style="margin-left: 50px;"> 
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
					<th style="width:200px;border-top:0px;">Sl No.</th>
					<th style="width:450px;border-top:0px;">Name</th>
					<th style="width:200px;border-top:0px;">Age</th>
					<th style="width:200px;border-top:0px;">Sex</th>
					<th style="width:200px;border-top:0px;">Status</th>
					<th style="width:200px;border-top:0px;">Class</th>
					<th style="width:200px;border-top:0px;">Seat</th>
				</tr>	
				<?php
				
				$n=1;
				while($row=mysqli_fetch_array($result)){
					if($n%2!=0)
					{
						$GLOBALS['class']=$row['class'];
						
				?>
				<tr class="text-error">
					<td style="width:100px;"> <?php echo $n; ?></td>
					<td style="width:200px;"> <?php echo $row['Name']; ?></td>
					<td style="width:100px;"> <?php echo $row['Age']; ?></td>
					<td style="width:100px;"> <?php echo $row['Sex']; ?></td>
					<td style="width:100px;"> <?php echo $row['Status']; ?></td>
					<td style="width:100px;"> <?php echo $class; ?></td>
					<td style="width:100px;"> <?php echo $row['seat']; ?></td>
				</tr>
				<?php 
					}
					else
					{
				?>
				<tr class="text-info">
					<td style="width:100px;"> <?php echo $n; ?></td>
					<td style="width:200px;"> <?php echo $row['Name']; ?></td>
					<td style="width:100px;"> <?php echo $row['Age']; ?></td>
					<td style="width:100px;"> <?php echo $row['Sex']; ?></td>
					<td style="width:100px;"> <?php echo $row['Status']; ?></td>
					<td style="width:100px;"> <?php echo $class; ?></td>
					<td style="width:100px;"> <?php echo $row['seat']; ?></td>
				</tr>
				<?php
					}
					$n++;
				}
				?>
				<?php 
				$sql2="Select ".$class." from train_list WHERE Number=$tno";
				//echo $sql2;
				$result2=mysqli_query($conn,$sql2);
				while($row=mysqli_fetch_array($result2)){
					$GLOBALS['amt']=$row[$class];
				}
				?>
				</table>
				<table class="table">
				<tr class="text-info">
					<?php
					if($ext['quota']=='Tatkal'){
						?>
						<td>Amount Paid :<?php $tot=(($n-1)*$amt*$fare)+(0.3*($n-1)*$amt*$fare);echo $tot;?></td>
						<?php
					}
					else{
						?>
						<td>Amount Paid :<?php $tot=($n-1)*$amt*$fare;echo $tot;?></td>
						<?php
					}?>
					
				</tr>
				</table>
				
			<button onClick="printDiv()" class="btn">Print</button>
		</div>
	</div>
</div>
		<!-- Copyright -->
		<div style="margin-top: 283px;background-color: #000000; font-size: 17px;padding: 6px">
			<p style="float: left; padding-left: 30px;color: #ffffff; margin: 5px">&copy; 2021 Copyright PVT Ltd.</p>
			<p style="float: right; padding-right: 30px;color: #ffffff; margin: 5px"> Designed By : Shashwat Verma</p>
	</div>
	</div>
</body>
</html>	