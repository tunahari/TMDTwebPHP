<?php
session_start();
require_once '../../Model/admin/model-amin.customer.php';
require_once '../../Model/database/connectDataBase.php';
require_once '../class/controller.validate.php';
$CustomerClass = new Customer;
$ValidateData = new ValidateData;

if (isset($_POST['logoutFlag']) && $_POST['logoutFlag'] === 'logout') {
    if (isset($_POST['logoutEmail']) && $_POST['logoutEmail'] !== '') {
        $logoutEmail = $_POST['logoutEmail'];
        $CustomerClass->setKH_EmailKhachHang($logoutEmail);
        $CustomerClass->setKH_TrangThaiDangNhapKhachHang('logout');
        if ($CustomerClass->updateLoginStatus()) {
            session_unset();
            session_destroy();
            echo 'success';
            exit();
        } 
    }
}
?>