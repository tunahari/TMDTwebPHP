<?php
session_start();
require_once '../../Model/admin/model-amin.customer.php';
require_once '../../Model/database/connectDataBase.php';
require_once '../class/controller.validate.php';
$CustomerClass = new Customer;
$ValidateData = new ValidateData;

if (isset($_POST['loginFlag']) && $_POST['loginFlag'] === 'login') {
    if (isset($_POST['loginEmail']) && isset($_POST['loginPass'])) {
        $error = '';
        $loginEmail = $_POST['loginEmail'];
        $loginPass = $_POST['loginPass'];
        $CustomerClass->setKH_EmailKhachHang($loginEmail);
        if (!$CustomerClass->checkEmailLogin()) {$error = 'loginEmail';}
        if ($CustomerClass->getPassByEmail() !== '') {
            if (!password_verify($loginPass, $CustomerClass->getPassByEmail())) {
                $error = 'loginPass';
            }
        } else {
            $error = 'loginEmail';
        }
        if ($error === '') {
            $CustomerClass->setKH_TrangThaiDangNhapKhachHang('login');
            if ($CustomerClass->updateLoginStatus()) {
                echo 'success';
                $_SESSION['email'] = $loginEmail;
            }
        } else {
            echo $error;
        }
    }
}


?>