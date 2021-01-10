<?php

$a = $_GET['a'] ?? '';

if (isset($_POST['sua_loai'])) {
    $id = $_POST['id'];
    $ten_loai_san_pham = $_POST['ten_loai_san_pham'];
    $is_phu_kien = $_POST['is_phu_kien'];

    $query = "UPDATE quan_li_loai_san_pham SET ten_loai_san_pham = '$ten_loai_san_pham', is_phu_kien = $is_phu_kien WHERE id = $id";

    if (!mysqli_query($conn, $query)) {
        echo "<script>alert('Đã có lỗi xảy ra, vui lòng thử lại'); history.go(-1);</script>";
    } else {
        echo "<script>alert('Sửa sản phẩm thành công'); window.location.replace('index.php?c=loai_san_pham&a=index');</script>";
    }
}

if (isset($_POST['them_loai'])) {
    $ten_loai_san_pham = $_POST['ten_loai_san_pham'];
    $is_phu_kien = $_POST['is_phu_kien'];

    $query = "INSERT INTO quan_li_loai_san_pham(ten_loai_san_pham, is_phu_kien) VALUES ('$ten_loai_san_pham', $is_phu_kien)";

    if (!mysqli_query($conn, $query)) {
        echo "<script>alert('Đã có lỗi xảy ra, vui lòng thử lại'); history.go(-1);</script>";
    } else {
        echo "<script>alert('Thêm loại sản phẩm thành công'); window.location.replace('index.php?c=loai_san_pham&a=index');</script>";
    }
}

if ($a == 'delete') {
    $id = $_GET['id'];

    $query = "DELETE FROM quan_li_loai_san_pham WHERE id = $id";

    if (!mysqli_query($conn, $query)) {
        echo "<script>alert('Đã có lỗi xảy ra, vui lòng kiểm tra lại'); history.go(-1);</script>";
    } else {
        echo "<script>alert('Xóa loại sản phẩm thành công'); window.location.replace('index.php?c=loai_san_pham&a=index');</script>";
    }
}