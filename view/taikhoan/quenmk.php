<main>
<div class="artical">

    <div class="box-title">
       Quên mật khẩu
    </div>
    <div class="box-content">
       <form action="index.php?act=quenmk" method="POST" name="forms" onsubmit="return validatequenmk()">
            Email
            <br>
            <input type="text" name="email">
           <p id="loiemail" class="loi"></p>
           Tên đăng nhâp
           <br>
           <input type="text" name="ho_ten">
           <p id="loiten" class="loi"></p>
            <br>
            <input type="submit" value="Gửi">
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