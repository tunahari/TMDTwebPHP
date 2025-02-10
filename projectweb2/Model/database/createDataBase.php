<?php
/**
 * -------------------------------------------------------------------------------------------------------------------------------------------------------
 * 
 * Đừng quan tâm ở code dưới viết những gì, chỉ làm theo hướng dẫn trên này thôi nha :))
 * Vào PHP My Admin, tạo database tên "projectweb2". 
 * Link trang PHP My Admin: http://localhost/phpmyadmin/index.php?route=/server/databases (Mẹo: Ctrl + Click vào link để mở link luôn)
 * 
 * -------------------------------------------------------------------------------------------------------------------------------------------------------
 * 
 * Sau đó copy link này rồi paste vô trình duyệt, nhấn Enter là nó tạo hết tất cả bảng nha
 * Link trang tạo Bảng: http://localhost/projectweb2/Model/database/createDataBase.php
 * 
 * -------------------------------------------------------------------------------------------------------------------------------------------------------
 * 
 * Một số thông tin đăng nhập:
 * - Trang quản trị: TK là NV1 | MK là Thanhdai123@ | Link trang: http://localhost/projectweb2/View/admin/login-admin.php
 * - Trang sản phẩm: TK là thanhdai003@gmail.com | MK là Thanhdai123@ | Link trang: http://localhost/projectweb2/View/product/login.view.php  
 * 
 * -------------------------------------------------------------------------------------------------------------------------------------------------------
 */




include './connectDataBase.php';
$ConnectDataBase = new ConnectDataBase;

$sqlProduct = ' CREATE TABLE product (
    SP_IDSanPham INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    SP_TenSanPham VARCHAR(255) NOT NULL,
    SP_GiaBanSanPham VARCHAR(255) NOT NULL,
    SP_GiaNhapSanPham VARCHAR(255) NOT NULL,
    SP_GiamGiaSanPham VARCHAR(255) NOT NULL,
    SP_ThoiGianTaoSanPham VARCHAR(255) NOT NULL,
    SP_TonKhoSanPham VARCHAR(255) NOT NULL,
    SP_TongNhapSanPham VARCHAR(255) NOT NULL,
    SP_TongBanSanPham VARCHAR(255) NOT NULL,
    SP_BaoHanhSanPham VARCHAR(255) NOT NULL,
    SP_ThoiHanBaoHanhSanPham VARCHAR(255) NOT NULL,
    SP_CongNgheManHinhSanPham MEDIUMTEXT NOT NULL,
    SP_DoPhanGiaiSanPham MEDIUMTEXT NOT NULL,
    SP_KichThuocManHinhSanPham MEDIUMTEXT NOT NULL,
    SP_DoSangToiDaSanPham MEDIUMTEXT NOT NULL,
    SP_MatKinhCamUngManHinhSanPham MEDIUMTEXT NOT NULL,
    SP_DoPhanGiaiCMRSauSanPham MEDIUMTEXT NOT NULL,
    SP_DenFlashSanPham MEDIUMTEXT NOT NULL,
    SP_MatKinhCamUngCMRSauSanPham MEDIUMTEXT NOT NULL,
    SP_DoPhanGiaiCMRTruocSanPham MEDIUMTEXT NOT NULL,
    SP_HeDieuHanhSanPham MEDIUMTEXT NOT NULL,
    SP_CPUSanPham MEDIUMTEXT NOT NULL,
    SP_TocDoCPUSanPham MEDIUMTEXT NOT NULL,
    SP_GPUSanPham MEDIUMTEXT NOT NULL,
    SP_RAMSanPham VARCHAR(255) NOT NULL,
    SP_ROMSanPham VARCHAR(255) NOT NULL,
    SP_BoNhoKhaDungSanPham VARCHAR(255) NOT NULL,
    SP_DanhBaSanPham MEDIUMTEXT NOT NULL,
    SP_MangDiDongSanPham MEDIUMTEXT NOT NULL,
    SP_SIMSanPham MEDIUMTEXT NOT NULL,
    SP_WifiSanPham MEDIUMTEXT NOT NULL,
    SP_GPSSanPham MEDIUMTEXT NOT NULL,
    SP_BluetoothSanPham MEDIUMTEXT NOT NULL,
    SP_CongKetNoiSanPham MEDIUMTEXT NOT NULL,
    SP_JackTaiNgheSanPham MEDIUMTEXT NOT NULL,
    SP_KetNoiKhacSanPham MEDIUMTEXT NOT NULL,
    SP_DungLuongPinSanPham MEDIUMTEXT NOT NULL,
    SP_LoaiPinSanPham MEDIUMTEXT NOT NULL,
    SP_HoTroSacToiDaSanPham MEDIUMTEXT NOT NULL,
    SP_CongNghePinSanPham MEDIUMTEXT NOT NULL,
    SP_BaoMatNangCaoSanPham MEDIUMTEXT NOT NULL,
    SP_TinhNangDacBietSanPham MEDIUMTEXT NOT NULL,
    SP_KhangNuocBuiSanPham MEDIUMTEXT NOT NULL,
    SP_XemPhimSanPham MEDIUMTEXT NOT NULL,
    SP_GhiAmSanPham MEDIUMTEXT NOT NULL,
    SP_NgheNhacSanPham MEDIUMTEXT NOT NULL,
    SP_ThietKeSanPham MEDIUMTEXT NOT NULL,
    SP_ChatLieuSanPham MEDIUMTEXT NOT NULL,
    SP_KichThuocSanPham MEDIUMTEXT NOT NULL,
    SP_KhoiLuongSanPham MEDIUMTEXT NOT NULL,
    SP_ThoiDiemRaMatSanPham MEDIUMTEXT NOT NULL,
    SP_MaChiNhanhSanPham VARCHAR(255) NOT NULL,
    SP_Image1SanPham MEDIUMTEXT NOT NULL,
    SP_Image2SanPham MEDIUMTEXT NOT NULL,
    SP_Image3SanPham MEDIUMTEXT NOT NULL,
    SP_XoaSanPham MEDIUMTEXT NOT NULL,
    SP_HangSanPham VARCHAR(255) NOT NULL 
    )
';

$stmt = $ConnectDataBase->connectDB()->prepare($sqlProduct);
if($stmt->execute()) {
    $DSTenSanPham = ['I Phone 11', 'I Phone 12', 'I Phone 13', 'I Phone 13 Pro', 'I Phone 12 Pro', 'I Phone XR', 
    'I Phone 12 Pro Max', 'Oppo A55', 'Oppo AK16', 'Oppo Reno 7 Z5', 'Oppo A95',  'Xiaomi Redmi 10C',  'Xiaomi Redmi 10',  
    'Xiaomi Redmi 9A',  'Xiaomi 11T',  'Xiaomi 12',  'Xiaomi Redmi Note 10 Pro',  'Samsung Galaxy A53',  'Samsung Galaxy A22',  
    'SamSung Galaxy M53', 'Samsung Galaxy S22', 'Vivo Y20', 'Vivo Y72 5G', 'Vivo V23E', 'Vivo Y21', 'Vivo Y15S', 'Vivo S1 Pro'];
    
    $DSGiaBanSanPham = ['16900000', '19190000', '20990000', '27490000', '26290000', '13490000', 
    '30990000', '5550000', '3090000', '9490000', '6690000',  '3490000',  '4290000',  
    '4290000',  '9400000',  '9790000',  '5900000',  '9700000',  '5600000',  
    '7790000', '8200000', '3390000', '6790000', '10900000', '3690000', '3490000', '4790000'];
    
    $DSGiaNhapSanPham = ['12000000', '16000000', '18000000', '23000000', '20000000', '12000000', 
    '27000000', '2400000', '2500000', '7500000', '5000000',  '2000000',  '3000000',  
    '3000000',  '5000000',  '8000000',  '4000000',  '8000000',  '4000000',  
    '6000000', '7000000', '2000000', '5000000', '5500000', '2000000', '2500000', '3500000'];
    
    $DSGiamGiaSanPham = ['10', '5', '3', '0', '30', '0', 
    '0', '30', '0', '10', '0',  '0',  '5',  
    '3',  '30',  '0',  '3',  '3',  '0',  
    '0', '3', '5', '10', '30', '0', '0', '0'];
    
    $DSRamSanPham = ['4', '6', '6', '8', '6', '4', 
    '6', '4', '4', '8', '6',  '4',  '4',  
    '4',  '6',  '8',  '6',  '4',  '6',  
    '6', '6', '4', '8', '6', '4', '4', '8'];
    
    $DSRomSanPham = ['64', '128', '256', '128', '128', '64', 
    '256', '32', '64', '128', '64',  '64',  '128',  
    '32',  '256',  '256',  '128',  '128',  '128',  
    '128', '256', '64', '128', '128', '32', '32', '128'];
    
    $DSBoNhoKhaDungSanPham = ['55', '120', '240', '120', '120', '60', 
    '240', '25', '60', '120', '50',  '60',  '120',  
    '25',  '240',  '240',  '120',  '120',  '120',  
    '120', '240', '60', '120', '120', '25', '25', '120'];
    
    $DSHangSanPham = ['Apple', 'Apple', 'Apple', 'Apple', 'Apple', 'Apple', 
    'Apple', 'Oppo', 'Oppo', 'Oppo', 'Oppo',  'Xiaomi',  'Xiaomi',  
    'Xiaomi',  'Xiaomi',  'Xiaomi',  'Xiaomi',  'Samsung',  'Samsung',  
    'Samsung', 'Samsung', 'Vivo', 'Vivo', 'Vivo', 'Vivo', 'Vivo', 'Vivo'];
    
    $DSMaChiNhanhSanPham = ['1', '1', '2', '3', '2', '3', 
    '1', '2', '3', '1', '2',  '3',  '1',  
    '2',  '3',  '1',  '1',  '2',  '3',  
    '1', '2', '3', '1', '2', '3', '1', '2'];
    
    $DSCongNghePinSanPham = ['Terrible Battery', 'Fast Charging', 'Terrible Battery', 'Fast Charging', 'Terrible Battery', 'Fast Charging', 'Terrible Battery', 
    'Fast Charging', 'Terrible Battery', 'Fast Charging', 'Terrible Battery', 'Fast Charging', 'Terrible Battery', 'Fast Charging', 'Terrible Battery', 
    'Fast Charging', 'Terrible Battery', 'Fast Charging', 'Terrible Battery', 'Fast Charging', 'Terrible Battery', 'Terrible Battery', 'Fast Charging', 
    'Terrible Battery', 'Fast Charging', 'Terrible Battery', 'Fast Charging'];
    
    $DSDoPhanGiaiSanPham = ['Close Up', 'Wide Angle', 'Close Up', 'Wide Angle', 'Close Up', 'Wide Angle', 'Close Up', 
    'Wide Angle', 'Close Up', 'Wide Angle', 'Close Up', 'Wide Angle', 'Close Up', 'Wide Angle', 'Zoom Far Away', 
    'Zoom Far Away', 'Zoom Far Away', 'Zoom Far Away', 'Zoom Far Away', 'Zoom Far Away', 'Zoom Far Away', 'Close Up', 'Wide Angle', 'Close Up',
    'Zoom Far Away', 'Close Up', 'Wide Angle'];
    
    $DSImage1SanPham = [ 
        'image/5a1b9a031b89e85c86e519c5fdd4983e933c32ae.png', 'image/414454647d9c73394a940c431eb6309ed75271d3.png', 
        'image/fc2931b42c1277c060a99d3c0e055cdf0b6614ed.png', 'image/6b947f826a607dee9cbdba7d222bbd46e1640ace.png', 
        'image/d7bf1dc0de2cc8c70f636e410a87fd4635e03374.png', 'image/35fd05ff73ab199a07f531eba62743f1b3cf0632.png', 
        'image/674e111db96a39c01307c3e4e6072eceb8153390.png', 'image/6f09d6d10c48da1220ada7401703da09fd8b507c.png', 
        'image/9a455a7834031df971c4ca3ded4283dc0fc66d72.png', 'image/17a3362ec7454a0b2c3add227c9598a1865b564b.png', 
        'image/737cb6be46709808cee7e0ca17d361c2ff50b701.png', 'image/9c2dd6c3a2f44f27a01a82cd7559808901ef4368.png', 
        'image/9a3c7a0ba8f8052b87476dd59a64294d6f67b48c.png', 'image/d6ca77eff533a674eddb886bd60e4acd8ff00c0c.png', 
        'image/61ed2e162b94deb60e741a30cc26150d5d17c8d8.png', 'image/9fcd464e2d12ebb7aa2722464eddb71c89473415.png', 
        'image/b3231633f08f157345f51e90c5f05fd2e2eef42e.png', 'image/db8ca75c0b448c4704dba8983e8f6559a0a903a6.png', 
        'image/20383779db1bdba480fc319b3d6b7ca1a95fbb1c.png', 'image/b5e993cf1eeaede40159f67ab0cba5dbaa981708.png', 
        'image/73ce49c941bd1d4e80e54d0e9f5b438682b96e37.png', 'image/abaef80687a1a50d78d88770dd743aef9dbd3765.png', 
        'image/c88988d41e7396f5c80135de076cdef81a3e54d3.png', 'image/70aa5b7e18f9026f839bdb248f93d2973b39e0a7.png', 
        'image/1bee062d0782c35e5a4c9b2c4b20ad2a2076ef42.png', 'image/75e27ed4b0e5ec590b31cd640f477b872db09789.png', 
        'image/20e231d2d85ba65b8c9c44db7499778a39397dfd.png',
    ];
    $DSImage2SanPham = [ 
        'image/1315549dfcf2de94a3b3650f121e93b9ce75fa00.png', 'image/5b78f62ea51c89044504f7c1fe0c04928390d85c.png', 
        'image/dc03ee23ed5da18c084d8bf9bb668faa12f4ae90.png', 'image/a4b5634d431d42de97ef70c06a586e28fdc762df.png', 
        'image/34204498f5d11a2605c621d9b852d9d0b1523f86.png', 'image/e83cf6cd753d5b3035b6beb78cd66aef33af8a2e.png', 
        'image/812e8905637af263939ac7ecd43b17a9bc1c52d9.png', 'image/b83e118485348482e1936b0932bdafaefc895ad1.png', 
        'image/5040e557459da3faf1770ec4baeb1e418ca2b851.png', 'image/93b2b5449c0e40ad8fd4761430e553caf9153ea5.png', 
        'image/e8c2a0fdc393bf26b0fcf27d4ff3700654602520.png', 'image/a8727469591eeb4f3013c0c8015eab8661708d64.png', 
        'image/55d45bdb12702dce9b6d01335708d2ad005e6777.png', 'image/ab756d3812553c446d65c9677843123032ee6454.png', 
        'image/27b109038ffa85bd5c9675ef9729ffb3fd83efd2.png', 'image/b322964368cb5d82687fc61d9fc0247260a9055f.png', 
        'image/dd1cb5fd61f25d8af9a917980d0a26df1aa4af1d.png', 'image/c6d1bb491084746ff9d3d4428808e758f40b468f.png', 
        'image/49b758763210c0fac46fbba9cf697db7dfd559fd.png', 'image/7cf7f791a748a90cad1ee618538400f0e3df968e.png', 
        'image/3150dac1f8576986388d82d2e3da2d5f99438772.png', 'image/afdad5c374697f7c0046e0bb699d9cd7944ba866.png', 
        'image/7222959cc50a7cbe1fd5dc60d5e2e6c43ad95839.png', 'image/79cd00212d74faca6647d7b498c24ff96312664f.png', 
        'image/52f70d6851579da45bdb3933a6eb5edf3da0e972.png', 'image/702919f6a99769eadff9011ffb4c4249bc851be9.png', 
        'image/6a23948c790f3ff9c9c5ba351a93c63a305cb6d7.png',
    ];
    $DSImage3SanPham = [ 
        'image/e5afd57f69b27da49ac64149fc74e83493dbc668.png', 'image/2854707c7e024c70b218907cd940de7aafc11efd.png', 
        'image/bbee9fdf92248daf662d5df7968310e6ba34ab73.png', 'image/28c5da39801be151838dc148cf4a15a16555741f.png', 
        'image/4beccb24e4d64b1a0df666f56c1746b5fbe14471.png', 'image/3d66ba05cb55c4b69dc200f971fcd45739e3fa91.png', 
        'image/7cf3fc0b5fb5ffbfb663c10f020427c73b5bb420.png', 'image/74a2f52cb203afb6410cc6b8f6538518f35916c1.png', 
        'image/349d9c4b717fb7f2071bb05a4b16ae6a8f1c855a.png', 'image/685f67411e4fb4005ae56b9d4c7f1ddd74ca5f97.png', 
        'image/7223fba2e5da2ec70646cdfd7e85549ef8c9612c.png', 'image/669e441cdc26d7e91a2912a9da0c1439b7b11541.png', 
        'image/6ec667d7573e2f406a3c6641a0d94526d5353430.png', 'image/d474206953cd7c9364717179fe2894321cb1e28f.png', 
        'image/acc05c58a484fafb4f54eb4578e6f5b106101b1f.png', 'image/9ddfd3790a5a9c0a2e4b5667173381b6f2bd66d1.png', 
        'image/99a3c277e6181c0c128bac13c392bcb84373ec19.png', 'image/a0c80211552f7759c00bfd25444ff172adbc048d.png', 
        'image/0ca62bd33a3bd8b8dca2e6095d416d3a85ae7ec7.png', 'image/09e8e22982804fe55d1bc6f2ce77cd5a2c4124c5.png', 
        'image/be26db39eb210c0cb4a5c28297d77beed9c939fc.png', 'image/c2bd66af5d7bd6738235210c8d63151c8d0d394b.png', 
        'image/3b5f9d1326ab289072707f635076c903ecd80c7c.png', 'image/0ced123537ba650d9b515bd3ef14ba3210546e24.png', 
        'image/048af2f2d8ed36fc20ef69649d28497e4bde0039.png', 'image/ca42b34c0b2fb7481ed6576971952ff341cec0e2.png', 
        'image/daaeab121efa1e41fe9ddf692bb18fb1ce63f610.png',    
    ];
    
    
    
    for ($i = 0; $i < count($DSTenSanPham); $i++) {
        $sql = 'INSERT INTO product (
            SP_TenSanPham, SP_GiaBanSanPham, SP_GiaNhapSanPham, SP_GiamGiaSanPham, SP_ThoiGianTaoSanPham, SP_TonKhoSanPham, SP_TongNhapSanPham, 
            SP_TongBanSanPham, SP_BaoHanhSanPham, SP_ThoiHanBaoHanhSanPham, SP_CongNgheManHinhSanPham, SP_DoPhanGiaiSanPham, 
            SP_KichThuocManHinhSanPham, SP_DoSangToiDaSanPham, SP_MatKinhCamUngManHinhSanPham, SP_DoPhanGiaiCMRSauSanPham, 
            SP_DenFlashSanPham, SP_MatKinhCamUngCMRSauSanPham, SP_DoPhanGiaiCMRTruocSanPham, SP_HeDieuHanhSanPham, SP_CPUSanPham, 
            SP_TocDoCPUSanPham, SP_GPUSanPham, SP_RAMSanPham, SP_ROMSanPham, SP_BoNhoKhaDungSanPham, SP_DanhBaSanPham, SP_MangDiDongSanPham, 
            SP_SIMSanPham, SP_WifiSanPham, SP_GPSSanPham, SP_BluetoothSanPham, SP_CongKetNoiSanPham, SP_JackTaiNgheSanPham, SP_KetNoiKhacSanPham, 
            SP_DungLuongPinSanPham, SP_LoaiPinSanPham, SP_HoTroSacToiDaSanPham, SP_CongNghePinSanPham, SP_BaoMatNangCaoSanPham, 
            SP_TinhNangDacBietSanPham, SP_KhangNuocBuiSanPham, SP_XemPhimSanPham, SP_GhiAmSanPham, SP_NgheNhacSanPham, SP_ThietKeSanPham, 
            SP_ChatLieuSanPham, SP_KichThuocSanPham, SP_KhoiLuongSanPham, SP_ThoiDiemRaMatSanPham, SP_MaChiNhanhSanPham, SP_Image1SanPham, 
            SP_Image2SanPham, SP_Image3SanPham, SP_XoaSanPham, SP_HangSanPham
            ) VALUE (
            "'.$DSTenSanPham[$i].'",
            "'.$DSGiaBanSanPham[$i].'",
            "'.$DSGiaNhapSanPham[$i].'",
            "'.$DSGiamGiaSanPham[$i].'", 
            "2020-07-15", "0", "0", "0", "1", "12", "Chưa cập nhật", 
            "'.$DSDoPhanGiaiSanPham [$i].'", 
            "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", 
            "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật",
            "'.$DSRamSanPham[$i].'",
            "'.$DSRomSanPham[$i].'",
            "'.$DSBoNhoKhaDungSanPham[$i].'", 
            "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", 
            "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", 
            "'.$DSCongNghePinSanPham[$i].'", 
            "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", "Chưa cập nhật", 
            "Chưa cập nhật", "Chưa cập nhật", "2020-07-15",
            "'.$DSMaChiNhanhSanPham[$i].'", 
            "'.$DSImage1SanPham[$i].'", 
            "'.$DSImage2SanPham[$i].'", 
            "'.$DSImage3SanPham[$i].'", 
            "No",
            "'.$DSHangSanPham[$i].'"
            )
        ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
    }
}


$sqlBranch = '
    CREATE TABLE branch (
        CN_IDChiNhanh INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        CN_TenChiNhanh VARCHAR(255) NOT NULL,
        CN_DiaChiChiNhanh VARCHAR(255) NOT NULL,
        CN_HotLineChiNhanh VARCHAR(255) NOT NULL,
        CN_NgayThanhLapChiNhanh VARCHAR(255) NOT NULL,
        CN_IDQuanLyChiNhanh VARCHAR(255) NOT NULL,
        CN_DeleteStatusChiNhanh VARCHAR(255) NOT NULL,
        CN_NgayTaoChiNhanh VARCHAR(255) NOT NULL,
        CN_GhiChuChiNhanh MEDIUMTEXT NOT NULL
    )
';

$stmt = $ConnectDataBase->connectDB()->prepare($sqlBranch);
if($stmt->execute()) {{
    $arrayTenChiNhanh = ['SB Mobile I', 'SB Mobile II', 'SB Mobile III'];
    $arrayDiaChiChiNhanh = ['Quận 5, TPHCM', 'Ba Đình, Hà Hội', 'Nha Trang, Khánh Hòa'];
    $arrayHotlineChiNhanh = ['0371111111', '0372222222', '0373333333'];
    $arrayIDQuanLyChiNhanh = ['2','3','4']; 
    
    for ($i = 0; $i < count($arrayTenChiNhanh); $i++) {
        $sql = ' INSERT INTO branch (
            CN_TenChiNhanh, CN_DiaChiChiNhanh, CN_HotLineChiNhanh, CN_NgayThanhLapChiNhanh,
            CN_IDQuanLyChiNhanh, CN_DeleteStatusChiNhanh, CN_NgayTaoChiNhanh, CN_GhiChuChiNhanh
            ) VALUES (
                "'.$arrayTenChiNhanh[$i].'",
                "'.$arrayDiaChiChiNhanh[$i].'",
                "'.$arrayHotlineChiNhanh[$i].'",
                "2020-07-15",
                "'.$arrayIDQuanLyChiNhanh[$i].'",
                "No",
                "2020-07-15",
                "Chưa cập nhật"
            )
        ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
    }    
}}


$sqlEmployee = '
    CREATE TABLE employee (
        NV_IDNhanVien INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        NV_TenNhanVien VARCHAR(255) NOT NULL,
        NV_SoDienThoaiNhanVien VARCHAR(255) NOT NULL,
        NV_DiaChiNhanVien VARCHAR(255) NOT NULL,
        NV_EmailNhanVien VARCHAR(255) NOT NULL,
        NV_NgaySinhNhanVien VARCHAR(255) NOT NULL,
        NV_GioiTinhNhanVien VARCHAR(255) NOT NULL,
        NV_MaChiNhanh VARCHAR(255) NOT NULL,
        NV_ChucVuNhanVien VARCHAR(255) NOT NULL,
        NV_NgayTaoNhanVien VARCHAR(255) NOT NULL,
        NV_AvatarNhanVien VARCHAR(255) NOT NULL,
        NV_GioiThieuNhanVien VARCHAR(255) NOT NULL,
        NV_FacebookNhanVien VARCHAR(255) NOT NULL,
        NV_TwitterNhanVien VARCHAR(255) NOT NULL,
        NV_LinkedNhanVien VARCHAR(255) NOT NULL,
        NV_DeleteStatusNhanVien VARCHAR(255) NOT NULL,
        NV_MatKhauNhanVien VARCHAR(255) NOT NULL,
        NV_XacThucEmailNhanVien VARCHAR(255) NOT NULL,
        NV_TrangThaiTaiKhoanNhanVien VARCHAR(255) NOT NULL,
        NV_TrangThaiDangNhapNhanVien VARCHAR(255) NOT NULL,
        NV_MaChoXacThucNhanVien VARCHAR(255) NOT NULL
    )
';

$stmt = $ConnectDataBase->connectDB()->prepare($sqlEmployee);
if ($stmt->execute()) {{
    $arrayTenNhanVien = ['Trương Thành Đại', 'Châu Quốc Thanh', 'Phan Thái Hòa', 'Lê Văn Tâm', 'Nguyễn Minh Long', 'Trần Minh Lâm'];
    $arraySoDienThoaiNhanVien  = ['0391111111', '0392222222', '0393333333', '03914444444', '0395555555', '0396666666'];
    $arrayDiaChiNhanVien  = ['Quận 1, TPHCM', 'Quận 2, TPHCM', 'Quận 3, TPHCM', 'Quận 4, TPHCM', 'Quận 5, TPHCM', 'Quận 6, TPHCM', ];
    $arrayEmailNhanVien  = ['admin001@gmail.com', 'admin002@gmail.com', 'admin003@gmail.com', 'admin004@gmail.com', 'admin005@gmail.com', 'admin006@gmail.com'];
    $arrayNgaySinhNhanVien  = ['2002-01-01', '2002-02-02', '2002-03-03', '2002-04-04', '2002-05-05', '2002-06-06'];
    $arrayGioiTinhNhanVien  = ['1', '1', '1', '1', '1', '1'];
    $arrayMaChiNhanhNhanVien  = ['Tất Cả Chi Nhánh', '1', '2', '3', '1', '2'];
    $arrayChucVuNhanVien  = ['2', '1', '1', '1', '0', '0'];
    
    for ($i = 0; $i < count($arrayTenNhanVien); $i++) {
        $sql = ' INSERT INTO employee (
            NV_TenNhanVien, NV_SoDienThoaiNhanVien, NV_DiaChiNhanVien, NV_EmailNhanVien, 
            NV_NgaySinhNhanVien, NV_GioiTinhNhanVien, NV_MaChiNhanh, NV_ChucVuNhanVien, NV_NgayTaoNhanVien, 
            NV_AvatarNhanVien, NV_GioiThieuNhanVien, NV_FacebookNhanVien, NV_TwitterNhanVien, NV_LinkedNhanVien, 
            NV_DeleteStatusNhanVien, NV_MatKhauNhanVien, NV_XacThucEmailNhanVien, NV_TrangThaiTaiKhoanNhanVien,
            NV_TrangThaiDangNhapNhanVien, NV_MaChoXacThucNhanVien
        ) VALUES (
            "'.$arrayTenNhanVien[$i].'",
            "'.$arraySoDienThoaiNhanVien[$i].'",
            "'.$arrayDiaChiNhanVien[$i].'",
            "'.$arrayEmailNhanVien[$i].'",
            "'.$arrayNgaySinhNhanVien[$i].'",
            "'.$arrayGioiTinhNhanVien[$i].'",
            "'.$arrayMaChiNhanhNhanVien[$i].'",
            "'.$arrayChucVuNhanVien[$i].'",
            "2020-07-15",
            "image/avtdefault.png",
            "Chưa cập nhật",
            "Chưa cập nhật",
            "Chưa cập nhật",
            "Chưa cập nhật",
            "No",
            "$2y$10$MWpM6xirQA/j7NdwOUSyieot5wz5HQeKFenM1CoQzbWB9CBnwbx/a",
            "",
            "Đã xác thực",
            "logout",
            ""
        )
        ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
    }
}}



$sqlCustomer = '
    CREATE TABLE customer (
        KH_IDKhachHang INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        KH_TenKhachHang VARCHAR(255) NOT NULL,
        KH_SDTKhachHang VARCHAR(255) NOT NULL,
        KH_DiaChiKhachHang VARCHAR(255) NOT NULL,
        KH_LoaiKhachHang VARCHAR(255) NOT NULL,
        KH_EmailKhachHang VARCHAR(255) NOT NULL,
        KH_TrangThaiDangNhapKhachHang VARCHAR(255) NOT NULL,
        KH_MaXacNhanKhachHang VARCHAR(255) NOT NULL,
        KH_NgayTaoKhachHang VARCHAR(255) NOT NULL,
        KH_MatKhauKhachHang VARCHAR(255) NOT NULL,
        KH_XoaKhachHang VARCHAR(255) NOT NULL,
        KH_AvatarKhachHang VARCHAR(255) NOT NULL,
        KH_TokenIDKhachHang VARCHAR(255), 
        KH_ConnectIDKhachHang VARCHAR(255)
     )
    ';

$stmt = $ConnectDataBase->connectDB()->prepare($sqlCustomer);
if ($stmt->execute()) {
    $arrayTenKhachHang = ['Bright Vachirawit', 'Win Metawin', 'Mean Phiravich', 'Plan Rathavit', 'Mew Suppasit', 'Gulf Kanawut', 
    'Perth Tanapon', 'Saint Suppapong', 'Singto Prachaya', 'Krist Perawat'];
    $arraySDTKhachHang  = ['0981111111', '0982222222', '0983333333', '0984444444', '0985555555', '0986666666', '0987777777',
    '0988888888', '0989999999', '0980000000'];
    $arrayDiaChiKhachHang  = ['Bangkok Thái Lan', 'Bangkok Thái Lan', 'Bangkok Thái Lan', 'Bangkok Thái Lan', 'Bangkok Thái Lan', 
    'Bangkok Thái Lan', 'Bangkok Thái Lan', 'Bangkok Thái Lan', 'Bangkok Thái Lan', 'Bangkok Thái Lan'];
    $arrayEmailKhachHang  = ['thanhdai003@gmail.com', 'thanhdai16378934@gmail.com', 'customer003@gmail.com', 'customer004@gmail.com',
    'customer005@gmail.com', 'customer006@gmail.com', 'customer007@gmail.com', 'customer008@gmail.com', 'customer009@gmail.com', 
    'customer010@gmail.com',];

    for ($i = 0; $i < count($arrayTenKhachHang); $i++) {
        $sql = ' INSERT INTO customer (
            KH_TenKhachHang, KH_SDTKhachHang, KH_DiaChiKhachHang, KH_LoaiKhachHang , KH_EmailKhachHang, 
            KH_TrangThaiDangNhapKhachHang, KH_MaXacNhanKhachHang, KH_NgayTaoKhachHang ,KH_MatKhauKhachHang, 
            KH_XoaKhachHang, KH_AvatarKhachHang
        ) VALUES (
        "'.$arrayTenKhachHang[$i].'",
        "'.$arraySDTKhachHang[$i].'",
        "'.$arrayDiaChiKhachHang[$i].'",
        "0",
        "'.$arrayEmailKhachHang[$i].'",
        "logout",
        "Chưa cập nhật",
        "2020-07-15",
        "$2y$10$MWpM6xirQA/j7NdwOUSyieot5wz5HQeKFenM1CoQzbWB9CBnwbx/a",
        "No",
        "image/avtdefault.png"
        )';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
    }
}


$sqlCart = '
CREATE TABLE cart (
    GH_IDGioHang INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    GH_IDKhachHang VARCHAR(255) NOT NULL,
    GH_IDSanPham VARCHAR(255) NOT NULL,
    GH_SLSanPhamGioHang VARCHAR(255) NOT NULL
)
';
$stmt = $ConnectDataBase->connectDB()->prepare($sqlCart);
$stmt->execute();

$sqlBill = '
CREATE TABLE bill (
    DH_IDDonHang INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DH_IDKhachHang VARCHAR(100) NOT NULL,
    DH_NgayDatDonHang DATE NOT NULL,
    DH_TrangThaiDonHang INT(10) NOT NULL
)
';
$stmt = $ConnectDataBase->connectDB()->prepare($sqlBill);
$stmt->execute();

$sqlBillDetails = '
CREATE TABLE billdetails (
    CTDH_IDChiTietDH INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CTDH_IDDonHang VARCHAR(100) NOT NULL,
    CTDH_IDSanPham VARCHAR(100) NOT NULL,
    CTDH_SLSanPham INT(100) NOT NULL
)
';
$stmt = $ConnectDataBase->connectDB()->prepare($sqlBillDetails);
$stmt->execute();
?>
