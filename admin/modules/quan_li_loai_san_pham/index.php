<?php
$query = "SELECT id, ten_loai_san_pham, is_phu_kien FROM quan_li_loai_san_pham";

$rs = mysqli_query($conn, $query);

?>

<table class="table table-striped">
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
                    <a href="index.php?c=loai_san_pham&a=edit&id=<?= $row['id'] ?>" class="btn btn-primary">Sửa</a>
                    <a href="index.php?c=loai_san_pham&a=delete&id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
                </td>
            </tr>
    <?php }
    } ?>
    <tr>
        <td colspan="4"><a href="index.php?c=loai_san_pham&a=add">Thêm loại sản phẩm</a></td>
    </tr>
</table>
