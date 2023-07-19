<main>
    <div class="artical">
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="./model/content/images/category-1.jpg">
                <div class="price">10$</div>
                <div class="text">Giày</div>
            </div>
            <div class="mySlides fade">
                <img src="./model/content/images/category-2.jpg">
                <div class="price">20$</div>
                <div class="text">Giày</div>
            </div>

            <div class="mySlides fade">
                <img src="./model/content/images/category-3.jpg">
                <div class="price">30$</div>
                <div class="text">Hoodie</div>
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <!-- The dots/circles -->

        <div class="products">
            <div class="row">

                <?php foreach ($loadhh as $hh) {
                    extract($hh);
                    $linksp = "index.php?act=sanphamct&idsp=" . $ma_hh;
                    $img = $img_path . $hinh;
                    echo ' <div class="col-3">
                        <a href="' . $linksp . '"><img src="' . $img . '" alt=""></a>
                        <div class="product-price">
                            <p>$' . $don_gia . '</p>
                        </div>
                        <div class="product-name">
                            <a href="' . $linksp . '"><p>' . $ten_hh . '</p></a>
                    </div>
                    <form action="index.php?act=addcart" method="post">
                        <input type="hidden" name="ma_hh" value = "' . $ma_hh . '">
                        <input type="hidden" name="ten_hh" value = "' . $ten_hh . '">
                        <input type="hidden" name="hinh" value = "' . $img . '">
                        <input type="hidden" name="don_gia" value = "' . $don_gia . '">
                        <input type="submit" name="addcart" value="Thêm vào giỏ hàng">
                    </form>    
                     Lượt xem: ' . $so_luot_xem . '</div>';
                }
                ?>

            </div>
            <?php
            $sl = count($result);
            $tong = ceil($sl / 9);
            echo '<div class="pages">';
            for ($page = 0; $page < $tong; $page++) {
                echo '<a class="page" href="index.php?act=page&&page=' . $page . '">' . $page + 1 . '</a>';
            }
            echo '</div>';
            ?>
        </div>
    </div>
    <div class="aside">
        <?php include "aside.php" ?>
    </div>
    <div class="clear"></div>
</main>