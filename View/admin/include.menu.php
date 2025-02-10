<?php 
    $NV_IDNhanVien = $_SESSION['sesion-array']['NV_IDNhanVien'];
    include '../../Model/admin/model-admin.employee.php';
    include '../../Model/database/connectDataBase.php';
    $EmployeeClass = new Employee;
    $EmployeeClass->setNV_IDNhanVien($NV_IDNhanVien);
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
?>
<div class="nav__menu--container">
    <div class="Avatar__Main">
        <div class="Avatar__Main__Image">
            <img src="../image/avt-admin.png" alt="">
        </div>
        <div class="Avatar__Main__Position">
            <i class="fa-solid fa-user-check"></i> <?php echo $NV_ChucVuNhanVien ?>
        </div>
        <div class="Avatar__Main__Name">
            <?php echo $NV_TenNhanVien ?>
        </div>
    </div>
    <div class="nav__menu">

    <?php
        if ($NV_ChucVuNhanVien === 'Tổng Giám Đốc' || $NV_ChucVuNhanVien === 'Quản Lý') {
            if (isset($_GET['menu']) && $_GET['menu'] === 'statistical') {
                echo '
                <a href="./main-admin.php?menu=statistical">
                    <div class="nav__menu--group active">
                        <div class="group__menu">
                            <i class="bx bx-home-alt"></i>
                            <h4 class="menu--click">Thống Kê</h4>
                        </div>
                    </div>
                </a>
                ';    
            } else {
                echo '
                <a href="./main-admin.php?menu=statistical">
                    <div class="nav__menu--group">
                        <div class="group__menu">
                            <i class="bx bx-home-alt"></i>
                            <h4 class="menu--click">Thống Kê</h4>
                        </div>
                    </div>
                </a>
                ';    
            }
              
        }
    ?>
    <?php 
    if (isset($_GET['menu']) && $_GET['menu'] === 'customer') {
        echo '
        <a href="./customer-admin.php?menu=customer">
            <div class="nav__menu--group active">
                <div class="group__menu">
                    <i class="bx bxs-user-check"></i>
                    <h4 class="menu--click">Khách Hàng</h4>
                </div>
            </div>
        </a>
        ';
    } else {
        echo '
        <a href="./customer-admin.php?menu=customer">
            <div class="nav__menu--group">
                <div class="group__menu">
                    <i class="bx bxs-user-check"></i>
                    <h4 class="menu--click">Khách Hàng</h4>
                </div>
            </div>
        </a>
        ';
    }
    ?>
        

    <?php
    if (isset($_GET['menu']) && $_GET['menu'] === 'order') {
        echo '
        <a href="./order-admin.php?menu=order">
            <div class="nav__menu--group active">
                <div class="group__menu">
                    <i class="bx bx-cart-add"></i>
                    <h4 class="menu--click">Đơn Hàng</h4>
                </div>
            </div>
        </a>
        ';
    } else {
        echo '
        <a href="./order-admin.php?menu=order">
            <div class="nav__menu--group">
                <div class="group__menu">
                    <i class="bx bx-cart-add"></i>
                    <h4 class="menu--click">Đơn Hàng</h4>
                </div>
            </div>
        </a>
        ';
    }
    ?>
     
    <?php
    if (isset($_GET['menu']) && $_GET['menu'] === 'product') {
        echo '
        <a href="./product-admin.php?menu=product">
            <div class="nav__menu--group active">
                <div class="group__menu">
                    <i class="bx bxl-product-hunt"></i>
                    <h4 class="menu--click">Sản Phẩm</h4>
                </div>
            </div>
        </a>
        ';
    } else {
        echo '
        <a href="./product-admin.php?menu=product">
            <div class="nav__menu--group">
                <div class="group__menu">
                    <i class="bx bxl-product-hunt"></i>
                    <h4 class="menu--click">Sản Phẩm</h4>
                </div>
            </div>
        </a>
        ';
    }
    ?>

    <?php 
    if ($NV_ChucVuNhanVien === 'Tổng Giám Đốc' || $NV_ChucVuNhanVien === 'Quản Lý') {
        if (isset($_GET['menu']) && $_GET['menu'] === 'employee') {
            echo '
            <a href="./employee-admin.php?menu=employee">
                <div class="nav__menu--group active">
                    <div class="group__menu">
                        <i class="bx bxs-user-detail"></i>
                        <h4 class="menu--click">Nhân Viên</h4>
                    </div>
                </div>
            </a>
            '; 
        } else {
            echo '
            <a href="./employee-admin.php?menu=employee">
                <div class="nav__menu--group">
                    <div class="group__menu">
                        <i class="bx bxs-user-detail"></i>
                        <h4 class="menu--click">Nhân Viên</h4>
                    </div>
                </div>
            </a>
            '; 
        }
    }
    ?>

    <?php 
    if ($NV_ChucVuNhanVien === 'Tổng Giám Đốc') {
        if (isset($_GET['menu']) && $_GET['menu'] === 'branch') { 
            echo '
            <a href="./branch-admin.php?menu=branch">
                <div class="nav__menu--group active">
                    <div class="group__menu">
                        <i class="bx bxs-user-detail"></i>
                        <h4 class="menu--click">Chi Nhánh</h4>
                    </div>
                </div>
            </a>
            ';
        } else {
            echo '
            <a href="./branch-admin.php?menu=branch">
                <div class="nav__menu--group">
                    <div class="group__menu">
                        <i class="bx bxs-user-detail"></i>
                        <h4 class="menu--click">Chi Nhánh</h4>
                    </div>
                </div>
            </a>
            ';
        }
    }
    ?>

    <?php
    if (isset($_GET['menu']) && $_GET['menu'] === 'message') {
        echo '
        <a href="./chat-admin.php?menu=message">
            <div class="nav__menu--group active">
                <div class="group__menu">
                    <i class="bx bx-message-rounded-dots"></i>
                    <h4 class="menu--click">Tin Nhắn</h4>
                    <span class="chat">99</span>
                </div>
            </div>
        </a>
        ';
    } else {
        echo '
        <a href="./chat-admin.php?menu=message">
            <div class="nav__menu--group">
                <div class="group__menu">
                    <i class="bx bx-message-rounded-dots"></i>
                    <h4 class="menu--click">Tin Nhắn</h4>
                    <span class="chat">99</span>
                </div>
            </div>
        </a>
        ';
    }
    ?>
        

        <!-- <a href="#">
            <div class="nav__menu--group">
                <div class="group__menu">
                    <i class='bx bxs-credit-card'></i>
                    <h4 class="menu--click">Khuyến Mãi</h4>
                </div>
            </div>
        </a>

        <a href="#">
            <div class="nav__menu--group">
                <div class="group__menu">
                    <i class='bx bxs-zap'></i>
                    <h4 class="menu--click">Flash Sale</h4>
                </div>
            </div>
        </a> -->
    </div>
</div>