<?php 
	$password = "1234";
	$encrypted = password_hash($password,PASSWORD_DEFAULT);

	$back = "1234";
	if(password_verify($back, $encrypted)){
		echo "string";
	}
	echo $encrypted;

 ?>