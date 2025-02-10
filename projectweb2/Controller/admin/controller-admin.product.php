<?php
require_once '../../Model/admin/model-admin.info-product.php';
require_once '../../Model/database/connectDataBase.php';
require_once '../class/controller.validate.php';
$ProductClass = new Product;
$ValidateData = new ValidateData;

function fetchProduct ($limitProduct, $startProduct, $queryProduct, $sortIDProduct, $sortDateProduct, $sortPriceProduct) {
    $ProductClass = new Product;
    $listProduct = $ProductClass->selectLimitProduct($limitProduct, $startProduct, $queryProduct, $sortIDProduct, $sortDateProduct, $sortPriceProduct);
    $output = '';
    if ($listProduct) {
            for ($i = 0; $i < count($listProduct); $i++) {
                $output .= '
                <a href="./product-info-admin.php?id-product='.$listProduct[$i]['SP_IDSanPham'].'&menu=product">
                    <div class="table__product__tbody__tr">
                        <div class="table__product__tbody__tr__td">SP'.$listProduct[$i]['SP_IDSanPham'].'</div>
                        <div class="table__product__tbody__tr__td">'.$listProduct[$i]['SP_TenSanPham'].'</div>
                        <div class="table__product__tbody__tr__td">'.number_format($listProduct[$i]['SP_GiaBanSanPham']).'</div>
                        <div class="table__product__tbody__tr__td">'.$listProduct[$i]['SP_GiamGiaSanPham'].'%</div>
                        <div class="table__product__tbody__tr__td">'.$listProduct[$i]['SP_TonKhoSanPham'].'</div>
                        <div class="table__product__tbody__tr__td">'.$listProduct[$i]['SP_TongNhapSanPham'].'</div>
                        <div class="table__product__tbody__tr__td">'.$listProduct[$i]['SP_TongBanSanPham'].'</div>
                        <div class="table__product__tbody__tr__td">'.$listProduct[$i]['SP_ThoiGianTaoSanPham'].'</div>
                        <div class="table__product__tbody__tr__td">
                            <div class="product__action__delete__button" value="'.$listProduct[$i]['SP_IDSanPham'].'">
                                <i class="bx bxs-trash"></i>
                            </div>
                        </div>
                    </div>
                </a>
                ';
            }
        return $output;
    }
}

if (isset($_POST['fetchProduct']) &&  $_POST['fetchProduct'] === 'fetch-product') {
    // ========================================= Bộ test 1 =========================================
    // echo 'fetchProduct' . " ---- " . 'limitProduct' . " ---- " . 'pageProduct'. " ---- "
    // . 'queryProduct' . " ---- " . 'sortIDProduct' . " ---- " . 'sortDateProduct' . " ---- "
    // . 'sortPriceProduct' . " =================== ";
    // echo $_POST['fetchProduct'] . " ---- " . $_POST['limitProduct'] . " ---- " . $_POST['pageProduct'] . " ---- "
    // . $_POST['queryProduct'] . " ---- " . $_POST['sortIDProduct'] . " ---- " . $_POST['sortDateProduct'] . " ---- "
    // . $_POST['sortPriceProduct'];
    // ========================================= Bộ test 1 =========================================

    isset($_POST['limitProduct']) ?  $limitProduct = $_POST['limitProduct'] : $limitProduct = '5';
    if (isset($_POST['pageProduct']) && $_POST['pageProduct'] > 1) {
        $pageProduct = $_POST['pageProduct'];
        $startProduct = ((intval($pageProduct) - 1) * intval($limitProduct));
    } else {
        $pageProduct = 1;
        $startProduct = 0;
    }
    // ========================================= Bộ test 2 =========================================
    // echo '$pageProduct' . ' ---- ' . '$startProduct' . ' ---- ' . '$limitProduct' . " =================== ";;
    // echo $pageProduct . ' ---- ' . $startProduct . ' ---- ' . $limitProduct;
    // ========================================= Bộ test 2 =========================================

    
    isset($_POST['queryProduct']) && $_POST['queryProduct'] !== '' ? $queryProduct = str_replace('"', '%', $_POST['queryProduct']) : $queryProduct = '' ;

    if (isset($_POST['sortIDProduct']) && isset($_POST['sortDateProduct']) && isset($_POST['sortPriceProduct'])) {
        if (($_POST['sortIDProduct'] === '' || $_POST['sortIDProduct'] === 'ASC' || $_POST['sortIDProduct'] === 'DESC') &&
            ($_POST['sortDateProduct'] === '' || $_POST['sortDateProduct'] === 'ASC' || $_POST['sortDateProduct'] === 'DESC') &&
            ($_POST['sortPriceProduct'] === '' || $_POST['sortPriceProduct'] === 'ASC' || $_POST['sortPriceProduct'] === 'DESC')) {
                // Trường hợp tất cả đều không rỗng, thì ưu tiên cho sortID
                if ($_POST['sortIDProduct'] !== '' && $_POST['sortDateProduct'] !== '' && $_POST['sortPriceProduct'] !== '') {
                    $sortIDProduct = $_POST['sortIDProduct']; $sortDateProduct = ''; $sortPriceProduct = '';
                } 
                // Trường hợp sortID không rỗng, sortDate và sortPrice rỗng thì lấy sortID
                else if ($_POST['sortIDProduct'] !== '' && $_POST['sortDateProduct'] === '' && $_POST['sortPriceProduct'] === '') {
                    $sortIDProduct = $_POST['sortIDProduct']; $sortDateProduct = ''; $sortPriceProduct = '';
                } 
                // Trường hợp sortDate không rỗng, sortID và sortPrice rỗng thì lấy sortDate
                else if ($_POST['sortIDProduct'] === '' && $_POST['sortDateProduct'] !== '' && $_POST['sortPriceProduct'] === '') {
                    $sortIDProduct = ''; $sortDateProduct = $_POST['sortDateProduct']; $sortPriceProduct = '';
                } 
                // Trường hợp sortPrice không rỗng, sortID và sortDate rỗng thì lấy sortPosition
                else if ($_POST['sortIDProduct'] === '' && $_POST['sortDateProduct'] === '' && $_POST['sortPriceProduct'] !== '') {
                    $sortIDProduct = ''; $sortDateProduct = ''; $sortPriceProduct = $_POST['sortPriceProduct'];
                } 
                // Trường hợp sortID, sortDate, sortPrice đều rỗng thì ưu tiên sortID
                else if ($_POST['sortIDProduct'] === '' && $_POST['sortDateProduct'] === '' && $_POST['sortPriceProduct'] === '') {
                    $sortIDProduct = $_POST['sortIDProduct']; $sortDateProduct = ''; $sortPriceProduct = '';
                }
        } else {
            $sortIDProduct = 'ASC'; $sortDateProduct = ''; $sortPriceProduct = '';
        }
    }

    // ========================================= Bộ test 3 =========================================
    // echo '$queryProduct' . ' ---- ' . '$sortIDProduct' . ' ---- ' . '$sortDateProduct' . '$sortPriceProduct' . " =================== ";
    // echo $queryProduct . ' ---- ' . $sortIDProduct . ' ---- ' . $sortDateProduct . ' ---- ' . $sortPriceProduct;
    // ========================================= Bộ test 3 =========================================

    $dataProduct =  fetchProduct (
        $ValidateData->standardizeString($limitProduct),$ValidateData->standardizeString($startProduct), 
        $ValidateData->standardizeString($queryProduct), $ValidateData->standardizeString($sortIDProduct),
        $ValidateData->standardizeString($sortDateProduct), $ValidateData->standardizeString($sortPriceProduct)
    );

    // ========================================= Bộ test 4 =========================================
    // echo 'dataProduct ================= ';
    // var_dump($dataProduct);
    // ========================================= Bộ test 4 =========================================

    $totalRecords = $ProductClass->countRecordProduct($queryProduct);
    $totalButton = ceil($totalRecords / intval($limitProduct));
    $prevButton = "";
    $nextButton = "";
    $pageButton = "";
    $arrayButton = array();

// ========================================= Bộ test 5 =========================================
    // echo 'totalRecords ---- totalButton ============= ';
    // echo $totalRecords . ' ---- ' . $totalButton;
// ========================================= Bộ test 5 =========================================

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
            $pageButton .= '<div class="pagination__product__item active" value="'.$arrayButton[$i].'">'.$arrayButton[$i].'</div>';
            $prevID = $arrayButton[$i] - 1;
            if($prevID > 0) {
                $prevButton = ' <div class="pagination__product__item pagination__product__prev" value="'.$prevID.'">
                                    <i class="bx bx-left-arrow-alt"></i>
                                </div>';
            } else {
                $prevButton = ' <div class="pagination__product__item pagination__product__prev" value="1">
                                    <i class="bx bx-left-arrow-alt"></i>
                                </div>';
            }
            $nextID = $arrayButton[$i] + 1;
            if($nextID > $totalButton) {
                $nextButton = ' <div class="pagination__product__item pagination__product__next" value="'.$totalButton.'">
                                    <i class="bx bx-right-arrow-alt"></i>
                                </div>';
            } else {
                $nextButton = ' <div class="pagination__product__item pagination__product__next" value="'.$nextID.'">
                                    <i class="bx bx-right-arrow-alt"></i>
                                </div>';
            }
        } else {
            if($arrayButton[$i] == '...') {
                $pageButton .= '<div class="pagination__product__item__dots">...</div>';
            } else {
                $pageButton .= '<div class="pagination__product__item" value="'.$arrayButton[$i].'">'.$arrayButton[$i].'</div>';
            }
        }
    }
        
    $paginationButton = $prevButton . $pageButton . $nextButton;
    $dataResponse = [$paginationButton, $dataProduct];
    print_r(json_encode($dataResponse));

 }

if (isset($_POST['createProduct']) &&  $_POST['createProduct'] === 'create-product') {
    if ($ProductClass->insertProduct()) {
        echo 'create-success';
    } else {
        echo 'create-failed';
    }
}

if (isset($_POST['deleteProduct']) && $_POST['deleteProduct'] === 'delete-product') {
    if (isset($_POST['idProductDelete']) && $_POST['idProductDelete'] !== '') {
        $ProductClass->setSP_IDSanPham($_POST['idProductDelete']);
        if ($ProductClass->setDeleteStatusProductByID()) {
            echo 'delete-success';
        } else {
            echo 'delete-failed';
        }
    }
}
?>