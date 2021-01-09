<?php
require_once('../../../config.php');
include_once('../../check_login.php');
if (!$dang_nhap) {
    $error_login = "error_login";
    $value = "Vui lòng đăng nhập!";
    setcookie($error_login, $value, time() + (60), "/");
    header('location: login.php');
}

$query = "SELECT id, ten_loai_san_pham FROM quan_li_loai_san_pham";

$rs = mysqli_query($conn, $query);

if (isset($_POST['them_san_pham'])) {

    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["anh_san_pham"]["name"]);

    
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $date = getdate();
    // Check if image file is a actual image or fake image
    $new_target_file = $target_dir . $date['mday'].$date['mon'].$date['year'].'-'.$date[0].'.'.$imageFileType;
    
    $check = getimagesize($_FILES["anh_san_pham"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["anh_san_pham"]["tmp_name"], $new_target_file)) {
            $loai_san_pham = $_POST['loai_san_pham'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia = $_POST['gia'];
            $so_luong = $_POST['so_luong'];
            $mo_ta = $_POST['mo_ta'];
            $tinh_trang = $_POST['tinh_trang'];

            $query = "INSERT INTO quan_li_san_pham(ten_san_pham, anh_san_pham, gia, so_luong, mo_ta, tinh_trang, id_loai_san_pham) VALUES ('$ten_san_pham', '$new_target_file', $gia, $so_luong, '$mo_ta', $tinh_trang, $loai_san_pham)";

            if (mysqli_query($conn, $query)) {
                echo "Them sản phẩm thành công";
            } else {
                echo "Có lỗi gòi";
            }
        } else {
          echo "Có lỗi gòi";
        }
      }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="add.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Loại sản phẩm: </td>
                <td>
                    <select name="loai_san_pham" id="loai_san_pham">
                        <?php while ($row = mysqli_fetch_array($rs)) { ?>
                            <option value="<?= $row['id'] ?>"><?= $row['ten_loai_san_pham'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="ten_san_pham" id="ten_san_pham"></td>
            </tr>
            <tr>
                <td>Ảnh sản phẩm</td>
                <td><input type="file" name="anh_san_pham" id="anh_san_pham"></td>
            </tr>
            <tr>
                <td>Giá</td>
                <td><input type="text" name="gia" id="gia"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" name="so_luong" id="so_luong"></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea cols="80" id="mo_ta" name="mo_ta" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td>
                    <select name="tinh_trang" id="tinh_trang">
                        <option value="1">Còn hàng</option>
                        <option value="0">Hết hàng</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="them_san_pham">Thêm Sản Phẩm</button></td>
            </tr>
            <tr>
                <td colspan="2"><a href="index.php">Xem sản phẩm</a></td>
            </tr>
        </table>



    </form>
    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('mo_ta', {
            height: 400,
            baseFloatZIndex: 10005
        });
    </script>
</body>

</html>