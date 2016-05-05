<?php
	session_start();

	$globalError;
	$lname;
	$fname;
	$phone;
	$lnameError;
	$fnameError;
	$phoneError;
	$addressError;

	
	$db = mysql_connect("localhost","root","fall2015");
	mysql_select_db("golocalapp",$db);
	echo "Hello ".$_SESSION["username"];
	if(empty($_SESSION["username"]))
	{
		//echo "Hello ".$_SESSION["username"];
		header("Location: http://45.55.240.59/Website/Live_Andres/index.php");
	}
	elseif($_SERVER["REQUEST_METHOD"] == "POST" )
	{
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
	
		echo "Hello ".$_SESSION["username"]." ".$fname;

		

		if(empty($fname))
		{
		        $globalError = true;
			$fnameError = "Enter your firstname";
		}
		elseif(empty($lname))
		{
			$globalError = true;
			$lnameError = "Enter your lastname";
			
		}
		elseif(empty($address))
		{
			$globalError = true;
			$addressError = "Enter your address";
			
		}
		elseif(empty($phone))
		{
			$globalError = true;
			$phoneError = "Enter your firstname";
			
		}
		elseif(!$globalError)
		{
			$uname = $_SESSION["username"];
			/*$target_dir   = "../Uploads/";
			$target_file  = $target_dir.basename($_FILES["headshot"]["name"]);
			$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);*/

			$query = "UPDATE registered_staff
                                  SET firstName ='$fname',lastName='$lname',phone='$phone',address='$address'
				  WHERE username = '$uname'";
                        $res = mysql_query($query,$db);
			if(!$res)
				die('Invalid query: ' . mysql_error());
			else
				header("Location:  http://45.55.240.59/Website/Live_Andres/staffPage.php");			

		}
		

	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Mission :: GOLOCAL Promotions</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>

<div class="bg-main">
	<header>
		<div class="container_24">
			<div class="wrapper">
				<div class="grid_17">
					<h1><a href="index.html">Idealex</a></h1>
				</div>
				<!--<div class="grid_7">
					<form id="search2">
						 <div class="fleft"><input type="text"></div>
						 <a onClick="document.getElementById('search2').submit()">search</a>
					</form>
				</div> -->
			</div>
		</div>
		<nav class="main-menu">
			<ul class="sf-menu">
				<li><a href="index-2.html"><em>about us</em><strong></strong></a></li>
						<li><a href="mission.html"><em>mission</em><strong></strong></a></li>
						<li><a href="index-5.html"><em>Brands</em><strong></strong></a></li>
						<li><a href="index.html"><em>services</em><strong></strong></a><ul>
						<li><a href="grassroots.html">Grassroots Marketing</a></li>
						<li><a href="event.html">Event Planning</a></li>
						<li><a href="consulting.html">Consulting</a></li>
						<li><a href="advertising.html">advertising</a></li>
						<li><a href="creative.html">Creative services</a></li>
						<li><a href="print.html">Print and Merschandise</a></li>
					</ul>
				</li>
				<!--<li><a href="index-1.html"><em>services</em><strong></strong></a></li>-->
				<li><a href="index-1.html"><em>benefits</em><strong></strong></a></li>
				<!--<li><a href="more.html"><em>mission</em><strong></strong></a></li>-->
				<li><a href="portfolio.html"><em>pictures</em><strong></strong></a></li>
				<!--<li><a href="index-5.html"><em>Brands</em><strong></strong></a></li>-->
				<li class="last"><a href="social_media.html"><em>videos</em><strong></strong></a></li>
			</ul>
			<div class="clear"></div>
		</nav>
	</header>
	<section class="padsection3">
		<div class="container_24">
			<div class="wrapper">
			<div class="wrapper">
				<div class="grid_24">
					<!--<div class="padline4"><div class="lineH"></div></div>-->
					<h2 class="padtitle2">Staff Register</h2>
					<!--<img src="images/3page_img4.jpg" alt="" class="imgindent3">-->
					<!-- Create the form -->
					<form method="post" actio="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						1. Name:
						<input type="text" name="fname">
						<span class="error" style="color:red">*<?php echo $fnameError; ?></span><br><br>
						2. Last Name:
						<input type="text" name="lname">
						<span class="error" style="color:red">*<?php echo $lnameError; ?></span><br><br>
						3. Phone:
						<input type="text" name="phone">
						<span class="error" style="color:red">*<?php echo $phoneError; ?></span><br><br>
                                                
						4. Sex:
						<input type="text" name="sex">
						<span class="error" style="color:red">*<?php echo $sexError; ?></span><br><br>
                                                                                                            
						5. Date of Birth:
						<input type="text" name="dob">
						<span class="error" style="color:red">*<?php echo $dobError; ?></span><br><br>
                                                                                                            
						6. Address:
						<input type="text" name="address">
						<span class="error" style="color:red">*<?php echo $addressError; ?></span><br><br>
                                                <input type="submit" value="Submit Info">                                                                         
					</form>

				</div>
			</div>
		</div>
	</section>	
</div>
<footer>
	<div class=" container_24">
		<div class="wrapper">
			<div class="grid_6 suffix_2">
				<h1 class="footer-logo"><a href="index.html">idealex</a></h1>
				<p>GOLOCAL PROMOTIONS.</p>
				<p class="color1 privacy">&copy; 2015 <span>|
			</div>
			<div class="grid_7 suffix_2">
				<!--<h4>Services Links</h4>-->
				<div class="wrapper">
					<!--<div class="grid_4 alpha">
						<ul class="footer-list">
							<li><a href="grassroots.html">Grassroots Marketing</a></li>
							<li><a href="event.html">Event Planning</a></li>
							<li><a href="consulting.html">Consulting</a></li>
							<li><a href="creative.html">Creative</a></li>
							<li><a href="advertising.html">Advertising</a></li>
						</ul>
					</div>
					<div class="grid_3 omega">
						<ul class="footer-list">
							<li><a href="print.html">Print & Merchandise</a></li>
							<li><a href="portfolio.html">Pictures</a></li>
							<li><a href="social_media.html">Videos</a></li>
							<li><a href="index-6.html">Contact Us</a></li>
						</ul>
					</div>-->
				</div>
			</div>
			<div class="grid_7">
				<h4>Follow Us</h4>
				<ul class="tooltips">
					<li><a href="http://www.instagram.com/golocalpromos"><img src="images/icon1.png" alt=""><span>Instagram</span></a></li>
					<li><a href="http://www.facebook.com/golocalpromos "><img src="images/icon3.png" alt=""><span>Facebook</span></a></li>
					<li><a href="http://www.twitter.com/golocalpromos"><img src="images/icon2.png" alt=""><span>Twitter</span></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
</body>
</html>
