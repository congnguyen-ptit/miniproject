<?php 
	if (isset($_GET['c'])) {
		switch ($_GET['c']) {
			case 'product':
				require_once("controllers/productController.php");
				$productCtr = new ProductController();
				$productCtr->process();
				break;
			case 'user':
				include_once("controllers/userController.php");
				$userCtr = new userController();
				$userCtr->LoginProcess();
				break;
		}
	} else {
		header("location: index.php?c=user");
	}
 ?>