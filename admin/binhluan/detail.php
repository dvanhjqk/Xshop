
    <div class="banner">
        <h1>
            CHI TIẾT BÌNH LUẬN
        </h1>
        <h1>HÀNG HÓA <?php echo $items[0]['ten_hh'] ?> </h1>
        <table border="0">
            <tr>
                <th></th>
                <th>NỘI DUNG</th>
                <th>NGÀY BL</th>
                <th>NGƯỜI BL</th>
                <th></th>
            </tr>
            <?php
            foreach ($items as $item) {
                extract($item);
                $xoa = "index.php?act=xoabl&ma_bl=".$ma_bl."&ma_hh=".$ma_hh;
                echo '
            <tr>
                <td><input type="checkbox"></td>
                <td>'.$noi_dung.'</td>
                <td>'.$ngay_bl.'</td>
                <td>'.$ho_ten.'</td>
                <td><button class="delete"><a href="'.$xoa.'">Xóa</a></button></td>
            </tr>
            ';
            }
            ?>
        </table>
        <button class="add">Chọn tất cả</button>
        <button class="add">Bỏ chọn tất cả</button>
        <button class="add">Xóa các mục đã chọn</button>
    </div>
</body>
</html>
