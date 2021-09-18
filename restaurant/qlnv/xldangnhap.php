<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
session_start();

if (isset($_POST['dangnhap']))
{
  $db=mysqli_connect('localhost','root','','demo_db');  
//Lấy dữ liệu nhập vào
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  if (!$username || !$password) {
    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
exit();
}
if ($username == "dat" && $password == "123") {
    header('location:header.php');
}
else
{
//Kiểm tra tên đăng nhập có tồn tại không
$query = mysqli_query($db, "select username, password from user where username='$username' ");
if (mysqli_num_rows($query) == 0) {
echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.";
exit();
}
//Lấy mật khẩu trong database ra
$row = mysqli_fetch_array($query);
//So sánh 2 mật khẩu có trùng khớp hay không
if ($password != $row['password']) {
echo "Mật khẩu không đúng. Vui lòng nhập lại.";
exit();
}

  $_SESSION['username'] = $username;
  echo "Xin chào <b>" .$username .". Bạn đã đăng nhập thành công. <a href='header1.php'>Tiếp tục</a>";
}
}
?>
</body>
</html>