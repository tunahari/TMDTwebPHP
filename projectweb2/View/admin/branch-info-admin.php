<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main-admin.css">
    <link rel="stylesheet" href="./style-admin.css">
    <link rel="stylesheet" href="./branch-info-admin.css">
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
                if (isset($_GET['id-branch'])) {
                    include '../../Model/admin/model-admin.branch.php';
                    $BranchClass = new Branch;
                    $BranchClass->setCN_IDChiNhanh($_GET['id-branch']);
                    $CN_IDChiNhanh = $BranchClass->selectBranchByID()['CN_IDChiNhanh'];
                    $CN_TenChiNhanh = $BranchClass->selectBranchByID()['CN_TenChiNhanh'];
                    $CN_DiaChiChiNhanh = $BranchClass->selectBranchByID()['CN_DiaChiChiNhanh'];
                    $CN_HotLineChiNhanh = $BranchClass->selectBranchByID()['CN_HotLineChiNhanh'];
                    $CN_NgayThanhLapChiNhanh = $BranchClass->selectBranchByID()['CN_NgayThanhLapChiNhanh'];
                    $CN_IDQuanLyChiNhanh = "NV" . $BranchClass->selectBranchByID()['CN_IDQuanLyChiNhanh'];
                    $CN_NgayTaoChiNhanh = $BranchClass->selectBranchByID()['CN_NgayTaoChiNhanh'];
                    $CN_GhiChuChiNhanh = $BranchClass->selectBranchByID()['CN_GhiChuChiNhanh'];
                }
            ?>
            <div class="Branch__Info__Container">
                <div class="Branch__Info__Form">
                    <div class="Branch__Info__Form__Title">Thông Tin Chi Nhánh</div>
                    <div class="Branch__Info__Form__Row">
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="CN_IDChiNhanh__Input">Chi Nhánh ID:</label>
                            <input class="ChiNhanh__Input__Class" id="CN_IDChiNhanh__Input" type="text" value="CN<?php echo $CN_IDChiNhanh; ?>" readonly>
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="">Tên Chi Nhánh:</label>
                            <input class="ChiNhanh__Input__Class" id="CN_TenChiNhanh__Input" type="text" value="<?php echo $CN_TenChiNhanh; ?>">
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="CN_DiaChiChiNhanh__Input">Địa Chỉ Chi Nhánh:</label>
                            <input class="ChiNhanh__Input__Class" id="CN_DiaChiChiNhanh__Input" type="text" value="<?php echo $CN_DiaChiChiNhanh; ?>">
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                    </div>
                    <div class="Branch__Info__Form__Row">
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="CN_NgayThanhLapChiNhanh__Input">Ngày Thành Lập:</label>
                            <input class="ChiNhanh__Input__Class" id="CN_NgayThanhLapChiNhanh__Input" type="date" value="<?php echo date($CN_NgayThanhLapChiNhanh); ?>">
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="CN_IDQuanLyChiNhanh__Input">ID Quản Lý Chi Nhánh:</label>
                            <input class="ChiNhanh__Input__Class" id="CN_IDQuanLyChiNhanh__Input" type="text" value="<?php echo $CN_IDQuanLyChiNhanh; ?>">
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="CN_HotLineChiNhanh__Input">Số Điện Thoại:</label>
                            <input class="ChiNhanh__Input__Class" id="CN_HotLineChiNhanh__Input" type="text" value="<?php echo $CN_HotLineChiNhanh; ?>">
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                    </div>
                    <div class="Branch__Info__Form__Row">
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="CN_NgayTaoChiNhanh__Input">Ngày Tạo (*):</label>
                            <input class="ChiNhanh__Input__Class" id="CN_NgayTaoChiNhanh__Input" type="text" readonly value="<?php echo date_format(date_create(), 'd/m/Y'); ?>">
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="">Người Tạo (*):</label>
                            <input class="ChiNhanh__Input__Class" type="text" value="Tổng Giám Đốc" readonly>
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="">Số Sản Phẩm Đang Có (*):</label>
                            <input class="ChiNhanh__Input__Class" type="text" readonly value="0">
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                    </div>
                    <div class="Branch__Info__Form__Row">
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="">Số Sản Phẩm Đã Bán (*):</label>
                            <input class="ChiNhanh__Input__Class" type="text" value="0" readonly>
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="">Tổng Doanh Thu (*):</label>
                            <input class="ChiNhanh__Input__Class" type="text" value="0" readonly>
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                        <div class="Branch__Info__Form__Row__Item">
                            <label for="">Lợi Nhuận (*):</label>
                            <input class="ChiNhanh__Input__Class" type="text" value="0" readonly>
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                    </div>
                    <div class="Branch__Info__Form__Row">
                        <div class="Branch__Info__Form__Row__Item Branch__Info__Form__Row__Item__TextArea">
                            <label for="CN_GhiChuChiNhanh__Input">Ghi Chú:</label>
                            <textarea class="CN_IDChiNhanh__TextArea__Class" id="CN_GhiChuChiNhanh__TextArea"><?php echo $CN_GhiChuChiNhanh; ?></textarea>
                            <div class="Branch__Info__Error">Input invalid, please check again</div>
                        </div>
                    </div>
                    <div class="Branch__Info__Form__Row Branch__Info__Form__Row__Save">
                        <div class="Branch__Info__Save" id="CN_GhiChuChiNhanh__Save">Lưu</div>
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
<script src="../../Controller/admin/controller-admin.info-branch.js"></script>
<script src="../../Controller/admin/controller-admin.info-branch.php"></script>

<script>
    $(document).ready(function() {
        const Fuction = new HandlingFunctions();
        function checkPower () {
            Fuction.getAjaxPost('../../Controller/admin/controller-admin.checkpower.php', {
                checkPower: 'check-power'
            }).done(function(response){
               if (response.trim() === '-1' || response.trim() === '0' || response.trim() === '1') {
                    Fuction.getAjaxPost('../../Controller/admin/controller-admin.logout.php', {
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