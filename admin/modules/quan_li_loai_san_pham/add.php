<?php
require_once('../../../config.php');
include_once('../../check_login.php');
if (!$dang_nhap) {
    $error_login = "error_login";
    $value = "Vui lòng đăng nhập!";
    setcookie($error_login, $value, time() + (60), "/");
    header('location: login.php');
}

if (isset($_POST['them_loai'])) {
    $ten_loai_san_pham = $_POST['ten_loai_san_pham'];
    $is_phu_kien = $_POST['is_phu_kien'];

    $query = "INSERT INTO quan_li_loai_san_pham(ten_loai_san_pham, is_phu_kien) VALUES ('$ten_loai_san_pham', $is_phu_kien)";

    if (!mysqli_query($conn, $query)) {
        echo "Có lỗi gòi";
    } else {
        echo "Thêm loại sản phẩm thành công";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lí Loại Sản Phẩm - Thêm</title>
</head>

<body>
    <form action="add.php" method="post">
        <table>
            <tr>
                <td>Tên Loại Sản Phẩm</td>
                <td><input type="text" name="ten_loai_san_pham" id="ten_loai_san_pham"></td>
            </tr>
            <tr>
                <td>Loại Sản Phẩm: </td>
                <td>
                    <select name="is_phu_kien" id="is_phu_kien">
                        <option value="0">Chó/Mèo</option>
                        <option value="1">Phụ Kiện</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="them_loai" onclick="return checkAdd()">Thêm Loại</button></td>
            </tr>
            <tr>
                <td colspan="2"><a href="index.php">Xem danh sách loại sản phẩm</a></td>
            </tr>
        </table>
    </form>

    <script>
        function checkAdd() {
            var ten_loai_san_pham = document.getElementById('ten_loai_san_pham');
            var is_phu_kien = document.getElementById('is_phu_kien');

            if (is_phu_kien.value == '0') {
                var loai = 'Chó/Mèo';
            } else {
                var loai = "Phụ Kiên";
            }
            

            return confirm("Xác nhận thêm loại sản phẩm " + loai + ": " + ten_loai_san_pham.value);
        }
    </script>
</body>

</html>