<?php
 require_once '../../Model/admin/model-admin.info-product.php';
 require_once '../../Model/database/connectDataBase.php';
 require_once '../../Controller/class/controller.function.php';
 require_once '../class/controller.validate.php';
 session_start();
 $ValidateData = new ValidateData;
 $HandingFunctions = new HandlingFunctions;
 $ProductClass = new Product;

/* ================================== Cập nhật thông tin sản phẩm ================================== */
if (isset($_POST['ArraySP'])) {
    $error = '';
    if ($_POST['ArraySP'][5] === '0') {
        if ($_POST['ArraySP'][6] !== '') {
            $error = 'errorBH';
        }
    } else if ($_POST['ArraySP'][5] === '1') {
        if (!$ValidateData->validateNumber($_POST['ArraySP'][6])) {
            $error = 'errorBH';
        }
    }
    
    if (!$ValidateData->validateDate($_POST['ArraySP'][46])) {
        $error = 'ErrorDate';
    }

    if (!$ProductClass->checkBranchCode($_POST['ArraySP'][4])) {
        $error = 'ErrorBranch';
    }
    
    if ($error === '') {
        $ProductClass->setSP_TenSanPham($_POST['ArraySP'][0]);  
        $ProductClass->setSP_GiaBanSanPham($_POST['ArraySP'][1]);    
        $ProductClass->setSP_GiaNhapSanPham($_POST['ArraySP'][2]);    
        $ProductClass->setSP_GiamGiaSanPham($_POST['ArraySP'][3]); 
        $ProductClass->setSP_MaChiNhanhSanPham(substr($_POST['ArraySP'][4],2));   
        $ProductClass->setSP_BaoHanhSanPham($_POST['ArraySP'][5]);    
        $ProductClass->setSP_ThoiHanBaoHanhSanPham($_POST['ArraySP'][6]);   
        $ProductClass->setSP_CongNgheManHinhSanPham($_POST['ArraySP'][7]);    
        $ProductClass->setSP_DoPhanGiaiSanPham($_POST['ArraySP'][8]);   
        $ProductClass->setSP_KichThuocManHinhSanPham($_POST['ArraySP'][9]);    
        $ProductClass->setSP_DoSangToiDaSanPham($_POST['ArraySP'][10]);   
        $ProductClass->setSP_MatKinhCamUngManHinhSanPham($_POST['ArraySP'][11]);    
        $ProductClass->setSP_DoPhanGiaiCMRSauSanPham($_POST['ArraySP'][12]);    
        $ProductClass->setSP_DenFlashSanPham($_POST['ArraySP'][13]);    
        $ProductClass->setSP_MatKinhCamUngCMRSauSanPham($_POST['ArraySP'][14]);    
        $ProductClass->setSP_DoPhanGiaiCMRTruocSanPham($_POST['ArraySP'][15]);   
        $ProductClass->setSP_HeDieuHanhSanPham($_POST['ArraySP'][16]);   
        $ProductClass->setSP_CPUSanPham($_POST['ArraySP'][17]);    
        $ProductClass->setSP_TocDoCPUSanPham($_POST['ArraySP'][18]);   
        $ProductClass->setSP_GPUSanPham($_POST['ArraySP'][19]);    
        $ProductClass->setSP_RAMSanPham($_POST['ArraySP'][20]);    
        $ProductClass->setSP_ROMSanPham($_POST['ArraySP'][21]);    
        $ProductClass->setSP_BoNhoKhaDungSanPham($_POST['ArraySP'][22]);   
        $ProductClass->setSP_DanhBaSanPham($_POST['ArraySP'][23]);    
        $ProductClass->setSP_MangDiDongSanPham($_POST['ArraySP'][24]);   
        $ProductClass->setSP_SIMSanPham($_POST['ArraySP'][25]);   
        $ProductClass->setSP_WifiSanPham($_POST['ArraySP'][26]);   
        $ProductClass->setSP_GPSSanPham($_POST['ArraySP'][27]);   
        $ProductClass->setSP_BluetoothSanPham($_POST['ArraySP'][28]);    
        $ProductClass->setSP_CongKetNoiSanPham($_POST['ArraySP'][29]);    
        $ProductClass->setSP_JackTaiNgheSanPham($_POST['ArraySP'][30]);    
        $ProductClass->setSP_KetNoiKhacSanPham($_POST['ArraySP'][31]);   
        $ProductClass->setSP_DungLuongPinSanPham($_POST['ArraySP'][32]);    
        $ProductClass->setSP_LoaiPinSanPham($_POST['ArraySP'][33]);   
        $ProductClass->setSP_HoTroSacToiDaSanPham($_POST['ArraySP'][34]);    
        $ProductClass->setSP_CongNghePinSanPham($_POST['ArraySP'][35]);   
        $ProductClass->setSP_BaoMatNangCaoSanPham($_POST['ArraySP'][36]);    
        $ProductClass->setSP_TinhNangDacBietSanPham($_POST['ArraySP'][37]);    
        $ProductClass->setSP_KhangNuocBuiSanPham($_POST['ArraySP'][38]);   
        $ProductClass->setSP_XemPhimSanPham($_POST['ArraySP'][39]);   
        $ProductClass->setSP_GhiAmSanPham($_POST['ArraySP'][40]);    
        $ProductClass->setSP_NgheNhacSanPham($_POST['ArraySP'][41]);   
        $ProductClass->setSP_ThietKeSanPham($_POST['ArraySP'][42]);    
        $ProductClass->setSP_ChatLieuSanPham($_POST['ArraySP'][43]);  
        $ProductClass->setSP_KichThuocSanPham($_POST['ArraySP'][44]);    
        $ProductClass->setSP_KhoiLuongSanPham($_POST['ArraySP'][45]);   
        $ProductClass->setSP_ThoiDiemRaMatSanPham($_POST['ArraySP'][46]);     
        $ProductClass->setSP_HangSanPham($_POST['ArraySP'][47]); 
        $ProductClass->setSP_IDSanPham($_POST['ArraySP'][48]);
        if ($ProductClass->updateInfoProduct()) {
            echo 'update-success';
        } else {
            echo 'update-failed';
        }
    } else {
        echo $error;
    }
}

/* ================================== Cập nhật số lượng sản phẩm ================================== */
if (isset($_POST['updateQuantity']) && $_POST['updateQuantity'] === 'update-quantity') {
    $error = '';
    if (!isset($_POST['idUpdate']) || empty($_POST['idUpdate'])) {
        $error = 'errorID';
    }
    if (!isset($_POST['quantityUpdate']) || !$ValidateData->validateNumber($_POST['quantityUpdate'])) {
        $error = 'errorQuantity';
    }

    if ($error === '') {
        $ProductClass->setSP_IDSanPham($_POST['idUpdate']);
        $ProductClass->setSP_TonKhoSanPham($ProductClass->getInventoryByID() + intval($_POST['quantityUpdate']));
        $ProductClass->setSP_TongNhapSanPham($ProductClass->getImportByID() + intval($_POST['quantityUpdate']));
        if ($ProductClass->updateQuantityProductByID()) {
            echo 'update-success';
        } else {
            echo 'update-failed';
        }
    } else {
        echo $error;
    }
}


/* ================================== Cập nhật ảnh sản phẩm 1 ================================== */
if (isset($_FILES['uploadImage-1'])) {
    if (isset($_GET['id-update'])) {
        $productID = substr($_GET['id-update'],2);
        $fileAvt = $HandingFunctions->uploadFile($_FILES['uploadImage-1'], 'image', 'uploadImage-1');
        if ($fileAvt !== 'type_error' &&  $fileAvt !== 'size_error' && $fileAvt !== 'file_error') {            
            $ProductClass->setSP_IDSanPham($productID);
            $ProductClass->setSP_Image1SanPham($fileAvt);
            if ($ProductClass->updateImage_1_ProductByID()) {
                echo $fileAvt;
            } else {
                echo 'update-file-failed';
            }
        } else {
            echo 'update-file-failed';
        }
    } 
} 

/* ================================== Cập nhật ảnh sản phẩm 2 ================================== */
if (isset($_FILES['uploadImage-2'])) {
    if (isset($_GET['id-update'])) {
        $productID = substr($_GET['id-update'],2);
        $fileAvt = $HandingFunctions->uploadFile($_FILES['uploadImage-2'], 'image', 'uploadImage-2');
        if ($fileAvt !== 'type_error' &&  $fileAvt !== 'size_error' && $fileAvt !== 'file_error') {            
            $ProductClass->setSP_IDSanPham($productID);
            $ProductClass->setSP_Image2SanPham($fileAvt);
            if ($ProductClass->updateImage_2_ProductByID()) {
                echo $fileAvt;
            } else {
                echo 'update-file-failed';
            }
        } else {
            echo 'update-file-failed';
        }
    } 
} 

/* ================================== Cập nhật ảnh sản phẩm3 ================================== */
if (isset($_FILES['uploadImage-3'])) {
    if (isset($_GET['id-update'])) {
        $productID = substr($_GET['id-update'],2);
        $fileAvt = $HandingFunctions->uploadFile($_FILES['uploadImage-3'], 'image', 'uploadImage-3');
        if ($fileAvt !== 'type_error' &&  $fileAvt !== 'size_error' && $fileAvt !== 'file_error') {            
            $ProductClass->setSP_IDSanPham($productID);
            $ProductClass->setSP_Image3SanPham($fileAvt);
            if ($ProductClass->updateImage_3_ProductByID()) {
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