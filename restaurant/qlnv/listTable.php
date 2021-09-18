<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="./images/logoD.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Set-table</title>
</head>
  <style>
      body{
          background-color:rgb(255, 236, 233);
          
      }
      table{
        padding:0px;
        margin:0px;
        background-color:rgb(255, 236, 233);
        border-radius:5px;
      }
      button{
         
          background-color: cyan;
          width: 50px;
          height: 30px;
      }
      a{
          text-decoration: none;
      }
  </style>
<body>
<?php
include 'header.php';

    ?>
    <center>
        <h1>DANH SÁCH KHÁCH HÀNG ĐẶT BÀN</h1><br>

        <form action="" method="POST">
           <input type="text" placeholder="Search" name="search" style="width: 300px;height:30px;background:rgb(255, 236, 233);border:1px solid black;border-radius:8px">&nbsp;
           <button style="width: 100px;height:30px;border:1px solid black;border-radius:8px">Search</button><br><br>
        </form>
        <table border="1" width="70%" >           
            <tr style="border: 1px solid black;">
                <td><b>STT</b></td>              
                <td><b>Họ và tên</b</td>
                <td><b>Email</b></td>
                <td><b>Số điện thoại</b></td>
                <td><b>Loại bàn</b></td>
                <td><b>Ngày</b></td>
                <td><b>Giờ</b></td>
                <td colspan="3" align="center"><b>Chức năng</b><br>
                <button style="border-radius:5px"><a href='datban.php?fphone=$phone'>Thêm</a></button></td>
            </tr>
          
        <?php

      $db=mysqli_connect('localhost','root','','demo_db');
      if(!$db){
          echo "Lỗi kết nối";
      }else{  
          $sql_hienthi="select * from t_khachhang";
          if(isset($_POST['search'])){
         $search=$_POST['search']; 
         $sql_hienthi="select * from t_khachhang where fname like '%$search%'";
        }
      
          $kq=mysqli_query($db,$sql_hienthi);
          if(mysqli_num_rows($kq)>0){
              $i=0;
              while($r=(mysqli_fetch_array($kq))){
                  $i++;
                  $phone=$r['fphone'];
                echo "<tr>";
                  echo "<td>$i</td>";                                                      
                  echo "<td>".$r['fname']."</td>";
                  echo "<td>".$r['femail']."</td>";
                  echo "<td>".$r['fphone']."</td>";
                  echo "<td>".$r['ftable']."</td>";
                  echo "<td>".$r['fdate']."</td>";
                  echo "<td>".$r['ftime']."</td>";
                  echo "<td align=center><button style=border-radius:5px><a href='delTable.php?fphone=$phone'>Xóa</a></button></td>";
                  echo "<td align=center><button style=border-radius:5px><a href='editTable.php?fphone=$phone'>Sửa</a></button></td>";
                echo "</tr>";
              }
          }
      }

    ?>
       </table><br><br>
    </center>
</body>
</html>