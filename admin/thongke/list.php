 <div class="banner">
        <h1>THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h1>
        <table>
            <tr>
                <th>LOẠI HÀNG</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ CAO NHẤT</th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
            </tr>
            <?php
            foreach ($thongke as $hanghoa){
                extract($hanghoa);
                echo '
                <tr>
                <td>'.$ten_loai.'</td>
                <td>'.$so_luong.'</td>
                <td>'.$gia_min.'</td>
                <td>'.$gia_max.'</td>
                <td>'.$gia_avg.'</td>
                </tr>
                ';
            }
            ?>
        </table>
        <button class="add"><a href="index.php?act=bieudo">Xem biểu đồ</a></button>
    </div>
</body>
</html>