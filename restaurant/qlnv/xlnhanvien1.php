<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XL đăng nhập</title>
</head>
<?php    
$db=mysqli_connect('localhost','root','','demo_db');
if(!$db){
 echo"Lỗi kết nối";
}else{

  $fname=$_POST['fname'];
  $phone=$_POST['fphone'] ;
  //$date=$_POST['date'];
  $time=$_POST['ftime']; 
  if (!$fname || !$phone ||!$time) {
    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
exit();
} 
 }
 $sql_them="insert into t_nhanvien values('".$fname."','".$phone."','".$time."')";
 mysqli_query($db,$sql_them);
 header('location:dsNV.php');
?>

</body>
</html>