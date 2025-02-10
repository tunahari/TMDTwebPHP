<?php
    require_once '../../Model/admin/model-admin.order.php';
    require_once '../../Model/database/connectDataBase.php';
    require_once '../class/controller.validate.php';
    $OrderClass = new Order;
    $ValidateData = new ValidateData;

    if (isset($_POST['idOrder']) && isset($_POST['idCustomer'])) {
        $idOrder = $_POST['idOrder'];
        $idCustomer = $_POST['idCustomer'];
        if (isset($_POST['fetchBtn']) && $_POST['fetchBtn'] === 'fetch-btn') {
            $OrderClass->setDH_IDDonHang($idOrder);
            $OrderClass->setDH_IDKhachHang($idCustomer);
            $listInfoOrder = $OrderClass->selectOrderByCustomerID();
            for ($i = 0; $i < count($listInfoOrder); $i++) {
                if (intval($listInfoOrder[$i]['DH_TrangThaiDonHang']) === 1) {
                    $TrangThaiDonHang = 'Đã Hủy';
                    $DuyetDonHang = '';
                    $HuyDonHang = '';
                    $XacNhanDonHang = '';
                } else if (intval($listInfoOrder[$i]['DH_TrangThaiDonHang']) === 2) {
                    $TrangThaiDonHang = 'Hoàn Thành';
                    $DuyetDonHang = '';
                    $HuyDonHang = '';
                    $XacNhanDonHang = '';
                } else if (intval($listInfoOrder[$i]['DH_TrangThaiDonHang']) === 3) {
                    $TrangThaiDonHang = 'Đã Xử Lý';
                    $DuyetDonHang = '';
                    $HuyDonHang = '<div class="HandledButton" id="BtnCancel" 
                                        data-orderID="'.$idOrder.'" data-customerID="'.$idCustomer.'"><i class="fa-solid fa-ban"></i>Hủy
                                   </div>';
                    $XacNhanDonHang = '<div class="HandledButton" id="BtnCheck" 
                                        data-orderID="'.$idOrder.'" data-customerID="'.$idCustomer.'"><i class="fa-solid fa-calendar-check"></i>Xác Nhận
                                   </div>';
                } else if (intval($listInfoOrder[$i]['DH_TrangThaiDonHang']) === 4) {
                    $TrangThaiDonHang = 'Chờ Xử Lý';
                    $DuyetDonHang = '<div class="HandledButton" id="BtnHandled" data-orderID="'.$idOrder.'" 
                                        data-customerID="'.$idCustomer.'">
                                        <i class="fa-solid fa-file-pen"></i>Duyệt
                                     </div>';
                    $HuyDonHang = '';
                    $XacNhanDonHang = '';
                }
            }
            print_r(json_encode([$TrangThaiDonHang, $DuyetDonHang, $HuyDonHang,$XacNhanDonHang]));
        }
    } 



    if (isset($_POST['handledOrder']) && $_POST['handledOrder'] === 'handle-order') {
        if (isset($_POST['idOrder']) && isset($_POST['idCustomer'])) {
            $idOrder = $_POST['idOrder'];
            $idCustomer = $_POST['idCustomer'];
            $OrderClass->setDH_IDDonHang($idOrder);
            $OrderClass->setDH_IDKhachHang($idCustomer);
            $OrderClass->setDH_TrangThaiDonHang(3);
            $listProductBill = $OrderClass->selectProductBill();
            $flagNumber = 0;
            for ($i = 0; $i < count($listProductBill); $i++) {
                if (intval($listProductBill[$i]['SP_TonKhoSanPham']) === 0) {
                    $flagNumber++;
                } 
            }
            if ($flagNumber === 0) {
                if (intval($OrderClass->selectBillStatus()) === 4) {
                    if ($OrderClass->updateBillStatus()) {
                        echo 'success';
                    } else {
                        echo 'failed';
                    }
                } else {
                    echo 'failed';
                }
            } else {
                echo 'error-quantity';
            }
        }
    } 

    if (isset($_POST['handledCancel']) && $_POST['handledCancel'] === 'handle-cancel') {
        if (isset($_POST['idOrder']) && isset($_POST['idCustomer'])) {
            $idOrder = $_POST['idOrder'];
            $idCustomer = $_POST['idCustomer'];
            $OrderClass->setDH_IDDonHang($idOrder);
            $OrderClass->setDH_IDKhachHang($idCustomer);
            $OrderClass->setDH_TrangThaiDonHang(1);
            if (intval($OrderClass->selectBillStatus()) === 3) {
                if ($OrderClass->updateBillStatus()) {
                    echo 'success';
                } else {
                    echo 'failed';
                }
            } else {
                echo 'failed';
            }
        }
    } 

    if (isset($_POST['handledCheck']) && $_POST['handledCheck'] === 'handle-check') {
        if (isset($_POST['idOrder']) && isset($_POST['idCustomer'])) {
            $idOrder = $_POST['idOrder'];
            $idCustomer = $_POST['idCustomer'];
            $OrderClass->setDH_IDDonHang($idOrder);
            $OrderClass->setDH_IDKhachHang($idCustomer);
            $OrderClass->setDH_TrangThaiDonHang(2);
            if (intval($OrderClass->selectBillStatus()) === 3) {
                if ($OrderClass->updateBillStatus()) {
                    echo 'success';
                } else {
                    echo 'failed';
                }
            } else {
                echo 'failed';
            }
        }
    } 
    
?>