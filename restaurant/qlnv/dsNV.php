<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QLNV</title>
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
        <h1 >DANH SÁCH NHÂN VIÊN</h1>
        <form method="POST" action="">
            <input type="text" placeholder="Search" name="search" style="width: 300px;height:30px;background:rgb(255, 236, 233);border:1px solid black;border-radius:8px;margin-top:15px">&nbsp;
            <button style="width: 100px;height:30px;border:1px solid black;border-radius:8px">Search</button><br><br>
        </form>
        <table border="1" width="70%">           
            <tr>
                <td><b>STT</b></td>              
                <td><b>Họ và tên</b></td>
                <td><b>Số điện thoại</b></td>
                <td><b>Giờ làm việc</b></td>
                <td colspan="2" align="center" ><b>Chức năng</b><br>
                <button style="border-radius:5px"><a href='dangnhap1.php?fphone=$phone'>Thêm</a></button></td>
            </tr>
    
        <?php
      $db=mysqli_connect('localhost','root','','demo_db');
      if(!$db){
          echo "Lỗi kết nối";
      }else{
        $sql_hienthi="select * from t_nhanvien";
        if(isset($_POST['search'])){
            $search=$_POST['search']; 
            $sql_hienthi="select * from t_nhanvien where fname like '%$search%'";
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
                  echo "<td>".$r['fphone']."</td>";
                  echo "<td>".$r['ftime']."</td>";
                  echo "<td align=center><button style=border-radius:5px><a href='xoaNV.php?fphone=$phone'>Xóa</a></button></td>";
                  echo "<td align=center><button style=border-radius:5px><a href='suaNV.php?fphone=$phone'>Sửa</a></button></td>";
                echo "</tr>";
              }
          }
      }

    ?>
     </table><br><br>
    
    </center>
</body>
</html>