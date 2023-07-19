<div class="banner">
    <h1>QUẢN LÝ KHÁCH HÀNG</h1>
    <form action="../indexnv.php?act=addnv" method="post" name="forms" onsubmit="return validatekh()" enctype="multipart/form-data">
        <label for="">MÃ NHÂN VIÊN</label><br>
        <input type="text" disabled>
        <label for="">TÊN ĐĂNG NHẬP</label><br>
        <input type="text" name="ten_dang_nhap">
        <p id="loiten" class="loi"></p>
        <label for="">HỌ VÀ TÊN</label><br>
        <input type="text" name="ho_ten">
        <p id="loiten" class="loi"></p>
        <label for="">MẬT KHẨU</label><br>
        <input type="text" name="mat_khau">
        <p id="loimk" class="loi"></p>
        <label for="">XÁC NHẬN MẬT KHẨU</label><br>
        <input type="text" name="xac_nhan" >
        <p id="loixn" class="loi"></p>
        <label for="">ĐỊA CHỈ EMAIL</label><br>
        <input type="text" name="email" >
        <p id="loiemail" class="loi"></p>
        <label for="">HÌNH ẢNH</label><br>
        <input type="file" name="hinh_anh"><br>
        <p id="loihinhanh" class="loi"></p>
        <p id="loikh" class="loi"></p>
        <label for="">VAI TRÒ</label>
        <div class="vt">
            <input type="radio" name="vai_tro" value="0">Nhân viên
            <input type="radio" name="vai_tro" value="1">Nhân viên quản trị
        </div>
        <p id="loivt" class="loi"></p>
        <button type="submit">Thêm mới</button>
        <button type="reset">Nhập lại</button>
        <button><a href="../indexnv.php?act=dsnv">Danh sách</a></button>
        <?php
        if(isset($thongbao) && ($thongbao!="")) echo '<p id="tb">'.$thongbao.'</p>';
        ?>
    </form>
</div>
</body>

</html>
