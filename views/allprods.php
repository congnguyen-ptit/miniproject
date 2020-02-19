<?php 
	session_start();


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>All products</title>
</head>
<body>
	<div>
		<!-- <table>
			<tr>
				<td><h3><?php echo $_SESSION['user'] ?></h3></td>
				<td></td>
				<td></td>
				<td><a href="views/logout.php"><button>Log out</button></a></td>
			</tr>
		</table> -->
		<div style="font-size: 20px;">Hello, <span style="font-style: italic;"><?php echo $_SESSION['user'] ?></span></div>
		<div><a href="views/logout.php"><button>Log out</button></a></div>
	</div>
	<div align="center" style="font-size: 17px;letter-spacing: 1px;" >
		<div style="margin-top: 50px;"><h2 style="text-transform: uppercase;letter-spacing: 2px;">All products</h2></div>
		<div style="width: 800px;border: 2px red dotted;text-align: left;padding-left: 40px;margin-top: 50px;">
			<table>
				<tr>
					<td style="padding-right: 40px;">ID</td>
					<td style="padding-right: 150px;">Name</td>
					<td style="padding-right: 70px;">Category</td>
					<td style="padding-right: 70px;">Producer</td>
					<td style="padding-right: 60px;">Edit</td>
					<td style="padding-right: 60px;">Delete</td>
				</tr>
				<?php foreach ($products as $product) { ?>
					<tr>
						<td><?php echo $product['p_id']; ?></td>
						<td><?php echo $product['p_name']; ?></td>
						<td><?php echo $product['p_category']; ?></td>
						<td><?php echo $product['p_producer']; ?></td>
						<td><a href="index.php?c=product&f=edit&id=<?php echo $product['p_id']; ?>" style="color: red;">Edit</a></td>
						<td><a href="index.php?c=product&f=delete&id=<?php echo $product['p_id']; ?>" style="color: blue;">Delete</a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
		<div style="margin-top: 50px;">
			<a href="index.php"><button>Home</button></a>
			<a href="index.php?c=product&f=add"><button>Add product</button></a>
		</div>
	</div>
</body>
</html>