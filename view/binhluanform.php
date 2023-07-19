<?php
session_start();
include "../model/dao/pdo.php";

include "../model/dao/binh-luan.php";
$ma_hh = $_REQUEST['ma_hh'];
$bl = binh_luan_select_by_hang_hoa($ma_hh);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="box">
    <div class="box-title">
        BÌNH LUẬN
    </div>
    <div class="box-content">
        <h3>Nội dung bình luận ở đây</h3>
        <table>
            <?php
            foreach ($bl as $dsbl) {
                extract($dsbl);
                echo '<tr class="bl"><td id="nd"><li>' . $noi_dung . '</li></td>';
                echo '<td><i>' . $ho_ten . ',</i></td>';
                echo '<td>' . $ngay_bl . '</td></tr>';
            }
            ?>
        </table>
        <?php
        if (isset($_SESSION['user']['ma_kh'])) {
             $ma_kh = $_SESSION['user']['ma_kh'] ;
            ?>
        <div class="binhluanform">
        <form action="<?=$_SERVER['PHP_SELF']; ?>"method="post" >
            <input type="hidden" name="ma_hh" value="<?php echo $ma_hh ?>">
            <input type="hidden" name="ma_kh" value="<?php echo $ma_kh?>">
            <input type="text" name="noidung" >
            <?php
            /*for ($i = 1; $i <4 ; $i++){
                echo '<i class="fa-solid fa-star" id="start'.$i.'"></i>';
                echo '<script>
                    $(document).ready(function(){
                $("#start'.$i.'").click(function(){
                $("#start'.$i.'").css({"color": "rgb(255, 213, 0)"})
                   });
                    });
                     </script>';
            }
            $y = 3;
            for ($i = 1; $i <6-$y ; $i++){
                echo '<i class="fa-regular fa-star" id="start'.$i.'"></i>';
            }*/
            ?>
            <input type="submit" name="guibinhluan" value="Gửi bình luận ">
        </form>
        </div>

        <?php }
        elseif (isset($_SESSION['user']['ma_nv'])){
            echo '<div id="kbl">Bạn không được bình luận</div>';
        }
        else {
            echo '<div id="kbl">Bạn phải đăng nhập để bình luận</div>';
        }
        ?>

        <?php
        if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
            $noidung = $_POST['noidung'];
            $ma_hh = $_POST['ma_hh'];
            $ngaybl = date('Y/m/d');
            $ma_kh = $_POST['ma_kh'];
            binh_luan_insert($ma_kh, $ma_hh, $noidung, $ngaybl);
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>

</div>

