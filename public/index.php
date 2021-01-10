<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <span><a href="view_cart.php">Giỏ hàng: <?= isset($_SESSION['tong_san_pham']) ? $_SESSION['tong_san_pham'] : 0 ?></a></span>
    <br>

    <a href="add_cart.php?id=1">Thêm vào giỏ hàng</a><br>
    <a href="add_cart.php?id=2">Thêm vào giỏ hàng</a><br>
    <a href="add_cart.php?id=3">Thêm vào giỏ hàng</a><br>
    <a href="add_cart.php?id=4">Thêm vào giỏ hàng</a><br>
</body>
</html>