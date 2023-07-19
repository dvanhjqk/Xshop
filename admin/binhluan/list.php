
    <div class="banner">
        <h1>TỔNG HỢP BÌNH LUẬN</h1>
        <table border="0">
            <tr>
                <th>HÀNG HÓA</th>
                <th>SỐ BL</th>
                <th>MỚI NHẤT</th>
                <th>CŨ NHẤT</th>
                <th></th>
            </tr>
            <?php
                foreach ($listbl as $bl){
                extract($bl);
                $detail = "index.php?act=ctbl&ma_hh=".$ma_hh;
                echo '
                <tr>
                <td>'.$ten_hh.'</td>
                <td>'.$so_luong.'</td>
                <td>'.$cu_nhat.'</td>
                <td>'.$moi_nhat.'</td>
                <td><button class="details"><a href="'.$detail.'">Chi tiết</a></button></td>
                </tr>
                ';

                }
            ?>
        </table>

    </div>
</body>
</html>