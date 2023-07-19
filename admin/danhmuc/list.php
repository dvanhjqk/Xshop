<div class="banner">
    <h1>DANH SÁCH LOẠI HÀNG</h1>
</div>
<table>
    <tr>
        <th></th>
        <th>Mã loại</th>
        <th>Tên loại</th>
        <th></th>
    </tr>
    <?php foreach ($listdm as $danhmuc) {
        extract($danhmuc);
        $suadm = "index.php?act=suadm&ma_loai=" . $ma_loai;
        $xoadm = "index.php?act=xoadm&ma_loai=" . $ma_loai;
        echo '<tr>
                <td><input type="checkbox"></td>
                <td>' . $ma_loai . '</td>
                <td>' . $ten_loai . '</td>
                <td><a href="' . $suadm . '"><input type="button" value="Sửa"></a>
                <a href="' . $xoadm . '"> <input type="button" value="Xóa"></a>
                </td>
            </tr>';
    }
    ?>
</table>

<input type="button" id="check-all" value="Chọn tất cả">

<input type="button" id="clear-all" value="Bỏ chọn tất cả">
<input type="button" id="btn-delete" value="Xóa các mục đã chọn">
<a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
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