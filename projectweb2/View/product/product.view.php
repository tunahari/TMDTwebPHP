<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../include/header.main.css">
    <link rel="stylesheet" href="../include/footer.main.css">
    <link rel="stylesheet" href="./product.view.css">
    <title>Product Page</title>
</head>
<body>
<div class="BackGround__Body"></div>
    <div class="Product__Page__Container">
        <?php include '../include/header.main.php';
              require '../../Model/admin/model-admin.info-product.php';
              $ProductClass = new Product;
        ?>
        <div class="Product__Page__Content">
            <div class="Product__Page__Content__Left">
                <div class="Product__Page__Content__Left__SaleOff__Img">
                    <div class="Product__Page__Content__Left__SaleOff__Img__Info">
                        <h1>Samsung Galaxy Note 8</h1>
                        <p>Sale Off 30%</p>
                    </div>
                    <img src="../image/ddddd.png" alt="">
                </div>
                <div class="Product__Page__Content__Left__Filter">
                    <div class="Product__Page__Content__Left__Close">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="Product__Page__Content__Left__Title">LỌC SẢN PHẨM</div>
                    <div class="Product__Page__Content__Left__Filter__Cate">
                        <div class="Product__Page__Filter__Title">
                            HÃNG
                        </div>
                        <div class="Product__Page__Content__Left__Filter__Cate__Item__Box">
                            <?php
                            $ListCate = $ProductClass->selectProductDistinct(" SELECT DISTINCT SP_HangSanPham FROM product WHERE SP_XoaSanPham = 'No' ");
                            for ($i = 0; $i < count($ListCate); $i++) {
                                $CateSanPham = $ListCate[$i]['SP_HangSanPham'];
                                if ($CateSanPham !== 'Chưa cập nhật') {
                                    echo '<div class="Product__Page__Content__Left__Filter__Cate__Item" value="'.$CateSanPham.'">'.$CateSanPham.'</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="Product__Page__Content__Left__Filter__Branch">
                        <div class="Product__Page__Filter__Title">
                            CHI NHÁNH
                        </div>
                        <div class="Product__Page__Content__Left__Filter__Branch__Item__Box">
                            <?php 
                            require_once '../../Model/admin/model-admin.branch.php';
                            $BranchClass = new Branch;
                            for ($i = 0; $i < count($BranchClass->selectAllBranch()); $i++) {
                                $MaChiNhanh = $BranchClass->selectAllBranch()[$i]['CN_IDChiNhanh'];
                                $TenChiNhanh = $BranchClass->selectAllBranch()[$i]['CN_TenChiNhanh'];
                                if ($TenChiNhanh !== 'Chưa cập nhật') {
                                    echo '<div class="Product__Page__Content__Left__Filter__Branch__Item" value="'.$MaChiNhanh.'">'.$TenChiNhanh.'</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="Product__Page__Content__Left__Filter__SortPrice">
                        <div class="Product__Page__Filter__Title">
                            SẮP XẾP THEO GIÁ
                        </div>
                        <div class="Product__Page__Content__Left__Filter__SortPrice__Item__Box">
                            <div class="Product__Page__Content__Left__Filter__SortPrice__Item" value="ASC">Từ Thấp Tới Cao</div>
                            <div class="Product__Page__Content__Left__Filter__SortPrice__Item" value="DESC">Từ Cao Tới Thấp</div>
                        </div>
                    </div>

                    <div class="Product__Page__Content__Left__Filter__Price">
                        <div class="Product__Page__Filter__Title">
                            GIÁ
                        </div>
                        <div class="Product__Page__Content__Left__Filter__Price__Item__Box">
                            <div class="Product__Page__Content__Left__Filter__Price__Input__Number">
                                <div class="Product__Page__Content__Left__Filter__Price__Input__Number__Min">
                                    <span>Min</span>
                                    <input type="number" value="0" class="Filter__Price__Input__Number__Min" id="filterPriceMin">
                                </div>
                                <div class="Product__Page__Content__Left__Filter__Price__Input__Number__Max">
                                    <span>Max</span>
                                    <?php
                                    $MaxPrice = $ProductClass->selectProductDistinct(" SELECT 
                                    CONVERT(SP_GiaBanSanPham, INT) - (CONVERT(SP_GiaBanSanPham, INT) * CONVERT(SP_GiamGiaSanPham, INT) / 100) AS MaxPrice
                                    FROM product WHERE SP_XoaSanPham = 'No' 
                                    ORDER BY CONVERT(SP_GiaBanSanPham, INT) - (CONVERT(SP_GiaBanSanPham, INT) * CONVERT(SP_GiamGiaSanPham, INT) / 100) 
                                    DESC LIMIT 1 ");
                                    $MaxPriceValue = ceil(intval(trim($MaxPrice[0]['MaxPrice'])) / 10000000) * 10000000;
                                    echo '<input type="number" value="'.$MaxPriceValue.'" class="Filter__Price__Input__Number__Max" id="filterPriceMax">';
                                    ?>
                                </div>
                            </div>
                            <div class="Product__Page__Content__Left__Filter__Price__Input__Range">
                                <div class="Product__Page__Content__Left__Filter__Price__Input__Range__Slide">
                                    <div class="Product__Page__Content__Left__Filter__Price__Input__Range__Progress"></div>
                                </div>
                                <div class="Product__Page__Content__Left__Filter__Price__Range__Input">
                                <?php
                                    $MaxPrice = $ProductClass->selectProductDistinct(" SELECT 
                                    CONVERT(SP_GiaBanSanPham, INT) - (CONVERT(SP_GiaBanSanPham, INT) * CONVERT(SP_GiamGiaSanPham, INT) / 100) AS MaxPrice
                                    FROM product WHERE SP_XoaSanPham = 'No' 
                                    ORDER BY CONVERT(SP_GiaBanSanPham, INT) - (CONVERT(SP_GiaBanSanPham, INT) * CONVERT(SP_GiamGiaSanPham, INT) / 100) 
                                    DESC LIMIT 1 ");
                                    $MaxPriceValue = ceil(intval(trim($MaxPrice[0]['MaxPrice'])) / 10000000) * 10000000;
                                    $StepValue = $MaxPriceValue / 20;
                                    echo '
                                    <input type="range" class="Filter__Price__Input__Range__Min" min="0" max="'.$MaxPriceValue.'" step="'.$StepValue.'" value="0">
                                    <input type="range" class="Filter__Price__Input__Range__Max" min="0" max="'.$MaxPriceValue.'" step="'.$StepValue.'" value="'.$MaxPriceValue.'">
                                    ';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Product__Page__Content__Left__Filter__Ram">
                        <div class="Product__Page__Filter__Title">
                            RAM
                        </div>
                        <div class="Product__Page__Content__Left__Filter__Ram__Item__Box">
                            <?php
                            $ListRam = $ProductClass->selectProductDistinct(" SELECT DISTINCT SP_RAMSanPham FROM product WHERE SP_XoaSanPham = 'No' ORDER BY CONVERT(SP_RAMSanPham, INT) ");
                            for ($i = 0; $i < count($ListRam); $i++) {
                                $RamSanPham = $ListRam[$i]['SP_RAMSanPham'];
                                if (intval($RamSanPham) !== -1) {
                                    echo '<div class="Product__Page__Content__Left__Filter__Ram__Item" value="'.$RamSanPham.'">'.$RamSanPham.' GB</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="Product__Page__Content__Left__Filter__Rom">
                        <div class="Product__Page__Filter__Title">
                            ROM
                        </div>
                        <div class="Product__Page__Content__Left__Filter__Rom__Item__Box">
                            <?php
                            $ListRom = $ProductClass->selectProductDistinct(" SELECT DISTINCT SP_ROMSanPham FROM product WHERE SP_XoaSanPham = 'No' ORDER BY CONVERT(SP_ROMSanPham, INT) ");
                            for ($i = 0; $i < count($ListRom); $i++) {
                                $RomSanPham = $ListRom[$i]['SP_ROMSanPham'];
                                if (intval($RomSanPham) !== -1) {
                                    echo '<div class="Product__Page__Content__Left__Filter__Rom__Item" value="'.$RomSanPham.'">'.$RomSanPham.' GB</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="Product__Page__Content__Left__Filter__Pin">
                        <div class="Product__Page__Filter__Title">
                            PIN
                        </div>
                        <div class="Product__Page__Content__Left__Filter__Pin__Item__Box">
                            <?php
                            $ListPin = $ProductClass->selectProductDistinct(" SELECT DISTINCT SP_CongNghePinSanPham FROM product WHERE SP_XoaSanPham = 'No' ");
                            for ($i = 0; $i < count($ListPin); $i++) {
                                $PinSanPham = $ListPin[$i]['SP_CongNghePinSanPham'];
                                if ($PinSanPham !== 'Chưa cập nhật') {
                                    echo '<div class="Product__Page__Content__Left__Filter__Pin__Item" value="'.$PinSanPham.'">'.$PinSanPham.'</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="Product__Page__Content__Left__Filter__Camera">
                        <div class="Product__Page__Filter__Title">
                            CAMERA
                        </div>
                        <div class="Product__Page__Content__Left__Filter__Camera__Item__Box">
                            <?php
                            $ListCamera = $ProductClass->selectProductDistinct(" SELECT DISTINCT SP_DoPhanGiaiSanPham FROM product WHERE SP_XoaSanPham = 'No' ");
                            for ($i = 0; $i < count($ListCamera); $i++) {
                                $CameraSanPham = $ListCamera[$i]['SP_DoPhanGiaiSanPham'];
                                if ($CameraSanPham !== 'Chưa cập nhật') {
                                    echo '<div class="Product__Page__Content__Left__Filter__Camera__Item" value="'.$CameraSanPham.'">'.$CameraSanPham.'</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="Product__Page__Content__Left__Filter__Apply__Reset">
                        <div class="Product__Page__Content__Left__Filter__Reset">ĐẶT LẠI</div>
                        <div class="Product__Page__Content__Left__Filter__Apply">LỌC</div>
                    </div>
                </div>
                <div class="Product__Page__Content__Left__Services">
                    <div class="Product__Page__Content__Left__Title">DỊCH VỤ KHÁCH HÀNG</div>
                    <div class="Product__Page__Content__Left__Services__Box">
                        <div class="Product__Page__Content__Left__Services__Item">
                            <div class="Product__Page__Content__Left__Services__Item__Icon">
                                <img src="../image/services1.png" alt="">
                            </div>
                            <div class="Product__Page__Content__Left__Services__Item__Info">
                                <div class="Product__Page__Content__Left__Services__Info__Title">
                                    MUA HÀNG BẢO MẬT
                                </div>
                                <div class="Product__Page__Content__Left__Services__Info__Text">
                                    Bảo mật thông tin khách mua hàng.
                                </div>
                            </div>
                        </div>
                        <div class="Product__Page__Content__Left__Services__Item">
                            <div class="Product__Page__Content__Left__Services__Item__Icon">
                                <img src="../image/services2.png" alt="">
                            </div>
                            <div class="Product__Page__Content__Left__Services__Item__Info">
                                <div class="Product__Page__Content__Left__Services__Info__Title">
                                    UY TÍN
                                </div>
                                <div class="Product__Page__Content__Left__Services__Info__Text">
                                    Bảo mật thanh toán, đổi trả dễ dàng.
                                </div>
                            </div>
                        </div>
                        <div class="Product__Page__Content__Left__Services__Item">
                            <div class="Product__Page__Content__Left__Services__Item__Icon">
                                <img src="../image/services3.png" alt="">
                            </div>
                            <div class="Product__Page__Content__Left__Services__Item__Info">
                                <div class="Product__Page__Content__Left__Services__Info__Title">
                                    TRỢ GIÚP 24/7
                                </div>
                                <div class="Product__Page__Content__Left__Services__Info__Text">
                                    Tư vấn, hỗ trợ nhiệt tình, kịp thời.
                                </div>
                            </div>
                        </div>
                        <div class="Product__Page__Content__Left__Services__Item">
                            <div class="Product__Page__Content__Left__Services__Item__Icon">
                                <img src="../image/services4.png" alt="">
                            </div>
                            <div class="Product__Page__Content__Left__Services__Item__Info">
                                <div class="Product__Page__Content__Left__Services__Info__Title">
                                    GIAO HÀNG
                                </div>
                                <div class="Product__Page__Content__Left__Services__Info__Text">
                                    Giao hàng tận nơi trên toàn quốc.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Product__Page__Content__Right">
                <div class="Product__Page__Content__Right__Slide">
                    <div class="swiper Product__Page__Content__Right__Swipper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                              <img src="../image/slide.jpg" alt="">
                          </div>
                          <div class="swiper-slide">
                            <img src="../image/slide.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="../image/slide.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="../image/slide.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="../image/slide.jpg" alt="">
                        </div>
                        </div>
                        <div class="swiper-button-prev"><i class="fa-solid fa-arrow-left"></i></div>
                        <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="Product__Page__Content__Right__Product">
                    <div class="Product__Page__Content__Right__Product__Tab">
                        <div class="Product__Page__Content__Right__Product__Title">SẢN PHẨM ĐANG BÁN</div>
                    </div>
                    <!-- ================================== PRODUCT BOX ================================== -->
                    <div class="Product__Page__Content__Right__Product__Panel"></div>
                    <!-- ================================== PRODUCT BOX ================================== -->
                    <div class="Product__Page__Content__Right__Product__Paging">
                        <div class="Product__Page__Content__Right__Product__Paging__Item Paging__Prev"><i class="fa-solid fa-arrow-left"></i></div>
                        <div class="Product__Page__Content__Right__Product__Paging__Item active">1</div>
                        <div class="Product__Page__Content__Right__Product__Paging__Item">2</div>
                        <div class="Product__Page__Content__Right__Product__Paging__Item">3</div>
                        <div class="Product__Page__Content__Right__Product__Paging__Item">4</div>
                        <div class="Product__Page__Content__Right__Product__Paging__Item">5</div>
                        <div class="Product__Page__Content__Right__Product__Paging__Item Paging__Dots">...</div>
                        <div class="Product__Page__Content__Right__Product__Paging__Item">100</div>
                        <div class="Product__Page__Content__Right__Product__Paging__Item Paging__Next"><i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </div>

            </div>
        </div>

        <div class="Product__Page__Content__2">
            <div class="Product__Page__Content__2__Title">
                SẢN PHẨM KHUYẾN MÃI
                <div class="SpecialTrend__Swipper__Navigation">
                    <div class="SpecialTrend__Swipper__Prev"><i class="fa-solid fa-arrow-left"></i></div>
                    <div class="SpecialTrend__Swipper__Next"><i class="fa-solid fa-arrow-right"></i></div>
                </div>
            </div>
            <div class="Product__Page__Content__2__SpecialTrend">
                <div class="Product__Page__Content__2__SpecialTrend__Image">
                    <img src="../image/Special_Trend_Banner-265x384.jpg" alt="">
                </div>
                <div class="Product__Page__Content__2__SpecialTrend__Slide">
                    <div class="swiper Product__Page__Content__2__SpecialTrend__Swipper">
                        <div class="swiper-wrapper">
                            <?php
                                $saleProducts = $ProductClass->selectSaleProducts ();
                                for ($i = 0; $i < count($saleProducts); $i++) {
                                    $oldPrice = intval($saleProducts[$i]['SP_GiaBanSanPham']);
                                    $newPrice = intval($saleProducts[$i]['SP_GiaBanSanPham']);
                                    $salePrice = intval($saleProducts[$i]['SP_GiamGiaSanPham']);
                                    if ($salePrice === 0) {
                                        $htmlSalePrice = '';
                                    } else {
                                        $newPrice = $oldPrice - ($newPrice * $salePrice) / 100;
                                        $htmlSalePrice =  '<div class="Product__Page__Content__2__SpecialTrend__Item__OldPrice">'.number_format($oldPrice).'</div>';
                                    }
                                    echo '
                                    <a href="./details.view.php?id-product='.$saleProducts[$i]['SP_IDSanPham'].'" class="swiper-slide SpecialTrend__Swipper__Slide">
                                        <div class="Product__Page__Content__2__SpecialTrend__Item">
                                            <div class="Product__Page__Content__2__SpecialTrend__Item__Image">
                                                <img class="Product__SpecialTrend__Item__Image__1" src="../../Controller/admin/'.$saleProducts[$i]['SP_Image1SanPham'].'" alt="">
                                                <img class="Product__SpecialTrend__Item__Image__2" src="../../Controller/admin/'.$saleProducts[$i]['SP_Image1SanPham'].'" alt="">
                                            </div>
                                            <div class="Product__Page__Content__2__SpecialTrend__Item__Name">'.$saleProducts[$i]['SP_TenSanPham'].'</div>
                                            <div class="Product__Page__Content__2__SpecialTrend__Item__Star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="Product__Page__Content__2__SpecialTrend__Item__Price__Box">
                                                <div class="Product__Page__Content__2__SpecialTrend__Item__NewPrice">'.number_format($newPrice).'</div>
                                                '.$htmlSalePrice.'
                                            </div>
                                            <div class="Product__Page__Content__2__SpecialTrend__Item__Time">
                                                <div class="Product__Page__Content__2__SpecialTrend__Item__Time__Icon">
                                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                                </div>
                                                <div class="Product__Page__Content__2__SpecialTrend__Item__Time__Date">
                                                    -32:
                                                </div>
                                                <div class="Product__Page__Content__2__SpecialTrend__Item__Time__Hour">
                                                    -18:
                                                </div>
                                                <div class="Product__Page__Content__2__SpecialTrend__Item__Time__Minute">
                                                    -30:
                                                </div>
                                                <div class="Product__Page__Content__2__SpecialTrend__Item__Time__Second">
                                                    -54
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="Product__Page__Content__2__ShopNow">
                <?php
                $saleOff30Products = $ProductClass->selectSaleOff30Products ();
                for ($i = 0; $i < count($saleOff30Products); $i++) {
                    echo '
                    <div class="Product__Page__Content__2__ShopNow__Item">
                        <div class="Product__Page__Content__2__ShopNow__Item__Left">
                            <div class="Product__Page__Content__2__ShopNow__Item__Title">'.$saleOff30Products[$i]['SP_TenSanPham'].'</div>
                            <div class="Product__Page__Content__2__ShopNow__Item__Sale__Text">
                                Giảm Giá '.$saleOff30Products[$i]['SP_GiamGiaSanPham'].'%
                            </div>
                            <a href="./details.view.php?id-product='.$saleOff30Products[$i]['SP_IDSanPham'].'" class="Product__Page__Content__2__ShopNow__Item__Button">Chi Tiết</a>
                        </div>
                        <div class="Product__Page__Content__2__ShopNow__Item__Right">
                            <img src="../../Controller/admin/'.$saleOff30Products[$i]['SP_Image1SanPham'].'" alt="">
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>

            <div class="Product__Page__Content__2__Image__SaleOff">
                <div class="Product__Page__Content__2__Image__SaleOff__Left">
                    <img src="../image/aaaaa.png" alt="">
                </div>
                <div class="Product__Page__Content__2__Image__SaleOff__Right">
                    <div class="Product__Page__Content__2__Image__SaleOff__Title">
                        Best-selling Samsung
                    </div>
                    <div class="Product__Page__Content__2__Image__SaleOff__Line"></div>
                    <div class="Product__Page__Content__2__Image__SaleOff__Price">
                        From $12.990
                    </div>
                    <div class="Product__Page__Content__2__Image__SaleOff__UptoPrice">
                        Up to $30.000 Off*
                    </div>
                </div>
            </div>

            <div class="Product__Page__Content__2__Services">
                <div class="Product__Page__Content__2__Title">CUSTOMER SERVICES</div>
                <div class="Product__Page__Content__2__Services__Box">
                    <div class="Product__Page__Content__2__Services__Item">
                        <div class="Product__Page__Content__2__Services__Item__Icon">
                            <img src="../image/services1.png" alt="">
                        </div>
                        <div class="Product__Page__Content__2__Services__Item__Info">
                            <div class="Product__Page__Content__2__Services__Info__Title">
                                SECURE PAYMENT
                            </div>
                            <div class="Product__Page__Content__2__Services__Info__Text">
                                Moving Your Card Details to a much more secured place.
                            </div>
                        </div>
                    </div>
                    <div class="Product__Page__Content__2__Services__Item">
                        <div class="Product__Page__Content__2__Services__Item__Icon">
                            <img src="../image/services2.png" alt="">
                        </div>
                        <div class="Product__Page__Content__2__Services__Item__Info">
                            <div class="Product__Page__Content__2__Services__Info__Title">
                                TRUSTPAY
                            </div>
                            <div class="Product__Page__Content__2__Services__Info__Text">
                                100% Payment Protection. Easy Return policy.
                            </div>
                        </div>
                    </div>
                    <div class="Product__Page__Content__2__Services__Item">
                        <div class="Product__Page__Content__2__Services__Item__Icon">
                            <img src="../image/services3.png" alt="">
                        </div>
                        <div class="Product__Page__Content__2__Services__Item__Info">
                            <div class="Product__Page__Content__2__Services__Info__Title">
                                SUPPORT 24/7
                            </div>
                            <div class="Product__Page__Content__2__Services__Info__Text">
                                Got a question? Look no further.Browse our FAQs or Submit yor query here.
                            </div>
                        </div>
                    </div>
                    <div class="Product__Page__Content__2__Services__Item">
                        <div class="Product__Page__Content__2__Services__Item__Icon">
                            <img src="../image/services4.png" alt="">
                        </div>
                        <div class="Product__Page__Content__2__Services__Item__Info">
                            <div class="Product__Page__Content__2__Services__Info__Title">
                                SHOP ON THE GO
                            </div>
                            <div class="Product__Page__Content__2__Services__Info__Text">
                                Download the app and get exciting app only offers at your fingertips.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="Product__Page__Content__2__Image__Our__Cate">
                <div class="Product__Page__Content__2__Title">
                    CATEGORY
                </div>
                <div class="Product__Page__Content__2__Image__Our__Cate__Box">
                    <div class="Product__Page__Content__2__Image__Our__Cate__Item">
                        <div class="Product__Page__Content__2__Image__Our__Cate__Item__Icon">
                            <img src="../image/logo-samsung.png" alt="">
                        </div>   
                    </div>
                    <div class="Product__Page__Content__2__Image__Our__Cate__Item">
                        <div class="Product__Page__Content__2__Image__Our__Cate__Item__Icon">
                            <img src="../image/logo-apple.png" alt="">
                        </div>
                    </div>
                    <div class="Product__Page__Content__2__Image__Our__Cate__Item">
                        <div class="Product__Page__Content__2__Image__Our__Cate__Item__Icon">
                            <img src="../image/logo-xiaomi.png" alt="">
                        </div>
                    </div>
                    <div class="Product__Page__Content__2__Image__Our__Cate__Item">
                        <div class="Product__Page__Content__2__Image__Our__Cate__Item__Icon">
                            <img src="../image/logo-oppo.png" alt="">
                        </div> 
                    </div>
                    <div class="Product__Page__Content__2__Image__Our__Cate__Item">
                        <div class="Product__Page__Content__2__Image__Our__Cate__Item__Icon">
                            <img src="../image/logo-vivo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="Product__Page__Content__2__Image__SaleOff__2">
                <div class="Product__Page__Content__2__Image__SaleOff__2__Left">
                    <div class="Product__Page__Content__2__Image__SaleOff__2__Left__1">
                        <div class="Product__Page__Content__2__Image__SaleOff__2__Left__Title">
                            Samsung Galaxy S21
                        </div>
                        <div class="Product__Page__Content__2__Image__SaleOff__2__Left__Text">
                            World's First 5G-upgradable
                        </div>
                        <div class="Product__Page__Content__2__Image__SaleOff__2__Left__ShowNow">
                            Show Now
                        </div>
                    </div>
                    <div class="Product__Page__Content__2__Image__SaleOff__2__Left__2">
                        <img src="../image/ccccc.png" alt="">
                    </div>
                </div>
                <div class="Product__Page__Content__2__Image__SaleOff__2__Right">
                    <div class="Product__Page__Content__2__Image__SaleOff__2__Right__Title__Text">
                        <div class="Product__Page__Content__2__Image__SaleOff__2__Right__Title">Subtitle</div>
                        <div class="Product__Page__Content__2__Image__SaleOff__2__Right__Text">Wireless. Effortless. Magical.</div>
                    </div>
                    <img src="../image/bbbbb.png" alt="">
                </div>
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
    </div>
</body>
</html>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="./product.view.js"></script>
<script src="../../Controller/class/controller.function.js"></script>
<script src="../../Controller/class/controller.validate.js"></script>
<script src="../../Controller/product/controller-product.product.js"></script>