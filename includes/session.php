<?php
	session_start();
	include "./data/database.php";
	if(isset($_SESSION['user'])){
		$usercheck = $_SESSION['user'];
		$conn = $db->connect();
		try{
			$stmt=$conn->prepare("SELECT username FROM user where username=:us");
			$stmt->execute(['us'=>$usercheck]);
			$u = $stmt->fetch();
		}catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}
		$db->close();
	}
?>