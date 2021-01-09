<?php
    include_once('check_login.php');
    require_once('../config.php');

    if ($dang_nhap) {
        header('location: index.php');
    }

    if (isset($_POST['dang_nhap'])) {
        $ten_dang_nhap = $_POST['ten_dang_nhap'];
        $mat_khau = $_POST['mat_khau'];

        $query = "SELECT id, ten_dang_nhap, mat_khau, level FROM admin WHERE ten_dang_nhap = '$ten_dang_nhap' LIMIT 1";

        $rs = mysqli_query($conn, $query);

        if (!$rs) {
            // Hiển thị ra thông báo không tồn tại tài khoản
            
        }

        $row = mysqli_fetch_array($rs);

        if (!hash_equals($row['mat_khau'], crypt($mat_khau, $row['mat_khau']))) {
            // Hiển thị ra thông báo sai mật khẩu
            
        } else {
            $_SESSION['admin_login']['id'] = $row['id'];
            $_SESSION['admin_login']['ten_dang_nhap'] = $row['ten_dang_nhap'];
            $_SESSION['admin_login']['level'] = $row['level'];

            header('location: index.php');
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
    <?= isset($_COOKIE['error_login']) ? $_COOKIE['error_login'] : '' ?>
    <form action="login.php" method="post">
        Ten dang nhap: 
        <input type="text" name="ten_dang_nhap" id="">
        Mat khau: 
        <input type="password" name="mat_khau" id="">

        <button type="submit" name="dang_nhap">Đăng Nhập</button>
    </form>
</body>
</html>