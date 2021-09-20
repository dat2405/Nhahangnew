<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../images/logoD.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
    <title>Document</title>

</head>
<body>
    

<?php
include 'header.php';
$config_name = "order";
$config_title = "khách hàng";

    if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
        $_SESSION[$config_name.'_filter'] = $_POST;
        header('Location: '.$config_name.'_listing.php');exit;
    }
    if(!empty($_SESSION[$config_name.'_filter'])){
        $where = "";
        foreach ($_SESSION[$config_name.'_filter'] as $field => $value) {
            if(!empty($value)){
                switch ($field) {
                    case 'name':
                    $where .= (!empty($where))? " AND "."`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                    break;
                    default:
                    $where .= (!empty($where))? " AND "."`".$field."` = ".$value."": "`".$field."` = ".$value."";
                    break;
                }
            }
        }
        extract($_SESSION[$config_name.'_filter']);
    }
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 5;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if(!empty($where)){
        $totalRecords = mysqli_query($con, "SELECT * FROM `orders` where (".$where.")");
    }else{
        $totalRecords = mysqli_query($con, "SELECT * FROM `orders`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if(!empty($where)){
        $orders = mysqli_query($con, "SELECT * FROM `orders` where (".$where.") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else{
        $orders = mysqli_query($con, "SELECT * FROM `orders` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>Danh sách <?= $config_title ?></h1>
        <br><br>
       <div class="listing-items">
           <!--     <div class="buttons">
                <a href="./edit_product.php"></a>
            </div>-->
            <div class="listing-search">
                <form id="<?= $config_name ?>-search-form" action="order_listing.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm <?= $config_title ?>:</legend>
                        ID: <input type="text" name="id" value="<?= !empty($id) ? $id : "" ?>" style="border-radius: 5px;border:1px solid black;" />
                        Tên <?= $config_title ?>: <input type="text" name="name" value="<?= !empty($name) ? $name : "" ?>" style="border-radius: 5px;border:1px solid black;" />
                        <input type="submit" value="Tìm" style="border-radius: 5px;border:1px solid black;"/>
                    </fieldset>
                </form>
            </div>
            <div class="total-items">
                
                  <span>Có tất cả <strong><?=$totalRecords?></strong> <?=$config_title?> trên <strong><?=$totalPages?></strong> trang</span>
            </div>
            <ul>
                <li class="listing-item-heading">
                    <div class="listing-prop listing-id">ID</div>
                    <div class="listing-prop listing-name">Tên khách hàng</div>
                    <div class="listing-prop listing-address">Địa chỉ</div>
                    <div class="listing-prop listing-phone">Điện thoại</div>
                    <div class="listing-prop listing-button">Đơn</div>    
                    <div class="listing-prop listing-time">Ngày tạo</div>
                    <div class="clear-both"></div>
                </li>
                <?php  while ($row = mysqli_fetch_array($orders)) { ?>
                <li>
                    <div class="listing-prop listing-id"><?=$row['id']?></div>
                    <div class="listing-prop listing-name"><?=$row['name']?></div>
                    <div class="listing-prop listing-address"><?=$row['address']?></div>
                    <div class="listing-prop listing-phone"><?=$row['phone']?></div>
                    <div class="listing-prop listing-button">
                        <a href="./order_printing.php?id=<?=$row['id']?>" target="_blank">In</a>&nbsp;|
                        <a href="./del_order.php?id=<?=$row['id']?>" onclick ="confirm('Bạn có chắc muốn xóa hóa đơn')">Xóa</a>
                    </div>
                    <div class="listing-prop listing-time"><?=date($row['created_time'])?></div>
                    <div class="clear-both"></div>
                </li>
                <?php  } ?>
            </ul>
            <?php 
              include '../pagination.php';
              ?>
            <div class="clear-both"></div>
        </div>
    </div>
    </body>
</html>