
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="./images/logoD.png">
<link rel="stylesheet" href="../css/dangnhap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add</title>
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
    </style>
</head>
<body>
    
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
    <br><br>

  <div class="center">
    
    <form name="" method="POST" action="xldangnhap.php">

        <h1 align="center">Thêm nhân viên</h1>

        <label for="fname">Họ tên:</label>
        <input type="text" name="fname" size="10" placeholder="Nhập tên" required >

        <label for="fphone">Số điện thoại:</label>
        <input type="text" name="fphone" size="10" placeholder="Nhập sdt" required >

        <label for="fparttime">Giờ làm việc:</label><br>
        <input type="radio" name="ftime" value="Ca 1:8h-12h">Ca 1:8h-12h<br>
        <input type="radio" name="ftime" value="Ca 2:12h-16h">Ca 2:12h-16h<br>
        <input type="radio" name="ftime" value="Ca 3:16h-19h">Ca 3:16h-19h<br>
        <input type="radio" name="ftime" value="Ca 4:19h-22h">Ca 4:19h-22h<br>
        <input type="radio" name="ftime" value="Fulltime">Fulltime

        <table>
         <center>
           <input type="reset" value="Nhập lại">&nbsp;
           <input type="submit" value=" Nhập"> 
         
         </center>
        </table>

    </form>
  </div>
</body>
</html>