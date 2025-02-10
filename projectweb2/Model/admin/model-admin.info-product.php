<?php
class Product {
    private  $SP_IDSanPham, $SP_TenSanPham, $SP_GiaBanSanPham, $SP_GiaNhapSanPham, $SP_GiamGiaSanPham, $SP_ThoiGianTaoSanPham, 
    $SP_TonKhoSanPham, $SP_TongNhapSanPham, $SP_TongBanSanPham, $SP_BaoHanhSanPham, 
    $SP_ThoiHanBaoHanhSanPham, $SP_CongNgheManHinhSanPham, $SP_DoPhanGiaiSanPham, $SP_KichThuocManHinhSanPham, 
    $SP_DoSangToiDaSanPham, $SP_MatKinhCamUngManHinhSanPham, $SP_DoPhanGiaiCMRSauSanPham, $SP_DenFlashSanPham, 
    $SP_MatKinhCamUngCMRSauSanPham, $SP_DoPhanGiaiCMRTruocSanPham, $SP_HeDieuHanhSanPham, $SP_CPUSanPham, $SP_TocDoCPUSanPham, 
    $SP_GPUSanPham, $SP_RAMSanPham, $SP_ROMSanPham, $SP_BoNhoKhaDungSanPham, $SP_DanhBaSanPham, $SP_MangDiDongSanPham, 
    $SP_SIMSanPham, $SP_WifiSanPham, $SP_GPSSanPham, $SP_BluetoothSanPham, $SP_CongKetNoiSanPham, $SP_JackTaiNgheSanPham, 
    $SP_KetNoiKhacSanPham, $SP_DungLuongPinSanPham, $SP_LoaiPinSanPham, $SP_HoTroSacToiDaSanPham, $SP_CongNghePinSanPham, 
    $SP_BaoMatNangCaoSanPham, $SP_TinhNangDacBietSanPham, $SP_KhangNuocBuiSanPham, $SP_XemPhimSanPham, $SP_GhiAmSanPham, 
    $SP_NgheNhacSanPham, $SP_ThietKeSanPham, $SP_ChatLieuSanPham, $SP_KichThuocSanPham, $SP_KhoiLuongSanPham, $SP_ThoiDiemRaMatSanPham, 
    $SP_MaChiNhanhSanPham, $SP_Image1SanPham, $SP_Image2SanPham, $SP_Image3SanPham, $SP_XoaSanPham, $SP_HangSanPham;
    function __construct() {
        $this->SP_TenSanPham = "Chưa cập nhật";
        $this->SP_GiaBanSanPham = "-1";
        $this->SP_GiaNhapSanPham = "-1";
        $this->SP_GiamGiaSanPham = "0";
        $this->SP_ThoiGianTaoSanPham = date("Y-m-d");
        $this->SP_TonKhoSanPham = "0";
        $this->SP_TongNhapSanPham = "0";
        $this->SP_TongBanSanPham = "0";
        $this->SP_BaoHanhSanPham = "0";
        $this->SP_ThoiHanBaoHanhSanPham = "";
        $this->SP_CongNgheManHinhSanPham = "Chưa cập nhật";
        $this->SP_DoPhanGiaiSanPham = "Chưa cập nhật";
        $this->SP_KichThuocManHinhSanPham = "Chưa cập nhật";
        $this->SP_DoSangToiDaSanPham = "Chưa cập nhật";
        $this->SP_MatKinhCamUngManHinhSanPham = "Chưa cập nhật";
        $this->SP_DoPhanGiaiCMRSauSanPham = "Chưa cập nhật";
        $this->SP_DenFlashSanPham = "Chưa cập nhật";
        $this->SP_MatKinhCamUngCMRSauSanPham = "Chưa cập nhật";
        $this->SP_DoPhanGiaiCMRTruocSanPham = "Chưa cập nhật";
        $this->SP_HeDieuHanhSanPham = "Chưa cập nhật";
        $this->SP_CPUSanPham = "Chưa cập nhật";
        $this->SP_TocDoCPUSanPham = "Chưa cập nhật";
        $this->SP_GPUSanPham = "Chưa cập nhật";
        $this->SP_RAMSanPham = "-1";
        $this->SP_ROMSanPham = "-1";
        $this->SP_BoNhoKhaDungSanPham = "0";
        $this->SP_DanhBaSanPham = "Chưa cập nhật";
        $this->SP_MangDiDongSanPham = "Chưa cập nhật";
        $this->SP_SIMSanPham = "Chưa cập nhật";
        $this->SP_WifiSanPham = "Chưa cập nhật";
        $this->SP_GPSSanPham = "Chưa cập nhật";
        $this->SP_BluetoothSanPham = "Chưa cập nhật";
        $this->SP_CongKetNoiSanPham = "Chưa cập nhật";
        $this->SP_JackTaiNgheSanPham = "Chưa cập nhật";
        $this->SP_KetNoiKhacSanPham = "Chưa cập nhật";
        $this->SP_DungLuongPinSanPham = "Chưa cập nhật";
        $this->SP_LoaiPinSanPham = "Chưa cập nhật";
        $this->SP_HoTroSacToiDaSanPham = "Chưa cập nhật";
        $this->SP_CongNghePinSanPham = "Chưa cập nhật";
        $this->SP_BaoMatNangCaoSanPham = "Chưa cập nhật";
        $this->SP_TinhNangDacBietSanPham = "Chưa cập nhật";
        $this->SP_KhangNuocBuiSanPham = "Chưa cập nhật";
        $this->SP_XemPhimSanPham = "Chưa cập nhật";
        $this->SP_GhiAmSanPham = "Chưa cập nhật";
        $this->SP_NgheNhacSanPham = "Chưa cập nhật";
        $this->SP_ThietKeSanPham = "Chưa cập nhật";
        $this->SP_ChatLieuSanPham = "Chưa cập nhật";
        $this->SP_KichThuocSanPham = "Chưa cập nhật";
        $this->SP_KhoiLuongSanPham = "Chưa cập nhật";
        $this->SP_ThoiDiemRaMatSanPham = "Chưa cập nhật";
        $this->SP_MaChiNhanhSanPham = "Chưa cập nhật";
        $this->SP_Image1SanPham = "image/product-default.png";
        $this->SP_Image2SanPham = "image/product-default.png";
        $this->SP_Image3SanPham = "image/product-default.png";
        $this->SP_XoaSanPham = 'No';
        $this->SP_HangSanPham = 'Chưa cập nhật';
    }

    public function setSP_IDSanPham($SP_IDSanPham) {$this->SP_IDSanPham = $SP_IDSanPham; }
    public function setSP_TenSanPham($SP_TenSanPham) {$this->SP_TenSanPham = $SP_TenSanPham; }
    public function setSP_GiaBanSanPham($SP_GiaBanSanPham) {$this->SP_GiaBanSanPham = $SP_GiaBanSanPham; }
    public function setSP_GiaNhapSanPham($SP_GiaNhapSanPham) {$this->SP_GiaNhapSanPham = $SP_GiaNhapSanPham; }
    public function setSP_GiamGiaSanPham($SP_GiamGiaSanPham) {$this->SP_GiamGiaSanPham = $SP_GiamGiaSanPham; }
    public function setSP_ThoiGianTaoSanPham($SP_ThoiGianTaoSanPham) {$this->SP_ThoiGianTaoSanPham = $SP_ThoiGianTaoSanPham; }
    public function setSP_TonKhoSanPham($SP_TonKhoSanPham) {$this->SP_TonKhoSanPham = $SP_TonKhoSanPham; }
    public function setSP_TongNhapSanPham($SP_TongNhapSanPham) {$this->SP_TongNhapSanPham = $SP_TongNhapSanPham; }
    public function setSP_TongBanSanPham($SP_TongBanSanPham) {$this->SP_TongBanSanPham = $SP_TongBanSanPham; }
    public function setSP_BaoHanhSanPham($SP_BaoHanhSanPham) {$this->SP_BaoHanhSanPham = $SP_BaoHanhSanPham; }
    public function setSP_ThoiHanBaoHanhSanPham($SP_ThoiHanBaoHanhSanPham) {$this->SP_ThoiHanBaoHanhSanPham = $SP_ThoiHanBaoHanhSanPham; }
    public function setSP_CongNgheManHinhSanPham($SP_CongNgheManHinhSanPham) {$this->SP_CongNgheManHinhSanPham = $SP_CongNgheManHinhSanPham; }
    public function setSP_DoPhanGiaiSanPham($SP_DoPhanGiaiSanPham) {$this->SP_DoPhanGiaiSanPham = $SP_DoPhanGiaiSanPham; }
    public function setSP_KichThuocManHinhSanPham($SP_KichThuocManHinhSanPham) {$this->SP_KichThuocManHinhSanPham = $SP_KichThuocManHinhSanPham; }
    public function setSP_DoSangToiDaSanPham($SP_DoSangToiDaSanPham) {$this->SP_DoSangToiDaSanPham = $SP_DoSangToiDaSanPham; }
    public function setSP_MatKinhCamUngManHinhSanPham($SP_MatKinhCamUngManHinhSanPham) {$this->SP_MatKinhCamUngManHinhSanPham = $SP_MatKinhCamUngManHinhSanPham; }
    public function setSP_DoPhanGiaiCMRSauSanPham($SP_DoPhanGiaiCMRSauSanPham) {$this->SP_DoPhanGiaiCMRSauSanPham = $SP_DoPhanGiaiCMRSauSanPham; }
    public function setSP_DenFlashSanPham($SP_DenFlashSanPham) {$this->SP_DenFlashSanPham = $SP_DenFlashSanPham; }
    public function setSP_MatKinhCamUngCMRSauSanPham($SP_MatKinhCamUngCMRSauSanPham) {$this->SP_MatKinhCamUngCMRSauSanPham = $SP_MatKinhCamUngCMRSauSanPham; }
    public function setSP_DoPhanGiaiCMRTruocSanPham($SP_DoPhanGiaiCMRTruocSanPham) {$this->SP_DoPhanGiaiCMRTruocSanPham = $SP_DoPhanGiaiCMRTruocSanPham; }
    public function setSP_HeDieuHanhSanPham($SP_HeDieuHanhSanPham) {$this->SP_HeDieuHanhSanPham = $SP_HeDieuHanhSanPham; }
    public function setSP_CPUSanPham($SP_CPUSanPham) {$this->SP_CPUSanPham = $SP_CPUSanPham; }
    public function setSP_TocDoCPUSanPham($SP_TocDoCPUSanPham) {$this->SP_TocDoCPUSanPham = $SP_TocDoCPUSanPham; }
    public function setSP_GPUSanPham($SP_GPUSanPham) {$this->SP_GPUSanPham = $SP_GPUSanPham; }
    public function setSP_RAMSanPham($SP_RAMSanPham) {$this->SP_RAMSanPham = $SP_RAMSanPham; }
    public function setSP_ROMSanPham($SP_ROMSanPham) {$this->SP_ROMSanPham = $SP_ROMSanPham; }
    public function setSP_BoNhoKhaDungSanPham($SP_BoNhoKhaDungSanPham) {$this->SP_BoNhoKhaDungSanPham = $SP_BoNhoKhaDungSanPham; }
    public function setSP_DanhBaSanPham($SP_DanhBaSanPham) {$this->SP_DanhBaSanPham = $SP_DanhBaSanPham; }
    public function setSP_MangDiDongSanPham($SP_MangDiDongSanPham) {$this->SP_MangDiDongSanPham = $SP_MangDiDongSanPham; }
    public function setSP_SIMSanPham($SP_SIMSanPham) {$this->SP_SIMSanPham = $SP_SIMSanPham; }
    public function setSP_WifiSanPham($SP_WifiSanPham) {$this->SP_WifiSanPham = $SP_WifiSanPham; }
    public function setSP_GPSSanPham($SP_GPSSanPham) {$this->SP_GPSSanPham = $SP_GPSSanPham; }
    public function setSP_BluetoothSanPham($SP_BluetoothSanPham) {$this->SP_BluetoothSanPham = $SP_BluetoothSanPham; }
    public function setSP_CongKetNoiSanPham($SP_CongKetNoiSanPham) {$this->SP_CongKetNoiSanPham = $SP_CongKetNoiSanPham; }
    public function setSP_JackTaiNgheSanPham($SP_JackTaiNgheSanPham) {$this->SP_JackTaiNgheSanPham = $SP_JackTaiNgheSanPham; }
    public function setSP_KetNoiKhacSanPham($SP_KetNoiKhacSanPham) {$this->SP_KetNoiKhacSanPham = $SP_KetNoiKhacSanPham; }
    public function setSP_DungLuongPinSanPham($SP_DungLuongPinSanPham) {$this->SP_DungLuongPinSanPham = $SP_DungLuongPinSanPham; }
    public function setSP_LoaiPinSanPham($SP_LoaiPinSanPham) {$this->SP_LoaiPinSanPham = $SP_LoaiPinSanPham; }
    public function setSP_HoTroSacToiDaSanPham($SP_HoTroSacToiDaSanPham) {$this->SP_HoTroSacToiDaSanPham = $SP_HoTroSacToiDaSanPham; }
    public function setSP_CongNghePinSanPham($SP_CongNghePinSanPham) {$this->SP_CongNghePinSanPham = $SP_CongNghePinSanPham; }
    public function setSP_BaoMatNangCaoSanPham($SP_BaoMatNangCaoSanPham) {$this->SP_BaoMatNangCaoSanPham = $SP_BaoMatNangCaoSanPham; }
    public function setSP_TinhNangDacBietSanPham($SP_TinhNangDacBietSanPham) {$this->SP_TinhNangDacBietSanPham = $SP_TinhNangDacBietSanPham; }
    public function setSP_KhangNuocBuiSanPham($SP_KhangNuocBuiSanPham) {$this->SP_KhangNuocBuiSanPham = $SP_KhangNuocBuiSanPham; }
    public function setSP_XemPhimSanPham($SP_XemPhimSanPham) {$this->SP_XemPhimSanPham = $SP_XemPhimSanPham; }
    public function setSP_GhiAmSanPham($SP_GhiAmSanPham) {$this->SP_GhiAmSanPham = $SP_GhiAmSanPham; }
    public function setSP_NgheNhacSanPham($SP_NgheNhacSanPham) {$this->SP_NgheNhacSanPham = $SP_NgheNhacSanPham; }
    public function setSP_ThietKeSanPham($SP_ThietKeSanPham) {$this->SP_ThietKeSanPham = $SP_ThietKeSanPham; }
    public function setSP_ChatLieuSanPham($SP_ChatLieuSanPham) {$this->SP_ChatLieuSanPham = $SP_ChatLieuSanPham; }
    public function setSP_KichThuocSanPham($SP_KichThuocSanPham) {$this->SP_KichThuocSanPham = $SP_KichThuocSanPham; }
    public function setSP_KhoiLuongSanPham($SP_KhoiLuongSanPham) {$this->SP_KhoiLuongSanPham = $SP_KhoiLuongSanPham; }
    public function setSP_ThoiDiemRaMatSanPham($SP_ThoiDiemRaMatSanPham) {$this->SP_ThoiDiemRaMatSanPham = $SP_ThoiDiemRaMatSanPham; }
    public function setSP_MaChiNhanhSanPham($SP_MaChiNhanhSanPham) {$this->SP_MaChiNhanhSanPham = $SP_MaChiNhanhSanPham; }
    public function setSP_Image1SanPham($SP_Image1SanPham) {$this->SP_Image1SanPham = $SP_Image1SanPham; }
    public function setSP_Image2SanPham($SP_Image2SanPham) {$this->SP_Image2SanPham = $SP_Image2SanPham; }
    public function setSP_Image3SanPham($SP_Image3SanPham) {$this->SP_Image3SanPham = $SP_Image3SanPham; }
    public function setSP_XoaSanPham($SP_XoaSanPham) {$this->SP_XoaSanPham = $SP_XoaSanPham; }
    public function setSP_HangSanPham($SP_HangSanPham) {$this->SP_HangSanPham = $SP_HangSanPham; }

    function insertProduct () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'INSERT INTO product (SP_TenSanPham, SP_GiaBanSanPham, SP_GiaNhapSanPham, SP_GiamGiaSanPham, SP_ThoiGianTaoSanPham, 
        SP_TonKhoSanPham, SP_TongNhapSanPham, SP_TongBanSanPham, SP_BaoHanhSanPham, SP_ThoiHanBaoHanhSanPham, 
        SP_CongNgheManHinhSanPham, SP_DoPhanGiaiSanPham, SP_KichThuocManHinhSanPham, SP_DoSangToiDaSanPham, SP_MatKinhCamUngManHinhSanPham, 
        SP_DoPhanGiaiCMRSauSanPham, SP_DenFlashSanPham, SP_MatKinhCamUngCMRSauSanPham, SP_DoPhanGiaiCMRTruocSanPham, SP_HeDieuHanhSanPham, 
        SP_CPUSanPham, SP_TocDoCPUSanPham, SP_GPUSanPham, SP_RAMSanPham, SP_ROMSanPham, SP_BoNhoKhaDungSanPham, SP_DanhBaSanPham, 
        SP_MangDiDongSanPham, SP_SIMSanPham, SP_WifiSanPham, SP_GPSSanPham, SP_BluetoothSanPham, SP_CongKetNoiSanPham, SP_JackTaiNgheSanPham, 
        SP_KetNoiKhacSanPham, SP_DungLuongPinSanPham, SP_LoaiPinSanPham, SP_HoTroSacToiDaSanPham, SP_CongNghePinSanPham, SP_BaoMatNangCaoSanPham, 
        SP_TinhNangDacBietSanPham, SP_KhangNuocBuiSanPham, SP_XemPhimSanPham, SP_GhiAmSanPham, SP_NgheNhacSanPham, SP_ThietKeSanPham, 
        SP_ChatLieuSanPham, SP_KichThuocSanPham, SP_KhoiLuongSanPham, SP_ThoiDiemRaMatSanPham, SP_MaChiNhanhSanPham, SP_Image1SanPham,
        SP_Image2SanPham, SP_Image3SanPham, SP_XoaSanPham, SP_HangSanPham) 
        VALUES (:SP_TenSanPham, :SP_GiaBanSanPham, :SP_GiaNhapSanPham, :SP_GiamGiaSanPham, :SP_ThoiGianTaoSanPham, 
        :SP_TonKhoSanPham, :SP_TongNhapSanPham, :SP_TongBanSanPham, :SP_BaoHanhSanPham, :SP_ThoiHanBaoHanhSanPham, 
        :SP_CongNgheManHinhSanPham, :SP_DoPhanGiaiSanPham, :SP_KichThuocManHinhSanPham, :SP_DoSangToiDaSanPham, :SP_MatKinhCamUngManHinhSanPham, 
        :SP_DoPhanGiaiCMRSauSanPham, :SP_DenFlashSanPham, :SP_MatKinhCamUngCMRSauSanPham, :SP_DoPhanGiaiCMRTruocSanPham, :SP_HeDieuHanhSanPham, 
        :SP_CPUSanPham, :SP_TocDoCPUSanPham, :SP_GPUSanPham, :SP_RAMSanPham, :SP_ROMSanPham, :SP_BoNhoKhaDungSanPham, :SP_DanhBaSanPham, 
        :SP_MangDiDongSanPham, :SP_SIMSanPham, :SP_WifiSanPham, :SP_GPSSanPham, :SP_BluetoothSanPham, :SP_CongKetNoiSanPham, :SP_JackTaiNgheSanPham, 
        :SP_KetNoiKhacSanPham, :SP_DungLuongPinSanPham, :SP_LoaiPinSanPham, :SP_HoTroSacToiDaSanPham, :SP_CongNghePinSanPham, :SP_BaoMatNangCaoSanPham, 
        :SP_TinhNangDacBietSanPham, :SP_KhangNuocBuiSanPham, :SP_XemPhimSanPham, :SP_GhiAmSanPham, :SP_NgheNhacSanPham, :SP_ThietKeSanPham, 
        :SP_ChatLieuSanPham, :SP_KichThuocSanPham, :SP_KhoiLuongSanPham, :SP_ThoiDiemRaMatSanPham, :SP_MaChiNhanhSanPham, :SP_Image1SanPham,
        :SP_Image2SanPham, :SP_Image3SanPham, :SP_XoaSanPham, :SP_HangSanPham)';

        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_TenSanPham',$this->SP_TenSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_GiaBanSanPham',$this->SP_GiaBanSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_GiaNhapSanPham',$this->SP_GiaNhapSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_GiamGiaSanPham',$this->SP_GiamGiaSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ThoiGianTaoSanPham',$this->SP_ThoiGianTaoSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_TonKhoSanPham',$this->SP_TonKhoSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_TongNhapSanPham',$this->SP_TongNhapSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_TongBanSanPham',$this->SP_TongBanSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_BaoHanhSanPham',$this->SP_BaoHanhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ThoiHanBaoHanhSanPham',$this->SP_ThoiHanBaoHanhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_CongNgheManHinhSanPham',$this->SP_CongNgheManHinhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DoPhanGiaiSanPham',$this->SP_DoPhanGiaiSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_KichThuocManHinhSanPham',$this->SP_KichThuocManHinhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DoSangToiDaSanPham',$this->SP_DoSangToiDaSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_MatKinhCamUngManHinhSanPham',$this->SP_MatKinhCamUngManHinhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DoPhanGiaiCMRSauSanPham',$this->SP_DoPhanGiaiCMRSauSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DenFlashSanPham',$this->SP_DenFlashSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_MatKinhCamUngCMRSauSanPham',$this->SP_MatKinhCamUngCMRSauSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DoPhanGiaiCMRTruocSanPham',$this->SP_DoPhanGiaiCMRTruocSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_HeDieuHanhSanPham',$this->SP_HeDieuHanhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_CPUSanPham',$this->SP_CPUSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_TocDoCPUSanPham',$this->SP_TocDoCPUSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_GPUSanPham',$this->SP_GPUSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_RAMSanPham',$this->SP_RAMSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ROMSanPham',$this->SP_ROMSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_BoNhoKhaDungSanPham',$this->SP_BoNhoKhaDungSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DanhBaSanPham',$this->SP_DanhBaSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_MangDiDongSanPham',$this->SP_MangDiDongSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_SIMSanPham',$this->SP_SIMSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_WifiSanPham',$this->SP_WifiSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_GPSSanPham',$this->SP_GPSSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_BluetoothSanPham',$this->SP_BluetoothSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_CongKetNoiSanPham',$this->SP_CongKetNoiSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_JackTaiNgheSanPham',$this->SP_JackTaiNgheSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_KetNoiKhacSanPham',$this->SP_KetNoiKhacSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DungLuongPinSanPham',$this->SP_DungLuongPinSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_LoaiPinSanPham',$this->SP_LoaiPinSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_HoTroSacToiDaSanPham',$this->SP_HoTroSacToiDaSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_CongNghePinSanPham',$this->SP_CongNghePinSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_BaoMatNangCaoSanPham',$this->SP_BaoMatNangCaoSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_TinhNangDacBietSanPham',$this->SP_TinhNangDacBietSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_KhangNuocBuiSanPham',$this->SP_KhangNuocBuiSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_XemPhimSanPham',$this->SP_XemPhimSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_GhiAmSanPham',$this->SP_GhiAmSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_NgheNhacSanPham',$this->SP_NgheNhacSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ThietKeSanPham',$this->SP_ThietKeSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ChatLieuSanPham',$this->SP_ChatLieuSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_KichThuocSanPham',$this->SP_KichThuocSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_KhoiLuongSanPham',$this->SP_KhoiLuongSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ThoiDiemRaMatSanPham',$this->SP_ThoiDiemRaMatSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_MaChiNhanhSanPham',$this->SP_MaChiNhanhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_Image1SanPham',$this->SP_Image1SanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_Image2SanPham',$this->SP_Image2SanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_Image3SanPham',$this->SP_Image3SanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_XoaSanPham',$this->SP_XoaSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_HangSanPham',$this->SP_HangSanPham, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateInfoProduct() {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE product SET 
        SP_TenSanPham = :SP_TenSanPham, 
        SP_GiaBanSanPham = :SP_GiaBanSanPham,
        SP_GiaNhapSanPham = :SP_GiaNhapSanPham, 
        SP_GiamGiaSanPham = :SP_GiamGiaSanPham, 
        SP_BaoHanhSanPham = :SP_BaoHanhSanPham,
        SP_ThoiHanBaoHanhSanPham = :SP_ThoiHanBaoHanhSanPham,
        SP_CongNgheManHinhSanPham = :SP_CongNgheManHinhSanPham,
        SP_DoPhanGiaiSanPham = :SP_DoPhanGiaiSanPham,
        SP_KichThuocManHinhSanPham = :SP_KichThuocManHinhSanPham,
        SP_DoSangToiDaSanPham = :SP_DoSangToiDaSanPham,
        SP_MatKinhCamUngManHinhSanPham = :SP_MatKinhCamUngManHinhSanPham,
        SP_DoPhanGiaiCMRSauSanPham = :SP_DoPhanGiaiCMRSauSanPham,
        SP_DenFlashSanPham = :SP_DenFlashSanPham,
        SP_MatKinhCamUngCMRSauSanPham = :SP_MatKinhCamUngCMRSauSanPham,
        SP_DoPhanGiaiCMRTruocSanPham = :SP_DoPhanGiaiCMRTruocSanPham,
        SP_HeDieuHanhSanPham = :SP_HeDieuHanhSanPham,
        SP_CPUSanPham = :SP_CPUSanPham,
        SP_TocDoCPUSanPham = :SP_TocDoCPUSanPham,
        SP_GPUSanPham = :SP_GPUSanPham,
        SP_RAMSanPham = :SP_RAMSanPham,
        SP_ROMSanPham = :SP_ROMSanPham,
        SP_BoNhoKhaDungSanPham = :SP_BoNhoKhaDungSanPham,
        SP_DanhBaSanPham = :SP_DanhBaSanPham,
        SP_MangDiDongSanPham = :SP_MangDiDongSanPham,
        SP_SIMSanPham = :SP_SIMSanPham,
        SP_WifiSanPham = :SP_WifiSanPham,
        SP_GPSSanPham = :SP_GPSSanPham,
        SP_BluetoothSanPham = :SP_BluetoothSanPham,
        SP_CongKetNoiSanPham = :SP_CongKetNoiSanPham,
        SP_JackTaiNgheSanPham = :SP_JackTaiNgheSanPham,
        SP_KetNoiKhacSanPham = :SP_KetNoiKhacSanPham,
        SP_DungLuongPinSanPham = :SP_DungLuongPinSanPham,
        SP_LoaiPinSanPham = :SP_LoaiPinSanPham,
        SP_HoTroSacToiDaSanPham = :SP_HoTroSacToiDaSanPham,
        SP_CongNghePinSanPham = :SP_CongNghePinSanPham,
        SP_BaoMatNangCaoSanPham = :SP_BaoMatNangCaoSanPham,
        SP_TinhNangDacBietSanPham = :SP_TinhNangDacBietSanPham,
        SP_KhangNuocBuiSanPham = :SP_KhangNuocBuiSanPham,
        SP_XemPhimSanPham = :SP_XemPhimSanPham,
        SP_GhiAmSanPham = :SP_GhiAmSanPham,
        SP_NgheNhacSanPham = :SP_NgheNhacSanPham,
        SP_ThietKeSanPham = :SP_ThietKeSanPham,
        SP_ChatLieuSanPham = :SP_ChatLieuSanPham,
        SP_KichThuocSanPham = :SP_KichThuocSanPham,
        SP_KhoiLuongSanPham = :SP_KhoiLuongSanPham,
        SP_ThoiDiemRaMatSanPham = :SP_ThoiDiemRaMatSanPham,
        SP_MaChiNhanhSanPham = :SP_MaChiNhanhSanPham,
        SP_HangSanPham = :SP_HangSanPham
        WHERE SP_IDSanPham = :SP_IDSanPham";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_TenSanPham', $this->SP_TenSanPham, PDO::PARAM_STR); 
        $stmt->bindParam(':SP_GiaBanSanPham', $this->SP_GiaBanSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_GiaNhapSanPham', $this->SP_GiaNhapSanPham, PDO::PARAM_STR); 
        $stmt->bindParam(':SP_GiamGiaSanPham', $this->SP_GiamGiaSanPham, PDO::PARAM_STR); 
        $stmt->bindParam(':SP_BaoHanhSanPham', $this->SP_BaoHanhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ThoiHanBaoHanhSanPham', $this->SP_ThoiHanBaoHanhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_CongNgheManHinhSanPham', $this->SP_CongNgheManHinhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DoPhanGiaiSanPham', $this->SP_DoPhanGiaiSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_KichThuocManHinhSanPham', $this->SP_KichThuocManHinhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DoSangToiDaSanPham', $this->SP_DoSangToiDaSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_MatKinhCamUngManHinhSanPham', $this->SP_MatKinhCamUngManHinhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DoPhanGiaiCMRSauSanPham', $this->SP_DoPhanGiaiCMRSauSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DenFlashSanPham', $this->SP_DenFlashSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_MatKinhCamUngCMRSauSanPham', $this->SP_MatKinhCamUngCMRSauSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DoPhanGiaiCMRTruocSanPham', $this->SP_DoPhanGiaiCMRTruocSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_HeDieuHanhSanPham', $this->SP_HeDieuHanhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_CPUSanPham', $this->SP_CPUSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_TocDoCPUSanPham', $this->SP_TocDoCPUSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_GPUSanPham', $this->SP_GPUSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_RAMSanPham', $this->SP_RAMSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ROMSanPham', $this->SP_ROMSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_BoNhoKhaDungSanPham', $this->SP_BoNhoKhaDungSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DanhBaSanPham', $this->SP_DanhBaSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_MangDiDongSanPham', $this->SP_MangDiDongSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_SIMSanPham', $this->SP_SIMSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_WifiSanPham', $this->SP_WifiSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_GPSSanPham', $this->SP_GPSSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_BluetoothSanPham', $this->SP_BluetoothSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_CongKetNoiSanPham', $this->SP_CongKetNoiSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_JackTaiNgheSanPham', $this->SP_JackTaiNgheSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_KetNoiKhacSanPham', $this->SP_KetNoiKhacSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_DungLuongPinSanPham', $this->SP_DungLuongPinSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_LoaiPinSanPham', $this->SP_LoaiPinSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_HoTroSacToiDaSanPham', $this->SP_HoTroSacToiDaSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_CongNghePinSanPham', $this->SP_CongNghePinSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_BaoMatNangCaoSanPham', $this->SP_BaoMatNangCaoSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_TinhNangDacBietSanPham', $this->SP_TinhNangDacBietSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_KhangNuocBuiSanPham', $this->SP_KhangNuocBuiSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_XemPhimSanPham', $this->SP_XemPhimSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_GhiAmSanPham', $this->SP_GhiAmSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_NgheNhacSanPham', $this->SP_NgheNhacSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ThietKeSanPham', $this->SP_ThietKeSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ChatLieuSanPham', $this->SP_ChatLieuSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_KichThuocSanPham', $this->SP_KichThuocSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_KhoiLuongSanPham', $this->SP_KhoiLuongSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_ThoiDiemRaMatSanPham', $this->SP_ThoiDiemRaMatSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_MaChiNhanhSanPham', $this->SP_MaChiNhanhSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_HangSanPham', $this->SP_HangSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':SP_IDSanPham', $this->SP_IDSanPham, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function selectAllProduct () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM product WHERE SP_XoaSanPham = 'No'";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function selectProductDistinct ($sql) {
        $ConnectDataBase = new ConnectDataBase;
        // $sql = "SELECT DISTINCT SP_RAMSanPham FROM product WHERE SP_XoaSanPham = 'No'";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function selectProductByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM product WHERE SP_IDSanPham = :SP_IDSanPham";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_IDSanPham', $this->SP_IDSanPham);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result[0];
        } else {
            return "";
        }
    }

    function checkBranchCode ($IDChiNhanhCheck) {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM branch WHERE CN_DeleteStatusChiNhanh = 'No'";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = 0;
        if (count($result) > 0) {
            for ($i = 0; $i < count($result); $i++) {
                $IDChiNhanh = "CN" . $result[$i]['CN_IDChiNhanh'];
                if ($IDChiNhanh === $IDChiNhanhCheck) {
                    $count++;
                }
            }
            if ($count > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function countRecordProduct ($queryProduct) {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM product WHERE SP_XoaSanPham = 'No'";
        if ($queryProduct !== '') {
            $sql .= ' AND SP_TenSanPham LIKE "%'.$queryProduct.'%" ';
        }
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return count($result);
    }

    function selectLimitProduct ($limitProduct, $startProduct, $queryProduct, $sortIDProduct, $sortDateProduct, $sortPriceProduct) {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM product WHERE SP_XoaSanPham = 'No' ";
        $arrayReplace = ['SP', 'sp'];
        $queryProduct = trim(str_replace($arrayReplace, '', $queryProduct));
        if ($queryProduct !== '') {
            $sql .= ' AND ( SP_TenSanPham LIKE "%'.$queryProduct.'%" OR SP_IDSanPham LIKE "%'.$queryProduct.'%" ) ';
        }
        if ($sortIDProduct !== '' && $sortDateProduct === '' && $sortPriceProduct === '') {
            $sql .= 'ORDER BY SP_IDSanPham '.$sortIDProduct.' ';
        } else 
        if ($sortDateProduct !== '' && $sortIDProduct === '' && $sortPriceProduct === '') {
            $sql .= 'ORDER BY SP_ThoiGianTaoSanPham '.$sortDateProduct.' ';
        } else
        if ($sortDateProduct === '' && $sortIDProduct === '' && $sortPriceProduct !== '') {
            $sql .= 'ORDER BY CONVERT(SP_GiaBanSanPham, INT) '.$sortPriceProduct.' ';
        } else {
            $sql .= 'ORDER BY SP_IDSanPham '.$sortIDProduct.' ';
        } 

        $sqlProduct =  $sql . 'LIMIT '.$startProduct.', '.$limitProduct.' ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sqlProduct);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function setDeleteStatusProductByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE product SET SP_XoaSanPham = 'Yes' WHERE SP_IDSanPham = :SP_IDSanPham";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_IDSanPham', $this->SP_IDSanPham);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateImage_1_ProductByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE product SET SP_Image1SanPham = :SP_Image1SanPham WHERE SP_IDSanPham = :SP_IDSanPham";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_Image1SanPham', $this->SP_Image1SanPham);
        $stmt->bindParam(':SP_IDSanPham', $this->SP_IDSanPham);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateImage_2_ProductByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE product SET SP_Image2SanPham = :SP_Image2SanPham WHERE SP_IDSanPham = :SP_IDSanPham";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_Image2SanPham', $this->SP_Image2SanPham);
        $stmt->bindParam(':SP_IDSanPham', $this->SP_IDSanPham);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateImage_3_ProductByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE product SET SP_Image3SanPham = :SP_Image3SanPham WHERE SP_IDSanPham = :SP_IDSanPham";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_Image3SanPham', $this->SP_Image3SanPham);
        $stmt->bindParam(':SP_IDSanPham', $this->SP_IDSanPham);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function getInventoryByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT SP_TonKhoSanPham FROM product WHERE SP_XoaSanPham = 'No' AND SP_IDSanPham = :SP_IDSanPham ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_IDSanPham', $this->SP_IDSanPham);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return intval($result[0]['SP_TonKhoSanPham']);
    }

    function getImportByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT SP_TongNhapSanPham FROM product WHERE SP_XoaSanPham = 'No' AND SP_IDSanPham = :SP_IDSanPham ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_IDSanPham', $this->SP_IDSanPham);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return intval($result[0]['SP_TongNhapSanPham']);
    }

    function updateQuantityProductByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE product SET SP_TonKhoSanPham = :SP_TonKhoSanPham, SP_TongNhapSanPham = :SP_TongNhapSanPham WHERE SP_IDSanPham = :SP_IDSanPham";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_TonKhoSanPham', $this->SP_TonKhoSanPham);
        $stmt->bindParam(':SP_TongNhapSanPham', $this->SP_TongNhapSanPham);
        $stmt->bindParam(':SP_IDSanPham', $this->SP_IDSanPham);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function countProductPage ($queryProduct) { 
        $ValidateClass = new ValidateData;
        $ConnectDataBase = new ConnectDataBase;
        $filterName = $ValidateClass->standardizeString($queryProduct['filterName']);
        $filterCate = $ValidateClass->standardizeString($queryProduct['filterCate']);
        $filterPriceMin = $ValidateClass->standardizeString($queryProduct['filterPriceMin']);
        $filterPriceMax = $ValidateClass->standardizeString($queryProduct['filterPriceMax']);
        $filterRam = $ValidateClass->standardizeString($queryProduct['filterRam']);
        $filterRom = $ValidateClass->standardizeString($queryProduct['filterRom']);
        $filterBattery = $ValidateClass->standardizeString($queryProduct['filterBattery']);
        $filterCamera = $ValidateClass->standardizeString($queryProduct['filterCamera']);  
        $filterBranch = $ValidateClass->standardizeString($queryProduct['filterBranch']);    
        
        $sql = ' SELECT * FROM product WHERE SP_XoaSanPham = "No" 
        AND LOWER(SP_TenSanPham) LIKE "%'.$filterName.'%"
        AND SP_HangSanPham LIKE "%'.$filterCate.'%"
        AND (SP_GiaBanSanPham BETWEEN '.$filterPriceMin.' AND '.$filterPriceMax.')  
        AND SP_RAMSanPham LIKE "%'.$filterRam.'%" 
        AND SP_ROMSanPham LIKE "%'.$filterRom.'%"
        AND SP_CongNghePinSanPham LIKE "%'.$filterBattery.'%" 
        AND SP_DoPhanGiaiSanPham LIKE "%'.$filterCamera.'%" 
        AND SP_MaChiNhanhSanPham LIKE "%'.$filterBranch.'%" 
        AND SP_MaChiNhanhSanPham != "Chưa cập nhật" 
        AND SP_HangSanPham != "Chưa cập nhật"
        AND SP_TenSanPham != "Chưa cập nhật"
        ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return count($result);
    }

    function selectProductPage($limitProduct, $startProduct, $queryProduct) {
        $ValidateClass = new ValidateData;
        $ConnectDataBase = new ConnectDataBase;
        $filterName = $ValidateClass->standardizeString($queryProduct['filterName']);
        $filterCate = $ValidateClass->standardizeString($queryProduct['filterCate']);
        $filterPriceMin = $ValidateClass->standardizeString($queryProduct['filterPriceMin']);
        $filterPriceMax = $ValidateClass->standardizeString($queryProduct['filterPriceMax']);
        $filterRam = $ValidateClass->standardizeString($queryProduct['filterRam']);
        $filterRom = $ValidateClass->standardizeString($queryProduct['filterRom']);
        $filterBattery = $ValidateClass->standardizeString($queryProduct['filterBattery']);
        $filterCamera = $ValidateClass->standardizeString($queryProduct['filterCamera']);  
        $filterBranch = $ValidateClass->standardizeString($queryProduct['filterBranch']);
        $filterSortPrice = $ValidateClass->standardizeString($queryProduct['filterSortPrice']);      
        
        $sql = ' SELECT * FROM product WHERE SP_XoaSanPham = "No" 
        AND LOWER(SP_TenSanPham) LIKE "%'.$filterName.'%"
        AND SP_HangSanPham LIKE "%'.$filterCate.'%"
        AND (SP_GiaBanSanPham BETWEEN '.$filterPriceMin.' AND '.$filterPriceMax.')  
        AND SP_RAMSanPham LIKE "%'.$filterRam.'%" 
        AND SP_ROMSanPham LIKE "%'.$filterRom.'%"
        AND SP_CongNghePinSanPham LIKE "%'.$filterBattery.'%" 
        AND SP_DoPhanGiaiSanPham LIKE "%'.$filterCamera.'%" 
        AND SP_MaChiNhanhSanPham LIKE "%'.$filterBranch.'%" 
        AND SP_MaChiNhanhSanPham != "Chưa cập nhật" 
        AND SP_HangSanPham != "Chưa cập nhật"
        AND SP_TenSanPham != "Chưa cập nhật"
        ';

        if ($filterSortPrice !== '') {
            $sql .= 'ORDER BY CONVERT(SP_GiaBanSanPham, INT) - (CONVERT(SP_GiaBanSanPham, INT) * CONVERT(SP_GiamGiaSanPham, INT) / 100) '.$filterSortPrice.' ';
        }

        $sqlProduct =  $sql . 'LIMIT '.$startProduct.', '.$limitProduct.' ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sqlProduct);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function selectRelatedProducts ($productCate, $productID) {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM product WHERE SP_HangSanPham = :SP_HangSanPham AND SP_IDSanPham != :SP_IDSanPham ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':SP_HangSanPham', $productCate);
        $stmt->bindParam(':SP_IDSanPham', $productID);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function selectSaleProducts () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM product WHERE CONVERT(SP_GiamGiaSanPham, INT) > 0 ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function selectSaleOff30Products () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM product WHERE CONVERT(SP_GiamGiaSanPham, INT) >= 30 ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }
}
?>

