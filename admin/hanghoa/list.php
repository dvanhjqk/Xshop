<div class="banner">
    <h1>DANH SÁCH HÀNG HÓA</h1>
</div>
<form action="index.php?act=listhh" method="POST">
    <input type="text" style="width:200px" name="keyw">
    <select name="ma_loai">
        <option value="0" selected>Tất cả</option>
        <?php foreach ($listdm as $danhmuc) {
            extract($danhmuc);
            echo ' <option value="' . $ma_loai . '">' . $ten_loai . '</option>';
        } ?>
    </select>
    <input type="submit" name="list_search" value="Tìm">
</form>
<table>
    <tr>
        <th></th>
        <th>Mã hàng hóa</th>
        <th>Tên hàng hóa</th>
        <th>Đơn giá</th>
        <th>Giảm giá</th>
        <th>Hình</th>
        <th>Mô tả</th>
        <th>Số lượt xem</th>
        <th></th>
    </tr>
    <?php foreach ($listhh as $hanghoa) {
        extract($hanghoa);
        $suahh = "index.php?act=suahh&ma_hh=" . $ma_hh;
        $xoahh = "index.php?act=xoahh&ma_hh=" . $ma_hh;
        $hinhpath = "../upload/" . $hinh;
        if (is_file($hinhpath)) {
            $hinh = "<img src='" . $hinhpath . "' width='25%'>";
        } else {
            $hinh = "";
        }
        echo '<tr>
                <td><input type="checkbox"></td>
                <td>' . $ma_hh . '</td>
                <td>' . $ten_hh . '</td>
                <td>$' . $don_gia . '</td>
                <td>' . $giam_gia . '</td>
                <td>' . $hinh . '</td>
                <td>' . $mo_ta . '</td>
                <td>' . $so_luot_xem . '</td>
                <td><a href="' . $suahh . '"><input type="button" value="Sửa"></a>
                <a href="' . $xoahh . '"> <input type="button" value="Xóa"></a>
                </td>
            </tr>';
    }
    ?>
</table>

<input type="button" id="check-all" value="Chọn tất cả">
<input type="button" id="clear-all" value="Bỏ chọn tất cả">
<input type="button" value="Xóa các mục đã chọn">
<a href="index.php?act=addhh"><input type="button" value="Nhập thêm"></a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#check-all").click(function () {
            $(":checkbox").prop("checked", true);
        });
        $("#clear-all").click(function () {
            $(":checkbox").prop("checked", false);
        });
        $("#btn-delete").click(function () {
            if ($(":checked").length === 0) {
                alert("Vui lòng chọn ít nhất một mục!");
                return false;
            }
        });
    });

</script>
        