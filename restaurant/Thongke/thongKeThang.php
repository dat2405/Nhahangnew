<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    
</style>
<body>
<center>
<table border="1" width="60%" align="center">
			<tr>
                <td>Tháng</td>
                <td>Doanh thu (VNĐ)</td>              
            </tr>     
  
    <?php
    if (isset($_POST['next1'])){
    $db=mysqli_connect('localhost','root','','demo_db');
    if(!$db)
    {
        echo "Lỗi kết nối";
    }
    else
    {
        $first_month=$_POST['first_month'];
        $last_month=$_POST['last_month'];

        $sql_hienthi="SELECT month(created_time), SUM(price)    
        FROM order_detail 
        WHERE year(created_time) BETWEEN '$first_month 0000-00-00' AND '$last_month 2040-01-01' group by month(created_time)";
        
        $kq=mysqli_query($db,$sql_hienthi);
				if(mysqli_num_rows($kq)>0)
				{
			   		while($r=mysqli_fetch_array($kq))
					{
						echo "<tr>";
                            echo "<td>".$r['month(created_time)']."</td>";
                            echo "<td>".$r['SUM(price)']."</td>";
                        echo "</tr>";
                                              
					}
                }
    }
}  
    ?>
   
</table>

</center> 
</body>
</html>