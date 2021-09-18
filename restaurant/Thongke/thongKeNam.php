<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<center>
<table border="1" width="60%" align="center">
			<tr>
                <td>Năm</td>
                <td>Doanh thu (VNĐ)</td>              
            </tr>     
  
    <?php
    if (isset($_POST['next2'])){
    $db=mysqli_connect('localhost','root','','demo_db');
    if(!$db)
    {
        echo "Lỗi kết nối";
    }
    else
    {
        $first_year=$_POST['first_year'];
        $last_year=$_POST['last_year'];

        $sql_hienthi="SELECT year(created_time), SUM(price)    
        FROM order_detail 
        WHERE year(created_time) BETWEEN '$first_year 0000-00-00' AND '$last_year 2040-01-01' group by year(created_time)";
        
        $kq=mysqli_query($db,$sql_hienthi);
				if(mysqli_num_rows($kq)>0)
				{
			   		while($r=mysqli_fetch_array($kq))
					{                    
						echo "<tr>";
                            echo "<td>".$r['year(created_time)']."</td>";
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
     if (isset($_POST['next2'])){
   $db=mysqli_connect('localhost','root','','demo_db');
   if(!$db)
   {
       echo "Lỗi kết nối";
   }
   else
   {
       $first_year=$_POST['first_year'];
       $last_year=$_POST['last_year'];

       $sql_hienthi="SELECT year(created_time), SUM(price) 
       FROM order_detail 
       WHERE year(created_time) BETWEEN '$first_year 0000-00-00' AND '$last_year 2040-01-01'";
       
       $kq=mysqli_query($db,$sql_hienthi);
               if(mysqli_num_rows($kq)>0)
               {
                   $i=0;
                      while($r=mysqli_fetch_array($kq))
                   {
                       $i++;
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