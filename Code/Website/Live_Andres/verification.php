<?php

	$db = mysql_connect("localhost", "root", "fall2015");
        mysql_select_db("golocalapp",$db) or die(mysql_error());

		$type = $_GET['usertype'];
        
          if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
          {
           $email  = mysql_escape_string($_GET['email']);
           $hash   = mysql_escape_string($_GET['hash']);

           $search = mysql_query("SELECT username FROM $type where email='$email' ");
           $match  = mysql_num_rows($search);

           if($match > 0) {
                mysql_query("UPDATE $type SET profile='1' WHERE email='$email' AND hash='$hash' AND profile='0' ");       
                echo "Your account has been activated, you can now login";
            }
           // echo "Match: " .$match;
          }
          else
          {
          }
?>
