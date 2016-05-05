<?php
	session_start();
	$message = "hello";
	$valid_file = null;
	$db = mysql_connect("localhost","root","fall2015");
	mysql_select_db("golocalapp", $db);

	if(empty($_SESSION["username"]))
		header("Location: http://45.55.240.59/Website/Live_Andres/");

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['password']))
		{
		
		}
		else
		{
			if($_FILES['resume']['name'])
			{
					$new_file_name = strtolower($_FILES['resume']['tmp_name']);
					move_uploaded_file($_FILES['resume']['tmp_name'],'./uploads/'.$new_file_name.".jpg");
					$message = 'Congratulations! Your resume was accepted.';
				
				
			}
		}
	}	

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme The Band</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
	.badge {
		background-color: red;
	}
	.container-fluid {
		/*padding-top: 70px;
		padding-bottom: 70px;*/
		padding: 80px 120px;
	
	}
	.body
	{
		line-height: 1.8;
	}
	.nav-tabs li a {
		color: #777;
	}
	.d {
	
		background-color:red;
		text-decoration: underline;
		color: green;
	}
  </style>
</head>
<body data-spy="scroll">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="containe-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">GoLocal</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#suggest">Suggested Jobs<span class="badge">10</span></a></li>
        <li><a href="#alert"><span class="glyphicon glyphicon-envelope">Job Alerts</a></li>
        <li><a href="#applied">Applied Jobs</a></li>
        <li><a href="#saved">Saved Jobs</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">ME
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#profile">My Profile</a></li>
            <li><a href="#resume">My Resume</a></li>
            <li><a href="#profile">Change Password</a></li>
	    <li><a href="#">Contact US</a></li>
            <li class="d"><a href="http://45.55.240.59/Website/Live_Andres/stafflogout.php">Logout</a></li> 
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
	<div id="suggest" class="container-fluid bg-1 text-center ">
		<h3 class="margin">Suggested Jobs</h3>
	</div>
	<div id="alert" class="container-fluid bg-2 text-center ">
		<h3 class="margin">Job Alerts</h3>
	</div>
	<div id="applied" class="container-fluid bg-3 text-center ">
		<h3 class="margin">Applied Jobs</h3>
	</div>
	<div id="save" class="container-fluid bg-4 text-center ">
		<h3 class="margin">Saved Jobs</h3>
	</div>
	<div id="profile" class="container-fluid bg-5  ">
		<h3 class="margin">My Profile</h3>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#me">About Me</a></li>
			<li><a data-toggle="tab" href="#resume">My Resume</a></li>
			<li><a data-toggle="tab" href="#notific">Notifications</a></li>
			<li><a data-toggle="tab" href="#pass">Change Password</a></li>
		</ul>
		<br>
		<div class="tab-content">
			<div id="me" class="tab-pane fade in active">
				<form role="form" action="staffPage.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
					    <label for="firstname">*FirstName</label>
					    <input type="text" class="form-control" id="firstname" placeholder="Enter your  First Name.">
					</div>
					<div class="form-group">
					    <label for="lastname">*LastName</label>
					    <input type="text" class="form-control" id="lastname" placeholder="Enter your Last Name.">
					</div>
					<div class="form-group">
					    <label for="address">*Address</label>
					    <input type="text" class="form-control" id="address" placeholder="Enter your Address.">
					</div>
					<div class="form-group">
					    <label for="phone">*Phone</label>
					    <input type="text" class="form-control" id="firstname" placeholder="Enter FirstName">
					</div>
			                <div class="form-group">
					    <label for="experience">*Experience</label>
				      		<select class="form-control">
							<option>--Select--</option>
					        	<option>Intern</option>
					        	<option>Entry Level(0-2 years)</option>
					        	<option>Mid Level(3-6 years)</option>
					        	<option>Senior Level(7+ years)</option>
						</select>
					</div>
					<div class="form-group">
						<label for="photo">*Upload a profile picture:</label>
						<input type="file" name="profpic" id="fileUpload">
					</div>	
					<div class="form-group">
						<label for="photo">Upload your resume</label><br>
						<?php echo $message; ?>
						<input type="file" name="resume" id="fileupload">
					</div>
                                       <button type="submit" name="profile" lass="btn btn-default">Save Profile</button>                                               
                
				</form>
			</div>
			<div id="resume" class="tab-pane fade">
				Resume
				<!--<a href="ViewerJS/#../secres.docx">Resume</a>-->
				<iframe class="doc" style=float:right;" src="https://docs.google.com/gview?
				url=http://45.55.240.59/Website/Live_Andres/secrem.doc&embedded=true" width="100%" height="1000px"></iframe>
			</div>
			<div id="notific" class="tab-pane fade">
				Notifications
			</div>
			<div id="pass" class="tab-pane fade">
				<form role="form" action="staffPage.php" method="post">
					<div class="form-group">
						<!--<label for="photo">*Upload a profile picture:</label>-->
						<input type="password" name="profpic" id="fileUpload" placeholder="Create New Password">
					</div>	
					<div class="form-group">
						<!--<label for="photo">Upload your resume</label>-->
						<input type="password" name="resume" id="fileupload" placeholder="Confirm New Password">
					</div>
					<button type="submit" name="password" class="btn btn-primary">Save Password</button>
                                       <!--<button type="submit" class="btn btn-default">Save Profile</button>-->                                               
				</form>
			</div>
			
			
		</div>

	</div>
	<div id="resume" class="container-fluid bg-6 text-center ">
		<h3 class="margin">Resume</h3>
	</div>



</body>
</html>
