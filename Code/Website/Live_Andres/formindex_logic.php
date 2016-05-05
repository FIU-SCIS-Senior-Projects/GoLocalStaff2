<?php
session_start();
//require_once '../functions.php';


function registererUser($post)
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	$userType = $_POST['usertype'];
        $usernameerror = "";
        $passworderror = "";
        $emailerror = "";
        $existingUser = false;

        if(empty($userType))
           $usertyerror = "Choose an option!";
        else {	
      		  if(empty($uname))
          		 $usernameerror = "Enter a username";
       		 elseif(empty($upass))
          		 $passworderror = "Enter a password";
       		 elseif(empty($email))
          		 $emailerror = "Enter an email";
       		 elseif(filter_var($email,FILTER_VALIDATE_EMAIL) == FALSE)
          		 $emailerror = "Invalid email format";
       		 else
       		 {
           		 $db = mysql_connect("localhost","root","fall2015");
           		 mysql_select_db("golocalapp",$db);
            
          		 $result = mysql_num_rows(mysql_query("SELECT * FROM $userType WHERE username='$uname'"));
          		 if($result!=0)
          		 { 
             			 $existingUser = true;
             			 $usernameerror = "Username is already taken.";
          		 }

          		 $result = mysql_num_rows(mysql_query("SELECT * FROM $userType WHERE email='$email'"));
          		 if($result!=0)
          		 {
             			 $existingUser = true;
             			 $emailerror = "Email is already in use.";
          		 }
         
          		 if(!$existingUser)
          		 {
             			 $hash = md5( rand(0,100) );
             			 $query = "INSERT INTO $userType(username,password,email,hash)
                                       VALUES('$uname','$upass','$email','$hash');";
             			 $result = mysql_query($query);
                          
                                 $to       = $email;
                                 $subject  = 'Email Verification';
                                 $message  = '
                                 Thanks for signing up for Golocal!
                                 Please click the link below to activate your account:
                                 http://45.55.240.59/signup-email-verification/verification.php?email='.$email.'&hash='.$hash.'';

                                 $headers = 'From:noreply@golocal@gmail.com' ."\r\n";
                                 mail($to, $subject, $message, $headers);      
                                 unset($_POST);header("Location: after_sign_up.php");
          		 }
       		}
        }

	
       function test_input($data)
       {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);

          return $data;
       }		

}
?>

