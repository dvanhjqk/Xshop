<main>
<div class="artical">
<div class="box">

    <div class="box-title">
       SẢN PHẨM
    </div>
    <div class="box-content">
    <div class="row">
        <?php 
            foreach ($dshh as $hh) {
                extract($hh);
                $linksp = "index.php?act=sanphamct&idsp=".$ma_hh;
                $img = $img_path.$hinh;
                echo ' <div class="col-3">
                <a href="'.$linksp.'"><img src="'.$img.'" alt=""></a>
                <div class="product-price">
                    <p>$'.$don_gia.'</p>
                </div>
                <div class="product-name">
                    <a href="'.$linksp.'"><p>'.$ten_hh.'</p></a>
                </div>
            </div>';

            }
        ?>
    </div>
    </div>
</div>

</div>
<div class="aside">
    <?php include "aside.php";?>
</div>
<div class="clear"></div>
</main>