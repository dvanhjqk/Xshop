<?php
//truy vấn ds loại đã nhập


function loai_selectall(){
    $sql = "select * from loai_hang order by ma_loai ";
    return pdo_query($sql);
}

//thêm mới loại
function loai_insert($ten_loai){
    $sql = "insert into loai_hang(ten_loai) values(?)";
    pdo_execute($sql,$ten_loai);
}
//xóa
function loai_delete($ma_loai){
    $sql = "delete from loai_hang where ma_loai=?";
    pdo_execute($sql,$ma_loai);
}
//cập nhật
function loai_update($ma_loai, $ten_loai){
    $sql = "UPDATE loai_hang SET ten_loai=? WHERE ma_loai=?";
    pdo_execute($sql, $ten_loai, $ma_loai);
}
//lấy thông tin 1 mã loại
function loai_getinfo($ma_loai){
    $sql = "select * from loai_hang where ma_loai=?";
    return pdo_query_one($sql,$ma_loai);
}
   
