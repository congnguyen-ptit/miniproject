<?php   
 session_start();  
 session_destroy();  
 if (isset($_COOKIE['usercookie'])) {
 	setcookie('usercookie',time()-600);
 }
 header("location: login.php");  
 ?>  