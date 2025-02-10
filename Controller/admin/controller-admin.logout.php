<?php
require_once '../../Model/admin/model-admin.employee.php';
require_once '../../Model/database/connectDataBase.php';
if(isset($_POST['logoutAdmin']) && $_POST['logoutAdmin'] === 'log-out-admin') {
    session_start();
    $EmployeeClass = new Employee;
    $EmployeeClass->setNV_IDNhanVien($_SESSION['sesion-array']['NV_IDNhanVien']);
    $EmployeeClass->setNV_TrangThaiDangNhapNhanVien('logout');
    if ($EmployeeClass->updateLoginStatus()) {
        session_unset();
        session_destroy();
        echo 'logout-success';
        exit();
    } else {
        echo 'Lỗi';
    }
}
?>