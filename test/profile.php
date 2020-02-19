<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      echo '<h3>Login Success, Welcome - '.$_SESSION["user"].'</h3>';  
      echo '<br /><br /><a href="logout.php">Logout</a>';  
 }  
 else  
 {  
      header("location: login.php");  
 }  
 ?>   
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 </head>
 <body>
 	<a href="testtiep.php">Click here!</a>
 </body>
 </html>
