<?php 
	include "session.php";
	$conn = $db->connect();
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		try{
			$stmt = $conn->prepare("SELECT * FROM user WHERE username = :us AND password = :ma");
			$stmt->execute(['us'=>$username,'ma'=>$password]);
			$row = $stmt->rowCount();
			if($row == 1) {  
            	$_SESSION['user'] = $_POST['username'];
            	header('location: profile.php'); 
        	} else  {  
            	 $_SESSION['error']= '<label>Wrong Data</label>';  
        	} 
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}
	} else{
			$_SESSION['error'] = 'Input login credentails first';
		}
	$db->close();
		
 ?>