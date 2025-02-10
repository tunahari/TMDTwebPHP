<?php
require_once '../../Model/admin/model-amin.customer.php';
require_once '../../Model/database/connectDataBase.php';
require_once '../class/controller.validate.php';
$CustomerClass = new Customer;
$ValidateData = new ValidateData;

if (isset($_POST['registerFlag']) && $_POST['registerFlag'] === 'register') {
    if (isset($_POST['registerName']) && isset($_POST['registerEmail']) && isset($_POST['registerPass'])) {
        $error = '';
        $registerName = $_POST['registerName'];
        $registerEmail = $_POST['registerEmail'];
        $registerPass = $_POST['registerPass'];
        $CustomerClass->setKH_EmailKhachHang($registerEmail);
        if (strlen($registerName) < 5) {$error = 'registerName';}
        if (!$ValidateData->validateEmail($registerEmail)) {$error = 'registerEmail';}
        if (!$ValidateData->validatePassword($registerPass)) {$error = 'registerPass';}
        if (!$CustomerClass->checkEmailDuplicate()) {$error = 'registerEmail';}

        if ($error === '') {
            $CustomerClass->setKH_TenKhachHang($registerName);
            $CustomerClass->setKH_SDTKhachHang("Chưa cập nhật");
            $CustomerClass->setKH_DiaChiKhachHang("Chưa cập nhật");
            $CustomerClass->setKH_LoaiKhachHang("0"); 
            $CustomerClass->setKH_EmailKhachHang($registerEmail);
            $CustomerClass->setKH_TrangThaiDangNhapKhachHang("logout");
            $CustomerClass->setKH_MaXacNhanKhachHang("Chưa cập nhật");
            $CustomerClass->setKH_NgayTaoKhachHang(date("Y-m-d"));
            //Mã hóa mật khẩu scrypt(10) để lưu vào database
            $CustomerClass->setKH_MatKhauKhachHang(password_hash($registerPass, PASSWORD_DEFAULT));
            $CustomerClass->setKH_XoaKhachHang("No");
            $CustomerClass->setKH_AvatarKhachHang("image/avtdefault.png");
            if ($CustomerClass->insertCustomer()) {
                echo 'success';
            } else {
                echo 'failed';
            }
        } else {
            echo $error;
        }
    }
}
?>