<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style-admin.css">
    <link rel="stylesheet" href="./main-admin.css">
    <link rel="stylesheet" href="./product-info-admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Thông Tin Sản Phẩm</title>
</head>

<body>
    <div class="main">
        <?php include './include.header.php'; ?>
        <div class="containers">
            <?php include './include.menu.php'; ?>

            <?php
            require_once '../../Model/admin/model-admin.info-product.php';
            if (isset($_GET['id-product']) && !empty($_GET['id-product'])) {
                $ProductClass = new Product;
                $ProductClass->setSP_IDSanPham($_GET['id-product']);
                $SP_IDSanPham = $ProductClass->selectProductByID ()['SP_IDSanPham'];
                $SP_TenSanPham = $ProductClass->selectProductByID ()['SP_TenSanPham'];
                $SP_GiaBanSanPham = $ProductClass->selectProductByID ()['SP_GiaBanSanPham'];
                $SP_GiaNhapSanPham = $ProductClass->selectProductByID ()['SP_GiaNhapSanPham'];
                $SP_GiamGiaSanPham = $ProductClass->selectProductByID ()['SP_GiamGiaSanPham'];
                $SP_ThoiGianTaoSanPham = $ProductClass->selectProductByID ()['SP_ThoiGianTaoSanPham'];
                $SP_TonKhoSanPham = $ProductClass->selectProductByID ()['SP_TonKhoSanPham'];
                $SP_TongNhapSanPham = $ProductClass->selectProductByID ()['SP_TongNhapSanPham'];
                $SP_TongBanSanPham = $ProductClass->selectProductByID ()['SP_TongBanSanPham'];
                $SP_BaoHanhSanPham = $ProductClass->selectProductByID ()['SP_BaoHanhSanPham'];
                $SP_ThoiHanBaoHanhSanPham = $ProductClass->selectProductByID ()['SP_ThoiHanBaoHanhSanPham'];
                $SP_CongNgheManHinhSanPham = $ProductClass->selectProductByID ()['SP_CongNgheManHinhSanPham'];
                $SP_DoPhanGiaiSanPham = $ProductClass->selectProductByID ()['SP_DoPhanGiaiSanPham'];
                $SP_KichThuocManHinhSanPham = $ProductClass->selectProductByID ()['SP_KichThuocManHinhSanPham'];
                $SP_DoSangToiDaSanPham = $ProductClass->selectProductByID ()['SP_DoSangToiDaSanPham'];
                $SP_MatKinhCamUngManHinhSanPham = $ProductClass->selectProductByID ()['SP_MatKinhCamUngManHinhSanPham'];
                $SP_DoPhanGiaiCMRSauSanPham = $ProductClass->selectProductByID ()['SP_DoPhanGiaiCMRSauSanPham'];
                $SP_DenFlashSanPham = $ProductClass->selectProductByID ()['SP_DenFlashSanPham'];
                $SP_MatKinhCamUngCMRSauSanPham = $ProductClass->selectProductByID ()['SP_MatKinhCamUngCMRSauSanPham'];
                $SP_DoPhanGiaiCMRTruocSanPham = $ProductClass->selectProductByID ()['SP_DoPhanGiaiCMRTruocSanPham'];
                $SP_HeDieuHanhSanPham = $ProductClass->selectProductByID ()['SP_HeDieuHanhSanPham'];
                $SP_CPUSanPham = $ProductClass->selectProductByID ()['SP_CPUSanPham'];
                $SP_TocDoCPUSanPham = $ProductClass->selectProductByID ()['SP_TocDoCPUSanPham'];
                $SP_GPUSanPham = $ProductClass->selectProductByID ()['SP_GPUSanPham'];
                $SP_RAMSanPham = $ProductClass->selectProductByID ()['SP_RAMSanPham'];
                $SP_ROMSanPham = $ProductClass->selectProductByID ()['SP_ROMSanPham'];
                $SP_BoNhoKhaDungSanPham = $ProductClass->selectProductByID ()['SP_BoNhoKhaDungSanPham'];
                $SP_DanhBaSanPham = $ProductClass->selectProductByID ()['SP_DanhBaSanPham'];
                $SP_MangDiDongSanPham = $ProductClass->selectProductByID ()['SP_MangDiDongSanPham'];
                $SP_SIMSanPham = $ProductClass->selectProductByID ()['SP_SIMSanPham'];
                $SP_WifiSanPham = $ProductClass->selectProductByID ()['SP_WifiSanPham'];
                $SP_GPSSanPham = $ProductClass->selectProductByID ()['SP_GPSSanPham'];
                $SP_BluetoothSanPham = $ProductClass->selectProductByID ()['SP_BluetoothSanPham'];
                $SP_CongKetNoiSanPham = $ProductClass->selectProductByID ()['SP_CongKetNoiSanPham'];
                $SP_JackTaiNgheSanPham = $ProductClass->selectProductByID ()['SP_JackTaiNgheSanPham'];
                $SP_KetNoiKhacSanPham = $ProductClass->selectProductByID ()['SP_KetNoiKhacSanPham'];
                $SP_DungLuongPinSanPham = $ProductClass->selectProductByID ()['SP_DungLuongPinSanPham'];
                $SP_LoaiPinSanPham = $ProductClass->selectProductByID ()['SP_LoaiPinSanPham'];
                $SP_HoTroSacToiDaSanPham = $ProductClass->selectProductByID ()['SP_HoTroSacToiDaSanPham'];
                $SP_CongNghePinSanPham = $ProductClass->selectProductByID ()['SP_CongNghePinSanPham'];
                $SP_BaoMatNangCaoSanPham = $ProductClass->selectProductByID ()['SP_BaoMatNangCaoSanPham'];
                $SP_TinhNangDacBietSanPham = $ProductClass->selectProductByID ()['SP_TinhNangDacBietSanPham'];
                $SP_KhangNuocBuiSanPham = $ProductClass->selectProductByID ()['SP_KhangNuocBuiSanPham'];
                $SP_XemPhimSanPham = $ProductClass->selectProductByID ()['SP_XemPhimSanPham'];
                $SP_GhiAmSanPham = $ProductClass->selectProductByID ()['SP_GhiAmSanPham'];
                $SP_NgheNhacSanPham = $ProductClass->selectProductByID ()['SP_NgheNhacSanPham'];
                $SP_ThietKeSanPham = $ProductClass->selectProductByID ()['SP_ThietKeSanPham'];
                $SP_ChatLieuSanPham = $ProductClass->selectProductByID ()['SP_ChatLieuSanPham'];
                $SP_KichThuocSanPham = $ProductClass->selectProductByID ()['SP_KichThuocSanPham'];
                $SP_KhoiLuongSanPham = $ProductClass->selectProductByID ()['SP_KhoiLuongSanPham'];
                $SP_ThoiDiemRaMatSanPham = $ProductClass->selectProductByID ()['SP_ThoiDiemRaMatSanPham'];
                $SP_MaChiNhanhSanPham = "CN" . $ProductClass->selectProductByID ()['SP_MaChiNhanhSanPham'];
                $SP_Image1SanPham = $ProductClass->selectProductByID ()['SP_Image1SanPham'];
                $SP_Image2SanPham = $ProductClass->selectProductByID ()['SP_Image2SanPham'];
                $SP_Image3SanPham = $ProductClass->selectProductByID ()['SP_Image3SanPham'];
                $SP_HangSanPham = $ProductClass->selectProductByID ()['SP_HangSanPham'];
            }
            ?>

            <div class="content">
                <div class="Product__Info__Container">
                    <div class="Product__Info__Content__1 Product__Info__Content">
                        <!-- Image 1 -->
                        <div class="Product__Info__Content__1__Image__1__Box Product__Info__Content__Image__Box">
                            <div class="Product__Info__Content__1__Image__Title">Ảnh Chính</div>

                            <!-- =============================== Preview Image 1 =============================== -->
                            <div class="Product__Info__Content__1__Image__1 Product__Info__Content__Image" id="previewImage-1">
                                <img src="../../Controller/admin/<?php echo $SP_Image1SanPham ?>" alt="" id="Preview__Image__1">
                            </div>
                            <!-- =============================== Preview Image 1 =============================== -->

                            <!-- =============================== Upload Image 1 =============================== -->
                            <div class="Product__Info__Content__1__Image__1__Update Product__Info__Content__Image__Update">
                                <label for="inputUpdateImage-1">
                                    Chọn File <i class="fa-solid fa-cloud-arrow-up"></i>
                                </label>
                                <input type="file" id="inputUpdateImage-1">
                                <div class="Product__Info__Content__Image__Update__Button__Group Product__Info__Content__Image__Update__Button__Group-1">
                                    <button type="button" id="submitUpdateImage-1">
                                        Tải lên<i class="fa-solid fa-cloud-arrow-up"></i>
                                    </button>
                                    <button type="button" id="cancelUpdateImage-1">
                                        Hủy bỏ<i class="fa-solid fa-rectangle-xmark"></i>
                                    </button>
                                </div>  
                            </div>
                            <!-- =============================== Upload Image 1 =============================== -->
                        </div>
                        
                        <div class="Product__Info__Content__Image__Slide__Box">
                            <!-- Image 2 -->
                            <div class="Product__Info__Content__1__Image__2__Box Product__Info__Content__Image__Box">
                                <div class="Product__Info__Content__1__Image__Title">Slide 1</div>
                                <!-- =============================== Preview Image 2 =============================== -->
                                <div class="Product__Info__Content__1__Image__2 Product__Info__Content__Image" id="previewImage-2">
                                    <img src="../../Controller/admin/<?php echo $SP_Image2SanPham ?>" alt="" id="Preview__Image__2">
                                </div>
                                <!-- =============================== Preview Image 2 =============================== -->

                                <!-- =============================== Upload Image 2 =============================== -->
                                <div class="Product__Info__Content__1__Image__2__Update Product__Info__Content__Image__Update">
                                    <label for="inputUpdateImage-2">
                                    Chọn File <i class="fa-solid fa-cloud-arrow-up"></i>
                                    </label>
                                    <input type="file" id="inputUpdateImage-2">
                                    <div class="Product__Info__Content__Image__Update__Button__Group Product__Info__Content__Image__Update__Button__Group-2">
                                        <button type="button" id="submitUpdateImage-2">
                                            Tải lên<i class="fa-solid fa-cloud-arrow-up"></i>
                                        </button>
                                        <button type="button" id="cancelUpdateImage-2">
                                            Hủy bỏ<i class="fa-solid fa-rectangle-xmark"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- =============================== Upload Image 2 =============================== -->
                            </div>
                            <!-- Image 3 -->
                            <div class="Product__Info__Content__1__Image__3__Box Product__Info__Content__Image__Box">
                                <div class="Product__Info__Content__1__Image__Title">Slide 2</div>
                                <!-- =============================== Preview Image 3 =============================== -->
                                <div class="Product__Info__Content__1__Image__3 Product__Info__Content__Image" id="previewImage-3">
                                    <img src="../../Controller/admin/<?php echo $SP_Image3SanPham ?>" alt="" id="Preview__Image__3">
                                </div>
                                <!-- =============================== Preview Image 3 =============================== -->

                                <!-- =============================== Upload Image 3 =============================== -->
                                <div class="Product__Info__Content__1__Image__3__Update Product__Info__Content__Image__Update">
                                    <label for="inputUpdateImage-3">
                                    Chọn File <i class="fa-solid fa-cloud-arrow-up"></i>
                                    </label>
                                    <input type="file" id="inputUpdateImage-3">
                                    <div class="Product__Info__Content__Image__Update__Button__Group Product__Info__Content__Image__Update__Button__Group-3">
                                        <button type="button" id="submitUpdateImage-3">
                                            Tải lên<i class="fa-solid fa-cloud-arrow-up"></i>
                                        </button>
                                        <button type="button" id="cancelUpdateImage-3">
                                            Hủy bỏ<i class="fa-solid fa-rectangle-xmark"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- =============================== Upload Image 3 =============================== -->
                            </div>
                        </div>
                        
                        <div class="Update__Quantity__Product__Form">
                            <div class="Update__Quantity__Product__Form__Title">Nhập Thêm Sản Phẩm:</div>
                            <div class="Update__Quantity__Product__Form__Input">
                                <label for="Update__Input__IDSanPham">ID - Tên Sản Phẩm (*):</label>
                                <input class="Update__Input__SanPham" id="Update__Input__IDSanPham" type="text" readonly
                                value="<?php echo 'SP' . $SP_IDSanPham . ' - ' . $SP_TenSanPham; ?>">
                            </div>
                            <div class="Update__Quantity__Product__Form__Input">
                                <label for="Update__Input__SLSanPham">Số Lượng Nhập Vào:</label>
                                <input class="Update__Input__SanPham" id="Update__Input__SLSanPham" type="number"
                                value="0">
                                <div class="Update__Input__SanPham__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Update__Quantity__Product__Save">Lưu Nhập Vào</div>
                        </div>
                    </div>
                    <div class="Product__Info__Content__2 Product__Info__Content">
                        <div class="Product__Info__Content__Title">Thông Tin Sản Phẩm</div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_IDSanPham">ID (*):</label>
                                <input class="Admin__Input__SP_Readonly" id="Admin__Input__SP_IDSanPham" type="text" readonly value="<?php echo 'SP' . $SP_IDSanPham  ?>">
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_TenSanPham">Tên sản phẩm:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_TenSanPham" type="text" value="<?php echo $SP_TenSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_GiaBanSanPham">Giá bán (VND):</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_GiaBanSanPham" type="number" value="<?php echo $SP_GiaBanSanPham  ?>" >
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_GiaNhapSanPham">Giá nhập (VND):</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_GiaNhapSanPham" type="number" value="<?php echo $SP_GiaNhapSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_GiamGiaSanPham">Giảm giá (%):</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_GiamGiaSanPham" type="number" value="<?php echo $SP_GiamGiaSanPham ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_ThoiGianTaoSanPham">Thời gian tạo (*):</label>
                                <input class="Admin__Input__SP_Readonly" id="Admin__Input__SP_ThoiGianTaoSanPham" type="text" readonly value="<?php echo $SP_ThoiGianTaoSanPham  ?>">
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_MaChiNhanhSanPham">Mã chi nhánh:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_MaChiNhanhSanPham" type="text" value="<?php echo $SP_MaChiNhanhSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_TonKhoSanPham">Tồn kho (*):</label>
                                <input class="Admin__Input__SP_Readonly" id="Admin__Input__SP_TonKhoSanPham" type="text" readonly value="<?php echo $SP_TonKhoSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_TongNhapSanPham">Tổng nhập (*):</label>
                                <input class="Admin__Input__SP_Readonly" id="Admin__Input__SP_TongNhapSanPham" type="text" readonly value="<?php echo $SP_TongNhapSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_TongBanSanPham">Tổng bán (*):</label>
                                <input class="Admin__Input__SP_Readonly" id="Admin__Input__SP_TongBanSanPham" type="text" readonly value="<?php echo $SP_TongBanSanPham  ?>">
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_BaoHanhSanPham">Bảo hành (0/1):</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_BaoHanhSanPham" type="number" value="<?php echo $SP_BaoHanhSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_ThoiHanBaoHanhSanPham">Thời hạn bảo hành:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_ThoiHanBaoHanhSanPham" type="text" readonly value="<?php echo $SP_ThoiHanBaoHanhSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_CongNgheManHinhSanPham">Công nghệ màn hình:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_CongNgheManHinhSanPham" type="text" value="<?php echo $SP_CongNgheManHinhSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_DoPhanGiaiSanPham">Độ phân giải:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_DoPhanGiaiSanPham" type="text" value="<?php echo $SP_DoPhanGiaiSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_KichThuocManHinhSanPham">Kích thước màn hình:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_KichThuocManHinhSanPham" type="text" value="<?php echo $SP_KichThuocManHinhSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_DoSangToiDaSanPham">Độ sáng tối đa:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_DoSangToiDaSanPham" type="text" value="<?php echo $SP_DoSangToiDaSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_MatKinhCamUngManHinhSanPham">Mặt kính cảm ứng màn hình:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_MatKinhCamUngManHinhSanPham" type="text" value="<?php echo $SP_MatKinhCamUngManHinhSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_DoPhanGiaiCMRSauSanPham">Độ phân giải Camera sau:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_DoPhanGiaiCMRSauSanPham" type="text" value="<?php echo $SP_DoPhanGiaiCMRSauSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_DenFlashSanPham">Đèn Flash:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_DenFlashSanPham" type="text" value="<?php echo $SP_DenFlashSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_MatKinhCamUngCMRSauSanPham">Mặt kính cảm ứng camera sau:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_MatKinhCamUngCMRSauSanPham" type="text" value="<?php echo $SP_MatKinhCamUngCMRSauSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_DoPhanGiaiCMRTruocSanPham">Độ phân giải Camera trước:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_DoPhanGiaiCMRTruocSanPham" type="text" value="<?php echo $SP_DoPhanGiaiCMRTruocSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_HeDieuHanhSanPham">Hệ điều hành:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_HeDieuHanhSanPham" type="text" value="<?php echo $SP_HeDieuHanhSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_CPUSanPham">Chip xử lý (CPU):</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_CPUSanPham" type="text" value="<?php echo $SP_CPUSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_TocDoCPUSanPham">Tốc độ CPU:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_TocDoCPUSanPham" type="text" value="<?php echo $SP_TocDoCPUSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_GPUSanPham">Chip đồ họa (GPU):</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_GPUSanPham" type="text" value="<?php echo $SP_GPUSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_RAMSanPham">RAM:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_RAMSanPham" type="number" value="<?php echo $SP_RAMSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_ROMSanPham">ROM:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_ROMSanPham" type="number" value="<?php echo $SP_ROMSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_BoNhoKhaDungSanPham">Bộ nhớ khả dụng:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_BoNhoKhaDungSanPham" type="number" value="<?php echo $SP_BoNhoKhaDungSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_DanhBaSanPham">Danh bạ:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_DanhBaSanPham" type="text" value="<?php echo $SP_DanhBaSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_MangDiDongSanPham">Mạng di động:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_MangDiDongSanPham" type="text" value="<?php echo $SP_MangDiDongSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_SIMSanPham">SIM:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_SIMSanPham" type="text" value="<?php echo $SP_SIMSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_WifiSanPham">Wifi:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_WifiSanPham" type="text" value="<?php echo $SP_WifiSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_GPSSanPham">GPS:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_GPSSanPham" type="text" value="<?php echo $SP_GPSSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_BluetoothSanPham">Bluetooth:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_BluetoothSanPham" type="text" value="<?php echo $SP_BluetoothSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_CongKetNoiSanPham">Cổng kết nối/sạc:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_CongKetNoiSanPham" type="text" value="<?php echo $SP_CongKetNoiSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_JackTaiNgheSanPham">Jack tai nghe:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_JackTaiNgheSanPham" type="text" value="<?php echo $SP_JackTaiNgheSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_KetNoiKhacSanPham">Kết nối khác:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_KetNoiKhacSanPham" type="text" value="<?php echo $SP_KetNoiKhacSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_DungLuongPinSanPham">Dung lượng pin:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_DungLuongPinSanPham" type="text" value="<?php echo $SP_DungLuongPinSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_LoaiPinSanPham">Loại pin:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_LoaiPinSanPham" type="text" value="<?php echo $SP_LoaiPinSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_HoTroSacToiDaSanPham">Hỗ trợ sạc tối đa:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_HoTroSacToiDaSanPham" type="text" value="<?php echo $SP_HoTroSacToiDaSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_CongNghePinSanPham">Công nghệ pin:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_CongNghePinSanPham" type="text" value="<?php echo $SP_CongNghePinSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_BaoMatNangCaoSanPham">Bảo mật nâng cao:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_BaoMatNangCaoSanPham" type="text" value="<?php echo $SP_BaoMatNangCaoSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_TinhNangDacBietSanPham">Tính năng đặc biệt:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_TinhNangDacBietSanPham" type="text" value="<?php echo $SP_TinhNangDacBietSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_KhangNuocBuiSanPham">Kháng nước, bụi:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_KhangNuocBuiSanPham" type="text" value="<?php echo $SP_KhangNuocBuiSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_XemPhimSanPham">Xem phim:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_XemPhimSanPham" type="text" value="<?php echo $SP_XemPhimSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_GhiAmSanPham">Ghi âm:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_GhiAmSanPham" type="text" value="<?php echo $SP_GhiAmSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_NgheNhacSanPham">Nghe nhạc:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_NgheNhacSanPham" type="text" value="<?php echo $SP_NgheNhacSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_ThietKeSanPham">Thiết kế:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_ThietKeSanPham" type="text" value="<?php echo $SP_ThietKeSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_ChatLieuSanPham">Chất liệu:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_ChatLieuSanPham" type="text" value="<?php echo $SP_ChatLieuSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_KichThuocSanPham">Kích thước:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_KichThuocSanPham" type="text" value="<?php echo $SP_KichThuocSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_KhoiLuongSanPham">Khối lượng:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_KhoiLuongSanPham" type="text" value="<?php echo $SP_KhoiLuongSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_ThoiDiemRaMatSanPham">Thời điểm ra mắt:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_ThoiDiemRaMatSanPham" type="date" value="<?php echo date($SP_ThoiDiemRaMatSanPham) ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>

                        <div class="Product__Info__Content__2__Input__Box">
                            <div class="Product__Info__Content__2__Input">
                                <label for="Admin__Input__SP_HangSanPham">Hãng sản phẩm:</label>
                                <input class="Admin__Input__SP" id="Admin__Input__SP_HangSanPham" type="text" value="<?php echo $SP_HangSanPham  ?>">
                                <div class="Product__Info__Content__2__Input__Error">Input invalid, please check again</div>
                            </div>
                        </div>
                    </div>
                    <div class="Product__Info__Content__3 Product__Info__Content">
                        <div class="Product__Info__Save">Lưu Chỉnh Sửa</div>
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
<script src="../../Controller/admin/controller-admin.info-product.js"></script>