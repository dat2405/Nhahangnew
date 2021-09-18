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
      input[type=password] {
    
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    width: 400px;
  }
    </style>
</head>
<body>
    
        <nav>
            <ul>
            <li class="dropdown"><a class="dropbtn" href="../index.php">Trang chủ</a></li>
            <li  class="DangNhap">
                <a class="dropbtn" href="dangnhap.php">Đăng nhập</a>
            </li>
            <li class="DangNhap">
                <a class="datban" href="datban.php">Đặt bàn</a>
            </li>
            </ul>            
        </nav>          
    <br><br>
 
    <div class="center">
    
        <form action='dangnhap.php' class="dangnhap" method='POST'>

          <h1 align="center">Đăng nhập</h1>

          <label for="fname">Tên đăng nhập:</label>
          <input type="text" name="username" placeholder="Nhập tên">
          <label for="fpass">Mật khẩu:</label>
          <input type="password" name="password" placeholder="Nhập mật khẩu"><br>
          <table align="center">
           <input type='submit' class="button" name="dangnhap" value='Đăng nhập'> &nbsp;&nbsp;&nbsp;
           <input type="reset" value="Nhập lại">
          </table>
          <?php require "xldangnhap.php"; ?>
        </form>
    </div>
</body>
</html>