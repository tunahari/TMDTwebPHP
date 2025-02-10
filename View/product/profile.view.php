<?php
require_once '../../Model/database/connectDataBase.php';
require_once '../../Model/product/model-product.cart.php';
require_once '../../Model/admin/model-amin.customer.php';
    session_start();
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
    <link rel="stylesheet" href="./profile.view.css">
    <link rel="stylesheet" href="../include/header.main.css">
    <link rel="stylesheet" href="../include/footer.main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Account</title>
</head>

<body>
    <?php include '../include/header.main.php'; ?>

    <div class="Profile__Container">
        <div class="Profile__Title">Cài Đặt Tài Khoản</div>
        <div class="Profile__Tab">
            <div class="Profile__Tab__Item Profile__Tab__Item__Profile active" data-TabID="0">Hồ Sơ</div>
            <div class="Profile__Tab__Item Profile__Tab__Item__Bill" data-TabID="1">Đơn Hàng</div>
            <div class="Profile__Tab__Item Profile__Tab__Item__Message" data-TabID="2">Hỗ Trợ</div>
        </div>
        <div class="Profile__Panel">
            <!-- ======================= Panel Item ======================= -->
            <div class="Profile__Panel__Item Profile__Panel__Item__Profile active">
                <div class="Profile__Panel__Item__Profile__Left">
                    <!-- Avatar Upload -->
                    <label for="inputUpdateAvt" class="Profile__Panel__Item__Profile__Left__Avt" id="previewAvtBox">
                        <input type="file" id="inputUpdateAvt">
                        <img src="../../Controller/product/<?= $KH_AvatarKhachHang ?>" alt="" id="previewAvtImage">
                        <i class="fa-solid fa-circle-plus"></i>
                    </label>
                    <div class="Profile__Panel__Item__Profile__Left__Save__Avt" id="saveAvatar" value="<?= $KH_IDKhachHang ?>">
                        Tải Lên <i class="fa-solid fa-cloud-arrow-up"></i>
                    </div>
                    <!-- Avatar Upload -->
                    <div class="Profile__Panel__Item__Profile__Left__Name"><?= $KH_TenKhachHang ?></div>
                    <div class="Profile__Panel__Item__Profile__Left__Level">
                        <i class="fa-solid fa-user-tag"></i>
                        <?= $KH_LoaiKhachHang ?>
                    </div>
                </div>
                <div class="Profile__Panel__Item__Profile__Right">
                    <div class="Profile__Panel__Item__Profile__Right__Input__Box">
                        <div class="Profile__Panel__Item__Profile__Right__Title">Chỉnh Sửa Hồ Sơ</div>
                        <!-- Input item Name -->
                        <div class="Profile__Panel__Item__Profile__Right__Input__Item">
                            <label for="profileName">Tên của bạn <i class="fa-solid fa-pen-to-square"></i></label>
                            <input type="text" id="profileName" value="<?= $KH_TenKhachHang ?>">
                            <div class="Profile__Input__Error">Tên phải nhiều hơn 4 ký tự, gồm chữ và số</div>
                        </div>
                        <!-- Input item Name -->

                        <!-- Input item Phone -->
                        <div class="Profile__Panel__Item__Profile__Right__Input__Item">
                            <label for="profilePhone">Số điện thoại của bạn <i class="fa-solid fa-pen-to-square"></i></label>
                            <input type="text" id="profilePhone" value="<?= $KH_SDTKhachHang ?>">
                            <div class="Profile__Input__Error">Số điện thoại không đúng định dạng</div>
                        </div>
                        <!-- Input item Phone -->

                        <!-- Input item Address -->
                        <div class="Profile__Panel__Item__Profile__Right__Input__Item">
                            <label for="profileAddress">Địa chỉ của bạn <i class="fa-solid fa-pen-to-square"></i></label>
                            <input type="text" id="profileAddress" value="<?= $KH_DiaChiKhachHang ?>">
                            <div class="Profile__Input__Error">Địa chỉ phải nhiều hơn 4 ký tự</div>
                        </div>
                        <!-- Input item Address -->

                        <!-- Input item Email -->
                        <div class="Profile__Panel__Item__Profile__Right__Input__Item">
                            <label for="profileEmail">Email của bạn <i class="fa-solid fa-pen-to-square"></i></label>
                            <input type="email" id="profileEmail" value="<?= $KH_EmailKhachHang ?>">
                            <div class="Profile__Input__Error">Email không đúng định dạng, phải chứa "@" + tên miền</div>
                        </div>
                        <!-- Input item Email -->

                        <!-- Input item Submit -->
                        <div id="submitProfile" value="<?= $KH_IDKhachHang ?>">Lưu Chỉnh Sửa</div>
                        <!-- Input item Submit -->
                    </div>

                    <div class="Profile__Panel__Item__Profile__Right__Input__Box">
                        <div class="Profile__Panel__Item__Profile__Right__Title">Đổi Mật Khẩu</div>
                        <!-- Input item OldPassword -->
                        <div class="Profile__Panel__Item__Profile__Right__Input__Item">
                            <label for="profileOldPassword">Mật khẩu cũ <i class="fa-solid fa-pen-to-square"></i></label>
                            <input type="password" id="profileOldPassword">
                            <div class="Profile__Input__Error">Mật khẩu cũ không chính xác</div>
                        </div>
                        <!-- Input item OldPassword -->

                        <!-- Input item NewPassword -->
                        <div class="Profile__Panel__Item__Profile__Right__Input__Item">
                            <label for="profileNewPassword">Mật khẩu mới <i class="fa-solid fa-pen-to-square"></i></label>
                            <input type="password" id="profileNewPassword">
                            <div class="Profile__Input__Error">Mật khẩu gồm chữ hoa, thường, số và ký tự đặc biệt</div>
                        </div>
                        <!-- Input item NewPassword -->

                        <!-- Input item CFNewPassword -->
                        <div class="Profile__Panel__Item__Profile__Right__Input__Item">
                            <label for="profileCFNewPassword">Xác nhận mật khẩu mới <i class="fa-solid fa-pen-to-square"></i></label>
                            <input type="password" id="profileCFNewPassword">
                            <div class="Profile__Input__Error">Mật khẩu xác nhận không chính xác</div>
                        </div>
                        <!-- Input item CFNewPassword -->

                        <!-- Input item Submit -->
                        <div id="submitPass" value="<?= $KH_IDKhachHang ?>">Đổi Mật Khẩu</div>
                        <!-- Input item Submit -->
                    </div>
                </div>
            </div>
            <!-- ======================= Panel Item ======================= -->

             <!-- ======================= Panel Item ======================= -->
             <div class="Profile__Panel__Item Profile__Panel__Item__Bill">
                 <div class="Profile__Panel__Item__Bill__Title">Danh Sách Hóa Đơn Mua Hàng</div>
                 <div class="Profile__Panel__Item__Bill__Box">
                    <div class="Profile__Panel__Item__Bill__Left"></div>
                 </div>
                 <div class="Profile__Panel__Item__Bill__Right">
                     
                 </div>
                
            </div>
            <!-- ======================= Panel Item ======================= -->

             <!-- ======================= Panel Item ======================= -->
             <div class="Profile__Panel__Item Profile__Panel__Item__Message">
                <div class="Profile__Panel__Item__Message__Left">
                    <div class="Profile__Panel__Item__Message__Left__Avt">
                        <img src="../image/avt-admin.png" alt="">
                    </div>
                    <div class="Profile__Panel__Item__Message__Left__Name"><?= $KH_TenKhachHang ?></div>
                    <div class="Profile__Panel__Item__Message__Left__Level">
                        <i class="fa-solid fa-user-tag"></i>
                        <?= $KH_LoaiKhachHang ?>
                    </div>
                </div>
                <div class="Profile__Panel__Item__Message__Right">
                    <div class="Profile__Panel__Item__Message__Right__Header">
                        <div class="Profile__Panel__Item__Message__Right__Header__Left">
                            <div class="Profile__Panel__Item__Message__Right__Header__Avatar">
                                <img src="../image/avt-admin.png" alt="">
                            </div>
                            <div class="Profile__Panel__Item__Message__Right__Header__Name">
                                <h3>Tư Vấn Viên</h3>
                                <p><i class="fa-solid fa-circle"></i> Active</p>
                            </div>
                        </div>
                        <div class="Profile__Panel__Item__Message__Right__Header__Right">
                            <div class="Profile__Panel__Item__Message__Right__Header__Icon__Group">
                                <div class="Profile__Panel__Item__Message__Right__Header__Icon"><i class="fa-solid fa-video"></i></div>
                                <div class="Profile__Panel__Item__Message__Right__Header__Icon"><i class="fa-solid fa-phone-flip"></i></div>
                                <div class="Profile__Panel__Item__Message__Right__Header__Icon"><i class="fa-solid fa-braille"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="Profile__Panel__Item__Message__Right__Body">
                        <!-- Tin nhận -->
                        <div class="Profile__Panel__Item__Message__Receive__Item">
                            <div class="Profile__Panel__Item__Message__Receive__Item__Avatar">
                                <img src="../image/avt-admin.png" alt="">
                            </div>
                            <div class="Profile__Panel__Item__Message__Receive__Item__Info">
                                <div class="Profile__Panel__Item__Message__Receive__Item__Info__Top">
                                    <div class="Profile__Panel__Item__Message__Receive__Item__Time">2020-07-15 9:20 AM</div>
                                </div>
                                <div class="Profile__Panel__Item__Message__Receive__Item__Info__Bottom">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas tenetur quisquam maiores 
                                </div>
                            </div>
                        </div>
                        <!-- Tin nhận -->

                        <!-- Tin gởi -->
                        <div class="Profile__Panel__Item__Message__Send__Item">
                            <div class="Profile__Panel__Item__Message__Send__Item__Info">
                                <div class="Profile__Panel__Item__Message__Send__Item__Time">2020-07-15 9:25 AM</div>
                                <div class="Profile__Panel__Item__Message__Send__Item__Info__Bottom">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas tenetur quisquam maiores 
                                    facilis facere sapiente porro odit, doloribus, iure nemo iusto laudantium nobis vel veniam? 
                                    Deserunt vitae vero facere in!
                                </div>
                            </div>
                        </div>
                        <!-- Tin gởi -->

                        <!-- Tin nhận -->
                        <div class="Profile__Panel__Item__Message__Receive__Item">
                            <div class="Profile__Panel__Item__Message__Receive__Item__Avatar">
                                <img src="../image/avt-admin.png" alt="">
                            </div>
                            <div class="Profile__Panel__Item__Message__Receive__Item__Info">
                                <div class="Profile__Panel__Item__Message__Receive__Item__Info__Top">
                                    <div class="Profile__Panel__Item__Message__Receive__Item__Time">2020-07-15 9:20 AM</div>
                                </div>
                                <div class="Profile__Panel__Item__Message__Receive__Item__Info__Bottom">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas tenetur quisquam maiores 
                                </div>
                            </div>
                        </div>
                        <!-- Tin nhận -->

                        <!-- Tin gởi -->
                        <div class="Profile__Panel__Item__Message__Send__Item">
                            <div class="Profile__Panel__Item__Message__Send__Item__Info">
                                <div class="Profile__Panel__Item__Message__Send__Item__Time">2020-07-15 9:25 AM</div>
                                <div class="Profile__Panel__Item__Message__Send__Item__Info__Bottom">
                                    Lorem ipsum dolor sit amet consectetur
                                </div>
                            </div>
                        </div>
                        <!-- Tin gởi -->    
                        
                        <!-- Tin gởi -->
                        <div class="Profile__Panel__Item__Message__Send__Item">
                            <div class="Profile__Panel__Item__Message__Send__Item__Info">
                                <div class="Profile__Panel__Item__Message__Send__Item__Time">2020-07-15 9:25 AM</div>
                                <div class="Profile__Panel__Item__Message__Send__Item__Info__Bottom">
                                    Lorem
                                </div>
                            </div>
                        </div>
                        <!-- Tin gởi -->  
                    </div>

                    
                    <div class="Profile__Panel__Item__Message__Right__Footer">
                        <div class="Profile__Write__Message">
                            <input type="text" name="" id="writeMessage" placeholder="Viết vào đây tin nhắn của bạn...">
                            <div class="Profile__Write__Message__Icon__Group">
                                <div class="Profile__Write__Message__Icon"><i class="fa-solid fa-paperclip"></i></div>
                                <div class="Profile__Write__Message__Icon"><i class="fa-solid fa-microphone"></i></div>
                                <div class="Profile__Write__Message__Icon" id="sendMessage"><i class="fa-solid fa-paper-plane"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ======================= Panel Item ======================= -->
        </div>
    </div>

    <?php include '../include/footer.main.php' ?>

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
</body>

</html>

<script src="./profile.view.js"></script>
<script src="../../Controller/class/controller.function.js"></script>
<script src="../../Controller/class/controller.validate.js"></script>
<script src="../../Controller/product/controller-product.profile.js"></script>