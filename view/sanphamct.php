<main>
    <div class="artical">
        <div class="box">
            <?php
            extract($onesp);

            ?>
            <div class="box-title">
                SẢN PHẨM CHI TIẾT: <?= $ten_hh ?>
            </div>
            <div class="box-content">
                <div class="sp">
                    <?php
                    extract($onesp);
                    $img = $img_path . $hinh;
                    echo '<div class="spct"><img src="' . $img . '"></div>';
                    echo '<div><ul>
                                 <li>Mã HH: ' . $ma_hh . '</li>
                                 <li>Tên HH: ' . $ten_hh . '</li>
                                 <li>Đơn giá: ' . $don_gia . ' $</li>
                                 <li>Giảm giá: ' . $giam_gia . '%</li>
                               </ul>
                               <h3>MÔ TẢ:</h3>
                               <p>' . $mo_ta . '</p> 
                         </div>';
                    ?>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#binhluan").load("view/binhluanform.php", {ma_hh: <?=$ma_hh ?>});
            });
        </script>
        <div id="binhluan">

        </div>
        <div class="box">
            <div class="box-title">
                SẢN PHẨM CÙNG LOẠI
            </div>
            <div class="box-content">
                <?php
                foreach ($spkhac as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=" . $ma_hh;
                    echo '<li><a href="' . $linksp . '">' . $ten_hh . '</a><li>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="aside">
        <?php include "aside.php"; ?>
    </div>
    <div class="clear"></div>
</main>