<?php
session_start();
$error='';
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "<label>Wrong Data</label>";
	}
	else
	{
		$username=checkinput($_POST['username']);
		$password=checkinput($_POST['password']);
		
		$host = "mysql:host=localhost;dbname=MiniProject;charset=utf8mb4;useUnicode=true";
		$usernamedb = "root";
		$passworddb = "1234";
		$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
		$conn;
		try{
			$conn = new PDO($host,$usernamedb,$passworddb,$options);
		}catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}
		$stmt = $conn->prepare("SELECT * FROM user WHERE username = :us AND password = :ma");
		$stmt->execute(['us'=>$username,'ma'=>$password]);
		$row = $stmt->rowCount();
		if($row == 1) {  
            $_SESSION["login_user"] = $_POST["username"];
            header('location: profile.php'); 
        } else  {  
            $error = '<label>Wrong Data</label>';  
        }  
		
	}
}
function checkinput($input){
	$input = trim($input);
	$input = htmlspecialchars($input);
	$input = stripslashes($input);
	return $input;
}
?>