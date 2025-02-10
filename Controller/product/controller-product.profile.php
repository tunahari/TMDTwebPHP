<?php
session_start();
require_once '../../Model/admin/model-admin.info-product.php';
require_once '../../Model/product/model-product.cart.php';
require_once '../../Model/admin/model-amin.customer.php';
require_once '../../Model/database/connectDataBase.php';
require_once '../class/controller.validate.php';
require_once '../../Controller/class/controller.function.php';
$HandingFunctions = new HandlingFunctions;

$CustomerClass = new Customer;
$ProductClass = new Product;
$CartClass = new Cart;
$ValidateData = new ValidateData;

if (isset($_POST['profileFlag']) && $_POST['profileFlag'] === 'profile') {
    if (isset($_POST['profileName']) && isset($_POST['profileEmail']) && isset($_POST['profilePhone']) && isset($_POST['profileAddress']) 
        && isset($_POST['profileID'])) {
        $error = '';
        $profileID = $_POST['profileID'];
        $profileName = $_POST['profileName'];
        $profileEmail = $_POST['profileEmail'];
        $profilePhone = $_POST['profilePhone'];
        $profileAddress = $_POST['profileAddress'];
        $CustomerClass->setKH_EmailKhachHang($profileEmail);
        $CustomerClass->setKH_IDKhachHang($profileID);
        $CustomerClass->setKH_SDTKhachHang($profilePhone);
        if (strlen($profileName) < 5) {$error = 'profileName';}
        if (!$ValidateData->validateEmail($profileEmail)) {$error = 'profileEmail';}
        if (!$CustomerClass->checkEmailDuplicateID()) {$error = 'profileEmail';}
        if (!$ValidateData->validatePhoneNumber($profilePhone)) {$error = 'profilePhone';}
        if (!$CustomerClass->checkSDTDuplicateID()) {$error = 'profilePhone';}
        if (strlen($profileAddress) < 5) {$error = 'profileAddress';}
        

        if ($error === '') {
            $CustomerClass->setKH_TenKhachHang($profileName);
            $CustomerClass->setKH_SDTKhachHang($profilePhone);
            $CustomerClass->setKH_DiaChiKhachHang($profileAddress);
            $CustomerClass->setKH_EmailKhachHang($profileEmail);
            $CustomerClass->setKH_IDKhachHang($profileID);
            if ($CustomerClass->updateProfileCustomer()) {
                $_SESSION['email'] = $profileEmail;
                echo 'success';
            } else {
                echo 'failed';
            }
        } else {
            echo $error;
        }
    }
}

if (isset($_POST['passFlag']) && $_POST['passFlag'] === 'pass') {
    if (isset($_POST['passOld']) && isset($_POST['passNew']) && isset($_POST['passID'])) {
        $error = '';
        $passOld = $_POST['passOld'];
        $passNew = $_POST['passNew'];
        $passID = $_POST['passID'];
        $CustomerClass->setKH_IDKhachHang($passID);
        if (!password_verify($passOld, $CustomerClass->getPassByID())) {$error = 'errorOldPass';}
        if (password_verify($passNew, $CustomerClass->getPassByID())) {$error = 'errorNewPass';}
        if (!$ValidateData->validatePassword($passNew)) {$error = 'errorNewPass';}
        if ($error === '') {
            $CustomerClass->setKH_MatKhauKhachHang(password_hash($passNew, PASSWORD_DEFAULT));
            $CustomerClass->setKH_IDKhachHang($passID);
            if ($CustomerClass->updatePassByID()) {
                echo 'successPass';
            } else {
                echo 'failedPass';
            }
        } else {
            echo $error;
        }
    }
}

if (isset($_FILES['updateAvtProfile'])) {
    if (isset($_GET['id-update'])) {
        $fileAvt = $HandingFunctions->uploadFile($_FILES['updateAvtProfile'], 'image', 'updateAvtProfile');
        if ($fileAvt !== 'type_error' &&  $fileAvt !== 'size_error' && $fileAvt !== 'file_error') {        
            $CustomerClass->setKH_IDKhachHang($_GET['id-update']);
            $CustomerClass->setKH_AvatarKhachHang($fileAvt);
            if ($CustomerClass->updateAvatarByID()) {
                echo $fileAvt;
            } else {
                echo 'update-file-failed';
            }
        } else {
            echo 'update-file-failed';
        }
    } 
}
?>