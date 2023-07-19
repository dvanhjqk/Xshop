function thongbaoloi(element, msg) {
    document.getElementById(element).innerHTML = msg;
}

function validatehh() {
    var ten_hh = document.forms.ten_hh.value;
    var don_gia = document.forms.don_gia.value;
    var giam_gia = document.forms.giam_gia.value;
    var hinh = document.forms.hinh.value;
    var mo_ta = document.forms.mo_ta.value;
    var so_luot_xem = document.forms.so_luot_xem.value;
    var ok = true;
    if (ten_hh == "") {
        thongbaoloi("loiten", "Không được để trống");
        ok = false;
    } else {
        thongbaoloi("loiten", "");
    }
    if (don_gia == "") {
        thongbaoloi("loidongia", "Không được để trống");
        ok = false;
    }
    else if(don_gia<0){
        thongbaoloi("loidongia", "Đơn giá phải là số dương");
    }
    else {
        thongbaoloi("loidongia", "");
    }
    if (giam_gia == "") {
        thongbaoloi("loigiam", "Không được để trống");
        ok = false;
    } else {
        thongbaoloi("loigiam", "");
    }
    if (hinh == "") {
        thongbaoloi("loihinh", "Không được để trống");
        ok = false;
    } else {
        thongbaoloi("loihinh", "");
    }
    if (mo_ta == "") {
        thongbaoloi("loimota", "Không được để trống");
        ok = false;
    } else {
        thongbaoloi("loimota", "");
    }
    if (so_luot_xem == "") {
        thongbaoloi("loixem", "Không được để trống");
        ok = false;
    } else {
        thongbaoloi("loixem", "");
    }
    if (ok == true) {
        return true;
    } else {
        return false;
    }
}

function validatekh() {
    var ho_ten = document.forms.ho_ten.value;
    var mat_khau = document.forms.mat_khau.value;
    var xac_nhan = document.forms.xac_nhan.value;
    var email = document.forms.email.value;
    var hinh_anh = document.forms.hinh_anh.value;
    let kh = document.forms.kich_hoat.value;
    let vt = document.forms.vai_tro.value;
    var ok = true;
    if (ho_ten == "") {
        thongbaoloi("loiten", "Không được để trống");
        ok = false;
    } else {
        thongbaoloi("loiten", "");
    }
    if (mat_khau == "") {
        thongbaoloi("loimk", "Không được để trống");
        ok = false;
    } else {
        thongbaoloi("loimk", "");
    }
    if (xac_nhan != mat_khau) {
        thongbaoloi("loixn", "Mật khẩu không trùng khớp");
        ok = false;
    } else {
        thongbaoloi("loixn", "");
    }
    var regEmail = /^\w+@\w+\.\w{2,5}$/;
    if (email == "") {
        thongbaoloi("loiemail", "Không được để trống");
        ok = false;
    } else if (!email.match(regEmail)) {
        thongbaoloi("loiemail", "Email ko đúng định dạng");
        ok = false;
    } else {
        thongbaoloi("loiemail", "");
    }
    if (hinh_anh == "") {
        thongbaoloi("loihinhanh", "Không được để trống");
        ok = false;
    } else {
        thongbaoloi("loihinhanh", "");
    }
    if(vt==""){
        thongbaoloi("loivt", "Không được để trống");
        ok = false;
    }else{
        thongbaoloi("loivt", "");
    }
    if(kh == ""){
        thongbaoloi("loikh", "Không được để trống");
        ok = false;
    }
    else{
        thongbaoloi("loikh", "");
    }
    if (ok == true) {
        return true;
    } else {
        return false;
    }
}
function validateloai(){
    let ten_loai = document.forms.ten_loai.value;
    let ok = true;
    if(ten_loai ==""){
        thongbaoloi("loitenloai", "Không được để trống");
        ok = false;
    }else{
        thongbaoloi("loitenloai", "");
    }
    if(ok==true){
        return true;
    }else{
        return false;
    }
}
