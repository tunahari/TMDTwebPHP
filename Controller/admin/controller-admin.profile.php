<?php
    require_once '../../Model/admin/model-admin.employee.php';
    require_once '../../Model/database/connectDataBase.php';
    require_once '../../Controller/class/controller.function.php';
    require_once '../class/controller.validate.php';
    $EmployeeClass = new Employee;
    $ValidateData = new ValidateData;
    $HandingFunctions = new HandlingFunctions;
    session_start();
    $employeeID = $_SESSION['sesion-array']['NV_IDNhanVien'];
    if (isset($_POST['updateEmployeeProfile']) && $_POST['updateEmployeeProfile'] === 'update-employee-profile') {
        if (isset($_POST['employeeProfile']) && $_POST['employeeProfile'] !== '') {
            $employeeProfile =$_POST['employeeProfile'];
            $Input_NV_TenNhanVien = $ValidateData->standardizeString($employeeProfile['Input_NV_TenNhanVien']);  
            $Input_NV_DiaChiNhanVien = $ValidateData->standardizeString($employeeProfile['Input_NV_DiaChiNhanVien']);  
            $Input_NV_SoDienThoaiNhanVien = $ValidateData->standardizeString($employeeProfile['Input_NV_SoDienThoaiNhanVien']);  
            $Input_NV_EmailNhanVien = $ValidateData->standardizeString($employeeProfile['Input_NV_EmailNhanVien']); 
            $Input_NV_NgaySinhNhanVien = $ValidateData->standardizeString($employeeProfile['Input_NV_NgaySinhNhanVien']); 
            $Input_NV_GioiTinhNhanVien = $ValidateData->standardizeString($employeeProfile['Input_NV_GioiTinhNhanVien']); 
            $Input_NV_GioiThieuNhanVien = $ValidateData->standardizeString($employeeProfile['Input_NV_GioiThieuNhanVien']); 
            $Input_NV_FacebookNhanVien = $ValidateData->standardizeString($employeeProfile['Input_NV_FacebookNhanVien']); 
            $Input_NV_TwitterNhanVien = $ValidateData->standardizeString($employeeProfile['Input_NV_TwitterNhanVien']); 
            $Input_NV_LinkedNhanVien = $ValidateData->standardizeString($employeeProfile['Input_NV_LinkedNhanVien']);
            $employeeProfileArray = [$Input_NV_TenNhanVien, $Input_NV_DiaChiNhanVien, $Input_NV_SoDienThoaiNhanVien, 
                                     $Input_NV_EmailNhanVien, $Input_NV_NgaySinhNhanVien,$Input_NV_GioiTinhNhanVien];
            $flagEmpty = 0;
            $flagPhone = 0;
            $flagEmail = 0;
            $flagDate = 0;
            $flagGender = 0;
            $errorPhone = '';
            $errorEmail = '';
            $errorGender = '';
            $errorFeild = ''; 
            $errorUpdate = '';
            $error = array();
            /* =============== Xử lý Empty ( Empty = 6) =============== */
            for ($i = 0; $i < count($employeeProfileArray); $i++) {
                if ($employeeProfileArray[$i] != '') {
                    $flagEmpty++;
                } 
            }
            /* =============== Xử lý Ngày sinh (Date = 1) =============== */
            $ValidateData->validateDate($Input_NV_NgaySinhNhanVien) ? $flagDate++ : $flagDate = 0;

            /* =============== Xử lý Giới tính (Gender = 1) =============== */
            $Input_NV_GioiTinhNhanVien == '0' || $Input_NV_GioiTinhNhanVien == '1' ? $flagGender++ : $errorGender = 'gender-error';
            
            /* =============== Xử lý Phone (Phone = 1) =============== */
            $EmployeeClass->setNV_IDNhanVien($employeeID);
            $listPhone = $EmployeeClass->selectAllPhone();
            $ValidateData->validatePhoneNumber($Input_NV_SoDienThoaiNhanVien) ? $flagPhone++ : $errorPhone = 'error-phone';
            for ($i = 0; $i < count($listPhone); $i++) {
                if ($listPhone[$i]['NV_SoDienThoaiNhanVien'] !== 'Chưa cập nhật') {
                    if ($listPhone[$i]['NV_SoDienThoaiNhanVien'] === $Input_NV_SoDienThoaiNhanVien) {
                        $flagPhone++;
                    } 
                } 
            }
            $flagPhone !== 1 ? $errorPhone = 'error-phone' : $errorPhone = '';

            /* =============== Xử lý Email =============== */
            $EmployeeClass->setNV_IDNhanVien($employeeID);
            $listEmail = $EmployeeClass->selectAllEmail();
            $ValidateData->validateEmail($Input_NV_EmailNhanVien) ? $flagEmail++ : $errorEmail = 'error-email';
            for ($i = 0; $i < count($listEmail); $i++) {
                if ($listEmail[$i]['NV_EmailNhanVien'] !== 'Chưa cập nhật') {
                    if ($listEmail[$i]['NV_EmailNhanVien'] === $Input_NV_EmailNhanVien) {
                        $flagEmail++;
                    } 
                } 
            }
            $flagEmail !== 1 ? $errorEmail = 'error-email' : $errorEmail = '';

            $error = [$errorPhone,$errorEmail,$errorGender,$errorFeild,$errorUpdate];
            if ($errorPhone === '' && $errorEmail === '' && $errorGender === '' && $errorFeild === '' && $errorUpdate === '') {
                if ($flagEmpty == '6' && $flagPhone == '1' && $flagEmail == '1' && $flagDate == '1' && $flagGender == '1') {
                    $EmployeeClass->setNV_IDNhanVien($employeeID); 
                    $EmployeeClass->setNV_TenNhanVien($Input_NV_TenNhanVien);     
                    $EmployeeClass->setNV_DiaChiNhanVien($Input_NV_DiaChiNhanVien);       
                    $EmployeeClass->setNV_SoDienThoaiNhanVien($Input_NV_SoDienThoaiNhanVien);   
                    $EmployeeClass->setNV_EmailNhanVien($Input_NV_EmailNhanVien);   
                    $EmployeeClass->setNV_NgaySinhNhanVien($Input_NV_NgaySinhNhanVien);    
                    $EmployeeClass->setNV_GioiTinhNhanVien($Input_NV_GioiTinhNhanVien);  
                    $EmployeeClass->setNV_GioiThieuNhanVien($Input_NV_GioiThieuNhanVien);  
                    $EmployeeClass->setNV_FacebookNhanVien($Input_NV_FacebookNhanVien);  
                    $EmployeeClass->setNV_TwitterNhanVien($Input_NV_TwitterNhanVien);  
                    $EmployeeClass->setNV_LinkedNhanVien($Input_NV_LinkedNhanVien);  
                    if ($EmployeeClass->updateProfileEmployeeByID()) {
                        echo 'update-success';
                    } else {
                        $errorUpdate = 'update-error';
                    }
                } else {
                    $errorFeild = 'field-error';
                }
            } else {
                print_r(json_encode($error));
            }
        }
    }

    if (isset($_FILES['uploadAvtEmployee'])) {
        $fileAvt = $HandingFunctions->uploadFile($_FILES['uploadAvtEmployee'], 'image', 'uploadAvtEmployee');
        if ($fileAvt !== 'type_error' &&  $fileAvt !== 'size_error' && $fileAvt !== 'file_error') {        
            $EmployeeClass->setNV_IDNhanVien($employeeID);
            $EmployeeClass->setNV_AvatarNhanVien($fileAvt);
            if ($EmployeeClass->updateAvtEmployeeByID()) {
                echo 'update-file-success';
            } else {
                echo 'update-file-failed';
            }
        } else {
            echo 'update-file-failed';
        }
    }
?>

