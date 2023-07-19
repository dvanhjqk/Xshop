<div class="artical">
    <div class="box-title">Giỏ Hàng</div>
    <table class="cart">
        <tr>
            <th>Hình</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th colspan="2">Thao tác</th>
        </tr>
        <?php
        $tong = 0;
        $i = 0;
        global $img_path;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cart) {
                $img = $cart[2];
                $tien = $cart[3] * $cart[4];
                $tong += $tien;
                $xoasp_td = '<td><a href = "index.php?act=delcart&idcart=' . $i . '"><input type = "button" value = "Xoá"></a></td>';
                $dat_hang = '<td><a href = "index.php?act=dat_hang&idcart=' . $i . '"><input type = "button" value = "Đặt hàng"></a></td>';
                echo '
        <tr>
                           <td><img src = "' . $img . '" alt = "" height = "150px" width="100%"></td>
                            <td>' . $cart[1] . '</td>
                            <td>' . $cart[3] . '</td>
                            <td>' . $cart[4] . '</td>
                            <td>' . $tien . '</td>
                            ' . $xoasp_td . '
                            ' . $dat_hang . '
                            </tr>';
                $i += 1;

            }
        }
        echo '<tr>
               <td colspan="4" style="text-align: left">Tổng</td>
               <td>' . $tong . '</td>
              </tr>';
        ?>
    </table>

    <a href="index.php?act=dat_hang">
            <input type="submit" value="Đồng ý đặt hàng">
        </a>
        <a href="index.php?act=delcart"> <input type="submit" value="Xóa giỏ hàng"></a>
</div>
<div class="aside">
    <?php include "./view/aside.php"; ?>
</div>
<div class="clear"></div>