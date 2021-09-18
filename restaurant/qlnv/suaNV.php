<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/dangnhap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Edit</title>
</head>


<body>
<?php
		$phone=$_REQUEST['fphone'];
			$db=mysqli_connect('localhost','root','','demo_db');
			if(!$db){
			
				echo "Lỗi kết nối";
			}else{
			
				$sql_read="select * from t_nhanvien where fphone='".$phone."'";
				$kq=mysqli_query($db,$sql_read);
				if(mysqli_num_rows($kq)>0){
				
					while ($r=mysqli_fetch_array($kq)){					
                        $name=$r['fname'];
                        $phone=$r['fphone'];
                        $time=$r['ftime'];
                       
					}
				}

			}
	?>
  
    
    <form name="" method="POST" action="capnhatNV.php">
      <div class="center">
        <h1 align="center">Sửa thông tin nhân viên</h1>

        <label for="fname">Họ tên:</label>
        <input type="text" name="fname" size="10" placeholder="Nhập tên" required value="<?php echo $name;?>">

        <label for="fphone">Số điện thoại:</label>
        <input type="text" name="fphone" size="10" placeholder="Nhập sdt" required value="<?php echo $phone;?>">

        <label for="fparttime">Giờ làm việc:</label><br>
        <input type="radio" name="ftime" value="Ca 1:8h-12h" <?php if($time=='Ca 1:8h-12h') {echo 'checked="checked"';}?>>Ca 1:8h-12h<br>
        <input type="radio" name="ftime" value="Ca 2:12h-16h" <?php if($time=='Ca 2:12h-16h') {echo 'checked="checked"';}?>>Ca 2:12h-16h<br>
        <input type="radio" name="ftime" value="Ca 3:16h-19h" <?php if($time=='Ca 3:16h-19h') {echo 'checked="checked"';}?>>Ca 3:16h-19h<br>
        <input type="radio" name="ftime" value="Ca 4:19h-22h" <?php if($time=='Ca 4:19h-22h') {echo 'checked="checked"';}?>>Ca 4:19h-22h<br>
        <input type="radio" name="ftime" value="Fulltime" >Fulltime

        <table>
         <center>
        
           <input type="submit" value="Cập nhật"> 
         
         </center>
        </table>
      </div>
    </form>

</body>
</html>