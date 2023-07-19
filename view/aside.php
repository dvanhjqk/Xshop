<div class="box">
    <div class="box-title">
        TÀI KHOẢN
    </div>
    <div class="box-content form-account">
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user']);
            $target_dir = "./upload/";
            $hinh_anh = $target_dir . $hinh_anh;
            ?>
            <div class="mt">
                Xin chào
                <?= $ho_ten ?>
                <img width="150px" src="<?= $hinh_anh ?>">
            </div>
            <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
            <li><a href="index.php?act=doimk">Đổi mật khẩu</a></li>
            <?php if ($vai_tro == 1 && isset($ten_dang_nhap)) { ?>
                <li><a href="admin/index.php">Đăng nhập admin</a></li>
            <?php } else if ($vai_tro == 0 && isset($ten_dang_nhap)) { ?>
                <li><a href="admin/index.php">Đăng nhập nhân viên</a></li>
            <?php } else { ?>
                <li><a href="index.php?act=viewcart">Giỏ hàng của tôi</a></li>
                <li><a href="index.php?act=updatetk">Cập nhật tài khoản</a></li>
            <?php } ?>
            <li><a href="index.php?act=logout">Đăng xuất</a></li>
            <?php
        } else {
            ?>
            <form action="index.php?act=dangnhap" method="POST" name="forms" onsubmit="return validatedn()">
                Tên đăng nhập <br>
                <input type="text" name="ho_ten">
                <br>
                <p class="loi" id="loihoten"></p>
                <div class="mt">
                    Mật khẩu
                </div>
                <input type="text" name="mat_khau">
                <br>
                <div class="mt">
                    <input type="checkbox"> Ghi nhớ tài khoản?<br>
                </div>
                <input type="submit" value="Đăng nhập" name="dangnhap">
            </form>
            <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
            <li><a href="index.php?act=dangki">Đăng ký thành viên</a></li>
        <?php } ?>
    </div>
</div>
<div class="box">
    <div class="box-title">
        DANH MỤC
    </div>
    <div class="box-content2 vmenu">
        <ul>
            <?php
            foreach ($loaddm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=sanpham&ma_loai=" . $ma_loai;
                echo '<li><a href="' . $linkdm . '">' . $ten_loai . '</a></li>';
            }
            ?>
        </ul>
    </div>
    <div class="box-footer">
        <form action="index.php?act=sanpham" method="POST">
            <input type="text" name="keyw">
            <input type="submit" value="Tìm kiếm" name="timkiem">
        </form>
    </div>
</div>
<div class="box">
    <div class="box-title">
        TOP 10 YÊU THÍCH
    </div>
    <div class="box-content">
        <?php
        foreach ($top10 as $hh) {
            extract($hh);
            $linksp = "index.php?act=sanphamct&idsp=" . $ma_hh;
            $img = $img_path . $hinh;
            echo ' <div class="row-content">
                                <img src="' . $img . '" alt="">
                                <a href="' . $linksp . '">' . $ten_hh . '</a>
                            </div>';
        }
        ?>
    </div>
</div>
        