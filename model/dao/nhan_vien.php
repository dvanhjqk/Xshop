<?php
require_once 'pdo.php';

function nhan_vien_insert( $mat_khau,$ten_dang_nhap, $ho_ten , $hinh_anh, $email, $vai_tro){
    $sql = "INSERT INTO nhan_vien(mat_khau, ten_dang_nhap, ho_ten,  hinh_anh, email, vai_tro ) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $mat_khau, $ten_dang_nhap, $ho_ten , $hinh_anh, $email,$vai_tro );
}

function nhan_vien_update($ma_nv, $mat_khau, $ten_dang_nhap, $ho_ten, $email, $hinh, $vai_tro){
    $sql = "UPDATE nhan_vien SET mat_khau=?,ten_dang_nhap=?,ho_ten=?,email=?,hinh_anh=?,vai_tro=? WHERE ma_nv=?";
    pdo_execute($sql, $mat_khau,$ten_dang_nhap, $ho_ten, $email, $hinh, $vai_tro, $ma_nv);
}

function nhan_vien_delete($ma_nv){
    $sql = "DELETE FROM nhan_vien  WHERE ma_nv=?";
    if(is_array($ma_nv)){
        foreach ($ma_nv as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_nv);
    }
}

function nhan_vien_select_all(){
    $sql = "SELECT * FROM nhan_vien";
    return pdo_query($sql);
}

function nhan_vien_select_by_id($ma_nv){
    $sql = "SELECT * FROM nhan_vien WHERE ma_nv=?";
    return pdo_query_one($sql, $ma_nv);
}

function nhan_vien_exist($ma_nv){
    $sql = "SELECT count(*) FROM nhan_vien WHERE $ma_nv=?";
    return pdo_query_value($sql, $ma_nv) > 0;
}

function nhan_vien_select_by_role($vai_tro){
    $sql = "SELECT * FROM nhan_vien WHERE vai_tro=?";
    return pdo_query($sql, $vai_tro);
}

function nhan_vien_change_password($ma_nv, $mat_khau_moi){
    $sql = "UPDATE nhan_vien SET mat_khau=? WHERE ma_nv=?";
    pdo_execute($sql, $mat_khau_moi, $ma_nv);
}
function check_accountnv($ho_ten){
    $sql = "select * from nhan_vien where ho_ten='".$ho_ten."' ";
    return pdo_query_one($sql);
}
function check_emailnv($email, $ho_ten){
    $sql = "select * from nhan_vien where email='".$email."'AND ten_dang_nhap='".$ho_ten."' ";
    return pdo_query_one($sql);
}
function check_usernv($ho_ten,$mat_khau){
    $sql = "select * from nhan_vien where ten_dang_nhap='".$ho_ten."' AND mat_khau='".$mat_khau."'";
    return pdo_query_one($sql);
}
