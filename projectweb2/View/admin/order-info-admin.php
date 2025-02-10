<?php
if (isset($_GET['id-order']) && isset($_GET['id-customer'])) {
    $idOrder = $_GET['id-order'];
    $idCustomer = $_GET['id-customer'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main-admin.css">
    <link rel="stylesheet" href="./style-admin.css">
    <link rel="stylesheet" href="./order-info-admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Thông Tin Chi Nhánh</title>
</head>
<body>
    <div class="main">
        <?php include './include.header.php'; ?>
        <div class="containers">
            <?php include './include.menu.php'; ?>
            <?php
            require_once '../../Model/admin/model-admin.order.php';
            $OrderClass = new Order;
            $OrderClass->setDH_IDDonHang($idOrder);
            $OrderClass->setDH_IDKhachHang($idCustomer);
            $listInfoOrder = $OrderClass->selectOrderByCustomerID();
            for ($i = 0; $i < count($listInfoOrder); $i++) {
                $MaDonHang = $listInfoOrder[$i]['DH_IDDonHang'];
                $SoMatHang = $OrderClass->countItemBill();
                $SoSanPham = $OrderClass->countProductBill();
                $NgayDatHang = $listInfoOrder[$i]['DH_NgayDatDonHang'];
                $TongTienDonHang = $OrderClass->priceBill();
                $MaKhachHang = $listInfoOrder[$i]['KH_IDKhachHang'];
                $TenKhachHang = $listInfoOrder[$i]['KH_TenKhachHang'];
                $EmailKhachHang = $listInfoOrder[$i]['KH_EmailKhachHang'];
                $SDTKhachHang = $listInfoOrder[$i]['KH_SDTKhachHang'];
                $DiaChiKhachHang = $listInfoOrder[$i]['KH_DiaChiKhachHang'];
            }
            ?>
            <div class="Order__Info__Container">
                <div class="Order__Info__Container__Content">
                    <div class="Order__Info__Content__Top">
                        <div class="Order__Info__Content__Top__Left">
                            <div class="Order__Info__Content__Top__Left__Title">
                                THÔNG TIN ĐƠN HÀNG
                                <div class="Setup__Button__Group"></div>
                            </div>
                            <div class="Order__Info__Content__Top__Left__Info__Box">
                                <div class="Content__Info__Box">
                                    <div class="Content__Info__Box__Item">
                                        <label for="">Mã Đơn Hàng (*):</label>
                                        <input type="text"  readonly id="MaDonHang" value="DH<?= $MaDonHang ?>">
                                    </div>
                                    <div class="Content__Info__Box__Item">
                                        <label for="">Số Mặt Hàng (*):</label>
                                        <input type="text"  readonly id="SoMatHang" value="<?= $SoMatHang ?>">
                                    </div>
                                    <div class="Content__Info__Box__Item">
                                        <label for="">Số Sản Phẩm (*):</label>
                                        <input type="text"  readonly id="SoSanPham" value="<?= $SoSanPham ?>">
                                    </div>
                                </div>
                                <div class="Content__Info__Box">
                                    <div class="Content__Info__Box__Item">
                                        <label for="">Ngày Đặt Hàng (*):</label>
                                        <input type="text"  readonly id="NgayDatHang" value="<?= $NgayDatHang ?>">
                                    </div>
                                    <div class="Content__Info__Box__Item">
                                        <label for="">Trạng Thái (*):</label>
                                        <input type="text"  readonly id="TrangThai" value="">
                                    </div>
                                    <div class="Content__Info__Box__Item">
                                        <label for="">Tổng Cộng (*):</label>
                                        <input type="text"  readonly id="TongCong" value="<?= number_format($TongTienDonHang) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Order__Info__Content__Top__Right">
                            <div class="Order__Info__Content__Top__Right__Title">THÔNG TIN KHÁCH HÀNG</div>
                            <div class="Order__Info__Content__Top__Right__Info__Box">
                                <div class="Content__Info__Box">
                                    <div class="Content__Info__Box__Item">
                                        <label for="">Mã Khách Hàng (*):</label>
                                        <input type="text"  readonly id="MaKhachHang" value="KH<?= $MaKhachHang ?>">
                                    </div>
                                    <div class="Content__Info__Box__Item">
                                        <label for="">Tên Khách Hàng (*):</label>
                                        <input type="text"  readonly id="TenKhachHang" value="<?= $TenKhachHang ?>">
                                    </div>
                                </div>
                                <div class="Content__Info__Box">
                                    <div class="Content__Info__Box__Item">
                                        <label for="">Email Khách Hàng (*):</label>
                                        <input type="text"  readonly id="EmailKhachHang" value="<?= $EmailKhachHang ?>">
                                    </div>
                                    <div class="Content__Info__Box__Item">
                                        <label for="">SDT Khách Hàng (*):</label>
                                        <input type="text"  readonly id="SDTKhachHang" value="<?= $SDTKhachHang ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="Content__Info__Box__Item Info__Address">
                                <label for="">Địa Chỉ Khách Hàng (*):</label>
                                <input type="text"  readonly id="DiaChiKhachHang" value="<?= $DiaChiKhachHang ?>">
                            </div>
                        </div>
                    </div>
                    <div class="Order__Info__Content__Bottom">
                        <div class="Order__Info__Content__Bottom__Title">DANH SÁCH SẢN PHẨM</div>
                        <div class="table__order--container">
                            <div class="table__order__thead">
                                <div class="table__order__thead__tr">
                                    <div class="table__order__thead__tr__th">ID</div>
                                    <div class="table__order__thead__tr__th">Tên Sản Phẩm</div>
                                    <div class="table__order__thead__tr__th">Giá Bán</div>
                                    <div class="table__order__thead__tr__th">Giá Giảm</div>
                                    <div class="table__order__thead__tr__th">Số Lượng</div>
                                    <div class="table__order__thead__tr__th">Tình Trạng</div>
                                    <div class="table__order__thead__tr__th">Chi Tiết</div>
                                </div>
                            </div>
                            <div class="table__order__tbody">
                                <?php
                                $listProductBill = $OrderClass->selectProductBill();
                                $output = '';
                                for ($i = 0; $i < count($listProductBill); $i++) {
                                    if (intval($listProductBill[$i]['SP_TonKhoSanPham']) > 0) {
                                        $TinhTrangSanPham = 'Còn hàng';
                                    } else {
                                        $TinhTrangSanPham = 'Hết hàng';
                                    }
                                    if (intval($listProductBill[$i]['SP_GiaBanSanPham']) === intval($listProductBill[$i]['GiamGia'])) {
                                        $GiamGia = 'Không có';
                                    } else {
                                        $GiamGia = number_format($listProductBill[$i]['GiamGia']);
                                    }
                                    $output .= '
                                        <div class="table__order__tbody__tr">
                                            <div class="table__order__tbody__tr__td">SP'.$listProductBill[$i]['SP_IDSanPham'].'</div>
                                            <div class="table__order__tbody__tr__td">'.$listProductBill[$i]['SP_TenSanPham'].'</div>
                                            <div class="table__order__tbody__tr__td">'.number_format($listProductBill[$i]['SP_GiaBanSanPham']).'</div>
                                            <div class="table__order__tbody__tr__td">'.$GiamGia.'</div>
                                            <div class="table__order__tbody__tr__td">'.$listProductBill[$i]['CTDH_SLSanPham'].'</div>
                                            <div class="table__order__tbody__tr__td">'.$TinhTrangSanPham.'</div>
                                            <div class="table__order__tbody__tr__td">
                                                <a href="./product-info-admin.php?id-product='.$listProductBill[$i]['SP_IDSanPham'].'&menu=product" 
                                                class="openProductDetails"><i class="fa-solid fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    ';
                                }
                                echo $output;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                
    
    <!-- LOADING -->
    <div class="loading__box">
        <p>Đang Thực Hiện...</p>
        <div class="loading"></div>
    </div>
    <!-- ALERT NOTIFY SUCCESS -->
    <div class="alert__notify__box__success">
            <div class="alert__notify__box__success__close"><i class="fa-solid fa-xmark"></i></div>
            <div class="alert__notify__box__success__left">
                <div class="alert__notify__box__success__left__icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </div>
            <div class="alert__notify__box__success__right">
                <div class="alert__notify__box__success__right__title">Thành Công</div>
                <div class="alert__notify__box__success__right__content"></div>
            </div>
            <div class="alert__notify__box__success__progress"></div>
        </div>
        <!-- ALERT NOTIFY Failed -->
        <div class="alert__notify__box__failed">
            <div class="alert__notify__box__failed__close"><i class="fa-solid fa-xmark"></i></div>
            <div class="alert__notify__box__failed__left">
                <div class="alert__notify__box__failed__left__icon">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>
            </div>
            <div class="alert__notify__box__failed__right">
                <div class="alert__notify__box__failed__right__title">Thất Bại</div>
                <div class="alert__notify__box__failed__right__content"></div>
            </div>
            <div class="alert__notify__box__failed__progress"></div>
        </div>
</body>
</html>
<script src="../../Controller/class/controller.function.js"></script>
<script src="../../Controller/class/controller.validate.js"></script>
<script src="../../Controller/admin/controller-admin.info-order.js"></script>