<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
        <script src="../resources/ckeditor/ckeditor.js"></script>
    </head>
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