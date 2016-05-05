 <?php
	
     session_start();
	$usertypeError = null;
	$usernameError = null;
	$passwordError = null;
	$cpe = null;
	$emailError = null;
	$Error = null;
	$uname = null;
	$pass = null;
	$usertype = null;

  	//require '../functions.php';
  	if( $_SERVER["REQUEST_METHOD"] == "POST" )
  	{
  		$uname         = trim($_POST['username']);
                $pass          = trim($_POST['password']);
                $usertype      = $_POST['userType'];           
                
                if(empty($usertype))
                  $usertypeError="Choose an option";
                elseif(empty($uname) || empty($pass))
                  $Error = "Fill out both fields!";
                else {
                                           
                         $db = mysql_connect("localhost","root","fall2015");
                         mysql_select_db("golocalapp",$db);

                         $res = mysql_num_rows(mysql_query("SELECT * FROM $usertype  WHERE username='$uname' AND password='$pass'"));
                         $pro = mysql_num_rows(mysql_query("SELECT * FROM $usertype  WHERE username='$uname' AND profile='1'"));

                         if($res!=0)
                         {
                               $_SESSION["username"] = $uname;
                               if($pro == 1)
                               {
                                     /*$query = "UPDATE $usertype
                                               SET profile ='1'
                                               WHERE username='$uname'";
                                     mysql_query($query,$db);*/
                                     if($usertype=='registered_staff')
                                       header("Location: http://45.55.240.59/Website/Live_Andres/staffPage.php");
				     else
                                       header("Location: http://45.55.240.59/Website/Live_Andres/companyPage.php");

                               }
                               else
                                     echo "Hello ".$_SESSION['username']."! Check your email to activate your account!";
                                     
                         }
                         else
                                $Error = "Wrong Credentials!";
                }
  	}


  ?>




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
<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css"> 
<![endif]-->
     <!-- <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
      <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>-->
</head>
<body>
<!-- PRO Framework Panel Begin -->
<!--<div id="advanced"><span class="trigger"><strong></strong><em></em></span><div class="bg_pro"><div class="pro_main"><a href="" class="pro_logo"></a><ul class="pro_menu">-->
<!--<li><a href="index.html"><img src="images/pro_home.png" alt=""></a></li>-->
<!--<li><a href="404.html">Pages<span></span></a><ul>	<li><a href="under_construction.html">Under Construction</a></li><li><a href="intro.html">Intro Page</a></li><li><a href="404.html">404 page</a></li></ul></li><li>-->  
<!--<a href="index-6.html">Contact Us</a></li>-->
<!--<li><a href="index.html">Home</a></li> -->
<!--<li><a href="portfolio.html">Gallery Layouts<span></span></a><ul><li><a href="portfolio.html">Portfolio</a></li><li><a href="just-slider.html">Sliders</a><ul><li><a href="just-slider.html">Just Slider</a></li><li><a href="kwicks.html">Kwicks Slider</a></li><li><a href="functional-slider.html">Functional Slider</a></li></ul></li><li><a href="gallery-page1.html">Gallery</a></li></ul></li><li><a href="misc.html">Extras<span></span></a><ul><li><a href="social_media.html">Social and Media<br> Sharing</a></li><li><a href="css3.html">CSS3 Tricks</a></li><li><a href="misc.html">Misc</a></li></ul></li></ul>-->
<!--<div class="clear"></div></div></div><div class="bg_pro2"></div></div>--><!-- PRO Framework Panel End -->
<div class="bg-main">
	<header>
		<div class="container_24">
			<div class="wrapper">
				<div class="grid_17">
					<h1><a href="index.php">Idealex</a></h1>
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
			<!--<div class="wrapper">
				<div class="grid_8">
					<h2 class="padtitle">Innovation &amp; Technology</h2>
					<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultricies odio magna. Mauris a lacus metus, sed ultrices dui. Vivamus at eros non lectus ultrices rutrum. Sed in neque diam.</div>
					<ul class="list-1">
						<li><a href="more.html">Vestibulum iaculis lacinia est</a></li>
						<li><a href="more.html">Proin dictum elementum velit</a></li>
						<li><a href="more.html">Fusce euismod consequat ante</a></li>
						<li><a href="more.html">Lorem ipsum dolor sit amet</a></li>
						<li><a href="more.html">Consectetuer adipiscing elit</a></li>
					</ul>
					<a href="more.html" class="button">Read More</a>
				</div>
				<div class="grid_8">
					<h2 class="padtitle">Competitive Intelligence</h2>
					<div>Mauris a lacus metus, sed ultrices dui. Vivamus at eros non lectus ultrices rutrum. Sed in neque diam. Nulla varius commodo justo, id consequat lacinia vitae. Proin dictum tempus tellus.</div>
					<ul class="list-1">
						<li><a href="more.html">Fusce euismod consequat ante</a></li>
						<li><a href="more.html">Lorem ipsum dolor sit amet</a></li>
						<li><a href="more.html">Consectetuer adipiscing elit</a></li>
						<li><a href="more.html">Pellentesque sed dolor</a></li>
						<li><a href="more.html">Aliquam congue fermentum nisl</a></li>
					</ul>
					<a href="more.html" class="button">Read More</a>
				</div>
				<div class="grid_8">
					<h2 class="padtitle">Market Research</h2>
					<div>Nulla varius commodo justo, id consequat lacinia vitae. Proin dictum tempus tellus, consequat venes quis. Vestibulum rutrum dui sit amet nisi sollicitudin vitae dapibus nisl tincidunt. Sed id euismod felis.</div>
					<ul class="list-1">
						<li><a href="more.html">Consectetuer adipiscing elit</a></li>
						<li><a href="more.html">Pellentesque sed dolor</a></li>
						<li><a href="more.html">Aliquam congue fermentum nisl</a></li>
						<li><a href="more.html">Mauris accumsan nulla vel diam</a></li>
						<li><a href="more.html">Sed in lacus ut enim adipiscing aliquet</a></li>
					</ul>
					<a href="more.html" class="button">Read More</a>
				</div>
			</div>-->
			<div class="wrapper">
				<!--<div class="grid_24">
					<div class="padline3"><div class="lineH"></div></div>
				</div>
			</div>
			<div class="wrapper">
				<div class="grid_12">
					<h2 class="padtitle2">Saving Solution</h2>
					<div class="wrapper">
						<img src="images/3page_img1.png" alt="" class="imgindent2">
						<p>Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, 
dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
					</div>
				</div>
				<div class="grid_12">
					<h2 class="padtitle2">Selling Globally Online</h2>
					<div class="wrapper">
						<img src="images/3page_img2.png" alt="" class="imgindent2">
						<p>Praesent vestibulum moles tie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque peatibus et magnis. Nulla dui. Fusce feugiat malesuada. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec sit amet eros. Lorem ipsum dolor sit
amet, consec tetuer adipiscing elit. Mauris fermentum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus.</p>
					</div>
				</div>
			</div>-->
			<div class="wrapper"><a href="http://45.55.240.59/Website/Live_Andres/formindex.php">Sign up</a>
				<div class="grid_24">
					<!--<div class="padline4"><div class="lineH"></div></div>-->
					<h2 class="padtitle2">Welcome</h2>
					<!--<img src="images/3page_img4.jpg" alt="" class="imgindent3">-->
					<!-- Create the form -->
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    User Type: 
    <input type="radio" name="userType" value="registered_staff">Staff
    <input type="radio" name="userType" value="registered_employer">Company
    <span class="error" style="color:red">*
      <?php echo $usertypeError; ?>
    </span><br><br>
    
    Username: 
    <input type="text" name="username" value="<?php echo "$uname";?>">
   
    Password: 
    <input type="password" name="password">
    <span class="error" style="color:red">*
      <?php echo $Error; ?>
    </span><br><br>
    
    <input type="submit" value="Signin">
   
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
