<?php   
 session_start();
 session_destroy();  
 if(isset($_COOKIE['usercookie'])){
 	setcookie('usercookie','',-1); 	
 	echo $_COOKIE['usercookie'];
 }
 header("location: ../index.php");
 ?>  