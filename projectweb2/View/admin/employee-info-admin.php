<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ Sơ Admin</title>
    <link rel="stylesheet" href="./style-admin.css">
    <link rel="stylesheet" href="./main-admin.css">
    <link rel="stylesheet" href="./employee-info-admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="main">
        <?php include './include.header.php'; ?>
        <div class="containers">
            <?php include './include.menu.php'; ?>
            <?php
            if (isset($_GET['id-employee']) && $_GET['id-employee'] !== '') {
                $employeeID = $_GET['id-employee'];
                $EmployeeClass->setNV_IDNhanVien($employeeID);   
                $infoEmployee =  $EmployeeClass->selectEmployeeByID();
                $NV_TenNhanVien = $infoEmployee['NV_TenNhanVien'];
                $NV_SoDienThoaiNhanVien = $infoEmployee['NV_SoDienThoaiNhanVien'];
                $NV_DiaChiNhanVien = $infoEmployee['NV_DiaChiNhanVien'];
                $NV_EmailNhanVien = $infoEmployee['NV_EmailNhanVien'];
                $NV_NgaySinhNhanVien = $infoEmployee['NV_NgaySinhNhanVien'];
                $NV_GioiTinhNhanVien = $infoEmployee['NV_GioiTinhNhanVien'];
                $NV_MaChiNhanh = $infoEmployee['NV_MaChiNhanh'];
                if ($infoEmployee['NV_ChucVuNhanVien'] == '-1') {
                    $NV_ChucVuNhanVien = 'Chưa Cập Nhật';
                } else if ($infoEmployee['NV_ChucVuNhanVien'] == '0') {
                    $NV_ChucVuNhanVien = 'Nhân Viên';
                } else if ($infoEmployee['NV_ChucVuNhanVien'] == '1') {
                    $NV_ChucVuNhanVien = 'Quản Lý';
                } else if ($infoEmployee['NV_ChucVuNhanVien'] == '2') {
                    $NV_ChucVuNhanVien = 'Tổng Giám Đốc';
                }
                $NV_NgayTaoNhanVien = $infoEmployee['NV_NgayTaoNhanVien'];
                $NV_AvatarNhanVien = $infoEmployee['NV_AvatarNhanVien'];
                $NV_GioiThieuNhanVien = $infoEmployee['NV_GioiThieuNhanVien'];
                $NV_FacebookNhanVien = $infoEmployee['NV_FacebookNhanVien'];
                $NV_TwitterNhanVien = $infoEmployee['NV_TwitterNhanVien'];
                $NV_LinkedNhanVien = $infoEmployee['NV_LinkedNhanVien'];
                $NV_TrangThaiTaiKhoanNhanVien = $infoEmployee['NV_TrangThaiTaiKhoanNhanVien'];
            }
            ?>
            <div class="Profile__Container">
                <div class="Profile__Container__Left">
                    <div class="Profile__Container__Left__Title">Hồ Sơ Cá Nhân</div>
                    <div class="Profile__Container__Left__Avatar">
                        <img src="../../Controller/admin/<?php echo $NV_AvatarNhanVien ?>" alt="">
                    </div>
                    <div class="Profile__Container__Left__Name">
                        <?php echo $NV_TenNhanVien; ?>
                    </div>
                    <div class="Profile__Container__Left__Info__Position">
                        <i class="fa-solid fa-user-check"></i> 
                        <?php echo $NV_ChucVuNhanVien ?>
                    </div>
                    <div class="Profile__Container__Left__Info">
                        <div class="Profile__Container__Left__Info__Birth">
                            <div class="Profile__Container__Left__Info__Icon__Group">
                                <div class="Profile__Container__Left__Info__Icon">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </div>
                                <?php 
                                    if ($NV_NgaySinhNhanVien === 'Chưa cập nhật') {
                                        echo 'Chưa cập nhật';
                                    } else {
                                        echo date($NV_NgaySinhNhanVien);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="Profile__Container__Left__Info__Address">
                            <div class="Profile__Container__Left__Info__Icon__Group">
                                <div class="Profile__Container__Left__Info__Icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <?php echo $NV_DiaChiNhanVien; ?>
                            </div>
                        </div>
                        <div class="Profile__Container__Left__Info__Email">
                            <div class="Profile__Container__Left__Info__Icon__Group">
                                <div class="Profile__Container__Left__Info__Icon">
                                    <i class="fa-solid fa-envelope-circle-check"></i>
                                </div>
                                <?php echo $NV_EmailNhanVien; ?>
                            </div>
                        </div>
                        <div class="Profile__Container__Left__Info__Phone">
                            <div class="Profile__Container__Left__Info__Icon__Group">
                                <div class="Profile__Container__Left__Info__Icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <?php echo $NV_SoDienThoaiNhanVien ?>
                            </div>
                        </div>
                        <div class="Profile__Container__Left__Info__Introduce">
                            <div class="Profile__Container__Left__Info__Icon">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                            Giới thiệu:
                        </div>
                        <div class="Profile__Container__Left__Info__Introduce__Text">
                            <?php echo $NV_GioiThieuNhanVien; ?>
                        </div>
                    </div>
                    <div class="Profile__Container__Left__Icon__Box">
                        <div class="Profile__Container__Left__Icon">
                            <i class="fa-brands fa-facebook-f"></i>
                            <div class="Profile__Container__Left__Icon__Link">
                                <a href="<?php 
                                    if ($NV_FacebookNhanVien === 'Chưa cập nhật') {
                                        echo '#';
                                    } else {
                                        echo $NV_FacebookNhanVien;
                                    }
                                ?>">Facebook</a>
                            </div>
                        </div>
                        <div class="Profile__Container__Left__Icon">
                            <i class="fa-brands fa-twitter"></i>
                            <div class="Profile__Container__Left__Icon__Link">
                                <a href="<?php 
                                    if($NV_TwitterNhanVien === 'Chưa cập nhật') {
                                        echo '#';
                                    } else {
                                        echo $NV_TwitterNhanVien;
                                    }
                                ?>">Twitter</a>
                            </div>
                        </div>
                        <div class="Profile__Container__Left__Icon">
                            <i class="fa-brands fa-linkedin-in"></i>
                            <div class="Profile__Container__Left__Icon__Link">
                                <a href="<?php 
                                    if($NV_LinkedNhanVien === 'Chưa cập nhật') {
                                        echo '#';
                                    } else {
                                        echo $NV_LinkedNhanVien;
                                    }
                                ?>">Linked In</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Profile__Container__Right">
                    <div class="Profile__Container__Right__Info">
                        <div class="Profile__Container__Right__Info__Input__Box">
                            <div class="Profile__Container__Right__Info__Input__Box__Title">
                                Thông Tin Cá Nhân
                            </div>
                            <div class="Profile__Container__Right__Info__Input__Box__Content">
                                <div class="Profile__Container__Right__Info__Input__Box__Content__Avatar">
                                    <div class="Info__Input__Box__Content__Avatar__Image" id="previewAvtEmployeeImage">
                                        <img src="../../Controller/admin/<?php echo $NV_AvatarNhanVien ?>" alt="" 
                                        id="avtEmployeeDefault">
                                    </div>
                                    <!-- Upload file -->
                                    <div class="Info__Input__Box__Content__Avatar__Update">
                                        <label for="inputUpdateAvatarEmployee">Chọn File</label>
                                        <input type="file" id="inputUpdateAvatarEmployee">
                                        <button type="button" id="submitUpdateAvatarEmployee">Cập nhật<i class="fa-solid fa-cloud-arrow-up"></i></button>
                                    </div>
                                    <!-- Upload file -->
                                </div>
                                <div class="Profile__Container__Right__Info__Input__Box__Content__Input">
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <label for="Input_NV_IDNhanVien">Admin ID:</label>
                                        <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_IDNhanVien" 
                                        value="NV<?php echo $employeeID ?>" readonly>
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <label for="Input_NV_TenNhanVien">Tên Đầy Đủ:</label>
                                        <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_TenNhanVien" 
                                        value="<?php echo $NV_TenNhanVien ?>">
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                </div>
                                
                                <div class="Profile__Container__Right__Info__Input__Box__Content__Input">
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <label for="Input_NV_SoDienThoaiNhanVien">Số Điện Thoại:</label>
                                        <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_SoDienThoaiNhanVien" 
                                        value="<?php echo $NV_SoDienThoaiNhanVien ?>">
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <label for="Input_NV_DiaChiNhanVien">Địa Chỉ:</label>
                                        <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_DiaChiNhanVien" 
                                        value="<?php echo $NV_DiaChiNhanVien ?>">
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                </div>

                                <div class="Profile__Container__Right__Info__Input__Box__Content__Input">
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <label for="Input_NV_EmailNhanVien">Email:</label>
                                        <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_EmailNhanVien" 
                                        value="<?php echo $NV_EmailNhanVien ?>">
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <label for="Input_NV_NgaySinhNhanVien">Ngày Sinh:</label>
                                        <input type="date" placeholder="" class="Input__NV__Info" id="Input_NV_NgaySinhNhanVien" 
                                        value="<?php echo date($NV_NgaySinhNhanVien) ?>">
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                </div>

                                <div class="Profile__Container__Right__Info__Input__Box__Content__Input">
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <label for="Input_NV_GioiTinhNhanVien">Giới Tính (0/1):</label>
                                        <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_GioiTinhNhanVien" 
                                        value="<?php echo $NV_GioiTinhNhanVien ?>">
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <label for="Input_NV_MaChiNhanh">Mã Chi Nhánh:</label>
                                        <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_MaChiNhanh" 
                                        value="<?php echo $NV_MaChiNhanh ?>">
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                </div>

                                <div class="Profile__Container__Right__Info__Input__Box__Content__Input">
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <?php 
                                            if ($_SESSION['sesion-array']['NV_ChucVuNhanVien'] == '2') {
                                                echo '<label for="Input_NV_ChucVuNhanVien">Chức Vụ (0/1):</label>';
                                            } else {
                                                echo '<label for="Input_NV_ChucVuNhanVien">Chức Vụ (0):</label>';
                                            }
                                        ?>
                                        <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_ChucVuNhanVien" 
                                        value="<?php echo $infoEmployee['NV_ChucVuNhanVien']?>">
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <label for="Input_NV_NgayTaoNhanVien">Ngày Tạo:</label>
                                        <input type="date" placeholder="" class="Input__NV__Info" id="Input_NV_NgayTaoNhanVien" readonly 
                                        value="<?php echo date($NV_NgayTaoNhanVien) ?>">
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                </div>

                                <div class="Profile__Container__Right__Info__Input__Box__Content__Input">
                                    <div class="Info__Input__Box__Content__Input__Item">
                                        <label for="Input_NV_TrangThaiTaiKhoanNhanVien">Trạng Thái Tài Khoản:</label>
                                        <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_TrangThaiTaiKhoanNhanVien" readonly 
                                        value="<?php echo $NV_TrangThaiTaiKhoanNhanVien ?>">
                                        <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="Profile__Container__Right__Info__Input__Box">
                            <div class="Profile__Container__Right__Info__Input__Box__Title">
                                Giới Thiệu
                            </div>
                            <div class="Profile__Container__Right__Info__Input__Box__Content">
                                <div class="Profile__Container__Right__Info__Input__Introduce">
                                    <textarea type="text" placeholder="" class="Input__NV__Info" id="Input_NV_GioiThieuNhanVien"><?php echo $NV_GioiThieuNhanVien ?></textarea>
                                    <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                </div>
                            </div>
                        </div>

                        <div class="Profile__Container__Right__Info__Input__Box">
                            <div class="Profile__Container__Right__Info__Input__Box__Title">
                                Mạng Xã Hội
                            </div>
                            <div class="Profile__Container__Right__Info__Input__Box__Content__Social__Network">
                                <div class="Profile__Container__Right__Social__Network__Box">
                                    <div class="Profile__Container__Right__Social__Network__Box__Item">
                                        <div class="Profile__Container__Right__Social__Network__Input">
                                            <div class="Profile__Container__Right__Social__Network__Icon__Input__Box">
                                                <div class="Profile__Container__Right__Social__Network__Icon">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </div>
                                                <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_FacebookNhanVien" 
                                                value="<?php echo $NV_FacebookNhanVien ?>">
                                            </div>
                                            <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                        </div>
                                    </div>
                                    <div class="Profile__Container__Right__Social__Network__Box__Item">
                                        <div class="Profile__Container__Right__Social__Network__Input">
                                            <div class="Profile__Container__Right__Social__Network__Icon__Input__Box">
                                                <div class="Profile__Container__Right__Social__Network__Icon">
                                                    <i class="fa-brands fa-twitter"></i>
                                                </div>
                                                <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_TwitterNhanVien" 
                                                value="<?php echo $NV_TwitterNhanVien ?>">
                                            </div>
                                            <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Profile__Container__Right__Social__Network__Box">
                                    <div class="Profile__Container__Right__Social__Network__Box__Item">
                                        <div class="Profile__Container__Right__Social__Network__Input">
                                            <div class="Profile__Container__Right__Social__Network__Icon__Input__Box">
                                                <div class="Profile__Container__Right__Social__Network__Icon">
                                                    <i class="fa-brands fa-linkedin-in"></i>
                                                </div>
                                                <input type="text" placeholder="" class="Input__NV__Info" id="Input_NV_LinkedNhanVien" 
                                                value="<?php echo $NV_LinkedNhanVien ?>">
                                            </div>
                                            <div class="Input__NV__Info__Error">Input invalid, please check again</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Profile__Save__Info__Button" id="Save_NV_Info">
                            Lưu
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
<script src="../../Controller/admin/controller-admin.info-employee.js"></script>

<script>
    $(document).ready(function() {
        function checkPower () {
            const ClassFuction = new HandlingFunctions();
            ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.checkpower.php', {
                checkPower: 'check-power'
            }).done(function(response){
            if (response.trim() === '-1' || response.trim() === '0') {
                    ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.logout.php', {
                        logoutAdmin: 'log-out-admin'
                    }).done(function(response){
                        if (response.trim() === 'logout-success') {
                            window.location = './login-admin.php'
                        }
                    });
            }
            });
        }
        checkPower()
    })
</script>