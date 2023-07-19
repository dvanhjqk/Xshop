<div class="artical">
    <form action="index.php?act=thanh_cong" method="post" name="forms" enctype="multipart/form-data">
        <div class="box-title">
            THÔNG TIN NHẬN HÀNG
        </div>
        <div class="box-content">
            <label for="">Họ và Tên</label><br>
            <input type="text" name="ho_ten">
            <label for="">Địa chỉ email</label><br>
            <input type="text" name="email">
            <label>Địa chỉ nhận hàng</label><br>
            <input type="text" name="dia_chi">
            <label>Điện thoại</label><br>
            <input type="text" name="sdt">
        </div>
        <div class="box-title">PHƯƠNG THỨC THANH TOÁN</div>
        <table>
            <tr>
                <td><input type="radio" name="pttt" checked>Trả tiền khi nhận hàng</td>
                <td><input type="radio" name="pttt">Chuyển khoản ngân hàng</td>
                <td><input type="radio" name="pttt">Thanh toán online</td>

            </tr>
        </table>
        <div class="box-title">THÔNG TIN HÀNG HÓA</div>
        <table class="cart">
            <tr>
                <th>Hình</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            $tong = 0;
            $i = 0;
            global $img_path;
            if (isset($_SESSION['cart']) && isset($_GET['idcart'])) {
                $id = $_GET['idcart'];
                $img = $_SESSION['cart'][$id][2];
                $tien = $_SESSION['cart'][$id][3] * $_SESSION['cart'][$id][4];
                $tong += $tien;
                $xoasp_td = '<td><a href = "index.php?act=delcart&idcart=' . $i . '"><input type = "button" value = "Xoá"></a></td>';
                $dat_hang = '<td><a href = "index.php?act=dat_hang&idcart=' . $i . '"><input type = "button" value = "Đặt hàng"></a></td>';
                echo '
        <tr>
                           <td><img src = "' . $img . '" alt = "" height = "150px" width="100%"></td>
                            <td id="hi">' . $_SESSION['cart'][$id][1] . '</td>
                            <td>' . $_SESSION['cart'][$id][3] . '</td>
                            <td>' . $_SESSION['cart'][$id][4] . '</td>
                            <td>' . $tien . '</td>
                            <input type="hidden" value="'.$id.'" name="idcart">
                            
                            </tr>';

            } else {
                foreach ($_SESSION['cart'] as $cart) {
                    $img = $cart[2];
                    $tien = $cart[3] * $cart[4];
                    $tong += $tien;
                    $xoasp_td = '<td><a href = "index.php?act=delcart&idcart=' . $i . '"><input type = "button" value = "Xoá"></a></td>';
                    $dat_hang = '<td><a href = "index.php?act=dat_hang&idcart=' . $i . '"><input type = "button" value = "Đặt hàng"></a></td>';
                    echo '
        <tr>
                           <td><img src = "' . $img . '" alt = "" height = "150px" width="100%"></td>
                            <td id="hu">' . $cart[1] . '</td>
                            <td>' . $cart[3] . '</td>
                            <td>' . $cart[4] . '</td>
                            <td>' . $tien . '</td>
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
        <input type="submit" value="Đặt hàng">
        <input type="reset" value="Nhập lại">
    </form>
</div>
<div class="aside">
    <?php include "./view/aside.php"; ?>
</div>
<div class="clear"></div>

