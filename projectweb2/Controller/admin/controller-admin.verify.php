<?php
include '../../Controller/class/controller.validate.php';
include '../../Controller/class/controller.function.php';
include '../../Model/database/connectDataBase.php';
include '../../Model/admin/model-admin.employee.php';
require_once '../../Controller/vendor/autoload.php';
$ValidateData = new ValidateData;
$EmployeeClass = new Employee;
$HandlingFunctions = new HandlingFunctions;
if (isset($_POST['verifyAccount']) && $_POST['verifyAccount'] === 'verify-account') {
    if(isset($_POST['emailVerify']) && $_POST['emailVerify'] !== '') {
        isset($_GET['code-verify']) && $_GET['code-verify'] !== '' ? $codeVerify = $_GET['code-verify'] : $codeVerify = ''; 
        if ($codeVerify !== '') {
            $emailVerify = $_POST['emailVerify'];
            if ($ValidateData->validateEmail($emailVerify)) {
                $EmployeeClass->setNV_MaChoXacThucNhanVien($codeVerify);
                if ($emailVerify === $EmployeeClass->getEmployeeByCodeVerify()[0]['NV_EmailNhanVien']) {
                    $EmployeeClass->setNV_IDNhanVien($EmployeeClass->getEmployeeByCodeVerify()[0]['NV_IDNhanVien']);
                    $codeVerifyEmail = random_int(100000, 999999);
                    $EmployeeClass->setNV_XacThucEmailNhanVien($codeVerifyEmail);
                    if ($EmployeeClass->updateVerifyCodeEmail()) {
                        if ($EmployeeClass->getEmployeeByCodeVerify()[0]['NV_TenNhanVien'] === 'Chưa cập nhật') {
                            $employeeName = $emailVerify;
                        } else {
                            $employeeName = $EmployeeClass->getEmployeeByCodeVerify()[0]['NV_TenNhanVien'];
                        }
                        $fromEmail = 'thanhdai11733621@gmail.com';
                        $fromPass = 'ryfwcoruiafszywl';
                        $fromName = 'SB Mobile Xác Thực Tài Khoản';
                        $toName = $employeeName;
                        $toEmail = $emailVerify;
                        $subject = 'Xin chào '.$employeeName.'!';
                        $body = 'Mã xác thực của bạn là: <h1>'.$codeVerifyEmail.'</h1>';
                        if ($HandlingFunctions->sendEmailByPHPMailer ($fromEmail, $fromPass, $fromName, $toName, $toEmail, $subject, $body)) {
                            echo 'check-email-success';
                        } else {
                            echo 'check-email-failed';
                        }
                    } else {
                        echo 'check-email-failed';
                    }
                } else {
                    echo 'check-email-failed';
                }
            } else {
                echo 'check-email-failed';
            }
        }
    }
}

if (isset($_POST['checkCodeEmail']) && $_POST['checkCodeEmail'] === 'check-code-email') {
    if (isset($_POST['verifyCodeEmail']) && strlen($_POST['verifyCodeEmail']) === 6) {
        $codeVerifyEmail = $_POST['verifyCodeEmail'];
        isset($_GET['code-verify']) && $_GET['code-verify'] !== '' ? $codeVerify = $_GET['code-verify'] : $codeVerify = ''; 
        if ($codeVerify !== '') {
            $EmployeeClass->setNV_MaChoXacThucNhanVien($codeVerify);
            if ($codeVerifyEmail == $EmployeeClass->getEmployeeByCodeVerify()[0]['NV_XacThucEmailNhanVien']) {
                $EmployeeClass->setNV_IDNhanVien($EmployeeClass->getEmployeeByCodeVerify()[0]['NV_IDNhanVien']);
                $EmployeeClass->setNV_TrangThaiTaiKhoanNhanVien('Đã xác thực');
                if ($EmployeeClass->updateAccountStatus()) {
                    echo 'verify-success';
                } else {
                    echo 'verify-failed';
                }
            } else {
                echo 'verify-failed';
            }
        }
    } else {
        echo 'verify-failed';
    }
}

if (isset($_POST['changePassword']) && $_POST['changePassword'] === 'change-password') {
    if (isset($_POST['passwordVerify']) && isset($_POST['repasswordVerify']) && $_POST['passwordVerify'] !== '' && $_POST['repasswordVerify'] !== '') {
        $passwordVerify = $_POST['passwordVerify'];
        $repasswordVerify = $_POST['repasswordVerify'];
        if ($ValidateData->validatePassword($passwordVerify)) {
            if ($ValidateData->checkAccuratePassword ($repasswordVerify,$passwordVerify)) {
                isset($_GET['code-verify']) && $_GET['code-verify'] !== '' ? $codeVerify = $_GET['code-verify'] : $codeVerify = ''; 
                if ($codeVerify !== '') {
                    $EmployeeClass->setNV_MaChoXacThucNhanVien($codeVerify);
                    $EmployeeClass->setNV_IDNhanVien($EmployeeClass->getEmployeeByCodeVerify()[0]['NV_IDNhanVien']);
                    $EmployeeClass->setNV_MatKhauNhanVien(password_hash($passwordVerify, PASSWORD_DEFAULT));
                    if ($EmployeeClass->updateNewPassword()) {
                        echo 'change-password-success';
                    } else {
                        echo 'change-password-failed';
                    }
                }
            } else {
                echo 'change-password-failed';
            }
        } else {
            echo 'change-password-failed';
        } 
    }
}
?>