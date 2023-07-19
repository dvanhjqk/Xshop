<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<div class="banner">
            <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
        </div>
        <form action="index.php?act=updatedm" method="POST">
            Mã loại
            <br>
            <input type="text" name="ma_loai" disabled>
            <br>
            Tên loại
            <br>
            <input type="text" name="ten_loai" value="<?php if(isset($ten_loai) && ($ten_loai!="")) echo $ten_loai;?>">
            <br>
            <input type="hidden" name="ma_loai" value="<?php if(isset($ma_loai) && ($ma_loai>0)) echo $ma_loai;?>">
            <input type="submit" value="Cập nhật" name="update">

            <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
        </form>
    </div>
</body>
</html>