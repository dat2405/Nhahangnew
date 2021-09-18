<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="./images/logoD.png">
	<title>Thông tin Đặt bàn</title>
    <style>
        body{
            background: url("../images/dvd1.jpg")
            no-repeat center center fixed;
            background-size: cover;
        }
    </style>
     <style tyle="text/css">
        h2{
            padding-top: 20px;

        }
        table{
            background-color: #edfc1b;

        }
        form{
            width: 750px;
            background-color: white;
            border-radius: 5px;
            margin: 20px;
        }
        .submit{
            border: 0px;
            width: 100px;
            height: 30px;
            color: white;
            background-color: red;
        }
        header {
    padding: 1em;
    color: white;
    clear: left;
    text-align: center;
    }

    ul {
  float: above;
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #424242;
  color: white;
}

.DangNhap {
    float: right;
}
li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: #42f442;
  color: black;
  font-weight: bold;
}

li.dropdown {
    float: left;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #e9d8f4;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #97EB97;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.datban {
    color: black;
    background-color: #42f442;
    font-weight: bold;
    }
    article {
    background-color: white;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
    border-radius: 5px ;
    }
    button {

    }
    article button:hover{
    background-color: green;
    }
    #set-table{
padding:70px;
}
.table{
 padding-left: 20px;
}
.text-center{
  padding:0;
  font-family: 'Lobster';
  text-align: center;
  font-size:50px;
  color:rgb(212, 221, 188);
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
.click{
   width: 150px;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.click:hover{
  background-color: #45a049;
}
<style>
.error {color: #FF0000;}
</style>
    </style>
    <script type="text/javascript">
        function registerAccount() {
                var  fname = document.getElementById('fname').value;
                var errorName = document.getElementById('error-fname');
                var reGexName = /^[^\d+]*[\d+]{0}[^\d+]*$/;
                var  femail = document.getElementById('femail').value;
                var errorEmail = document.getElementById('error-femail');
                var reGexEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (fname == '') {
                    errorName.innerHTML = 'Vui lòng không bỏ trống tên';
                    return false;
                }
                else{
                    if (!reGexName.test(fname)) {
                        errorName.innerHTML = 'Vui lòng nhập đúng định dạng';
                        return false;
                    }
                    else{
                        if (reGexSpect.test(fname)) {
                            errorName.innerHTML = 'Vui lòng nhập đúng định dạng';
                            return false;
                        }
                        else{
                         errorName.innerHTML = ''; 
                        }
                    }
               }
            
               if (femail == '') {
                    errorEmail.innerHTML = 'Vui lòng không bỏ trống email';
                    return false;
                }
                else{
                    if (!reGexEmail.test(femail)) {
                        errorEmail.innerHTML = 'Vui lòng nhập đúng định dạng';
                        return false;
                    }
                    else{
                         errorEmail.innerHTML = ''; 
                    }
               }
            return true;
       }
       function registerPower() {
            var  fname = document.getElementById('fname').value;
            var errorName = document.getElementById('error-fname');
            var reGexName = /^[^\d+]*[\d+]{0}[^\d+]*$/;
            var reGexSpect = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<script>\/?]*$/;
            var  femail = document.getElementById('femail').value;
            var errorEmail = document.getElementById('error-femail');
            var reGexEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (fname == '') {
                errorName.innerHTML = 'Vui lòng không bỏ trống tên';
                return false;
            }
            else{
                if (!reGexName.test(fname) || reGexSpect.test(fname)) {
                    errorName.innerHTML = 'Vui lòng nhập đúng định dạng';
                    return false;
                }
                else{
                   
                     errorName.innerHTML = ''; 
                    
                }
           }
           if (femail == '') {
                errorEmail.innerHTML = 'Vui lòng không bỏ trống email';
                return false;
            }
            else{
                if (!reGexEmail.test(femail)) {
                    errorEmail.innerHTML = 'Vui lòng nhập đúng định dạng';
                    return false;
                }
                else{
                     errorEmail.innerHTML = ''; 
                }
           }
        return true;
       }
       </script>
</head>
<body>
    <center>
        <nav>
            <ul>
            <li class="dropdown"><a class="dropbtn" href="../index.php">Trang chủ</a></li>
            <li  class="DangNhap">
                <a class="dropbtn" href="dangnhap.php">đăng nhập</a>
            </li>
            <li class="DangNhap">
                <a class="datban" href="datban.php">Đặt bàn</a>
            </li>
            </ul>            
        </nav>          
    </div>
    <div id="set-table">
        <div class="table">
          <h2 class="text-center">Đặt bàn</h2>
          <h5 class="text-center">Vui lòng điền đủ thông tin để đặt bàn</h5>
          <form action="addTable.php" method="POST" class="table-form" id="sub-table">
             <input type="text" placeholder="Họ và tên" name="fname" class="boder"  id="sub-table" required>
             <input type="text" placeholder="Email" name="femail" class="boder"  id="sub-table" required>
             <input type="text" placeholder="Số điện thoại" name="fphone" class="boder"  id="sub-table" required>
             <select  class="boders" name="ftable" required  id="sub-table">
              <option value="Chọn loại bàn" required>Chọn loại bàn</option>
              <option value="2 chỗ">2 chỗ</option>
              <option value="4 chỗ">4 chỗ</option>
              <option value="6 chỗ">6 chỗ</option>
              <option value="8 chỗ">8 chỗ</option>
              <option value="12 chỗ">12 chỗ</option>
              <option value="16 chỗ">16 chỗ</option>
             </select>
             <input type="date" name="fdate" class="boder"  id="sub-table" required>
             <input type="time" name="ftime" class="boder"  id="sub-table" required>
             <center><button type="submit" class="click" id="settable" onclick="confirm('Click OK!');" href="">Đặt bàn</button></center>            
            
          </form>
          
        </div>
      </div>

      <!--<form action="DatBan.php" method="POST">
		<h2>NHẬP THÔNG TIN ĐẶT BÀN</h2>
		<table border="0" cellpadding="0" cellspacing="1" height="350px"  width="700px" style="" >
            <tr>
				<td>Họ và tên:</td>
				<td><input type="Text" name="HoTen" size="50" required></td>
            </tr>
            <tr>
				<td>Địa chỉ:</td>
				<td><input type="Text" name="diachi" size="50" required></td>
			</tr>
            <tr>
				<td>Số điện thoại:</td>
				<td><input type="text" name="sdt" size="20" required></td>
			</tr>
			<tr>
				<td>Thời gian đặt bàn:</td>
				<td><input type="date" name="ngaydatban" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="time" name="giodatban" required></td>
			</tr>
            <tr>
               <td>Số lượng:</td>
               <td><input type="number" name="soluong" required></td>
            </tr>
			<tr align="center">
				<td colspan="2"><input class="submit" type="Submit" value="Đặt bàn" style="border-radius:10px"></td>
			</tr>
		</table>
	</form>-->
    </center>
</body>
</html>