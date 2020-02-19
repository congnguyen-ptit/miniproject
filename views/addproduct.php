<?php 
	if (!isset($_SESSION['user'])) {
		header("location: ../index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add product</title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
		<div style="margin-top: 50px;"><h2 style="text-transform: uppercase;letter-spacing: 2px;">Add product</h2></div>
		<div style="margin-top: 50px;">
			<form method="POST" action="<?php echo htmlspecialchars("");?>">
				<table>
					<tr>
						<td style="text-align: right;">Name:</td>
						<td style="text-align: left"><input type="text" name="name"></td>
						<td><?php echo $nameErr; ?></td>
					</tr>
					<tr>
						<td style="text-align: right">Category:</td>
						<td style="text-align: left"><input type="text" name="category"></td>
						<td><?php echo $cateErr; ?></td>
					</tr>
					<tr>
						<td style="text-align: right">Producer:</td>
						<td style="text-align: left"><input type="text" name="producer"></td>
						<td><?php echo $prodErr; ?></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="add" value="Confirm"></td>		
					</tr>
				</table>
			</form>
			<div style="margin-right: 70px;">
				<a href="index.php"><button>Home</button></a>
			</div>
		</div>

	</div>
</body>
</html>