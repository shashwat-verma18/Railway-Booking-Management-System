<?php
session_start();
require('firstimport.php');

$tbl_name="interlist";

mysqli_select_db($conn,"$db_name") or die("cannot select db");
$k=0;
$ext=null;
if(isset($_POST['byname']) && ($_POST['bynum']==""))
{
	$name1=$_POST['byname'];
	$k=2;
	$name1=strtoupper($name1);
	
	$tbl_name="train_list";
	$sql="SELECT * FROM $tbl_name WHERE Number='$name1' or Name='$name1' ";
	$result=mysqli_query($conn,$sql);
	$ext=mysqli_fetch_array($result);
	$result=mysqli_query($conn,$sql);
}
else if(isset($_POST['byname']) && isset($_POST['bynum']))
{
	$k=1;
	$from=$_POST['byname'];
	$to=$_POST['bynum'];
	$sql="SELECT * FROM $tbl_name WHERE (Ori='$from' or st1='$from' or st2='$from' or st3='$from' or st4='$from' or st5='$from') and (st1='$to' or st2='$to' or st3='$to' or st4='$to' or st5='$to' or Dest='$to')";
	$result=mysqli_query($conn,$sql);
	$ext=mysqli_fetch_array($result);
	$result=mysqli_query($conn,$sql);
}
else if((!isset($_POST['byname'])) && (!isset($_POST['bynum'])))
{
	$k=0;
	$from="";
	$to="";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title> Find Train </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/home.css" rel="stylesheet">
	</link>
	<script>
		function myFunction() {
			  alert("Please Login First !");
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
		<div  style="background-color: #ffffff; width:70%; padding: 20px; margin-top: 40px;opacity: 0.8;font-size: 17px;">
		
			<form style="margin:0px;" method="post" >
			<table class="table" style="margin-bottom:0px;">
				<tr>
					<th style="border-top:0px;"><label><b>Search Train</label></th>
					</b></label></th></tr>
					<tr>
					<td id="mbox" style="border-top:0px;"> <label>From </label></td>
					<td style="border-top:0px;"><input  type="text" class="input-block-level" name="byname" id="byn" placeholder="Enter Station Code"></td>
					<td id="xbox" style="border-top:0px;"><label> To </label></td>
					<td style="border-top:0px;"><input id="xbox1" type="text" class="input-block-level" name="bynum" placeholder="Enter Station Code"></td>
					<td style="border-top:0px;"><input class="btn" type="submit" value="Find"> </td>
					<td style="border-top:0px;"><a href="train.php" class="btn" type="reset" value="Reset" style="text-decoration: none;">Reset</a></td>
				</tr>
			</table>
			</form>
<!-- display result -->
		<div class="span12 well">
			<div class="display" style="height:30px;">
				<table class="table" border="5px">
				<tr>
					<th style="width:70px;border-top:0px;"> Train No.</th>
					<th style="width:240px;border-top:0px;"> Train Name </th>
					<th style="width:65px;border-top:0px;"> Origin </th>
					<th style="width:55px;border-top:0px;"> Destination </th>
					<th style="width:80px;border-top:0px;"> Arrival </th>
					<th style="width:80px;border-top:0px;"> Departure </th>
					<th style="width:20px;border-top:0px;"> M </th>
					<th style="width:20px;border-top:0px;"> T </th>
					<th style="width:20px;border-top:0px;"> W </th>
					<th style="width:20px;border-top:0px;"> T </th>
					<th style="width:20px;border-top:0px;"> F </th>
					<th style="width:20px;border-top:0px;"> S </th>
					<th style="width: 20px;border-top:0px;"><font color=red> S </font></th>
				</tr>
				</table>
			</div>
			<div class="display">
				<?php
				if($ext==null){
					echo "<div style=\"margin:100px 350px;color:red;\"><b>No train found !!! Please search again...</b></div>";
				}else{
					?>
					<table class="table" border="5px">
				<?php
				if($k==1)
				{	echo "<script> document.getElementById(\"byn\").value=\"$from\";
									   document.getElementById(\"xbox1\").value=\"$to\";
							</script>";
					$n=0;
					while($row=mysqli_fetch_array($result)){
					//$q="from: ".$from;
						if($from==$row['st1'])
						{	$q=$row['st1arri'];
							//echo $q;
						}
						else
						if($from==$row['st2'])
						{	$q=$row['st2arri']; }
						else if($from==$row['st3'])
						{	$q=$row['st3arri']; }
						else if($from==$row['st4'])
						{	$q=$row['st4arri']; }
						else if($from==$row['st5'])
						{	$q=$row['st5arri']; }
						else if($from==$row['Ori'])
						{	$q=$row['Oriarri']; }
						else if($from==$row['Dest'])
						{	$q=$row['Destarri'];}
						
						$p1=substr($q,0,2);
						$p2=substr($q,3,2);
						$p2=$p2+5;
						if($p2<10)
						{$p2="0".$p2;}
						$d=$p1.":".$p2;
					if($n%2==0)
					{
				?>
				<tr class="text-error">
					<td style="width:70px;border-top:0px;"><?php echo $row['Number']; ?> </td>
					<td style="width:240px;"> <?php echo $row['Name']; ?> </td>
					<td style="width:65px;"> <?php echo $row['Ori']; ?> </td>
					<td style="width:55px;"> <?php echo $row['Dest']; ?> </td>
					<td style="width:80px;"> <?php echo $q; ?> </td>
					<td style="width:80px;"> <?php echo $d; ?> </td>
					<td style="width:20px;"> <?php echo $row['Mon']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Tue']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Wed']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Thu']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Fri']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Sat']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Sun']; ?> </td>
				</tr>
				<?php
					}
					else
					{
				?>
				<tr class="text-info">
					<td style="width:70px;border-top:0px;"> <?php echo $row['Number']; ?> </td>
					<td style="width:240px;"> <?php echo $row['Name']; ?> </td>
					<td style="width:65px;"> <?php echo $row['Ori']; ?> </td>
					<td style="width:55px;"> <?php echo $row['Dest']; ?> </td>
					<td style="width:80px;"> <?php echo $q; ?> </td>
					<td style="width:80px;"> <?php echo $d; ?> </td>
					<td style="width:20px;"> <?php echo $row['Mon']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Tue']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Wed']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Thu']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Fri']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Sat']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Sun']; ?> </td>				</tr>
				<?php
					}
					$n++;
					}
				}
				else if($k==2)
				{	$n=0;
					while($row=mysqli_fetch_array($result)){
					if($n%2==0)
					{
				?>
				<tr class="text-error">
					<td style="width:70px;border-top:0px;"> <?php echo $row['Number']; ?> </td>
					<td style="width:210px;"> <?php echo $row['Name']; ?> </td>
					<td style="width:65px;"> <?php echo $row['Origin']; ?> </td>
					<td style="width:60px;"> <?php echo $row['Destination']; ?> </td>
					<td style="width:70px;"> <?php echo $row['Arrival']; ?> </td>
					<td style="width:55px;"> <?php echo $row['Departure']; ?> </td>
					<td style="width:20p;"> <?php echo $row['Mon']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Tue']; ?> </td>
					<td style="width:29px;"> <?php echo $row['Wed']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Thu']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Fri']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Sat']; ?> </td>
					<td> <?php echo $row['Sun']; ?> </td>
				</tr>
				<?php
					}	
					else
					{
				?>
				<tr class="text-info">
					<td style="width:70px;border-top:0px;"> <?php echo $row['Number']; ?> </td>
					<td style="width:210px;"> <?php echo $row['Name']; ?> </td>
					<td style="width:65px;"> <?php echo $row['Origin']; ?> </td>
					<td style="width:60px;"> <?php echo $row['Destination']; ?> </td>
					<td style="width:70px;"> <?php echo $row['Arrival']; ?> </td>
					<td style="width:55px;"> <?php echo $row['Departure']; ?> </td>
					<td style="width:20px;"> <?php echo $row['Mon']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Tue']; ?> </td>
					<td style="width:29px;"> <?php echo $row['Wed']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Thu']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Fri']; ?> </td>
					<td style="width:25px;"> <?php echo $row['Sat']; ?> </td>
					<td> <?php echo $row['Sun']; ?> </td>		
				</tr>
				<?php
					}
					$n++;
					}
				}
				else
				{
				    echo "<div style=\"margin:100px 350px;color:red;\"><b>Please search the train...</b></div>";
				}
				mysqli_close($conn);
				?>
				</table>

					<?php
				}
				?>
				
			</div>
		</div>
		</div>
	</div>
		<div style="margin-top: 108px;background-color: #000000; font-size: 17px;padding: 6px">
			<p style="float: left; padding-left: 30px;color: #ffffff; margin: 5px">&copy; 2021 Copyright PVT Ltd.</p>
			<p style="float: right; padding-right: 30px;color: #ffffff; margin: 5px"> Designed By : Shashwat Verma</p>
		</div>
	</div>
</body>
</html>