<?php session_start(); ?>
<!DOCTYPE html>

<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/style.css" >
    </head>
    <body>
    <?php
        include './connect_db.php';
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }
        $error = false;
        $success = false;
        if (isset($_GET['action'])) {
            function update_cart($add=false){
                foreach ($_POST['quantity'] as $id => $quantity) {
                    if ($quantity == 0) {
                        unset($_SESSION["cart"]['id']);
                    } else {
                      if($add){
                         $_SESSION["cart"][$id] += $quantity;
                       }else{
                          $_SESSION["cart"][$id] = $quantity;  
                    } 
                 }
            }
        }
            switch ($_GET['action']) {
                case "add":
                    update_cart(true);
                    header('Location:./cart.php');
                    break;
                    case "delete":
                    if(isset($_GET['id'])){
                       unset($_SESSION["cart"][$_GET['id']]);
                    }
                    header('Location:./cart.php');
                    break;
                case "submit":
                    if(isset($_POST['update_click'])){ //cập nhệt số lượng sản phẩm
                        update_cart();
                        header('Location:./cart.php');                    
                    }
                    if ($error == false && !empty($_POST['quantity'])) { //Xử lý lưu giỏ hàng vào db
                        $products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_POST['quantity'])) . ")");
                        $total = 0;
                        $orderProducts = array();
                        while ($row = mysqli_fetch_array($products)) {
                            $orderProducts[] = $row;
                            $total += $row['price'] * $_POST['quantity'][$row['id']];
                        }
                        $insertOrder = mysqli_query($con, "INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['phone'] . "', '" . $_POST['address'] . "', '" . $_POST['note'] . "', '" . $total . "', '" . $_POST['created_time'] . "', '" . time() . "');");
                        $orderID = $con->insert_id;
                        $insertString = "";
                        foreach ($orderProducts as $key => $product) {
                            $insertString .= "(NULL, '" . $orderID . "', '" . $product['id'] . "', '" . $_POST['quantity'][$product['id']] . "', '" . $product['price'] . "', '" .    $_POST['created_time']  . "', '" . time() . "')";
                            if ($key != count($orderProducts) - 1) {
                                $insertString .= ",";
                            }
                        }
                        $insertOrder = mysqli_query($con, "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES " . $insertString . ";");
                        $success = "Đặt hàng thành công";
                        unset($_SESSION['cart']);
                    }
                       
                    }
               
            }
        
        if (!empty($_SESSION["cart"])) {
            $products = mysqli_query($con, "SELECT * FROM `product` WHERE `id` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
        }
        ?>

        <div class="container">
             
              <?php if (!empty($error)) { ?> 
                <div id="notify-msg">
                    <?= $error ?>. <a href="javascript:history.back()">Quay lại</a>
                </div>
            <?php } elseif (!empty($success)) { ?>
                <div id="notify-msg">
                    <?= $success ?>. <a href="menu.php">Tiếp tục mua hàng</a>
                </div>
            <?php } else { ?> 
                
                <h1>Thực đơn</h1>
                <form id="cart-form" action="cart.php?action=submit" method="POST">
                    <table>
                        <tr>
                        <th class="product-number">STT</th>
                        <th class="product-name">Tên sản phẩm</th>
                        <th class="product-img">Ảnh sản phẩm</th>
                        <th class="product-price">Đơn giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="total-money">Thành tiền</th>
                        <th class="product-delete">Xóa</th>
                    </tr>
                    <?php 
                    if (!empty($products)) {
                        $total =0;
                        $num = 1;
                    while ($row = mysqli_fetch_array($products)) { 
                        ?>
                    <tr>
                        <td class="product-number"><?=$num++;?></td>
                        <td class="product-name"><?=$row['name']?></td>
                        <td class="product-img"><img src="<?=$row['image']?>" /></td>
                        <td class="product-price"><?= number_format($row['price'], 0, ",", ".")?></td>
                        <td class="product-quantity"><input type="number" value="<?=$_SESSION["cart"][$row['id']]?>" name="quantity[<?=$row['id']?>]" /></td>
                        <td class="total-money"><?= number_format($row['price'] * $_SESSION["cart"][$row['id']], 0, ",", ".")?></td>
                        <td class="product-delete"><a href="cart.php?action=delete&id=<?=$row['id']?>">Xóa</a></td>
                    </tr>
                    <?php 
                    $total += $row['price'] * $_SESSION["cart"][$row['id']];
                    $num++;
                    } 
                    ?>
                    <tr id="row-total">
                        <td class="product-number">&nbsp;</td>
                        <td class="product-name">Tổng tiền</td>
                        <td class="product-img">&nbsp;</td>
                        <td class="product-price">&nbsp;</td>
                        <td class="product-quantity">&nbsp;</td>
                        <td class="total-money"><?= number_format($total, 0, ",", ".")?></td>
                        <td class="product-delete">Xóa</td>
                    </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <div id="form-button">
                         
                         <button style="height: 29px;border:1px solid black;border-radius:5px"><a href="menu.php" type="submit">Chọn tiếp</a></button>       
                    </div>
                    <hr>
                    <center><h1>Thông tin khách hàng</h1></center>
                    <table>
                        <tr>
                            <td>Khách hàng: </td>
                            <td><input type="text" value="" name="name" /></td>
                        </tr>
                        <tr>
                            <td>Điện thoại: </td>
                            <td><input type="text" value="" name="phone" /></td>
                        </tr>
                        <tr>
                             <td>Địa chỉ: </td>
                            <td><input type="text" value="" name="address" /></td>
                        </tr>
                        <tr>
                             <td>Ghi chú: </td>
                            <td><textarea name="note" cols="30" rows="7" ></textarea></td>
                        </tr>
                        <tr>
                             <td>Ngày đặt: </td>
                            <td><input type="date" value="" name="created_time" /></td>
                        </tr>
                    </table>
                    <center><input type="submit" name="order_click" value="Đặt món" style="width:100px"/></center>
                </form>
            <?php } ?>
        </div>
    </body>
</html>