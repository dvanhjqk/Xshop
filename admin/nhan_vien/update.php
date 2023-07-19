

<?php
if(is_array($nv)){
    extract($nv);
}
$hinhpath = "../upload/".$hinh_anh;
if(is_file($hinhpath)){
    $hinh_anh = "<img src='".$hinhpath."' width='25%'>";
} else {
    $hinh = "";
}
?>
<div class="banner">
    <h1>CẬP NHẬT NHÂN VIÊN</h1>
</div>
<form action="../indexnv.php?act=updatenv" method="POST" enctype="multipart/form-data">

    <label for="">MÃ KHÁCH HÀNG</label><br>
    <input type="text" name="ma_nv" value="<?=$ma_nv?>">

    HỌ VÀ TÊN<br>
    <input type="text" name="ho_ten" value="<?=$ho_ten?>">
    <label for="">TÊN ĐĂNG NHẬP</label><br>
    <input type="text" name="ten_dang_nhap" value="<?=$ten_dang_nhap?>">
    <label for="">MẬT KHẨU</label><br>
    <input type="text" name="mat_khau" value="<?=$mat_khau?>">

    <label for="">XÁC NHẬN MẬT KHẨU</label><br>
    <input type="text" >

    <label for="">ĐỊA CHỈ EMAIL</label><br>
    <input type="email" name="email" required value="<?=$email?>"><br>

    <label for="">HÌNH ẢNH</label><br>
    <input type="file" name="hinh_anh"><br><img src="<?=$hinhpath?>"><br>

    <label for="">VAI TRÒ</label>
    <input type="text" name="vai_tro" value="<?=$vai_tro?>">
    <input type="hidden" name="ma_hh" value="<?=$ma_hh?>">
    <br>
    <input type="submit"  value="Cập nhật" name="update">

    <a href="../indexnv.php?act=dskh"><input type="button" value="Danh sách"></a>
</form>
</div>
</body>
</html>