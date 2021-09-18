<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="./images/logoD.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link  href=" https://use.fontawesome.com/releases/v5.0.4/css/all.css " rel="stylesheet">     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Document</title>
</head>
<style>

.table{
 padding-left: 120px;
}
.text-center{
  padding:20px;
  font-family: 'Lobster';
  text-align: center;
}
.boder{
  width: 300px;
  height: 50px;  
  margin: 20px;
  border: 2px solid;
  border-radius: 5px;
  border-style: dotted solid;
}
.boders{
  width: 300px;
  height: 50px;
  margin: 20px;
  border-radius: 5px;
  border: 2px solid;
  border-style: dotted solid;
}
center{
  padding:50px;
}
button{
  font-family: 'Lobster';
  border: 0px;
  width: 150px;
  height: 50px;
  background-color: rgba(28, 235, 21, 0.9);
}

button:hover{
  background-color:orange;
}
</style>
<body>
<?php
		$phone=$_REQUEST['fphone'];
			$db=mysqli_connect('localhost','root','','demo_db');
			if(!$db){
			
				echo "Lỗi kết nối";
			}else{
			
				$sql_read="select * from t_khachhang where fphone='".$phone."'";
				$kq=mysqli_query($db,$sql_read);
				if(mysqli_num_rows($kq)>0){
				
					while ($r=mysqli_fetch_array($kq)){					
                        $name=$r['fname'];
                        $email=$r['femail'];
                        $phone=$r['fphone'];
                        $table=$r['ftable'];
                        $date=$r['fdate'];
                        $time=$r['ftime'];
                       
					}
				}

			}
	?>
<div id="set-table">
	  
        <div class="table">
          <h1 class="text-center">Đặt bàn</h1>
          <h5 class="text-center">Vui lòng điền đủ thông tin để đặt bàn</h5>
          <form action="updateTable.php" method="POST" class="table-form" id="sub-table">
             <input type="text" placeholder="Họ và tên" name="fname" class="boder"  id="sub-table"  value="<?php echo $name;?>">
             <input type="text" placeholder="Email" name="femail" class="boder"  id="sub-table"  value="<?php echo $email;?>">
             <input type="text" placeholder="Số điện thoại" name="fphone" class="boder"  id="sub-table"  value="<?php echo $phone;?>">
             <select  class="boders" name="ftable"   id="sub-table" value="<?php echo $table;?>">
              <option value="Chọn loại bàn"  >Chọn loại bàn</option>
              <option value="2 chỗ" <?php if($table=='2 chỗ'){echo 'selected="selected"';}?>>2 chỗ</option>
              <option value="4 chỗ" <?php if($table=='4 chỗ'){echo 'selected="selected"';}?>>4 chỗ</option>
              <option value="6 chỗ" <?php if($table=='6 chỗ'){echo 'selected="selected"';}?>>6 chỗ</option>
              <option value="8 chỗ" <?php if($table=='8 chỗ'){echo 'selected="selected"';}?>>8 chỗ</option>
              <option value="12 chỗ" <?php if($table=='12 chỗ'){echo 'selected="selected"';}?>>12 chỗ</option>
              <option value="16 chỗ" <?php if($table=='16 chỗ'){echo 'selected="selected"';}?>>16 chỗ</option>
             </select>
             <input type="date" name="fdate" class="boder"  id="sub-table"  value="<?php echo $date;?>">
             <input type="time" name="ftime" class="boder"  id="sub-table"  value="<?php echo $time;?>">
             <center><button type="submit" class="click" id="settable" onclick="alert('Bạn chắc chứ?')">Đặt bàn</button></center>            
          
          </form>
          
        </div>
	  </div>
	  
</body>
</html>