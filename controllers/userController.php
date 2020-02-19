<?php 
	session_start();
	class UserController{
		private $user;
		function __construct()
		{
			require_once("model/user.php");
			$this->user = new User();
		}
		public function LoginProcess(){
			if(isset($_SESSION['user'])){
				header("location: index.php?c=product");
				exit();
			} elseif(isset($_COOKIE['usercookie'])){
				$uc = $_COOKIE['usercookie'];
				$u = $this->user->get($uc);
				$count = $u['cnt'];
				if($count == 1){
					$_SESSION['user'] = $uc;
					header("location: index.php?c=product");
					exit();
				}
			}
			$err =  "";
			if(isset($_POST['login'])){
				$username = check_input($_POST['username']);
				$password = check_input($_POST['password']);
				$password = md5($password);
				if(isset($_POST['username']) && isset($_POST['password'])){
					$row = $this->user->check($username,$password);
					$count = $row['cnt'];
					if($count == 1){
						if (isset($_POST['remember'])) {
							setcookie('usercookie',$row['username'],time()+600);
						}
						$_SESSION['user'] = $row['username'];
						header("location: index.php?c=product");
						exit();
					}
					else{
						$err = "Incorrect Username or Password";
						require_once("views/login.php");
					}
				}
			} else {
				$err = "Login first";
				require_once("views/login.php");
			}
		}
	}
	function check_input($input){
		$input = trim($input);
		$input = htmlspecialchars($input);
		$input = stripslashes($input);
		return $input;
	}
	
 ?>