<main>
    <div class="artical">

        <div class="box-title">
            ĐĂNG KÝ THÀNH VIÊN
        </div>
        <div class="box-content">
            <form action="index.php?act=dangki" method="post" name="forms" onsubmit="return validatekh()"
                  enctype="multipart/form-data">
                <label for="">HỌ VÀ TÊN</label><br>
                <input type="text" name="ho_ten">
                <p id="loiten" class="loi"></p>
                <label for="">MẬT KHẨU</label><br>
                <input type="text" name="mat_khau">
                <p id="loimk" class="loi"></p>
                <label for="">XÁC NHẬN MẬT KHẨU</label><br>
                <input type="text" name="xac_nhan">
                <p id="loixn" class="loi"></p>
                <label for="">ĐỊA CHỈ EMAIL</label><br>
                <input type="text" name="email">
                <p id="loiemail" class="loi"></p>
                <label for="">HÌNH ẢNH</label><br>
                <?php
                if (isset($error) && ($error!= "")) {
                    echo $error;
                }
                ?>
                <input type="file" name="hinh_anh"><br>
                <p id="loihinhanh" class="loi"></p>
                <label for="">KÍCH HOẠT</label><br>
                <div class="vt">
                    <input type="radio" name="kich_hoat" value="Chưa kích hoạt">Chưa kích hoạt
                    <input type="radio" name="kich_hoat" value="Đã kích hoạt"> Đã kích hoạt <br>
                </div>
                <p id="loikh" class="loi"></p>
                <input value="1" name="vai_tro" type="hidden">
                <p id="loivt" class="loi"></p>
                <input type="submit" value="Đăng ký">
                <input type="reset" value="Nhập lại">
            </form>
            <h2 class="thongbao">
                <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
                ?>
            </h2>
        </div>
    </div>
    <script>
        function thongbaoloi(element, msg) {
            document.getElementById(element).innerHTML = msg;
        }
        function validatekh() {
            var ho_ten = document.forms.ho_ten.value;
            var mat_khau = document.forms.mat_khau.value;
            var xac_nhan = document.forms.xac_nhan.value;
            var email = document.forms.email.value;
            var hinh_anh = document.forms.hinh_anh.value;
            let kh = document.forms.kich_hoat.value;
            let vt = document.forms.vai_tro.value;
            var ok = true;
            if (ho_ten == "") {
                thongbaoloi("loiten", "Không được để trống");
                ok = false;
            } else {
                thongbaoloi("loiten", "");
            }
            if (mat_khau == "") {
                thongbaoloi("loimk", "Không được để trống");
                ok = false;
            } else {
                thongbaoloi("loimk", "");
            }
            if (xac_nhan != mat_khau) {
                thongbaoloi("loixn", "Mật khẩu không trùng khớp");
                ok = false;
            } else {
                thongbaoloi("loixn", "");
            }
            var regEmail = /^\w+@\w+\.\w{2,5}$/;
            if (email == "") {
                thongbaoloi("loiemail", "Không được để trống");
                ok = false;
            } else if (!email.match(regEmail)) {
                thongbaoloi("loiemail", "Email ko đúng định dạng");
                ok = false;
            } else {
                thongbaoloi("loiemail", "");
            }
            if (hinh_anh == "") {
                thongbaoloi("loihinhanh", "Không được để trống");
                ok = false;
            } else {
                thongbaoloi("loihinhanh", "");
            }
            if(vt==""){
                thongbaoloi("loivt", "Không được để trống");
                ok = false;
            }else{
                thongbaoloi("loivt", "");
            }
            if(kh == ""){
                thongbaoloi("loikh", "Không được để trống");
                ok = false;
            }
            else{
                thongbaoloi("loikh", "");
            }
            if (ok == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <div class="aside">
        <?php include "./view/aside.php"; ?>
    </div>
    <div class="clear"></div>
</main>