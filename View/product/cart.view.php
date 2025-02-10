<?php
session_start();
require_once '../../Model/database/connectDataBase.php';
require_once '../../Model/product/model-product.cart.php';
require_once '../../Model/admin/model-amin.customer.php';
    
    if (!isset($_SESSION['email'])) {
        header('Location: ./login.view.php');
    } else {
        $CartClass = new Cart;
        $CustomerClass = new Customer;
        $CustomerClass->setKH_EmailKhachHang($_SESSION['email']);
        $KH_IDKhachHang = $CustomerClass->selectCustomerByEmail()['KH_IDKhachHang'];
        $KH_TenKhachHang = $CustomerClass->selectCustomerByEmail()['KH_TenKhachHang'];
        $KH_SDTKhachHang = $CustomerClass->selectCustomerByEmail()['KH_SDTKhachHang'];
        $KH_DiaChiKhachHang = $CustomerClass->selectCustomerByEmail()['KH_DiaChiKhachHang'];
        $KH_LoaiKhachHang = $CustomerClass->selectCustomerByEmail()['KH_LoaiKhachHang'];
        $KH_EmailKhachHang = $CustomerClass->selectCustomerByEmail()['KH_EmailKhachHang'];
        $KH_AvatarKhachHang = $CustomerClass->selectCustomerByEmail()['KH_AvatarKhachHang'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./cart.view.css">
    <link rel="stylesheet" href="../include/header.main.css">
    <link rel="stylesheet" href="../include/footer.main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Cart Page</title>
</head>

<body>
    <?php include '../include/header.main.php'; ?>
    <div class="main">
        <div class="content">
            <div class="content-first">
                <div class="content-order">
                    <div class="order-tittle">
                        <h4>Giỏ Hàng</h4>
                        <div class="createBillBox"></div> 
                    </div>
                    <div class="order-details"></div>
                </div>
                <div class="content-summary">
                    <div class="summary-tittle">
                        <h4>tóm tắt thanh toán</h4>
                    </div>
                    <div class="summary-details">
                        <div class="summary-discount">
                            <div class="check-login">
                                <span>Xin Chào, <?= $KH_TenKhachHang ?></span>
                            </div>
                            <div class="summary-code">
                                <span class="code-tittle">Mã đơn hàng</span>
                                <span class="code-details">Chưa có</span>
                            </div>
                        </div>
                        <div class="summary-border"></div>
                        <div class="summary-price">
                            <div class="summary-price-items">
                                <span class="summary-price-tittle">tiền đơn hàng</span>
                                <span class="summary-price-details" id="priceBill">0 VND</span>
                            </div>
                            <div class="summary-price-items">
                                <span class="summary-price-tittle">giảm giá</span>
                                <span class="summary-price-details" style="color: #ff3838" id="priceSale">0 VND</span>
                            </div>
                            <div class="summary-price-items">
                                <span class="summary-price-tittle">số mặt hàng</span>
                                <span class="summary-price-sale" style="color: #7d5fff" id="numberItem">0</span>
                            </div>
                            <div class="summary-price-items">
                                <span class="summary-price-tittle">số sản phẩm</span>
                                <span class="summary-price-service" style="color: #7d5fff" id="numberProduct">0</span>
                            </div>
                            <div class="summary-price-items">
                                <span class="summary-price-tittle">Thuế VAT</span>
                                <span class="summary-price-service" style="color: #fff200">10%</span>
                            </div>
                            <div class="summary-price-items">
                                <span class="summary-price-tittle">tổng cộng</span>
                                <span class="summary-price-details" style="color: #32ff7e" id="totalPriceBill">0 VND</span>
                            </div>
                        </div>
                        <div class="summary-border"></div>
                        <div class="summary-save"></div>
                    </div>
                </div>
            </div>
            <div class="content-last" id="fetchCheckout"></div>
        </div>
    </div>

    <!-- LOADING -->
    <div class="loading__bg"></div>
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
    <?php include '../include/footer.main.php' ?>
    <script src="./cart.view.js"></script>
</body>

</html>

<script src="../../Controller/class/controller.function.js"></script>
<script src="../../Controller/class/controller.validate.js"></script>
<script src="../../Controller/product/controller-product.cart.js"></script>