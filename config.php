<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopthucung";

$salt = '$1$hHXfCc0W$2xD/5qYtzUc3Mo98lX82S1';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Lỗi kết nối CSDL";
    exit;
} 