<?php 
	require("../database.php");
	session_start();
	if(isset($_SESSION['user'])){
		header("location: profile.php");
		exit();
	} elseif(isset($_COOKIE['usercookie'])){
		$uc = $_COOKIE['usercookie'];
		$conn = $db->connect();
		$stmt=$conn->prepare("SELECT COUNT(*) AS cnt,username FROM user where username=:us");
		$stmt->execute(['us'=>$us]);
		$u = $stmt->fetch();
		$count = $u['cnt'];
		if($count == 1){
			$_SESSION['user'] = $uc;
			header("location: profile.php");
			exit();
		}
	}
	$err =  "";
	if(isset($_POST['login'])){
		$username = check_input($_POST['username']);
		$password = check_input($_POST['password']);
		$password = md5($password);
		if(isset($_POST['username']) && isset($_POST['password'])){
			$conn = $db->connect();
			$stmt = $conn->prepare("SELECT COUNT(*) AS cnt,username FROM user WHERE username = :us AND password = :ma");
			$stmt->execute(['us'=>$username,'ma'=>$password]);
			$row = $stmt->fetch();
			$count = $row['cnt'];
			if($count == 1){
				if (isset($_POST['remember'])) {
					setcookie('usercookie',$row['username'],time()+600);
				}
				$_SESSION['user'] = $row['username'];
				header("location: profile.php");
				exit();
			}
			else{
				$err = "Incorrect Username or Password";
			}
		}
	} else {
		require_once("login.php");
	}


	function check_input($input){
		$input = trim($input);
		$input = htmlspecialchars($input);
		$input = stripslashes($input);
		return $input;
	}
	

	?>