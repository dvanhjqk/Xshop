<?php
$gia = 3000;
$i = 1;
echo '<label id="add" onclick="add()">+</label>';
echo ' <div id="sl" >' . $i . '</div>';
echo '<label id="tru" onclick="tru()">-</label>';
echo '<div id="tt">Tổng tiền: </div>';
?>
<script>
    let sl = document.getElementById("sl");
    let n = 1;
    let tt = document.getElementById("tt");
    let ttien = <?php echo $gia ?>;

    function add() {
        n = n + 1;
        sl.innerHTML = n;
        ttien = <?php echo $gia ?>;
        ttien = ttien * n;
        tt.innerHTML = "Tổng tiền: " + ttien;
    }

    function tru() {
        if (n == 1) {
            n = 1;
        } else {
            n = n - 1;
        }
        sl.innerHTML = n;
        ttien = <?php echo $gia ?>;
        ttien = ttien * n;
        tt.innerHTML = "Tổng tiền: " + ttien;
    }

    if (n == 1) {
        tt.innerHTML = "Tổng tiền: " + ttien;
    }
</script>
