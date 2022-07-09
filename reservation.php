<?php  
session_start();
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}
	
require('firstimport.php');
$tbl_name="interlist";
mysqli_select_db($conn,"$db_name") or die("cannot select db");
$tostn = '';
$fromstn = '';
$doj = '';
if(isset($_POST['from']) && isset($_POST['to']))
{	$k=1;
	$tostn = $_POST['to'];
	$fromstn = $_POST['from'];
	$doj = $_POST['date'];
	$from=$_POST['from'];
	$to=$_POST['to'];
	$quota=$_POST['quota'];
	$day=date("D",strtotime("".$doj));
	//echo $day."</br>";

	
	$sql="SELECT * FROM $tbl_name WHERE (Ori='$from' or st1='$from' or st2='$from' or st3='$from' or st4='$from' or st5='$from') and (st1='$to' or st2='$to' or st3='$to' or st4='$to' or st5='$to' or Dest='$to') and ($day='Y')";
	$result=mysqli_query($conn,$sql);
}
else if((!isset($_POST['from'])) && (!isset($_POST['to'])))
{	$k=0;
	$from="";
	$to="";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title> Reservation </title>
	<link rel="shortcut icon" href="images/favicon.png"></link>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/home.css" rel="stylesheet"></link>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/man.js"></script>
	
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
		<div  style="background-color: #ffffff; width:85%; padding: 20px; margin-top: 40px;opacity: 0.8;font-size: 17px; display: flex;justify-content: space-around;">
			<!-- find train with qouta-->
			<div>
			<form method="post" action="reservation.php">
			<table class="table">
				<tr>
					<th style="border-top:0px;"><label> From </label></th>
					<td style="border-top:0px;"><input type="text" class="input-block-level" name="from" id="fr" ></td>
				</tr>
				<tr>
					<th style="border-top:0px;"><label> To </label></th>
					<td style="border-top:0px;"><input type="text" class="input-block-level" name="to" id="to1" ></td>
				</tr>
				<tr>
					<th style="border-top:0px;" ><label > Quota </label></th>
					<td style="border-top:0px;"><input list="q1" class="input-block-level" name="quota" id="q12" value="<?php if(isset($_POST['quota']))echo $_POST['quota'];?>">
					<datalist id="q1" >
					<option value="General">General</option>
					<option value="Tatkal">Tatkal</option>
					<option value="Ladies">Ladies</option>
					</datalist>
					</td>
				</tr>
				<tr>
					<th style="border-top:0px;"><label> Date</label></th>
					<td style="border-top:0px;"><input type="date" class="input-block-level input-medium" name="date" max="<?php echo date('Y-m-d',time()+60*60*24*90);?>" min="<?php echo date('Y-m-d')?>" value="<?php if(isset($_POST['date'])){echo $_POST['date'];}else {echo date('Y-m-d');}?>"> </td>
				</tr>
				<tr>
					<td style="border-top:0px;"><input class="btn" type="submit" value="OK"></td>
					<td style="border-top:0px;"><button href="reservation.php" class="btn" type="reset" value="Reset">Reset</button></td>
				</tr>
			</table>
			</form>
			</div>
			
		<!-- display train -->
			<div>
				<div class="display" style="height:30px;margin-top: -5px">
				<table class="table" style="width: ">
				<tr>
					<th style="width:70px;border-top:0px;"> Train No.</th>
					<th style="width:250px;border-top:0px;"> Train Name </th>
					<th style="width:60px;border-top:0px;"> Orig. </th>
					<th style="width:50px;border-top:0px;"> Des. </th>
					<th style="width:70px;border-top:0px;"> Arr. </th>
					<th style="width:80px;border-top:0px;"> Dep. </th>
					<th style="width:250px;border-top:0px;"></th>
				</tr>
				</table>
				</div>
				<div class="display" style="margin-top:0px;overflow:auto;">
				<table class="table">
				
				<?php  
					
					if($k==1)
					{
						
						echo "<script> document.getElementById(\"fr\").value=\"$from\";
									   document.getElementById(\"to1\").value=\"$to\";
									   document.getElementById(\"q12\").value=\"$quota\";

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
					<td style="width:70px;"> <?php   echo $row['Number']; ?> </td>
					<td style="width:250px;"> <?php echo $row['Name']; ?></td>
					<td style="width:60px;"> <?php echo $row['Ori']; ?> </td>
					<td style="width:50px;"> <?php echo $row['Dest']; ?> </td>
					<td style="width:70px;"> <?php   echo $q; ?> </td>
					<td style="width:80px;"> <?php   echo $d; ?> </td>
					<td style="width:250px;">  
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "1A";?>&quota<?php echo $quota?>"><b>1A&emsp;</b></a> 
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "2A";?>&quota<?php echo $quota?>"><b>2A&emsp;</b></a>
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "3A";?>&quota<?php echo $quota?>"><b>3A&emsp;</b></a> 
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "SL";?>&quota<?php echo $quota?>"><b>SL&emsp;</b></a>
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "CC";?>&quota<?php echo $quota?>"><b>CC&emsp;</b></a> 
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "2S";?>&quota<?php echo $quota?>"><b>2S&emsp;</b></a>  
						
					</td>
					</tr>
				<?php  
					}
					else
					{
				?>
				<tr class="text-info">
					<td style="width:70px;"> <?php  echo $row['Number']; ?> </td>
					<td style="width:250px;"><?php  echo $row['Name']; ?></td>
					<td style="width:60px;"> <?php  echo $row['Ori']; ?> </td>
					<td style="width:50px;"> <?php  echo $row['Dest']; ?> </td>
					<td style="width:70px;"> <?php  echo $q; ?> </td>
					<td style="width:80px;"> <?php  echo $d; ?> </td>
					<td style="width:250px;">
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "1A";?>&quota<?php echo $quota?>"><b>1A&emsp;</b></a> 
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "2A";?>&quota<?php echo $quota?>"><b>2A&emsp;</b></a>
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "3A";?>&quota<?php echo $quota?>"><b>3A&emsp;</b></a> 
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "SL";?>&quota<?php echo $quota?>"><b>SL&emsp;</b></a>
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "CC";?>&quota<?php echo $quota?>"><b>CC&emsp;</b></a> 
						<a style="text-decoration: none" href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&quota=<?php echo $quota;?>&class=<?php echo "2S";?>&quota<?php echo $quota?>"><b>2S&emsp;</b></a>  
					</td>
				</tr>
				<?php  
					}
					$n++;
					}
				}
				else
				{
					echo "<div style=\"margin:100px 180px;color:red;\"><b>Please search the train...</b> </div>";
				}
					
					mysqli_close($conn);
				?> 
				</table>
				</div>
			</div>
		</div></div>

		<div style="margin-top: 250px;background-color: #000000; font-size: 17px;padding: 6px">
			<p style="float: left; padding-left: 30px;color: #ffffff; margin: 5px">&copy; 2021 Copyright PVT Ltd.</p>
			<p style="float: right; padding-right: 30px;color: #ffffff; margin: 5px"> Designed By : Shashwat Verma</p>
		</div>
	</div>
</body>
</body>
</html>