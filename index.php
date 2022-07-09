<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Home </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/home.css" rel="stylesheet" ></link>
	<link rel="shortcut icon" href="images/favicon.png"></link>
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

				<div style=" display: flex; justify-content: space-between;margin-top: 65px">
					<?php
					 if(isset($_SESSION['name']))	
					 {
						?><div style="width:25%; height:210px; padding: 10px; margin: 25px;color: #fffff">
							<p align="center" style="font-family: cursive; color: #ffffff;font-size: 55px">
							<b>Welcome , <br><?php
							echo ucfirst($_SESSION['name']) ?> ! </b></p>
						</div>
					 <?php
					 }
					 else
					 {
					 ?>
						<div style="width:25%; height:210px; padding: 10px; margin: 25px;display: flex;flex-direction: column; justify-content: space-around; color: #ffffff">
						<div style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);">
							<a href="login1.php"><button class="button1" style="vertical-align:middle"><span>Login</span></button></a>
						</div>
						<div>
							<p align="center" style="font-size: 18px">
								<b>OR</b>
							</p>
						</div>
						<div style="box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);">
							<a href="signup.php?value=0"><button class="button2" style="vertical-align:middle"><span>Sign Up</span></button></a>
						</div>

						</div>
					<?php } ?>
					<div style="background-color: #ffffff; width:25%; height:305px; padding: 10px; margin: 10px;opacity: 0.8">
						<marquee behavior="scroll" id="marq"  scrollamount=3 direction="up" height="294px" onmouseover="nestop()" onmouseout="nestrt()">
						<div style="1.0">
						<p><b>Hon'ble Prime Minister message on "Public Health Response to COVID-19: Campaign for COVID-Appropriate Behaviour". Wear Mask, Follow Physical Distancing, Maintain Hand Hygine.</b></p>
						<p><b>Get your favourite food at your train seat through e-Catering available at selected stations.</b></p>
						<p style="color: #FF0000"><b>COVID 19 Alert:</b></p>
						<ul>
						<li><p><b> All passengers are hereby informed that downloading of Aarogya Setu App on their mobile phone, that they are carrying along, is advisable.</b></p>
						<li><p><b>All Passenger to kindly note that on arrival at their destination, the traveling passengers will have to adhere to such health protocols as are prescribed by the destination State/UT.</b></p>
						<li><p><b> Though various State Governments' Advisories have been provided on the website, still Users are advised to surf Destination State Government URL/ Website for latest instructions on Covid-19 pandemic and Covid appropriate behaviour.</b></p>
						<li><p><b>No blanket and linen shall be provided in the train. Although Take Away Bedroll Kit is available in some trains on payment basis.</b></p>
						</ul>
						
						</div>
					</marquee>
					</div>
				</div>

				<div style="margin-top:50px; font-size: 25px">
					<p style="color:#ffffff; text-align: center;font-family: monospace;font-weight: bold;"><b>SAFETY&emsp;|&emsp;SECURITY&emsp;|&emsp;PUNCTUALITY</b></p>
				</div>
			</div>
		</div>
		<div class="div2">
			<p align="center" style="font-size: 40px;font-weight: bold;">SPECIAL TRAINS</p>
			<div style=" display: flex; justify-content: space-around;">

				<div class="card">
					<video autoplay muted loop>
						<source src="images/me.mp4" type="video/mp4">
					</video>
					<div style="padding: 10px">
						<h2 align="center" style="font-family: cursive;color:#2E3192;">Maharajas' Express </h2>
						<p>Welcome aboard the Maharajas' Express, bestowed the "World's Leading Luxury Train" award at the World Travel Awards for seven consecutive years from 2012 to 2018. The Maharajas' Express has redefined the luxury travel experience by offering guests the opportunity to explore fabled destinations providing a glimpse of rich cultural heritage of Incredible India which will leave you with fond memories of this train journey to be cherished.</p>
					</div>

				</div>

				<div class="card">
					<video autoplay muted loop>
						<source src="images/pow.mp4" type="video/mp4">
					</video>
					<div style="padding: 10px">
						<h2 align="center" style="font-family: cursive;color:#2E3192;">Palace on Wheels </h2>
						<p>The Palace on Wheels luxury train takes you on a scintillating journey into the royal land of sand dunes and regal palaces. Voted as the 4th best luxury train in the world, the Palace on Wheels carries with it an intrinsic ambience that goes perfectly well with the majestic charm and beauty spread so lavishly across the Indian terrain.</p>
					</div>

				</div>

				<div class="card">
					<video autoplay muted loop>
						<source src="images/gc.mp4" type="video/mp4">
					</video>
					
					<div style="padding: 10px">
						<h2 align="center" style="font-family: cursive;color:#2E3192;">The Golden Chariot</h2>
						<p>The Golden Chariot is an attempt to connect some of the important dots which have shaped the history of South India through several centuries.Destinations on the Golden Chariot route have been chosen to showcase the architecture, culture and history of this region.The Train - The Guest carriages of the Golden Chariot train are named after the dynasties which ruled south India over several centuries.</p>
					</div>

				</div>
			</div>
			<div style=" display: flex; justify-content: space-around; margin-top: 20px ">
				<div class="card">
					<video autoplay muted loop>
						<source src="images/do.mp4" type="video/mp4">
					</video>
					<div style="padding: 10px">
						<h2 align="center" style="font-family: cursive;color:#2E3192;">Deccan Odyssey</h2>
						<p>Welcome to luxury train travel in India! Embark on a voyage across the magnificent landscapes and territories of India. Sail into an age of romance and royalty, discover the soul of this incredible country. From world heritage sites, forts and palaces to an array of cultural experiences crafted exclusively for you. Select from 6 great rail journeys in India on board the Deccan Odyssey and rediscover the art of elegant train traveling.</p>
					</div>

				</div>

				<div class="card">
					<video autoplay muted loop>
						<source src="images/bc.mp4" type="video/mp4">
					</video>
					<div style="padding: 10px">
						<h2 align="center" style="font-family: cursive;color:#2E3192;">Buddhist Circuit Train</h2>
						<p>In the Mahaparinirvana sutra, the Buddha tells his followers that they can attain merit and a noble rebirth by going on pilgrimage to the places where he was born (Lumbini), gained enlightenment (Bodhgaya), first taught (Sarnath), and attained Nirvana (Kushinagar).The Buddhist tourist train covers all the places which had a significant impact on Buddha’s life and teachings. Board the Buddhist train from Safdarjung Railway Station as it heads for religious and traditional Gaya.</p>
					</div>

				</div>
				<div></div>
			</div>
		</div>
		<div style="background-color: #000000; font-size: 17px;padding: 6px">
			<p style="float: left; padding-left: 30px;color: #ffffff; margin: 5px">&copy; 2021 Copyright PVT Ltd.</p>
			<p style="float: right; padding-right: 30px;color: #ffffff; margin: 5px"> Designed By : Shashwat Verma</p>
		</div>
	</div>
</body>
</html>