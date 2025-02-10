<?php
    require_once '../../Model/admin/model-admin.employee.php';
    require_once '../../Model/database/connectDataBase.php';
    require_once '../../Controller/class/controller.function.php';
    require_once '../class/controller.validate.php';
    session_start();
    $EmployeeClass = new Employee;
    $ValidateData = new ValidateData;
    $HandingFunctions = new HandlingFunctions;
    if (isset($_POST['updateEmployeeInfo']) && $_POST['updateEmployeeInfo'] === 'update-employee-info') {
        if (isset($_POST['employeeInfo']) && $_POST['employeeInfo'] !== '') {
            $employeeInfo = $_POST['employeeInfo'];
            $employeeID = substr($ValidateData->standardizeString($employeeInfo['Input_NV_IDNhanVien']), 2);  
            $Input_NV_TenNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_TenNhanVien']);  
            $Input_NV_DiaChiNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_DiaChiNhanVien']);  
            $Input_NV_MaChiNhanh = $ValidateData->standardizeString($employeeInfo['Input_NV_MaChiNhanh']); 
            $Input_NV_SoDienThoaiNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_SoDienThoaiNhanVien']);  
            $Input_NV_EmailNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_EmailNhanVien']); 
            $Input_NV_NgaySinhNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_NgaySinhNhanVien']); 
            $Input_NV_ChucVuNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_ChucVuNhanVien']); 
            $Input_NV_GioiTinhNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_GioiTinhNhanVien']); 
            $Input_NV_GioiThieuNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_GioiThieuNhanVien']); 
            $Input_NV_FacebookNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_FacebookNhanVien']); 
            $Input_NV_TwitterNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_TwitterNhanVien']); 
            $Input_NV_LinkedNhanVien = $ValidateData->standardizeString($employeeInfo['Input_NV_LinkedNhanVien']); 
            $employeeInfoArray = [$Input_NV_TenNhanVien, $Input_NV_DiaChiNhanVien, $Input_NV_MaChiNhanh,
                                  $Input_NV_SoDienThoaiNhanVien, $Input_NV_EmailNhanVien, $Input_NV_NgaySinhNhanVien,
                                  $Input_NV_ChucVuNhanVien, $Input_NV_GioiTinhNhanVien];
            $flagEmpty = 0;
            $flagPhone = 0;
            $flagEmail = 0;
            $flagDate = 0;
            $flagGender = 0;
            $flagPosition = 0;
            $errorPhone = '';
            $errorEmail = '';
            $errorGender = '';
            $errorFeild = ''; 
            $errorUpdate = '';
            $errorPosition = '';
            $errorBranch = '';
            $error = array();
            /* =============== Xử lý Empty ( Empty = 8) =============== */
            for ($i = 0; $i < count($employeeInfoArray); $i++) {
                if ($employeeInfoArray[$i] != '') {
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

            /* =============== Xử lý Email (Email = 1) =============== */
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

            /* =============== Xử lý Chức vụ (Position = 1) =============== */
            $Input_NV_ChucVuNhanVien == '0' ? $flagPosition++ : $errorPosition = 'error-position';
            if ($_SESSION['sesion-array']['NV_ChucVuNhanVien'] == '2') {
                if ($Input_NV_ChucVuNhanVien == '1') {
                    $flagPosition = 1;
                    $errorPosition = '';
                }
            } else {
                if ($Input_NV_ChucVuNhanVien == '1') {
                    $flagPosition = 0;
                    $errorPosition = 'error-position';
                }
            }
            $flagPosition !== 1 ? $errorPosition = 'error-position' : $errorPosition = '';

            /* =============== Xử lý Chi nhánh =============== */
            $listBranchID = $EmployeeClass->getBranchID();
            $arrayBranchID = array();
            for ($i = 0; $i < count($listBranchID); $i++) {
                $arrayBranchID[] = 'CN'.$listBranchID[$i]['CN_IDChiNhanh'];
            }
            $employeeID != '1' ? (in_array($Input_NV_MaChiNhanh, $arrayBranchID) ? $errorBranch = '' : $errorBranch = 'error-branch') : $errorBranch = '';

            $error = [$errorPhone,$errorEmail,$errorPosition,$errorGender,$errorBranch,$errorFeild,$errorUpdate];

            if ($errorPhone === '' && $errorEmail === '' && $errorPosition === '' && $errorGender === '' && $errorBranch === '') {
                if ($flagEmpty == '8' && $flagPhone = '1' && $flagEmail == '1' && $flagGender == '1' && $flagDate == '1' && $flagPosition == '1') {
                    $EmployeeClass->setNV_IDNhanVien($employeeID); 
                    $EmployeeClass->setNV_TenNhanVien($Input_NV_TenNhanVien);     
                    $EmployeeClass->setNV_DiaChiNhanVien($Input_NV_DiaChiNhanVien);   
                    $EmployeeClass->setNV_MaChiNhanh($Input_NV_MaChiNhanh);    
                    $EmployeeClass->setNV_SoDienThoaiNhanVien($Input_NV_SoDienThoaiNhanVien);   
                    $EmployeeClass->setNV_EmailNhanVien($Input_NV_EmailNhanVien);   
                    $EmployeeClass->setNV_NgaySinhNhanVien($Input_NV_NgaySinhNhanVien);   
                    $EmployeeClass->setNV_ChucVuNhanVien($Input_NV_ChucVuNhanVien);   
                    $EmployeeClass->setNV_GioiTinhNhanVien($Input_NV_GioiTinhNhanVien);  
                    $EmployeeClass->setNV_GioiThieuNhanVien($Input_NV_GioiThieuNhanVien);  
                    $EmployeeClass->setNV_FacebookNhanVien($Input_NV_FacebookNhanVien);  
                    $EmployeeClass->setNV_TwitterNhanVien($Input_NV_TwitterNhanVien);  
                    $EmployeeClass->setNV_LinkedNhanVien($Input_NV_LinkedNhanVien);  
                    if ($EmployeeClass->updateInfoEmployeeByID()) {
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
        if (isset($_GET['id-update'])) {
            $employeeID = substr($_GET['id-update'],2);
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
    } 
?>

