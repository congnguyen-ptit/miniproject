<?php
	session_start();
	include_once('controllers/userController.php');
	include_once('controllers/productController.php');
	if(!isset($_SESSION['user'])){
		$usercontroller = new UserController();
		$usercontroller-> LoginProcess();
	}else{
		$uContr = new ProductController();
		$uContr->process();
	}
?>	