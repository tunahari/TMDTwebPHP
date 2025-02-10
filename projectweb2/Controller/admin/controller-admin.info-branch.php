<?php
    require_once '../../Model/admin/model-admin.branch.php';
    require_once '../../Model/admin/model-admin.employee.php';
    require_once '../../Model/database/connectDataBase.php';
    require_once '../class/controller.validate.php';
    $EmployeeClass = new Employee;
    $BranchClass = new Branch;
    $ValidateData = new ValidateData;
    if (isset($_POST['updateInfoBranch']) && $_POST['updateInfoBranch'] === 'update-info-branch') {
        $error = '';
        if (isset($_POST['branchName']) && isset($_POST['branchAddress']) && isset($_POST['branchFounding']) && 
            isset($_POST['branchManagenmentID']) && isset($_POST['branchHotline']) &&  isset($_POST['branchID'])
            && isset($_POST['branchNote'])) {
                $branchID = $ValidateData->standardizeString($_POST['branchID']);
                $branchName = $ValidateData->standardizeString($_POST['branchName']);
                $branchAddress = $ValidateData->standardizeString($_POST['branchAddress']);
                $branchFounding = $ValidateData->standardizeString($_POST['branchFounding']);
                $branchHotline = $ValidateData->standardizeString($_POST['branchHotline']);
                $branchNote = $ValidateData->standardizeString($_POST['branchNote']);
                $branchManagenmentID = $ValidateData->standardizeString(substr($_POST['branchManagenmentID'], 2));
                if (!$ValidateData->validatePhoneNumber($branchHotline)) { $error = 'error-phone';}
                if (!$ValidateData->validateDate($branchFounding)) {$error = 'error-founding';}
                $EmployeeClass->setNV_IDNhanVien($branchManagenmentID);
                if ($EmployeeClass->selectEmployeeByID() === "") {$error = 'error-idmanagenment';}
        } else {
            $error = 'error-empty';
        }
        if ($error === '') {
            $BranchClass->setCN_IDChiNhanh($branchID);
            $BranchClass->setCN_TenChiNhanh($branchName);
            $BranchClass->setCN_DiaChiChiNhanh($branchAddress);
            $BranchClass->setCN_NgayThanhLapChiNhanh($branchFounding);
            $BranchClass->setCN_HotLineChiNhanh($branchHotline);
            $BranchClass->setCN_GhiChuChiNhanh($branchNote);
            $BranchClass->setCN_IDQuanLyChiNhanh($branchManagenmentID);
            if ($BranchClass->updateInfoBranch()) {
                echo 'success';
            } else {
                echo 'failed';
            }
        } else {
            echo $error;
        }
    }
?>



                            