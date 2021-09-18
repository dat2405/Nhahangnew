<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="./images/logoD.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xóa đơn</title>
</head>
<body>
	<?php
		$id=$_REQUEST['id'];
		$db=mysqli_connect('localhost','root','','demo_db');
			if(!$db){
			echo "Lỗi kết nối";
			}else{
			$sql_del="delete from orders where id='".$id."'";
				mysqli_query($db,$sql_del);
				header('location:order_listing.php');
			}

	?>
</body>
</html>
