<?php

require_once('../config.php');
require_once('check_login.php');

if (!$dang_nhap) {
    $error_login = "error_login";
    $value = "Vui lòng đăng nhập!";
    setcookie($error_login, $value, time() + (60), "/");
    header('location: login.php');
}

if (isset($_GET['c'])) {
    $controller = $_GET['c'];
    if (isset($_GET['a'])) {
        $action = $_GET['a'];
    } else {
        $action = 'index';
    }
} else {
    $controller = 'dashboard';
    $action = 'index';
}

ob_start();

switch ($controller) {
    case 'dashboard':
        switch ($action) {
            case 'index':
                require_once('dashboard.php');

                break;

            case 'logout':
                unset($_SESSION['admin_login']);
                header('location: index.php?c=dashboard&a=index');
                break;

            default:
                # code...
                break;
        }
        break;
    case 'loai_san_pham':
        switch ($action) {
            case 'index':
                require_once('modules/quan_li_loai_san_pham/index.php');
                break;

            case 'edit':
                require_once('modules/quan_li_loai_san_pham/edit.php');
                break;

            case 'add':
                require_once('modules/quan_li_loai_san_pham/add.php');
                break;

            case 'delete':
                require_once('modules/quan_li_loai_san_pham/process.php');
                break;

            case 'process':
                require_once('modules/quan_li_loai_san_pham/process.php');
                break;
            default:
                # code...
                break;
        }
        break;

    case 'san_pham':
        switch ($action) {
            case 'index':
                # code...
                require_once('modules/quan_li_san_pham/index.php');
                break;
            case 'add':
                require_once('modules/quan_li_san_pham/add.php');
                break;
            case 'process':
                require_once('modules/quan_li_san_pham/process.php');
                break;
            default:
                # code...
                break;
        }
        break;
    default:
        # code...
        break;
}

$content = ob_get_contents();
ob_get_clean();
require_once('layouts/application.php');
