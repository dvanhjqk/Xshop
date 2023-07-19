
    <div class="banner">
        <h1>QUẢN LÝ KHÁCH HÀNG</h1>
        <table border="0">
            <tr>
                <th style="width: 50px;"></th>
                <th>MÃ KH</th>
                <th>HỌ VÀ TÊN</th>
                <th>ĐỊA CHỈ EMAIL</th>
                <th>HÌNH ẢNH</th>
                <th>KÍCH HOẠT</th>
                <th>VAI TRÒ</th>
                <th colspan="2"></th>
            </tr>
            <?php
            foreach ($listkh as $hanghoa) {
                extract($hanghoa);
                $suakh = "index.php?act=suakh&ma_kh=" . $ma_kh;
                $xoakh = "index.php?act=xoakh&ma_kh=" . $ma_kh;
                $hinhpath = "../upload/" . $hinh_anh;
                if (is_file($hinhpath)) {
                    $hinh_anh = "<img  src='" . $hinhpath . "' width='25%'>";
                } else {
                    $hinh_anh = "";
                }
                echo '
            <tr>
                <td><input type="checkbox"></td>
                <td>' . $ma_kh . '</td>
                <td>' . $ho_ten . '</td>
                <td>' . $email . '</td>
                <td id ="avatar">' . $hinh_anh . '</td>
                <td>' .$kich_hoat . '</td>
                <td>' . $vai_tro . '</td>
                <td><a href="' . $suakh . '"><input type="button" value="Sửa"></a>
                <a href="' . $xoakh . '"> <input type="button" value="Xóa"></a>
            </tr>
            ';
            }
            ?>
        </table>

        <input type="button" id="check-all" value="Chọn tất cả">
        <input type="button" id="clear-all" value="Bỏ chọn tất cả">
        <button class="add">Xóa các mục đã chọn</button>
        <button class="add"><a href="index.php?act=addkh2">Nhập thêm</a></button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#check-all").click(function () {
                $(":checkbox").prop("checked", true);
            });
            $("#clear-all").click(function () {
                $(":checkbox").prop("checked", false);
            });
            $("#btn-delete").click(function () {
                if ($(":checked").length === 0) {
                    alert("Vui lòng chọn ít nhất một mục!");
                    return false;
                }
            });
        });

    </script>
</body>
</html>