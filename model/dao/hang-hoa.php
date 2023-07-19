<?php
//truy vấn ds loại đã nhập

function hh_all(){
    $sql = "select * from hang_hoa";
    return pdo_query($sql);
}
function hh_selectall($keyw,$ma_loai){
    $sql = "select * from hang_hoa where 1";
    if($keyw != ""){
        $sql.=" and ten_hh like '%".$keyw."%'";
    }
    if($ma_loai > 0){
        $sql.=" and ma_loai = '".$ma_loai."'";
    }
    $sql.= " order by ma_hh desc"; 
    return pdo_query($sql);
}

//thêm mới loại
function hh_insert($ten_hh,$don_gia,$giam_gia,$hinh,$mo_ta,$so_luot_xem,$ma_loai){
    $sql = "insert into hang_hoa(ten_hh,don_gia,giam_gia,hinh,mo_ta,so_luot_xem,ma_loai)
     values('$ten_hh',$don_gia,'$giam_gia','$hinh','$mo_ta',$so_luot_xem,'$ma_loai')";
    pdo_execute($sql);
}
//xóa
function hh_delete($ma_hh){
    $sql = "delete from hang_hoa where ma_hh=?";
    pdo_execute($sql,$ma_hh);
}                                                               
//cập nhật  
function hh_update($ma_hh,$ten_hh,$don_gia,$giam_gia,$hinh,$mo_ta,$so_luot_xem,$ma_loai){
    if($hinh!="")
    $sql = "update hang_hoa set ten_hh='".$ten_hh."',don_gia='".$don_gia."',giam_gia='".$giam_gia."',hinh='".$hinh."',mo_ta='".$mo_ta."',so_luot_xem='".$so_luot_xem."',ma_loai='".$ma_loai."' WHERE ma_hh=".$ma_hh;
    else 
    $sql = "update hang_hoa set ten_hh='".$ten_hh."',don_gia='".$don_gia."',giam_gia='".$giam_gia."',mo_ta='".$mo_ta."',so_luot_xem='".$so_luot_xem."',ma_loai='".$ma_loai."' WHERE ma_hh=".$ma_hh;
    pdo_execute($sql);
}
//lấy thông tin 1 mã loại
function hh_getinfo($ma_hh){
    $sql = "select * from hang_hoa where ma_hh=?";
    return pdo_query_one($sql,$ma_hh);
}
function hh_count(){
    $sql = "select count(*) from hang_hoa";
    return pdo_query($sql);
}
function hh_selectall_home($sl){
    $sql = "select * from hang_hoa where 1 order by ma_hh desc  limit ". $sl .','. 9 ;
    return pdo_query($sql);
}
function cunghh_getinfo($ma_loai,$ma_hh){
    $sql = "select * from hang_hoa where ma_loai=".$ma_loai." AND ma_hh <> ".$ma_hh;
    return pdo_query($sql);
}
function hang_hoa_tang_so_luot_xem($ma_hh){
    $sql = "update hang_hoa set so_luot_xem = so_luot_xem + 1 where ma_hh = ?";
    pdo_execute($sql, $ma_hh);
}
function hh_selectall_top10(){
    $sql = "select * from hang_hoa where 1 order by so_luot_xem desc limit 0,10";
    return pdo_query($sql);
}


