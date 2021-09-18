<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../images/logoD.png">
	<title>Danh sách thông tin đặt bàn</title>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
	<body>
	<center>
		<table border="1" width="60%">
			<tr>
                <td>HỌ & TÊN</td>
                <td>SỐ ĐIỆN THOẠI</td>
                <td>DOANH THU(VND)</td>
			</tr>
			<?php
			if(isset($_POST['next3'])){
			$db=mysqli_connect('localhost','root','','demo_db');
			if(!$db)
			{
				echo "Lỗi kết nối";
			}
			else
			{
        $ngay=$_POST['ngay'];
		$sql_hienthi="SELECT name, phone, total from orders 
        where created_time BETWEEN '$ngay 00:00:00' AND '$ngay 23:59:59'";
				$kq=mysqli_query($db,$sql_hienthi);
				if(mysqli_num_rows($kq)>0)
				{
					$i=0;
			   		while($r=mysqli_fetch_array($kq))
					{
						$i++;
            echo "<tr>";
            echo "<td>".$r['name']."</td>";
            echo "<td>".$r['phone']."</td>";
            echo "<td>".$r['total']."</td>";
            echo "</tr>";                        
					}
                }
                else{
                    echo "<tr>";
                    echo "<td>0</td>";
                    echo "<td>0</td>";
                    echo "<td>0</td>";
		        				echo "</tr>";
                }
			}
		}?>
		</table>
        </div>
	</center>
</body>
</html>