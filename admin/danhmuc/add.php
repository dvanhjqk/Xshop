<div class="banner">
            <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
        </div>
        <form action="index.php?act=adddm" method="POST" name="forms" onsubmit="return validateloai()">
            Mã loại
            <br>
            <input type="text" name="ma_loai" disabled>
            <br>
            Tên loại
            <br>
            <input type="text" name="ten_loai">
            <p class="loi" id="loitenloai"></p>
            <br>
             
            <input type="submit" name="btn-add" value="Thêm mới">

            <input type="reset" name="btn-retype" value="Nhập lại">

            <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
            <?php
                if(isset($thongbao) && ($thongbao!="")) echo '<p id="tb">'.$thongbao.'</p>';
            ?>
        </form>
    </div>
</body>
</html>