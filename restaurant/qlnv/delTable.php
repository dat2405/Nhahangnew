<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="./images/logoD.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		$phone=$_REQUEST['fphone'];
		$db=mysqli_connect('localhost','root','','demo_db');
			if(!$db){
			echo "Lỗi kết nối";
			}else{
			$sql_del="delete from t_khachhang where fphone='".$phone."'";
				mysqli_query($db,$sql_del);
				header('location:listTable.php');
			}

	?>
</body>
</html>
