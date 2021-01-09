<?php
require_once('../../../config.php');
include_once('../../check_login.php');
if (!$dang_nhap) {
    $error_login = "error_login";
    $value = "Vui lòng đăng nhập!";
    setcookie($error_login, $value, time() + (60), "/");
    header('location: login.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM quan_li_loai_san_pham WHERE id = $id";

    if (!mysqli_query($conn, $query)) {
        echo "Có lỗi gòi";
    } else {
        header('location: index.php');
    }
}