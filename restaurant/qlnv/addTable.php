<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
    

    if (isset($_POST['click']))
    {
        $db=mysqli_connect('localhost','root','','demo_db');  
//Lấy dữ liệu nhập vào
       $name=$_POST['fname'];
        $email=$_POST['femail'];
        $phone=$_POST['fphone'];
        $table=$_POST['ftable'];
        $date=$_POST['fdate'];
        $time=$_POST['ftime'];

        if (!$name || !$email || !$phone|| !$table || !$date || !$time) {
            echo "Vui lòng nhập đầy đủ thông tin!";
            exit();
        }
        if (!empty($name && $email && $phone && $table && $date  && $time)) {
            echo "Đặt bàn thành công!";
            $sql_them="insert into t_khachhang value('".$name."','".$email."','".$phone."','".$table."','".$date."','".$time."')";
              mysqli_query($db,$sql_them);
            header('location:listTable.php');

        }

    }
    ?>
</body>
</html>