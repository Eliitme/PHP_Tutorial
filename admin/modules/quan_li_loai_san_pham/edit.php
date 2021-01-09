<?php
require_once('../../../config.php');
include_once('../../check_login.php');
if (!$dang_nhap) {
    $error_login = "error_login";
    $value = "Vui lòng đăng nhập!";
    setcookie($error_login, $value, time() + (60), "/");
    header('location: login.php');
}

if (isset($_POST['sua_loai'])) {
    $id = $_POST['id'];
    $ten_loai_san_pham = $_POST['ten_loai_san_pham'];
    $is_phu_kien = $_POST['is_phu_kien'];

    $query = "UPDATE quan_li_loai_san_pham SET ten_loai_san_pham = '$ten_loai_san_pham', is_phu_kien = $is_phu_kien WHERE id = $id";

    if (!mysqli_query($conn, $query)) {
        echo "Có lỗi gòi";
    } else {
        echo "Sửa loại sản phẩm thành công";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT id, ten_loai_san_pham, is_phu_kien FROM quan_li_loai_san_pham WHERE id = $id LIMIT 1";

    $rs = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($rs);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lí Loại Sản Phẩm - Sửa</title>
</head>

<body>
    <form action="edit.php?id=<?= $id ?>" method="post">
        <table>
            <tr>
                <td>ID</td>
                <td><input type="hidden" name="id" id="" value="<?= $id ?>"><?= $id ?></td>
            </tr>
            <tr>
                <td>Tên Loại Sản Phẩm</td>
                <td><input type="text" name="ten_loai_san_pham" id="" value="<?= $row['ten_loai_san_pham'] ?>"></td>
            </tr>
            <tr>
                <td>Loại Sản Phẩm: </td>
                <td>
                    <select name="is_phu_kien" id="">
                        <option value="0">Chó/Mèo</option>
                        <option value="1">Phụ Kiện</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="sua_loai">Sửa Loại</button></td>
            </tr>
            <tr>
                <td colspan="2"><a href="index.php">Xem danh sách loại sản phẩm</a></td>
            </tr>
        </table>
    </form>
</body>

</html>