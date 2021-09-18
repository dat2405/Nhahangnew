<!DOCTYPE html>
<html>
    <head>
        <title>Chi tiết đơn hàng</title>
        <meta charset="UTF-8">
        <link rel="icon" href="../images/logoD.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
        <script src="../resources/ckeditor/ckeditor.js"></script>
        <style>
            #order-detail{
    border: 1px solid #000;
    padding: 20px;
    line-height: 20px;
    background-color: white;
}
        </style>
    </head>
    <body>
        <?php      
        include '../connect_db.php';
        $orders = mysqli_query($con, "SELECT orders.name, orders.phone, orders.address,orders.note, order_detail.*, product.name as product_name 
FROM orders
INNER JOIN order_detail ON orders.id = order_detail.order_id
INNER JOIN product ON product.id = order_detail.product_id
WHERE orders.id = " . $_GET['id']);
        $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        ?>

<?php
include 'header.php';
{
    ?> 
        <div id="order-detail-wrapper">
            <div id="order-detail">
                <h1>Hóa đơn thanh toán</h1> 
                <label>Mã khách hàng: </label><span> <?=$orders[0]['id'] ?></span><br/>      
                <label>Tên khách hàng: </label><span> <?=$orders[0]['name'] ?></span><br/>
                <label>Điện thoại: </label><span> <?=$orders[0]['phone'] ?></span><br/>
                <label>Địa chỉ: </label><span> <?=$orders[0]['address'] ?></span><br/>
                <label>Ngày: </label><span> <?=$orders[0]['created_time'] ?></span><br/>
                <hr/>
                <h3>Danh sách món ăn</h3>
                <ul>
                    <?php
                    $totalQuantity = 0;
                    $totalMoney = 0;
                    foreach ($orders as $row) {        
                        ?>
                        <li>
                        
                            <span class="item-name"><?= $row['product_name'] ?></span>
                            <span class="item-quantity"> -- SL: <?= $row['quantity'] ?></span>
                            <span class="item-price">-- Giá:<?= number_format($row['price'], 0, ",", ".") ?> VNĐ</span>
                        </li>
                        <?php
                        $totalMoney += ($row['price'] * $row['quantity']);
                        $totalQuantity += $row['quantity'];
                    }
                    ?>
                </ul>
                <hr/>
                <label>Tổng SL:</label> <?= $totalQuantity ?> - <label>Tổng tiền:</label> <?= number_format($totalMoney, 0, ",", ".") ?> đ
                <p><label>Ghi chú: </label><?= $orders[0]['note'] ?></p>
                <center><i>Cảm ơn quý khách !</i></center>
            </div>
        </div>
        <?php
} ?>
    </body>
</html>