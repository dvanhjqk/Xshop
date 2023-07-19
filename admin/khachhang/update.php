
<?php
    if(is_array($kh)){
        extract($kh);
    }
    $hinhpath = "../upload/".$hinh_anh;
    if(is_file($hinhpath)){
     $hinh_anh = "<img src='".$hinhpath."' width='25%'>";
    } else {
     $hinh = "";
    }
?>
<div class="banner">
            <h1>CẬP NHẬT KHÁCH HÀNG</h1>
        </div>
        <form action="index.php?act=updatekh" method="POST" enctype="multipart/form-data">

            <label for="">MÃ KHÁCH HÀNG</label><br>
            <input type="text" name="ma_kh" value="<?=$ma_kh?>">

            HỌ VÀ TÊN<br>
            <input type="text" name="ho_ten" value="<?=$ho_ten?>">

            <label for="">MẬT KHẨU</label><br>
            <input type="text" name="mat_khau" value="<?=$mat_khau?>">

            <label for="">XÁC NHẬN MẬT KHẨU</label><br>
            <input type="text" >

            <label for="">ĐỊA CHỈ EMAIL</label><br>
            <input type="email" name="email" required value="<?=$email?>"><br>

            <label for="">HÌNH ẢNH</label><br>
            <input type="file" name="hinh_anh"><br><img src="<?=$hinhpath?>"><br>

            <label for="">KÍCH HOẠT</label><br>
            <input type="text" name="kich_hoat" value="<?=$kich_hoat?>">

            <label for="">VAI TRÒ</label>
           <input type="text" name="vai_tro" value="<?=$vai_tro?>">
            <input type="hidden" name="ma_hh" value="<?=$ma_hh?>">
            <br>
            <input type="submit"  value="Cập nhật" name="update">

            <a href="index.php?act=dskh"><input type="button" value="Danh sách"></a>
        </form>
    </div>
</body>
</html>