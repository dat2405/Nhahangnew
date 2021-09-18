<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="./images/logoD.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    input{
        border: 1px solid black;
        border-radius: 8px ;
    }
</style>
<body>
    


<?php
include 'header.php';
include '../function.php';
{
    ?>
    <div class="main-content">
        <h1><?= !empty($_GET['id']) ? ((!empty($_GET['task']) && $_GET['task'] == "copy") ? "Copy sản phẩm" : "Sửa sản phẩm") : "Thêm sản phẩm" ?></h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price']) && !empty($_POST['price'])) {
                    $galleryImages = array();
                    if (empty($_POST['name'])) {
                        $error = "Bạn phải nhập tên món";
                    }  elseif (empty($_POST['price'])) {
                        $error = "Bạn phải nhập giá món";
                    } elseif (!empty($_POST['price']) && is_numeric(str_replace('.', '', $_POST['price'])) == false) {
                        $error = "Giá nhập không hợp lệ";
                    }
                    if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
                        $uploadedFiles = $_FILES['image'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $image = $result['path'];
                        }
                    }
                    if (!isset($image) && !empty($_POST['image'])) {
                        $image = $_POST['image'];
                    }
                    if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['name'][0])) {
                        $uploadedFiles = $_FILES['gallery'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = $result['errors'];
                        } else {
                            $galleryImages = $result['uploaded_files'];
                        }
                    }
                    if (!empty($_POST['gallery_image'])) {
                        $galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
                    }
                    if (!isset($error)) {
                        if ($_GET['action'] == 'edit' && !empty($_GET['id'])) { //Cập nhật lại sản phẩm
                            $result = mysqli_query($con, "UPDATE `product` SET `name` = '" . $_POST['name'] . "',`image` =  '" . $image . "', `price` = " . str_replace('.', '', $_POST['price']) . ", `content` = '" . $_POST['content'] . "', `created_time` = " . time() . ", `last_updated` = " . time() . "  WHERE `product`.`id` = " . $_GET['id']);
                        } else { //Thêm sản phẩm
                            $result = mysqli_query($con, "INSERT INTO `product` (`id`, `name`, `image`, `price`, `content`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['name'] . "','" . $image . "', " . str_replace('.', '', $_POST['price']) . ", '" . $_POST['content'] . "', " . time(). ", " . time() . ");");
                        }
                        if (!$result) { //Nếu có lỗi xảy ra
                            $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                        } else { //Nếu thành công
                            if (!empty($galleryImages)) {
                                $product_id = ($_GET['action'] == 'edit' && !empty($_GET['id'])) ? $_GET['id'] : $con->insert_id;
                                $insertValues = "";
                                foreach ($galleryImages as $image) {
                                    if (empty($insertValues)) {
                                        $insertValues = "(NULL, " . $name . ", '" . $image . "', '" . $price . "', '" . $content . "', " . time() . ", " . time() . ")";
                                    } else {
                                        $insertValues .= ",(NULL, " . $name . ", '" . $image . "', '" . $price . "', '" . $content . "', " . time() . ", " . time() . ")";
                                    }
                                }
                                $result = mysqli_query($con, "INSERT INTO `product` (`id`, `name`, `image`,`price`,`content`, `created_time`, `last_updated`) VALUES " . $insertValues . ";");
                            }
                        }
                    }
                } else {
                    $error = "Bạn chưa nhập thông tin sản phẩm.";
                }
                ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
                    <a href = "product_listing.php">Quay lại danh sách sản phẩm</a>
                </div>
                <?php
            } else {
                if (!empty($_GET['id'])) {
                    $result = mysqli_query($con, "SELECT * FROM `product` WHERE `id` = " . $_GET['id']);
                    $product = $result->fetch_assoc();
                    $gallery = mysqli_query($con, "SELECT * FROM `image_library` WHERE `product_id` = " . $_GET['id']);
                    if (!empty($gallery) && !empty($gallery->num_rows)) {
                        while ($row = mysqli_fetch_array($gallery)) {
                            $product['gallery'][] = array(
                                'id' => $row['id'],
                                'path' => $row['path']
                            );
                        }
                    }
                }
                ?>
                <form id="editing-form" method="POST" action="<?= (!empty($product) && !isset($_GET['task'])) ? "?action=edit&id=" . $_GET['id'] : "?action=add" ?>"  enctype="multipart/form-data">
                   
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên sản phẩm: </label>
                        <input type="text" name="name" value="<?= (!empty($product) ? $product['name'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Giá sản phẩm: </label>
                        <input type="text" name="price" value="<?= (!empty($product) ? number_format($product['price'], 0, ",", ".") : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ảnh đại diện: </label>
                        <div class="right-wrap-field">
        <?php if (!empty($product['image'])) { ?>
                                <img src="../<?= $product['image'] ?>" /><br/>
                                <input type="hidden" name="image" value="<?= $product['image'] ?>" />
        <?php } ?>
                            <input type="file" name="image" />
                        </div>
                        <div class="clear-both"></div>
                    </div>                   
                    <div class="wrap-field">
                        <label>Nội dung: </label>
                        <textarea name="content" id="product-content"><?= (!empty($product) ? $product['content'] : "") ?></textarea>
                        <div class="clear-both"></div>
                    </div>
                    <button type="submit" style="width:60px;height:30px;">Lưu lại</button>          
                </form>
                <div class="clear-both"></div>
    <?php } ?>
        </div>
    </div>
    <?php } ?>
</body>
</html>