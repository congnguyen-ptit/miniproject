<?php
	session_start();
	$host = "mysql:host=localhost;dbname=MiniProject;charset=utf8mb4;useUnicode=true";
	$usernamedb = "root";
	$passworddb = "1234";
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	try{
		$conn = new PDO($host,$usernamedb,$passworddb,$options);
	}catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
	$user_check=$_SESSION['login_user'];
	$stmt=$conn->prepare("SELECT username FROM user where username=:us");
	$stmt->execute(['us'=>$user_check]);
	$lUSer = $stmt->fetch();
	$login_session = $lUSer['username'];
	if(!isset($login_session)){
		$conn = null;
		header('Location: index.php');
	}
	
?>