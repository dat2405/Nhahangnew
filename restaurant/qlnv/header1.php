<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý</title>
        <meta charset="UTF-8">
        <link rel="icon" href="../images/logoD.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
        <script src="../resources/ckeditor/ckeditor.js"></script>
    </head>
    <style>
        body{
            background-image:url('../images/nenphp.jpg')
        }


li a:hover, .dropdown:hover .dropbtn {
  
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
  color: black;
}
.dropdown:hover .dropdown-content {
  display: block;
}
    </style>
    <body>
        <?php
        session_start();
        include '../connect_db.php'; 
          ?>  
            <div id="content-wrapper">
                <div class="container">
                    <div class="left-menu">
                        <div class="menu-heading">Employees Menu</div>
                        <div class="menu-items">
                            <ul>         
                                <li><a href="../menu.php">Menu</a></li> 
                                <li><a href="./listTable.php">Quản lý đặt bàn</a></li> 
                                <li><a href="order_listing.php">Quản lý hóa đơn</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
     
</body>
</html>