<?php
session_start();
require_once '../../Model/admin/model-admin.info-product.php';
require_once '../../Model/product/model-product.cart.php';
require_once '../../Model/admin/model-amin.customer.php';
require_once '../../Model/database/connectDataBase.php';
require_once '../class/controller.validate.php';

$CustomerClass = new Customer;
$ProductClass = new Product;
$CartClass = new Cart;
$ValidateData = new ValidateData;

function fetchProduct ($limitProduct, $startProduct, $queryProduct) {
    $ProductClass = new Product;
    $CustomerClass = new Customer;
    $listProduct = $ProductClass->selectProductPage($limitProduct, $startProduct, $queryProduct);
    $output = '';
    if ($listProduct) {
        for ($i = 0; $i < count($listProduct); $i++) {
            $oldPrice = intval($listProduct[$i]['SP_GiaBanSanPham']);
            $newPrice = intval($listProduct[$i]['SP_GiaBanSanPham']);
            $salePrice = intval($listProduct[$i]['SP_GiamGiaSanPham']);
            if ($salePrice === 0) {
                $htmlSalePrice = '';
            } else {
                $newPrice = $oldPrice - ($newPrice * $salePrice) / 100;
                $htmlSalePrice =  '<div class="Product__Page__Content__Right__Product__Panel__Item__Old__Price">'.number_format($oldPrice).'</div>';
            }
            if (isset($_SESSION['email'])) {
                $CustomerClass->setKH_EmailKhachHang($_SESSION['email']);
                $customerID = $CustomerClass->selectCustomerByEmail()['KH_IDKhachHang'];
                $output .= '
                <a href="./details.view.php?id-product='.$listProduct[$i]['SP_IDSanPham'].'" class="Product__Page__Content__Right__Product__Panel__Item">
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Icon__Group">
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Icon">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Icon" id="addCartProduct"
                        data-customerID="'.$customerID.'" value="'.$listProduct[$i]['SP_IDSanPham'].'">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Icon" id="addWishlistProduct"
                        data-customerID="'.$customerID.'" value="'.$listProduct[$i]['SP_IDSanPham'].'">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Image">
                        <img class="Product__Panel__Item__Image__1" src="../../Controller/admin/'.$listProduct[$i]['SP_Image1SanPham'].'" alt="">
                        <img class="Product__Panel__Item__Image__2" src="../../Controller/admin/'.$listProduct[$i]['SP_Image2SanPham'].'" alt="">
                    </div>
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Name">'.$listProduct[$i]['SP_TenSanPham'].'</div>
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Price">
                        <div class="Product__Page__Content__Right__Product__Panel__Item__New__Price">'.number_format($newPrice).'</div>
                        '.$htmlSalePrice.'
                    </div>
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Time">
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Time__Icon">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Time__Date">
                            -32:
                        </div>
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Time__Hour">
                            -18:
                        </div>
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Time__Minute">
                            -30:
                        </div>
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Time__Second">
                            -54
                        </div>
                    </div>
                </a>
                ';
            } else {
                $output .= '
                <a href="./details.view.php?id-product='.$listProduct[$i]['SP_IDSanPham'].'" class="Product__Page__Content__Right__Product__Panel__Item">
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Icon__Group"></div>
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Image">
                        <img class="Product__Panel__Item__Image__1" src="../../Controller/admin/'.$listProduct[$i]['SP_Image1SanPham'].'" alt="">
                        <img class="Product__Panel__Item__Image__2" src="../../Controller/admin/'.$listProduct[$i]['SP_Image2SanPham'].'" alt="">
                    </div>
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Name">'.$listProduct[$i]['SP_TenSanPham'].'</div>
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Price">
                        <div class="Product__Page__Content__Right__Product__Panel__Item__New__Price">'.number_format($newPrice).'</div>
                        '.$htmlSalePrice.'
                    </div>
                    <div class="Product__Page__Content__Right__Product__Panel__Item__Time">
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Time__Icon">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Time__Date">
                            -32:
                        </div>
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Time__Hour">
                            -18:
                        </div>
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Time__Minute">
                            -30:
                        </div>
                        <div class="Product__Page__Content__Right__Product__Panel__Item__Time__Second">
                            -54
                        </div>
                    </div>
                </a>
                '; 
            }
            
        }
        return $output;
    }
}

if (isset($_POST['fetchProduct']) &&  $_POST['fetchProduct'] === 'fetch-product') {
    isset($_POST['limitProduct']) ?  $limitProduct = $_POST['limitProduct'] : $limitProduct = '9';
    if (isset($_POST['pageProduct']) && $_POST['pageProduct'] > 1) {
        $pageProduct = $_POST['pageProduct'];
        $startProduct = ((intval($pageProduct) - 1) * intval($limitProduct));
    } else {
        $pageProduct = 1;
        $startProduct = 0;
    }
    
    if (isset($_POST['queryProduct'])) {$queryProduct = $_POST['queryProduct'];}

    $dataProduct = fetchProduct ($ValidateData->standardizeString($limitProduct),$ValidateData->standardizeString($startProduct), $queryProduct);

    $totalRecords = $ProductClass->countProductPage($queryProduct);
    $totalButton = ceil($totalRecords / intval($limitProduct));
    $prevButton = "";
    $nextButton = "";
    $pageButton = "";
    $arrayButton = array();

    if ($totalButton > 8) {
        if ($pageProduct < 5) {
            for($i = 1; $i <= 5; $i++) {
                $arrayButton[] = $i;
            }
            $arrayButton[] = '...';
            $arrayButton[] = $totalButton;
        } else {
            $endLimit = $totalButton - 5;
            if ($pageProduct > $endLimit) {
                $arrayButton[] = 1;
                $arrayButton[] = '...';
                for($i = $endLimit; $i <= $totalButton; $i++) {
                  $arrayButton[] = $i;
                }
            } else {
                $arrayButton[] = 1;
                $arrayButton[] = '...';
                for($i = $pageProduct - 1; $i <= $pageProduct + 1; $i++)
                {
                  $arrayButton[] = $i;
                }
                $arrayButton[] = '...';
                $arrayButton[] = $totalButton;
            }
        }
    } else {
        for($i = 1; $i <= $totalButton; $i++)
        {
            $arrayButton[] = $i;
        }
    }

    for($i = 0; $i < count($arrayButton); $i++) {
        if(intval($pageProduct) == $arrayButton[$i]) {
            $pageButton .= '<div class="Product__Page__Content__Right__Product__Paging__Item active" value="'.$arrayButton[$i].'" >'.$arrayButton[$i].'</div>';
            $prevID = $arrayButton[$i] - 1;
            if($prevID > 0) {
                $prevButton = ' <div class="Product__Page__Content__Right__Product__Paging__Item Paging__Prev" value="'.$prevID.'">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </div>';
            } else {
                $prevButton = ' <div class="Product__Page__Content__Right__Product__Paging__Item Paging__Prev" value="1">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </div>';;
            }
            $nextID = $arrayButton[$i] + 1;
            if($nextID > $totalButton) {
                $nextButton = ' <div class="Product__Page__Content__Right__Product__Paging__Item Paging__Next" value="'.$totalButton.'">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>';
            } else {
                $nextButton = ' <div class="Product__Page__Content__Right__Product__Paging__Item Paging__Next" value="'.$nextID.'">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>';
            }
        } else {
            if($arrayButton[$i] == '...') {
                $pageButton .= '<div class="Product__Page__Content__Right__Product__Paging__Item Paging__Dots">...</div>';
            } else {
                $pageButton .= '<div class="Product__Page__Content__Right__Product__Paging__Item" value="'.$arrayButton[$i].'">'.$arrayButton[$i].'</div>';
            }
        }
    }
        
    $paginationButton = $prevButton . $pageButton . $nextButton;
    $dataResponse = [$paginationButton, $dataProduct];
    print_r(json_encode($dataResponse));

 }

 function fetchCart () {
    $CustomerClass = new Customer;
    $ProductClass = new Product;
    $CartClass = new Cart;
    $CustomerClass->setKH_EmailKhachHang($_SESSION['email']);
    $idCustomer = $CustomerClass->selectCustomerByEmail()['KH_IDKhachHang'];
    $CartClass->setGH_IDKhachHang($idCustomer);
    $listCart = $CartClass->selectAllCart();
    $output = '';
    for ($i = 0; $i < count($listCart); $i++) {
        $ProductClass->setSP_IDSanPham($listCart[$i]['GH_IDSanPham']);
        $oldPrice = intval($ProductClass->selectProductByID()['SP_GiaBanSanPham']);
        $newPrice = intval($ProductClass->selectProductByID()['SP_GiaBanSanPham']);
        $salePrice = intval($ProductClass->selectProductByID()['SP_GiamGiaSanPham']);
        if ($salePrice === 0) {
            $htmlSalePrice = '';
        } else {
            $newPrice = $oldPrice - ($newPrice * $salePrice) / 100;
            $htmlSalePrice =  '<span class="regular-price">'.number_format($oldPrice).'</span>';
        }

        $output .= '
        <div class="order-row">
            <div class="order-row-left">
                <div class="order-row-img">
                    <img src="../../Controller/admin/'.$ProductClass->selectProductByID()['SP_Image1SanPham'].'" alt="">
                </div>
                <div class="order-row-details">
                    <h4>'.$ProductClass->selectProductByID()['SP_TenSanPham'].'</h4>
                    <div class="row-details-items">
                        <span class="row-items-tittle">Hãng: </span>
                        <span>'.$ProductClass->selectProductByID()['SP_HangSanPham'].'</span>
                    </div>
                    <div class="row-details-items">
                        <span class="row-items-tittle">Dung lượng:</span>
                        <span>'.$ProductClass->selectProductByID()['SP_RAMSanPham'].'GB/'.$ProductClass->selectProductByID()['SP_ROMSanPham'].'GB</span>
                    </div>
                    <div class="row-details-items-price">
                        <span class="row-details-items-sale-price">'.number_format($newPrice).'</span>
                        '.$htmlSalePrice.'
                    </div>
                    <div class="row-details-items-quantity-details">
                        <input type="number" id="quantityCartLeft" value="'.$listCart[$i]['GH_SLSanPhamGioHang'].'"
                        data-productID="'.$ProductClass->selectProductByID()['SP_IDSanPham'].'">
                        <div class="quantity-navigation">
                            <div class="quantity-inc" id="increaseQuantityLeft"><i class="bx bx-chevron-up"></i></div>
                            <div class="quantity-dec" id="decreaseQuantityLeft"><i class="bx bx-chevron-down"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-row-right">
                <div class="order-right-price">
                    <span class="sale-price">'.number_format($newPrice).'</span>
                    '.$htmlSalePrice.'
                </div>
                <div class="order-right-quantity">
                    <span>SL</span>
                    <div class="quantity-details">
                        <input type="number" min="1" id="quantityCartRight" value="'.$listCart[$i]['GH_SLSanPhamGioHang'].'"
                        data-productID="'.$ProductClass->selectProductByID()['SP_IDSanPham'].'">
                        <div class="quantity-navigation">
                            <div class="quantity-inc" id="increaseQuantityRight"><i class="bx bx-chevron-up"></i></div>
                            <div class="quantity-dec" id="decreaseQuantityRight"><i class="bx bx-chevron-down"></i></div>
                        </div>
                    </div>
                </div>
                <div class="order-right-remove" id="deleteCart" value="'.$ProductClass->selectProductByID()['SP_IDSanPham'].'">
                    <i class="bx bx-x"></i>
                </div>
            </div>
        </div>
        ';
    }
    return $output;
 }

 function fetchCartBill () {
    $CustomerClass = new Customer;
    $ProductClass = new Product;
    $CartClass = new Cart;
    $CustomerClass->setKH_EmailKhachHang($_SESSION['email']);
    $idCustomer = $CustomerClass->selectCustomerByEmail()['KH_IDKhachHang'];
    $CartClass->setGH_IDKhachHang($idCustomer);
    $listCart = $CartClass->selectAllCart();
    $output = '';
    for ($i = 0; $i < count($listCart); $i++) {
        $ProductClass->setSP_IDSanPham($listCart[$i]['GH_IDSanPham']);
        $oldPrice = intval($ProductClass->selectProductByID()['SP_GiaBanSanPham']);
        $newPrice = intval($ProductClass->selectProductByID()['SP_GiaBanSanPham']);
        $salePrice = intval($ProductClass->selectProductByID()['SP_GiamGiaSanPham']);
        if ($salePrice === 0) {
            $htmlSalePrice = '';
        } else {
            $newPrice = $oldPrice - ($newPrice * $salePrice) / 100;
            $htmlSalePrice =  '<span class="regular-price">'.number_format($oldPrice).'</span>';
        }

        $output .= '
        <div class="order-row">
            <div class="order-row-left">
                <div class="order-row-img">
                    <img src="../../Controller/admin/'.$ProductClass->selectProductByID()['SP_Image1SanPham'].'" alt="">
                </div>
                <div class="order-row-details">
                    <h4>'.$ProductClass->selectProductByID()['SP_TenSanPham'].'</h4>
                    <div class="row-details-items">
                        <span class="row-items-tittle">Hãng: </span>
                        <span>'.$ProductClass->selectProductByID()['SP_HangSanPham'].'</span>
                    </div>
                    <div class="row-details-items">
                        <span class="row-items-tittle">Dung lượng:</span>
                        <span>'.$ProductClass->selectProductByID()['SP_RAMSanPham'].'GB/'.$ProductClass->selectProductByID()['SP_ROMSanPham'].'GB</span>
                    </div>
                    <div class="row-details-items-price">
                        <span class="row-details-items-sale-price">'.number_format($newPrice).'</span>
                        '.$htmlSalePrice.'
                    </div>
                    <div class="row-details-items-quantity-details">
                        <span>SL: </span>
                        '.$listCart[$i]['GH_SLSanPhamGioHang'].'
                    </div>
                </div>
            </div>
            <div class="order-row-right">
                <div class="order-right-price">
                    <span class="sale-price">'.number_format($newPrice).'</span>
                    '.$htmlSalePrice.'
                </div>
                <div class="order-right-quantity">
                    <span>SL:</span>
                    <div class="quantity-details">'.$listCart[$i]['GH_SLSanPhamGioHang'].'</div>
                </div>
            </div>
        </div>
        ';
    }
    return $output;
 }

if (isset($_POST['addCart']) && $_POST['addCart'] === 'add-cart') {
    if (isset($_POST['idProduct']) && isset($_POST['idCustomer'])) {
         $error = '';
         $idProduct = $_POST['idProduct'];
         $idCustomer = $_POST['idCustomer'];
         $CartClass->setGH_IDSanPham($idProduct);
         $CartClass->setGH_IDKhachHang($idCustomer);
        if ($CartClass->checkDuplicate()) {
            $CartClass->setGH_SLSanPhamGioHang("1");
            if (!$CartClass->insertCart()) {
                $error = 'errorInsert';
            } 
        } else {
            $quantity = $CartClass->getQuantityByID()['GH_SLSanPhamGioHang'];
            $CartClass->setGH_SLSanPhamGioHang(intval($quantity) + 1);
            if (!$CartClass->updateQuantityCart()) {
                $error = 'errorUpdate';
            } 
        }
        if ($error === '') {
            echo 'success';
        } else {
            echo $error;
        }
    }
}

if (isset($_POST['addCartDetals']) && $_POST['addCartDetals'] === 'add-cart-details') {
    if (isset($_POST['idProductDetals']) && isset($_POST['idCustomerDetals']) && isset($_POST['quantityCartDetals'])) {
        $error = '';
        $idProduct = $_POST['idProductDetals'];
        $idCustomer = $_POST['idCustomerDetals'];
        $_POST['quantityCartDetals'] === '' ? $quantityCart = 1 : $quantityCart = $_POST['quantityCartDetals'];
        $CartClass->setGH_IDSanPham($idProduct);
        $CartClass->setGH_IDKhachHang($idCustomer);
       if ($CartClass->checkDuplicate()) {
           $CartClass->setGH_SLSanPhamGioHang($quantityCart);
           if (!$CartClass->insertCart()) {
               $error = 'errorInsert';
           } 
       } else {
           $quantity = $CartClass->getQuantityByID()['GH_SLSanPhamGioHang'];
           $CartClass->setGH_SLSanPhamGioHang(intval($quantity) + intval($quantityCart));
           if (!$CartClass->updateQuantityCart()) {
               $error = 'errorUpdate';
           } 
       }
       if ($error === '') {
           echo 'success';
       } else {
           echo $error;
       }
   }
}


if (isset($_POST['fetchCart']) && $_POST['fetchCart'] === 'fetch-cart') {
        echo fetchCart ();
}

if (isset($_POST['fetchQuantityCart']) && $_POST['fetchQuantityCart'] === 'fetch-quantity-cart') {
    $CartClass = new Cart;
    $CustomerClass = new Customer;
    $CustomerClass->setKH_EmailKhachHang($_SESSION['email']);
    $customerID = $CustomerClass->selectCustomerByEmail()['KH_IDKhachHang'];
    $CartClass->setGH_IDKhachHang($customerID);
    echo $CartClass->countProductCart();
}

if (isset($_POST['deleteCart']) && $_POST['deleteCart'] === 'delete-cart') {
    if (isset($_POST['idProduct'])) {
        $CartClass = new Cart;
        $CustomerClass = new Customer;
        $CustomerClass->setKH_EmailKhachHang($_SESSION['email']);
        $productID = $_POST['idProduct'];
        $customerID = $CustomerClass->selectCustomerByEmail()['KH_IDKhachHang'];
        $CartClass->setGH_IDSanPham($productID);
        $CartClass->setGH_IDKhachHang($customerID);
        if ($CartClass->deleteProductCart()) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
}

if (isset($_POST['flagUpdateQuantity']) && $_POST['flagUpdateQuantity'] === 'update-quantity') {
    if (isset($_POST['idProduct']) && isset($_POST['quantityCart'])) {
        $productID = $_POST['idProduct'];
        $_POST['quantityCart'] !== '' ? $quantityCart = $_POST['quantityCart'] : $quantityCart = '1';
        $CartClass = new Cart;
        $CustomerClass = new Customer;
        $CustomerClass->setKH_EmailKhachHang($_SESSION['email']);
        $customerID = $CustomerClass->selectCustomerByEmail()['KH_IDKhachHang'];
        $CartClass->setGH_IDSanPham($productID);
        $CartClass->setGH_IDKhachHang($customerID);
        $CartClass->setGH_SLSanPhamGioHang($quantityCart);
        if ($CartClass->updateQuantityCart()) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
}

function fetchPhoneAddress () {
    $CustomerClass = new Customer;
    $CustomerClass->setKH_EmailKhachHang($_SESSION['email']);
    $KH_IDKhachHang = $CustomerClass->selectCustomerByEmail()['KH_IDKhachHang'];
    $KH_SDTKhachHang = $CustomerClass->selectCustomerByEmail()['KH_SDTKhachHang'];
    $KH_DiaChiKhachHang = $CustomerClass->selectCustomerByEmail()['KH_DiaChiKhachHang'];
    if ($KH_SDTKhachHang === 'Chưa cập nhật' || $KH_DiaChiKhachHang === 'Chưa cập nhật') {
        return '
        <div class="content-checkout">
            <div class="content-info">
                <div class="content-info-logo">
                    <i class="bx bx-error-alt"></i>
                </div>
                <div class="content-info-details">Vui lòng cập nhật địa chỉ và số điện thoại</div>
            </div>
            <div class="content-address">
                <div class="content-address-details">
                    <div class="Update__Info__Input__Box">
                        <label for="updateAddressCart">Địa chỉ:</label>
                        <input type="text" value="'.$KH_DiaChiKhachHang.'" id="updateAddressCart">
                        <div class="Update__Info__Error">Địa chỉ phải trên 4 ký tự</div>
                    </div> 
                    <div class="Update__Info__Input__Box">
                        <label for="updatePhoneCart">Số điện thoại:</label>
                        <input type="text" value="'.$KH_SDTKhachHang.'" id="updatePhoneCart">
                        <div class="Update__Info__Error">Số điện thoại không hợp lệ</div>
                    </div> 
                    <div id="updateInfoCartSubmit" value="'.$KH_IDKhachHang.'">Cập Nhật</div>
                </div>
            </div>
        </div>
        ';
    } else {
        return '';
    }

}

function getPriceBill () {
    $CustomerClass = new Customer;
    $ProductClass = new Product;
    $CartClass = new Cart;
    $CustomerClass->setKH_EmailKhachHang($_SESSION['email']);
    $idCustomer = $CustomerClass->selectCustomerByEmail()['KH_IDKhachHang'];
    $CartClass->setGH_IDKhachHang($idCustomer);
    $listCart = $CartClass->selectAllCart();
    $priceBill = 0;
    $salePrice = 0;
    $quantityProduct = 0;
    $totalSalePrice = 0;
    $VAT = 0.1;
    for ($i = 0; $i < count($listCart); $i++) {
        $ProductClass->setSP_IDSanPham($listCart[$i]['GH_IDSanPham']);
        $salePrice = intval($ProductClass->selectProductByID()['SP_GiaBanSanPham']) - 
        (intval($ProductClass->selectProductByID()['SP_GiaBanSanPham']) * intval($ProductClass->selectProductByID()['SP_GiamGiaSanPham']) / 100);
        $priceBill += $salePrice *  intval($listCart[$i]['GH_SLSanPhamGioHang']);
        $quantityProduct += $listCart[$i]['GH_SLSanPhamGioHang'];
        $totalSalePrice += (intval($ProductClass->selectProductByID()['SP_GiaBanSanPham']) * intval($listCart[$i]['GH_SLSanPhamGioHang'])) 
        - ($salePrice * intval($listCart[$i]['GH_SLSanPhamGioHang']));
    }  
    $totalPriceBill = $priceBill + ($priceBill * $VAT);
    return [$priceBill, $totalSalePrice, count($listCart), $quantityProduct, $totalPriceBill];
}

if (isset($_POST['createBill']) && $_POST['createBill'] === 'create-bill') {
    $arrayResponse = [fetchCartBill(), number_format(getPriceBill ()[0]), number_format( getPriceBill ()[1]), getPriceBill ()[2], getPriceBill ()[3], 
    number_format(getPriceBill ()[4])  , fetchPhoneAddress ()];
    print_r(json_encode($arrayResponse));
}
?>