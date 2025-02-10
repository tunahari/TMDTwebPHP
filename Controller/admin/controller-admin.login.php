<?php
    require_once '../../Model/admin/model-admin.employee.php';
    require_once '../../Model/database/connectDataBase.php';
    require_once '../../Controller/class/controller.function.php';
    require_once '../class/controller.validate.php';
    $EmployeeClass = new Employee;
    $ValidateData = new ValidateData;
    $HandingFunctions = new HandlingFunctions;
    
    if (isset($_POST['EmployeeLogin']) && $_POST['EmployeeLogin'] === 'employee-login') {
        if (isset($_POST['EmployeeIDLogin']) && isset($_POST['EmployeePassLogin'])) {
            if ($_POST['EmployeeIDLogin'] !== '' && $_POST['EmployeePassLogin'] !== '') {
                $error = array();
                $errorID = ''; 
                $errorPass = '';
                $errorVerify = '';
                $errorNotFound = '';
                $loginStatus = '';
                $EmployeeIDLogin = $ValidateData->standardizeString($_POST['EmployeeIDLogin']);
                $EmployeePassLogin = $ValidateData->standardizeString($_POST['EmployeePassLogin']);
                if ($EmployeeIDLogin[0] !== 'N' || $EmployeeIDLogin[1] !== 'V') {
                    $errorID = 'id-error';
                } else {
                    $EmployeeIDLogin = str_replace('NV','', $EmployeeIDLogin);
                    $EmployeeClass->setNV_IDNhanVien($EmployeeIDLogin);
                    $resultEmployee = $EmployeeClass->selectEmployeeByID();
                    if ($resultEmployee !== '') {
                        if ($resultEmployee['NV_TrangThaiTaiKhoanNhanVien'] === 'Đã xác thực') {
                            if (password_verify($EmployeePassLogin, $resultEmployee['NV_MatKhauNhanVien'])) {
                                $EmployeeClass->setNV_IDNhanVien($EmployeeIDLogin);
                                if (!password_verify('123456', $resultEmployee['NV_MatKhauNhanVien'])) {
                                    $EmployeeClass->setNV_TrangThaiDangNhapNhanVien('login');
                                    if ($EmployeeClass->updateLoginStatus()) {
                                        session_start();
                                        $_SESSION['login'] = 'login-status';
                                        $_SESSION['sesion-array']['NV_IDNhanVien'] = $resultEmployee['NV_IDNhanVien'];
                                        $_SESSION['sesion-array']['NV_TenNhanVien'] = $resultEmployee['NV_TenNhanVien'];
                                        $_SESSION['sesion-array']['NV_SoDienThoaiNhanVien'] = $resultEmployee['NV_SoDienThoaiNhanVien'];
                                        $_SESSION['sesion-array']['NV_DiaChiNhanVien'] = $resultEmployee['NV_DiaChiNhanVien'];
                                        $_SESSION['sesion-array']['NV_EmailNhanVien'] = $resultEmployee['NV_EmailNhanVien'];
                                        $_SESSION['sesion-array']['NV_NgaySinhNhanVien'] = $resultEmployee['NV_NgaySinhNhanVien'];
                                        $_SESSION['sesion-array']['NV_GioiTinhNhanVien'] = $resultEmployee['NV_GioiTinhNhanVien'];
                                        $_SESSION['sesion-array']['NV_MaChiNhanh'] = $resultEmployee['NV_MaChiNhanh'];
                                        $_SESSION['sesion-array']['NV_ChucVuNhanVien'] = $resultEmployee['NV_ChucVuNhanVien'];
                                        $_SESSION['sesion-array']['NV_NgayTaoNhanVien'] = $resultEmployee['NV_NgayTaoNhanVien'];
                                        $_SESSION['sesion-array']['NV_AvatarNhanVien'] = $resultEmployee['NV_AvatarNhanVien'];
                                        $_SESSION['sesion-array']['NV_GioiThieuNhanVien'] = $resultEmployee['NV_GioiThieuNhanVien'];
                                        $_SESSION['sesion-array']['NV_FacebookNhanVien'] = $resultEmployee['NV_FacebookNhanVien'];
                                        $_SESSION['sesion-array']['NV_TwitterNhanVien'] = $resultEmployee['NV_TwitterNhanVien'];
                                        $_SESSION['sesion-array']['NV_TwitterNhanVien'] = $resultEmployee['NV_TwitterNhanVien'];
                                        $_SESSION['sesion-array']['NV_LinkedNhanVien'] = $resultEmployee['NV_LinkedNhanVien'];
                                        $_SESSION['sesion-array']['NV_TrangThaiTaiKhoanNhanVien'] = $resultEmployee['NV_TrangThaiTaiKhoanNhanVien'];
                                        $loginStatus = 'login-success';
                                    }
                                } else {
                                    if (!password_verify('123456', $EmployeeClass->selectEmployeeByID()['NV_MatKhauNhanVien'])) {
                                        $errorPass = 'error-pass';
                                    } else {
                                        $EmployeeClass->setNV_TrangThaiTaiKhoanNhanVien('Chưa xác thực');
                                        $EmployeeClass->updateAccountStatus();
                                    }
                                }  
                            } else {
                                $errorPass = 'error-pass';
                            }
                        } else {
                            $verifyCode = $HandingFunctions->randomString();
                            $EmployeeClass->setNV_IDNhanVien($EmployeeIDLogin);
                            $EmployeeClass->setNV_MaChoXacThucNhanVien($verifyCode);
                            if ($EmployeeClass->updateVerifyCode()) {
                                $errorVerify = $verifyCode;
                            }
                        }
                    } else {
                        $errorNotFound = 'error-not-found';
                    }
                }
                $error = [$errorID, $errorPass, $errorVerify, $errorNotFound, $loginStatus];
                print_r(json_encode($error));
            }
        }
    }
?>