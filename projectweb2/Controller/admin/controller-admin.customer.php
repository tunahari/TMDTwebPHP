<?php
// $conn = mysqli_connect('localhost', 'root', '', 'projectweb2') or die("Không thể kết nối tới csdl");
// if (!$conn) {
//     echo "Kết nối không thành công. " . mysqli_connect_error();
//     die();
// }
// $sql = "SELECT * FROM `customer`";
// $result = mysqli_query($conn, $sql);
// $list_customer = array();
// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         $list_customer[] = $row;
//     }
// }
    require_once '../../Model/admin/model-amin.customer.php';
    require_once '../../Model/database/connectDataBase.php';
    require_once '../class/controller.validate.php';
    $CustomerClass = new Customer;
    $ValidateData = new ValidateData;
    

    function fetchCustomer ($limitCustomer, $startCustomer, $queryCustomer, $sortIDCustomer, $sortDateCustomer, $sortLevelCustomer) {
        $CustomerClass = new Customer;
        
        $listCustomer = $CustomerClass->selectLimitCustomer($limitCustomer, $startCustomer, $queryCustomer, $sortIDCustomer, $sortDateCustomer, $sortLevelCustomer);
        $output = '';
        if ($listCustomer) {
                for ($i = 0; $i < count($listCustomer); $i++) {
                    $output .= '
                    <a href="./customer-info-admin.php?id-customer='.$listCustomer[$i]['KH_IDKhachHang'].'">
                        <div class="table__customer__tbody__tr">
                            <div class="table__customer__tbody__tr__td">KH'.$listCustomer[$i]['KH_IDKhachHang'].'</div>
                            <div class="table__customer__tbody__tr__td">'.$listCustomer[$i]['KH_TenKhachHang'].'</div>
                            <div class="table__customer__tbody__tr__td">'.$listCustomer[$i]['KH_SDTKhachHang'].'</div>
                            <div class="table__customer__tbody__tr__td">'.$listCustomer[$i]['KH_DiaChiKhachHang'].'</div>';
                            if (intval($listCustomer[$i]['KH_LoaiKhachHang']) === 0) {
                                $output .= '
                                <div class="table__customer__tbody__tr__td">
                                    <div class="customer__level customer__level__traveller">Vãng Lai</div>
                                </div>';
                            } else if (intval($listCustomer[$i]['KH_LoaiKhachHang']) === 1) {
                                $output .= '
                                <div class="table__customer__tbody__tr__td">
                                    <div class="customer__level customer__level__purchased">Đã Mua</div>
                                </div>';
                            } else if (intval($listCustomer[$i]['KH_LoaiKhachHang']) === 2) {
                                $output .= '
                                <div class="table__customer__tbody__tr__td">
                                    <div class="customer__level customer__level__vip">VIP</div>
                                </div>';
                            }
                            $output .= '
                            <div class="table__customer__tbody__tr__td">'.$listCustomer[$i]['KH_NgayTaoKhachHang'].'</div>
                            <div class="table__customer__tbody__tr__td">
                               '.$listCustomer[$i]['KH_TrangThaiDangNhapKhachHang'].'
                            </div>
                        </div>
                    </a>';
                }
            return $output;
        }
    }

    if (isset($_POST['fetchCustomer']) &&  $_POST['fetchCustomer'] === 'fetch-customer') {
        /* ============================= Xử lý limit ============================= */
        isset($_POST['limitCustomer']) ?  $limitCustomer = $_POST['limitCustomer'] : $limitCustomer = '5';

        /* ============================= Xử lý page ============================= */
        if (isset($_POST['pageCustomer']) && $_POST['pageCustomer'] > 1) {
            $pageCustomer = $_POST['pageCustomer'];
            $startCustomer = ((intval($pageCustomer) - 1) * $limitCustomer);
        } else {
            $pageCustomer = 1;
            $startCustomer = 0;
        }

        /* ============================= Xử lý query ============================= */
        isset($_POST['queryCustomer']) && $_POST['queryCustomer'] !== '' ? $queryCustomer = str_replace('"', '%', $_POST['queryCustomer']) : $queryCustomer = '';

        /* ============================= Xử lý sort ============================= */
        if (isset($_POST['sortIDCustomer']) && isset($_POST['sortDateCustomer'])) {
            if (($_POST['sortIDCustomer'] === '' || $_POST['sortIDCustomer'] === 'ASC' || $_POST['sortIDCustomer'] === 'DESC') &&
                ($_POST['sortDateCustomer'] === '' || $_POST['sortDateCustomer'] === 'ASC' || $_POST['sortDateCustomer'] === 'DESC') &&
                ($_POST['sortLevelCustomer'] === '' || $_POST['sortLevelCustomer'] === 'ASC' || $_POST['sortLevelCustomer'] === 'DESC')) {
                // Trường hợp tất cả đều không rỗng, thì ưu tiên cho sortID
                if ($_POST['sortIDCustomer'] !== '' && $_POST['sortDateCustomer'] !== '' && $_POST['sortLevelCustomer'] !== '') {
                    $sortIDCustomer = $_POST['sortIDCustomer']; $sortDateCustomer = ''; $sortLevelCustomer = '';
                } 
                // Trường hợp sortID không rỗng, sortDate và sortPosition rỗng thì lấy sortID
                else if ($_POST['sortIDCustomer'] !== '' && $_POST['sortDateCustomer'] === '' && $_POST['sortLevelCustomer'] === '') {
                    $sortIDCustomer = $_POST['sortIDCustomer']; $sortDateCustomer = ''; $sortLevelCustomer = '';
                }
                // Trường hợp sortDate không rỗng, sortID và sortPosition rỗng thì lấy sortDate
                else if ($_POST['sortIDCustomer'] === '' && $_POST['sortDateCustomer'] !== '' && $_POST['sortLevelCustomer'] === '') {
                    $sortIDCustomer = ''; $sortDateCustomer = $_POST['sortDateCustomer']; $sortLevelCustomer = '';
                }
                // Trường hợp sortPosition không rỗng, sortID và sortDate rỗng thì lấy sortPosition
                else if ($_POST['sortIDCustomer'] === '' && $_POST['sortDateCustomer'] === '' && $_POST['sortLevelCustomer'] !== '') {
                    $sortIDCustomer = ''; $sortDateCustomer = ''; $sortLevelCustomer = $_POST['sortLevelCustomer'];
                }
                // Trường hợp sortID, sortDate, sortPosition đều rỗng thì ưu tiên sortID
                else if ($_POST['sortIDCustomer'] === '' && $_POST['sortDateCustomer'] === '' && $_POST['sortLevelCustomer'] === '') {
                    $sortIDCustomer = 'DESC'; $sortDateCustomer = ''; $sortLevelCustomer = '';
                }
            } else {
                $sortIDCustomer = 'DESC'; $sortDateCustomer = ''; $sortLevelCustomer = '';
            }
        }

        $dataCustomer =  fetchCustomer (
            $ValidateData->standardizeString($limitCustomer),$ValidateData->standardizeString($startCustomer), 
            $ValidateData->standardizeString($queryCustomer), $ValidateData->standardizeString($sortIDCustomer),
            $ValidateData->standardizeString($sortDateCustomer), $ValidateData->standardizeString($sortLevelCustomer)
        );
        
        $totalRecords = $CustomerClass->countRecordCustomer($queryCustomer);
        $totalButton = ceil($totalRecords / $limitCustomer);
        $prevButton = "";
        $nextButton = "";
        $pageButton = "";
        $arrayButton = array();

        if ($totalButton > 8) {
            if ($pageCustomer < 5) {
                for($i = 1; $i <= 5; $i++) {
                    $arrayButton[] = $i;
                }
                $arrayButton[] = '...';
                $arrayButton[] = $totalButton;
            } else {
                $endLimit = $totalButton - 5;
                if ($pageCustomer > $endLimit) {
                    $arrayButton[] = 1;
                    $arrayButton[] = '...';
                    for($i = $endLimit; $i <= $totalButton; $i++) {
                      $arrayButton[] = $i;
                    }
                } else {
                    $arrayButton[] = 1;
                    $arrayButton[] = '...';
                    for($i = $pageCustomer - 1; $i <= $pageCustomer + 1; $i++)
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
            if(intval($pageCustomer) == $arrayButton[$i]) {
                $pageButton .= '<div class="pagination__customer__item active" value="'.$arrayButton[$i].'">'.$arrayButton[$i].'</div>';
                $prevID = $arrayButton[$i] - 1;
                if($prevID > 0) {
                    $prevButton = ' <div class="pagination__customer__item pagination__customer__prev" value="'.$prevID.'">
                                        <i class="bx bx-left-arrow-alt"></i>
                                    </div>';
                } else {
                    $prevButton = ' <div class="pagination__customer__item pagination__customer__prev" value="1">
                                        <i class="bx bx-left-arrow-alt"></i>
                                    </div>';
                }
                $nextID = $arrayButton[$i] + 1;
                if($nextID > $totalButton) {
                    $nextButton = ' <div class="pagination__customer__item pagination__customer__next" value="'.$totalButton.'">
                                        <i class="bx bx-right-arrow-alt"></i>
                                    </div>';
                } else {
                    $nextButton = ' <div class="pagination__customer__item pagination__customer__next" value="'.$nextID.'">
                                        <i class="bx bx-right-arrow-alt"></i>
                                    </div>';
                }
            } else {
                if($arrayButton[$i] == '...') {
                    $pageButton .= '<div class="pagination__customer__item__dots">...</div>';
                } else {
                    $pageButton .= '<div class="pagination__customer__item" value="'.$arrayButton[$i].'">'.$arrayButton[$i].'</div>';
                }
            }
        }

        $paginationButton = $prevButton . $pageButton . $nextButton;
        $dataResponse = [$paginationButton, $dataCustomer];
        print_r(json_encode($dataResponse));
    }
?>