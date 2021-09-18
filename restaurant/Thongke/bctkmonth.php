<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
input{
 width: 250px;
 height: 30px;
}
input[type="submit"]{
    width: 100px;
    height: 30px;
}
button{
         background-color: darkgray;
         width: 50px;
         height: 30px;
         border-radius: 5px;
         border:1px solid cyan;
     }
     button:hover{
       background-color: cyan;
     }
     a{
    text-decoration: none;
          
      }
</style>
<body> 
<?php
include '../qlnv/header.php';
{
    ?>
    <h3 align="center">BÁO CÁO THÔNG KÊ THEO THÁNG</h3>
<form method="POST" action="bctkmonth.php" align="center">
        
        Từ <input type="month" name="first_month">
        đến <input type="month" name="last_month">
        <input type="submit" value="Thống kê" name="next1"><br><br>
        <?php require 'thongKeThang.php'; ?>
    </form><br>
    <br><br>
     <center><button style="float:center;width:70px;"><a href="../qlnv/header.php">Quay lại</a></button></center>
     <?php
} ?>
</body>
</html>

      