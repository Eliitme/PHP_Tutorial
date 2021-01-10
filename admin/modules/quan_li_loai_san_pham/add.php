    <form action="index.php?c=loai_san_pham&a=process" method="post">
        <table class="table table-content">
            <tr>
                <td>Tên Loại Sản Phẩm</td>
                <td><input type="text" name="ten_loai_san_pham" id="ten_loai_san_pham"></td>
            </tr>
            <tr>
                <td>Loại Sản Phẩm: </td>
                <td>
                    <select name="is_phu_kien" id="is_phu_kien">
                        <option value="0">Chó/Mèo</option>
                        <option value="1">Phụ Kiện</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="them_loai" onclick="return checkAdd()" class="btn btn-outline-success">Thêm Loại</button></td>
            </tr>
            <tr>
                <td colspan="2"><a href="index.php?c=loai_san_pham&a=index">Xem danh sách loại sản phẩm</a></td>
            </tr>
        </table>
    </form>

    <script>
        function checkAdd() {
            var ten_loai_san_pham = document.getElementById('ten_loai_san_pham');
            var is_phu_kien = document.getElementById('is_phu_kien');

            if (is_phu_kien.value == '0') {
                var loai = 'Chó/Mèo';
            } else {
                var loai = "Phụ Kiên";
            }
            

            return confirm("Xác nhận thêm loại sản phẩm " + loai + ": " + ten_loai_san_pham.value);
        }
    </script>
