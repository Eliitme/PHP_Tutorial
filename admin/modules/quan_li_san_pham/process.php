<?php 

if (isset($_POST['them_san_pham'])) {

    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["anh_san_pham"]["name"]);


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $date = getdate();
    // Check if image file is a actual image or fake image
    $new_target_file = $target_dir . $date['mday'] . $date['mon'] . $date['year'] . '-' . $date[0] . '.' . $imageFileType;

    $check = getimagesize($_FILES["anh_san_pham"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["anh_san_pham"]["tmp_name"], $new_target_file)) {
            $loai_san_pham = $_POST['loai_san_pham'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia = $_POST['gia'];
            $so_luong = $_POST['so_luong'];
            $mo_ta = $_POST['mo_ta'];
            $tinh_trang = $_POST['tinh_trang'];

            $query = "INSERT INTO quan_li_san_pham(ten_san_pham, anh_san_pham, gia, so_luong, mo_ta, tinh_trang, id_loai_san_pham) VALUES ('$ten_san_pham', '$new_target_file', $gia, $so_luong, '$mo_ta', $tinh_trang, $loai_san_pham)";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Thêm sản phẩm thành công!'); window.location.replace('index.php?c=san_pham&a=index')</script>";
            } else {
                echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại'); history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại'); history.go(-1);</script>";
        }
    }
}
