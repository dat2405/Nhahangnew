<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	session_start();

	if (isset($_POST['click']))
	{
		$db=mysqli_connect('localhost','root','','demo_db');  
//Lấy dữ liệu nhập vào
		$fname = $_POST['fname'];
		$fphone = $_POST['fphone'];
		$time=$_POST['ftime'];
		
		if (!$fname || !$fphone || !$time) {
			echo "Vui lòng nhập đầy đủ thông tin!";
			exit();
		}
		if (!empty($fname && $fphone && $time)) {
			$sql_them="insert into t_nhanvien values('".$fname."','".$fphone."','".$time."')";
			mysqli_query($db,$sql_them);
			header('location:dsNV.php');

		}

	}
	?>
</body>
</html>