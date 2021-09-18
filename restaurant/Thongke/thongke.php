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
                <td>Ngày/tháng/năm</td>
                <td>Doanh thu (VNĐ)</td>              
            </tr>     
  
    <?php
    if (isset($_POST['next'])){
    $db=mysqli_connect('localhost','root','','demo_db');
    if(!$db)
    {
        echo "Lỗi kết nối";
    }
    else
    {
        $first=$_POST['first'];
        $last=$_POST['last'];

        $sql_hienthi="SELECT created_time, SUM(price)    
        FROM order_detail 
        WHERE created_time BETWEEN '$first 00:00:00' AND '$last 23:59:59' group by day(created_time)";
        
        $kq=mysqli_query($db,$sql_hienthi);
				if(mysqli_num_rows($kq)>0)
				{
			   		while($r=mysqli_fetch_array($kq))
					{
						echo "<tr>";
                            echo "<td>".$r['created_time']."</td>";
                            echo "<td>".$r['SUM(price)']."</td>";
                        echo "</tr>";
                                              
					}
                }
    }
}  
    ?>
   
</table>
<table>
   
    <?php
     if (isset($_POST['next'])){
   $db=mysqli_connect('localhost','root','','demo_db');
   if(!$db)
   {
       echo "Lỗi kết nối";
   }
   else
   {
       $first=$_POST['first'];
       $last=$_POST['last'];

       $sql_hienthi="SELECT created_time, SUM(price)
       FROM order_detail 
       WHERE created_time BETWEEN '$first 00:00:00' AND '$last 23:59:59' group by year(created_time)";
       
       $kq=mysqli_query($db,$sql_hienthi);
               if(mysqli_num_rows($kq)>0)
               {
                      while($r=mysqli_fetch_array($kq))
                   {
                       echo "<tr>";
                           echo "<td><b>Tổng doanh thu:</b> ".$r['SUM(price)']."VNĐ</td>";
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