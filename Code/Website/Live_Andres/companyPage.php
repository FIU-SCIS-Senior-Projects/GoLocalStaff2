<?php

	session_start();
	$GLOBALS['db'] = mysql_connect("localhost", "root","fall2015");
	mysql_select_db("golocalapp",$db);

	//$title = $date = $gender = $details = $location = $rate;
	//$titleErr = $dateErr = $genderErr = $detailsErr = $locationErr = $rateErr;

	if(empty($_SESSION['username']))
		header('Location: http://45.55.240.59/Website/Live_Andres');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$rate     = $_POST["rate"];
		$title    = $_POST["title"];
		$gender   = $_POST["gender"];
		$details  = $_POST["details"];
		$location = $_POST["location"];
		$date     = $_POST["date"];	
		
		$query = "INSERT INTO jobs(jobTitle,date,location,duties,gender,rate)
				            VALUES('$title','$date','$location','$details','$gender','$rate')";
		mysql_query($query,$db);	
	
		// Notify Users of New Jobs
		$msg = "A new Job has been posted.\nClick on the link below to apply for it.
                        \nhttp://45.55.240.59/Website/stafflogin.php";
		$sql = "Select email from registered_staff";
		$result = mysql_query($sql); 	
		while($row = mysql_fetch_array($result))
		{
			//echo $row['email'];
			mail($row['email'],"New Job",$msg);
		}			
		
	}
?>


<html>

	<head>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                <script>
		   $(document).ready(function() {
			$("#nav a").click(function(e) {
				e.preventDefault();
				$(".toggle").hide();
					
				var toShow = $(this).attr('href');
				$(toShow).show();
			});
		   });
		</script>
		<style>
			* {     margin: 0;
				padding: 0;	
			}
			
			#header {
				background-color: #333;
				color:white;
				text-align:center;
				padding:5px;
			}
			#left {
				/*line-height30px;*/
			        background-color:#555;
				float:left;
				width: 20%;
				height: 100%;
				padding : 0;
			}
			#right {
				float:right;
				width: 40%;
				/*background-color:red;*/
				height: 100%;
			}
			
			#center {
				/*display:inline-block;*/
				display: inline-block;
				width: 40%;
				background-color: #d9d9d9;
				height: 100%;
			}
			#footer {
				background-color: black;
				color:white;
				clear: both;
				text-align: center;
				padding:5px;
			}
			ul {
				list-style-type: none;
				margin-left : 0;
				margin-right: 0;
				padding-left: 40px; 
			}
			
			form	{
				margin: 0 auto;
				width: 100%;
				padding: 1em;
				border: 1px solid #CCC;
				border-radius: 1em;
			}	
			form div + div {
				margin-top: 1em;
			}	
			label {
				display: inline-block;
				width: 90px;
				text-align: right;
			}	
			input, textarea {
				/*font: 1em sans-serif;
				width: 300px;
				-moz-box-sizing: border-box;
				box-sizing: border-box;*/
			}
			input:focus, textarea:focus {
				border-color: #000;
			}
			textarea {
				vertical-align: top;
				height: 5em;
				resize: vertical;
			}
			.button {
				padding-left: 90px;
			}
			button {
				margin-left: .5em;
			}
			a {
				text-decoration: none;
				color: #fff;
				padding: 1em;
			}
			h1 {
				text-align: center;
				
			}
		</style>
	</head>

	<body>
		<div id="container">
			<div id="header" >
				<h1>Your Jobs</h1>
			</div>
			<div id="center">
				<h1>Details</h1>
				<hr>
				<?php
					if(isset($_GET['id'])){
						$id = intval($_GET['id']);
						$query1 = mysql_query("select * from jobs where jobID='$id'",$db);
						
						echo '<table border="1"><th>Job Title</th><th>Date</th><th>Rate</th><th>Location</th>';
						while($row1=mysql_fetch_array($query1))
						{
							echo '<tr><td>'.$row1["jobTitle"].'</td><td>'.$row1["date"].'</td><td>'.$row1["rate"].'</td><td>'.$row1["location"].'<td></tr>';
						}						
						echo '</table>';
					}
				?>
			</div>

			<div id="left">
				<h1>Jobs</h1><hr>
				<?php
					$query = mysql_query("select * from jobs",$db);
					while ($row = mysql_fetch_array($query))
					{
						//$index = intval($row["jobID"]) - 1; 
						echo "<b><a href=\"companyPage.php?id={$row['jobID']}\">{$row['jobTitle']}</a></b>";
						echo "<br />";
					}
			//	print $query;
				?>
			</div>

			<div id="right">
				<div style="width:70%;margin:0 auto;" >
					<form method="post" action="companyPage.php">
						<fieldset>
						   <legend>Jobs Description</legend>
						   <div>
						   	<label for="title">Title:</label>
						        <input type="text" id="title"  name="title">
							
						   </div>
						   <div>
						   	<label for="date">Date:</label>
						        <input type="text" id="date"  name="date">
						   </div>
						   <div>
						   	<label for="location">Location:</label>
						        <input type="text" id="location"  name="location">
						   </div>
						   <div>
						   	<label for="rate">rate:</label>
						        <input type="text" id="rate"  name="rate">
						   </div>
						   <div>
						   	<label for="gender">Gender:</label>
						        <input type="text" id="gender"  name="gender">
						   </div>
						        
						   <div>
						   	<label for="details">Description:</label>
						        <textarea id="details"  name="details"></textarea>
						   </div>
						   <div class="button">
						   	<button type="submit">Post the Job</button>
						   </div>
						   						   
						</fieldset>				
					</form>
				</div>
			</div>
			<div id="footer">
				Copyright @ GoLocalPromos
			</div>
			
		</div>
	</body>
	
</html>




















