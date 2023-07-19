<div class="banner">
            <h1>THÊM MỚI HÀNG HÓA</h1>
        </div>
        <form action="index.php?act=addhh" method="POST" enctype="multipart/form-data" name="forms" onsubmit="return validatehh()">
            Mã hàng hóa
            <br>
            <input type="text" name="ma_hh" disabled>
            <br>
            Tên hàng hóa
            <br>
            <input type="text" name="ten_hh">
            <br>
            <p id="loiten" class="loi"></p>
            Đơn giá
            <br>
            <input type="number" name="don_gia" min="0">
            <br>
            <p id="loidongia"class="loi"></p>
            Giảm giá
            <br>
            <input type="number" name="giam_gia" min="0">
            <br>
            <p id="loigiam"class="loi"></p>
            Hình
            <br>
            <input type="file" name="hinh" > 
            <br>
            <p id="loihinh"class="loi"></p>
            Mô tả
            <br>
            <textarea name="mo_ta" cols="30" rows="10"></textarea>
            <br>
            <p id="loimota"class="loi"></p>
            Số lượt xem
            <br>
            <input type="number" name="so_luot_xem" min="0">
            <br>
            <p id="loixem"class="loi"></p>
            Mã loại
            <br>
            <select name="ma_loai">
                <?php foreach ($listdm as $danhmuc) {
                    extract($danhmuc);
                    echo ' <option value="'.$ma_loai.'">'.$ten_loai.'</option>';
                } ?>
            </select><br>
             
            <input type="submit"  value="Thêm mới">

            <input type="reset" value="Nhập lại">

            <a href="index.php?act=listhh"><input type="button" value="Danh sách"></a>
            <?php
                if(isset($thongbao) && ($thongbao!="")) echo '<p id="tb">'.$thongbao.'</p>';
            ?>
        </form>
    </div>
</body>
</html>