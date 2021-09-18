<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="shortcut icon" href="./images/logoD.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/style.css" >
    </head>
    <body>
        <?php
        include './connect_db.php';
        $result = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = ".$_GET['id']);
        $product = mysqli_fetch_assoc($result);
        $imgLibrary = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = ".$_GET['id']);
        $product['images'] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);
        ?>
        <div class="container">
            <h2>Chi tiết sản phẩm</h2>
            <div id="product-detail">
                <div id="product-img">
                    <img src="<?=$product['image']?>"/>
                </div>
                <div id="product-info">
                    <h1><?=$product['name']?></h1>
                    <label>Giá: </label><span class="product-price"><?= number_format($product['price'], 0, ",", ".") ?> VND</span><br/>
                    <form id="add-to-cart-form" action="cart.php?action=add" method="POST">
                        <input type="number" value="1" name="quantity[<?=$product['id']?>]" size="2" style="width: 48px;height: 30px"/><br/>
                        <input type="submit" value="Đặt món"/>
                    </form>
                </div>
                <div class="clear-both"></div>
                <p><strong>Món như thế nào:</strong><?= $product['content'] ?></p>
            </div>
        </div>
    </body>
</html>