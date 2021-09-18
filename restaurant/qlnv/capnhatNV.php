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
        
		$db=mysqli_connect('localhost','root','','demo_db');
			if(!$db)
			{
				echo "Lỗi kết nối";
			}
			else
			{
				$name=$_POST['fname'];  
                $phone=$_POST['fphone'];
				$time=$_POST['ftime'];
				
				$sql_update="update t_nhanvien set fname='".$name."',fphone='".$phone."',ftime='".$time."' where fphone='".$phone."'";
				mysqli_query($db,$sql_update);
				header('location:dsNV.php');
            }
	?>
</body>
</html>