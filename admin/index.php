<?php
include "header.php";
include "../model/dao/pdo.php";
include "../model/dao/loai-hang.php";
include "../model/dao/hang-hoa.php";
include "../model/dao/khach-hang.php";
include "../model/dao/nhan_vien.php";
include "../model/dao/binh-luan.php";
include "../model/dao/thong-ke.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['ten_loai'])) {
                $ten_loai = $_POST['ten_loai'];
                loai_insert($ten_loai);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdm = loai_selectall();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['ma_loai']) && $_GET['ma_loai'] > 0) {
                loai_delete($_GET['ma_loai']);
            }
            $listdm = loai_selectall();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['ma_loai']) && $_GET['ma_loai'] > 0) {
                $dm = loai_getinfo($_GET['ma_loai']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $ten_loai = $_POST['ten_loai'];
                $ma_loai = $_POST['ma_loai'];
                loai_update($ma_loai, $ten_loai);
            }
            $listdm = loai_selectall();
            include "danhmuc/list.php";
            break;
        /*hàng hóa*/
        case 'addhh':
            if (isset($_POST['ten_hh'])) {
                $ma_loai = $_POST['ma_loai'];
                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                $hinh = $_FILES['hinh']['name'];
                $mo_ta = $_POST['mo_ta'];
                $so_luot_xem = $_POST['so_luot_xem'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    hh_insert($ten_hh, $don_gia, $giam_gia, $hinh, $mo_ta, $so_luot_xem, $ma_loai);
                    $thongbao = "Thêm thành công";
                } else {
                    $thongbao = "Thêm không thành công";
                }
            }
            $listdm = loai_selectall();
            include "hanghoa/add.php";
            break;
        case 'listhh':
            if (isset($_POST['list_search']) && ($_POST['list_search'])) {
                $keyw = $_POST['keyw'];
                $ma_loai = $_POST['ma_loai'];
            } else {
                $keyw = '';
                $ma_loai = 0;
            }
            $listdm = loai_selectall();
            $listhh = hh_selectall($keyw, $ma_loai);
            include "hanghoa/list.php";
            break;
        case 'xoahh':
            if (isset($_GET['ma_hh']) && $_GET['ma_hh'] > 0) {
                hh_delete($_GET['ma_hh']);
            }
            $listhh = hh_selectall("", 0);
            include "hanghoa/list.php";
            break;
        case 'suahh':
            if (isset($_GET['ma_hh']) && $_GET['ma_hh'] > 0) {
                $hh = hh_getinfo($_GET['ma_hh']);
            }
            $listdm = loai_selectall();
            include "hanghoa/update.php";
            break;
        case 'updatehh':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $ma_loai = $_POST['ma_loai'];
                $ma_hh = $_POST['ma_hh'];
                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $mo_ta = $_POST['mo_ta'];
                $so_luot_xem = $_POST['so_luot_xem'];
                hh_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $mo_ta, $so_luot_xem, $ma_loai);
            }
            $listdm = loai_selectall();
            $listhh = hh_selectall("", 0);
            include "hanghoa/list.php";
            break;
        case 'addkh2':
            if (isset($_POST['ho_ten'])) {
                $hinh = $_FILES['hinh_anh']['name'];
// Tạo thư mục lưu file
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
// Kiểm tra kiểu file hợp lệ
                $type_file = pathinfo($_FILES['hinh_anh']['name'], PATHINFO_EXTENSION);
                $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                if (!in_array(strtolower($type_file), $type_fileAllow)) {
                    $error = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                }
//Kiểm tra kích thước file
                $size_file = $_FILES['hinh_anh']['size'];
                if ($size_file > 5242880) {
                    $error = "File bạn chọn không được quá 5MB";
                }
                if (empty($error)) {
                    if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                        $ho_ten = $_POST['ho_ten'];
                        $email = $_POST['email'];
                        $mat_khau = $_POST['mat_khau'];
                        $kich_hoat = $_POST['kich_hoat'];
                        $vai_tro = $_POST['vai_tro'];
                        khach_hang_insert($mat_khau, $ho_ten, $kich_hoat, $email, $hinh, $vai_tro);
                        $thongbao = 'Đăng ký thành công';
                    }
                }
            }
            include 'khachhang/add_kh2.php';
            break;
        case 'dskh':
            $listkh = khach_hang_select_all();
            include 'khachhang/list.php';
            break;
        case 'xoakh':
            if (isset($_GET['ma_kh']) && $_GET['ma_kh'] > 0) {
                khach_hang_delete($_GET['ma_kh']);
            }
            $listkh = khach_hang_select_all();
            include "khachhang/list.php";
            break;
        case 'suakh':
            if (isset($_GET['ma_kh']) && $_GET['ma_kh'] > 0) {
                $kh = khach_hang_select_by_id($_GET['ma_kh']);
            }
            $listkh = khach_hang_select_all();
            include "khachhang/update.php";
            break;
        case 'updatekh':
            if (isset($_POST['ho_ten'])) {
                $hinh = $_FILES['hinh_anh']['name'];
// Tạo thư mục lưu file
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
// Kiểm tra kiểu file hợp lệ
                $type_file = pathinfo($_FILES['hinh_anh']['name'], PATHINFO_EXTENSION);
                $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                if (!in_array(strtolower($type_file), $type_fileAllow)) {
                    $error = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                }
//Kiểm tra kích thước file
                $size_file = $_FILES['hinh_anh']['size'];
                if ($size_file > 5242880) {
                    $error = "File bạn chọn không được quá 5MB";
                }
                if (empty($error)) {
                    if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                        $ma_kh = $_POST['ma_kh'];
                        $ho_ten = $_POST['ho_ten'];
                        $email = $_POST['email'];
                        $mat_khau = $_POST['mat_khau'];
                        $kich_hoat = $_POST['kich_hoat'];
                        $vai_tro = $_POST['vai_tro'];
                        khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
                        $thongbao = 'Upload thành công';
                    }
                }
            }
            $listkh = khach_hang_select_all();
            include "khachhang/list.php";
            break;
        case 'dsbl':
            $listbl = thong_ke_binh_luan();
            include 'binhluan/list.php';
            break;
        case 'ctbl':
            $ma_hh = $_GET['ma_hh'];
            $items = binh_luan_select_by_hang_hoa($ma_hh);
            include 'binhluan/detail.php';
            break;
        case 'xoabl':
            $mabl = $_GET['ma_bl'];
            $ma_hh = $_GET['ma_hh'];
            binh_luan_delete($mabl);
            $listbl = thong_ke_binh_luan();
            include 'binhluan/list.php';
            break;
        case 'thongke':
            $thongke = thong_ke_hang_hoa();
            include 'thongke/list.php';
            break;
        case 'bieudo':
            $thongke = thong_ke_hang_hoa();
            include 'thongke/chart.php';
            break;
        case 'addnv':
            if (isset($_POST['ho_ten'])) {
                $ho_ten = $_POST['ho_ten'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $hinh_anh = $_FILES['hinh_anh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                $vai_tro = $_POST['vai_tro'];
                nhan_vien_insert($mat_khau, $ten_dang_nhap, $ho_ten, $hinh_anh,$email , $vai_tro);
                $thongbao = 'Thêm thành công';
            }
            include 'nhan_vien/add_nv.php';
            break;
        case 'dsnv':
            $listnv = nhan_vien_select_all();
            include 'nhan_vien/list.php';
            break;
        case 'xoanv':
            if (isset($_GET['ma_nv']) && $_GET['ma_nv'] > 0) {
                nhan_vien_delete($_GET['ma_nv']);
            }
            $listnv = nhan_vien_select_all();
            include "nhan_vien/list.php";
            break;
        case 'suanv':
            if (isset($_GET['ma_nv']) && $_GET['ma_nv'] > 0) {
                $nv = nhan_vien_select_by_id($_GET['ma_nv']);
            }
            $listnv = nhan_vien_select_all();
            include "nhan_vien/update.php";
            break;
        case 'updatenv':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $ho_ten = $_POST['ho_ten'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $ma_nv = $_POST['ma_nv'];
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $hinh_anh = $_FILES['hinh_anh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                $vai_tro = $_POST['vai_tro'];
                nhan_vien_update($ma_nv, $mat_khau, $ten_dang_nhap, $ho_ten, $email, $hinh_anh, $vai_tro);
                $thongbao = 'Upload thành công';
            }
            $listnv = nhan_vien_select_all();
            include "nhan_vien/list.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
?>