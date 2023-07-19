<main>
<div class="artical">

    <div class="box-title">
       Đổi mật khẩu
    </div>
    <div class="box-content">
       <form action="index.php?act=doimk" method="POST">
            Tên đăng nhập
            <br>
            <input type="text" name="ho_ten" required>
            <br>
           Mật khẩu cũ<br>
           <input type="text" name="mat_khau"><br>
           Mật khẩu mới<br>
           <input type="text" name="mat_khau_moi"><br>
            <input type="submit" value="Gửi" name="gui">
            <input type="reset" value="Nhập lại">
       </form>
       <h2 class="thongbao">
       <?php
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
       ?>
       </h2>
    </div>
</div>
<div class="aside">
    <?php include "./view/aside.php";?>
</div>
<div class="clear"></div>
</main>