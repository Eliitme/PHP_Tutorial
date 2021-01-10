<?php 

session_start();
// session_destroy();
$id = $_GET['id'];

if (empty($_SESSION['gio_hang'])) {
    $_SESSION['gio_hang'] = [];
    $_SESSION['tong_san_pham'] = 0;
}

if (empty(['gio_hang'][$id])) {
    $_SESSION['gio_hang'][$id]['so_luong'] = 1;
    $_SESSION['gio_hang'][$id]['ten_san_pham'] = 'Ví dụ '. $id;
    
    $_SESSION['gio_hang'][$id]['gia'] = $id * 100;
    $_SESSION['tong_san_pham']++;
} else {
    $_SESSION['gio_hang'][$id]['so_luong']++;
    $_SESSION['tong_san_pham']++;
}


print_r(json_encode($_SESSION['gio_hang']));