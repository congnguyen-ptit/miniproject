<?php 
	class ProductController{
		private $product;
		function __construct()
		{
			require_once("model/product.php");
			$this->product = new Product();
		}
		public function process(){
			if (!isset($_GET['f'])){
				$products = $this->product->getAll();
				include "views/allprods.php";
			}
			else{
				$function = $_GET['f'];
				switch ($function) {
					case 'add':
						$nameErr = $cateErr = $prodErr = "";
						$name = $category = $producer = "";
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							if(empty($_POST['name'])){
								$nameErr = "*";
							}else{
								$name = check_input($_POST['name']);
							}
							if(empty($_POST['category'])){
								$cateErr = "*";
							}else{
								$category = check_input($_POST['category']);
							}
							if(empty($_POST['producer'])){
								$prodErr = "*";
							}else{
								$producer = check_input($_POST['producer']);
							}
							if(!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['producer'])){
								$this->product->addProduct($name,$category,$producer);
								header('location: index.php');
							}
						}
						include "views/addproduct.php";
						break;
					
					case 'edit':
						$prodEdit = $this->product->getOne(htmlspecialchars(strip_tags($_GET['id'])));
						$nameErr = $cateErr = $prodErr = "";
						if($_SERVER['REQUEST_METHOD'] == 'POST'){
							if(empty($_POST['name'])){
								$nameErr = "*";
							}else{
								$name = check_input($_POST['name']);
							}
							if(empty($_POST['category'])){
								$cateErr = "*";
							}else{
								$category = check_input($_POST['category']);
							}
							if(empty($_POST['producer'])){
								$prodErr = "*";
							}else{
								$producer = check_input($_POST['producer']);
							}
							if(!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['producer'])){
								$this->product->editProduct(htmlspecialchars(strip_tags($_GET['id'])),$name,$category,$producer);
								header('location: index.php');
							}
						}
						include "views/editproduct.php";
						break;

					case 'delete':
						$this->product->deleteProduct(htmlspecialchars(strip_tags($_GET['id'])));
						header('location: index.php');
						break;	

				}
			}
		}
	}

 ?>