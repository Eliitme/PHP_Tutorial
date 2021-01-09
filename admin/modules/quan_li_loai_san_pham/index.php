<?php
require_once('../../../config.php');
include_once('../../check_login.php');
if (!$dang_nhap) {
    $error_login = "error_login";
    $value = "Vui lòng đăng nhập!";
    setcookie($error_login, $value, time() + (60), "/");
    header('location: login.php');
}

$query = "SELECT id, ten_loai_san_pham, is_phu_kien FROM quan_li_loai_san_pham";

$rs = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lí Loại Sản Phẩm</title>
</head>

<body>
    <table>
        <tr>
            <td>ID</td>
            <td>Tên Loại Sản Phẩm</td>
            <td>Loại Sản Phẩm</td>
            <td>Hành Động</td>
        </tr>
        <?php if (!mysqli_num_rows($rs)) {
            echo "<tr><td colspan='3'>Chưa có loại sản phẩm nào</td></tr>";
        } else {
            while ($row = mysqli_fetch_array($rs)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['ten_loai_san_pham'] ?></td>
                    <td><?= $row['is_phu_kien'] ? 'Phụ Kiện' : 'Chó/Mèo' ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>">Sửa</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
                    </td>
                </tr>
        <?php }
        } ?>
        <tr>
            <td colspan="3"><a href="add.php">Thêm loại sản phẩm</a></td>
        </tr>
    </table>
</body>

</html>