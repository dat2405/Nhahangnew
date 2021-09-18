<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../images/logoD.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" >
    <title>Document</title>
   
        </style>
</head>
<body>

<?php
include 'header.php';
$config_name = "product";
$config_title = "món ăn";
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
    $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if(!empty($where)){
        $totalRecords = mysqli_query($con, "SELECT * FROM `product` where (".$where.")");
    }else{
        $totalRecords = mysqli_query($con, "SELECT * FROM `product`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if(!empty($where)){
        $products = mysqli_query($con, "SELECT * FROM `product` where (".$where.") ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else{
        $products = mysqli_query($con, "SELECT * FROM `product` ORDER BY `id` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>Danh sách <?=$config_title?></h1>
        <div class="listing-items">
            <div class="buttons">
                <a href="./edit_product.php">Thêm <?=$config_title?></a>
            </div>
            <div class="listing-search">
                <form id="<?=$config_name?>-search-form" action="<?=$config_name?>_listing.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm <?=$config_title?>:</legend>
                        ID: <input type="text" name="id" value="<?=!empty($id)?$id:""?>" style="border-radius: 5px;border:1px solid black;"/>
                        Tên <?=$config_title?>: <input type="text" name="name" value="<?=!empty($name)?$name:""?>" style="border-radius: 5px;border:1px solid black;" />
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
                    <div class="listing-prop listing-img">Ảnh</div>
                    <div class="listing-prop listing-name">Tên <?=$config_title?></div>
                    <div class="listing-prop listing-button">
                        Xóa
                    </div>
                    <div class="listing-prop listing-button">
                        Sửa
                    </div>
                    
                       
                    
                    <div class="listing-prop listing-time">Ngày tạo</div>
                    <div class="listing-prop listing-time">cập nhật</div>
                    <div class="clear-both"></div>
                </li>
                <?php
                while ($row = mysqli_fetch_array($products)) {
                    ?>
                    <li>
                        <div class="listing-prop listing-id"><?= $row['id'] ?></div>
                        <div class="listing-prop listing-img"><img src="../<?= $row['image'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>" /></div>
                        <div class="listing-prop listing-name"><?= $row['name'] ?></div>
                        <div class="listing-prop listing-button">
                            <a href="./del_product.php?id=<?= $row['id'] ?>">Xóa</a>
                        </div>
                        <div class="listing-prop listing-button">
                            <a href="./edit_product.php?id=<?= $row['id'] ?>">Sửa</a>
                        </div>
                        <div class="listing-prop listing-time"><?= date($row['created_time']) ?></div>
                        <div class="listing-prop listing-time"><?= date($row['last_updated']) ?></div>
                        <div class="clear-both"></div>
                    </li>
                <?php } ?>
            </ul>
            <?php
            include '../pagination.php';
            ?>
            <div class="clear-both"></div>
        </div>
    </div>
    </body>
</html>

