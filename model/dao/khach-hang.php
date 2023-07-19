<?php
require_once 'pdo.php';

function khach_hang_insert( $mat_khau, $ho_ten ,$kich_hoat, $email, $hinh_anh, $vai_tro){
    $sql = "INSERT INTO khach_hang(mat_khau, ho_ten, kich_hoat,  hinh_anh, email, vai_tro ) VALUES (?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $mat_khau, $ho_ten, $kich_hoat , $hinh_anh, $email,$vai_tro );
}

function khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
    $sql = "UPDATE khach_hang SET mat_khau=?,ho_ten=?,email=?,hinh_anh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat==1, $vai_tro==1, $ma_kh);
}

function khach_hang_delete($ma_kh){
    $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
    if(is_array($ma_kh)){
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_kh);
    }
}

function khach_hang_select_all(){
    $sql = "SELECT * FROM khach_hang";
    return pdo_query($sql);
}

function khach_hang_select_by_id($ma_kh){
    $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
    return pdo_query_one($sql, $ma_kh);
}

/*function khach_hang_exist($ma_kh){
    $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}

function khach_hang_select_by_role($vai_tro){
    $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
    return pdo_query($sql, $vai_tro);
}*/

function khach_hang_change_password($ma_kh, $mat_khau_moi){
    $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau_moi, $ma_kh);
}
function check_account($ho_ten){
    $sql = "select * from khach_hang where ho_ten='".$ho_ten."' ";
    return pdo_query_one($sql);
}
function check_email($email, $ho_ten){
    $sql = "select * from khach_hang where email='".$email."'AND ho_ten='".$ho_ten."' ";
    return pdo_query_one($sql);
}
function check_user($ho_ten,$mat_khau){
    $sql = "select * from khach_hang where ho_ten='".$ho_ten."' AND mat_khau='".$mat_khau."'";
    return pdo_query_one($sql);
}