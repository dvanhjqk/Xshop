<?php
session_start();
include "global.php";
include "model/dao/pdo.php";
include "model/dao/loai-hang.php";
include "model/dao/hang-hoa.php";
include "model/dao/binh-luan.php";
include "model/dao/khach-hang.php";
include "model/dao/nhan_vien.php";
include "./view/header.php";
$loadhh = hh_selectall_home(0);
$loaddm = loai_selectall();
$result = hh_all();
$error = '';
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$top10 = hh_selectall_top10();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangki':
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $hinh = $_FILES['hinh_anh']['name'];
// Tạo thư mục lưu file
                $target_dir = "upload/";
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
            include 'view/taikhoan/dangki.php';
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $checkuser = check_user($ho_ten, $mat_khau);
                $checkusernv = check_usernv($ho_ten, $mat_khau);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('Location: index.php');
                } elseif (is_array($checkusernv)) {
                    $_SESSION['user'] = $checkusernv;
                    header('Location: index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại, vui lòng đăng kí";
                }
            }
            include "view/taikhoan/dangki.php";
            break;
        case 'updatetk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $email = $_POST['email'];
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $vai_tro = $_POST['dia_chi'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "./upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                $kich_hoat = $_POST['kich_hoat'];
                $ma_kh = $_POST['ma_kh'];
                khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
                $_SESSION['user'] = check_user($ho_ten, $mat_khau);
                header('Location: index.php?act=updatetk');
            }
            include "view/taikhoan/updatetk.php";
            break;
        case 'doimk':
            if (isset($_POST['gui'])) {
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $mat_khau_moi = $_POST['mat_khau_moi'];
                $checkaccount = check_account($ho_ten);
                if (is_array($checkaccount)) {
                    $ma_kh = $checkaccount['ma_kh'];
                    if ($checkaccount['mat_khau'] == $mat_khau) {
                        khach_hang_change_password($ma_kh, $mat_khau_moi);
                        $thongbao = "Đổi mật khẩu thành công";
                    } else {
                        $thongbao = "Mật khẩu cũ không đúng";
                    }
                } else {
                    $thongbao = "Tài khoản này không có";
                }
            }
            include "view/taikhoan/doimk.php";
            break;
        case 'quenmk':
            if (isset($_POST['ho_ten'])) {
                $email = $_POST['email'];
                $ho_ten = $_POST['ho_ten'];
                $checkemail = check_email($email, $ho_ten);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['mat_khau'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'logout':
            unset($_SESSION['user']);
            header('Location: index.php');
            break;
        case 'sanpham':
            if (isset($_POST['keyw']) && ($_POST['keyw'] != "")) {
                $keyw = $_POST['keyw'];
            } else {
                $keyw = "";
            }
            if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
                $ma_loai = $_GET['ma_loai'];
            } else {
                $ma_loai = 0;
            }
            $dshh = hh_selectall($keyw, $ma_loai);
            include "view/sanpham.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $ma_hh = $_GET['idsp'];
                $onesp = hh_getinfo($ma_hh);
                extract($onesp);
                $spkhac = cunghh_getinfo($ma_loai, $ma_hh);
                hang_hoa_tang_so_luot_xem($ma_hh);
                include "view/sanphamct.php";
            } else {
                include "./view/home.php";
            }
            break;
        case 'page':
            $page = $_GET['page'];
            $pages = $page * 9;
            $loadhh = hh_selectall_home($pages);
            include "./view/home.php";
            break;
        case 'addcart':
            if (isset($_POST['ma_hh'])) {
                $ma_hh = $_POST['ma_hh'];
                $ten_hh = $_POST['ten_hh'];
                $img = $_POST['hinh'];
                $don_gia = $_POST['don_gia'];
                $soluong = 1;
                $ttien = $soluong * $don_gia;
                $spadd = [$ma_hh, $ten_hh, $img, $don_gia, $soluong, $ttien];
                array_push($_SESSION['cart'], $spadd);
            }
            include 'view/cart/list.php';
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['cart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['cart'] = [];
            }
            header('Location: index.php?act=viewcart');
            break;
        case 'viewcart':
            include 'view/cart/list.php';
            break;
        case 'dat_hang':

            include 'view/cart/dat_hang.php';
            break;
        case 'thanh_cong':
            include 'view/cart/thanh_cong.php';
            if (isset($_POST['idcart'])) {
                array_splice($_SESSION['cart'], $_POST['idcart'], 1);
            } else {
                $_SESSION['cart'] = [];
            }
            break;
        case 'gioithieu':
            $_SESSION['cart'] = [];
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        case 'gopy':
            include "view/gopy.php";
            break;
        case 'hoidap':
            include "view/hoidap.php";
            break;
        default:
            include "./view/home.php";
            break;
    }
} else {
    include "./view/home.php";
}
include "./view/footer.php";
echo '<i class="fa-solid fa-star"></i>';

?>