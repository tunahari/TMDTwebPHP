<?php
    require_once '../../Model/admin/model-admin.employee.php';
    require_once '../../Model/database/connectDataBase.php';
    require_once '../class/controller.validate.php';
    $EmployeeClass = new Employee;
    $ValidateData = new ValidateData;

    function fetchEmployee ($limitEmployee, $startEmployee, $queryEmployee, $sortIDEmployee, $sortDateEmployee, $sortPositionEmployee) {
        $EmployeeClass = new Employee;
        $listEmployee = $EmployeeClass->selectLimitEmployee($limitEmployee, $startEmployee, $queryEmployee, $sortIDEmployee, $sortDateEmployee, $sortPositionEmployee);
        $output = '';
        if ($listEmployee) {
                for ($i = 0; $i < count($listEmployee); $i++) {
                    $output .= '
                    <a href="./employee-info-admin.php?id-employee='.$listEmployee[$i]['NV_IDNhanVien'].'&menu=employee">
                        <div class="table__employee__tbody__tr">
                            <div class="table__employee__tbody__tr__td">NV'.$listEmployee[$i]['NV_IDNhanVien'].'</div>
                            <div class="table__employee__tbody__tr__td">'.$listEmployee[$i]['NV_TenNhanVien'].'</div>
                            <div class="table__employee__tbody__tr__td">'.$listEmployee[$i]['NV_SoDienThoaiNhanVien'].'</div>
                            <div class="table__employee__tbody__tr__td">'.$listEmployee[$i]['NV_DiaChiNhanVien'].'</div>';
                            if ($listEmployee[$i]['NV_ChucVuNhanVien'] == '0') {
                                $output .= ' 
                                <div class="table__employee__tbody__tr__td">
                                    <div class="employee__level employee__level__staff">N.Viên</div>
                                </div>
                                ';
                            } else if ($listEmployee[$i]['NV_ChucVuNhanVien'] == '1') {
                                $output .= '
                                <div class="table__employee__tbody__tr__td">
                                    <div class="employee__level employee__level__management">Quản Lý </div>
                                </div>
                                ';
                            } else if ($listEmployee[$i]['NV_ChucVuNhanVien'] == '2') {
                                $output .= '
                                <div class="table__employee__tbody__tr__td">
                                    <div class="employee__level employee__level__general__manager">T.G.Đốc</div>
                                </div>
                                ';
                            } else if ($listEmployee[$i]['NV_ChucVuNhanVien'] == '-1') {
                                $output .= '
                                <div class="table__employee__tbody__tr__td">
                                    <div class="employee__level employee__level__not__update">Chưa cập nhật</div>
                                </div>
                                ';
                            }
                    $output .= '
                            <div class="table__employee__tbody__tr__td">'.$listEmployee[$i]['NV_NgayTaoNhanVien'].'</div>
                            <div class="table__employee__tbody__tr__td">
                                <div class="employee__action__delete__button" value="'.$listEmployee[$i]['NV_IDNhanVien'].'"><i class="bx bxs-trash"></i></div>
                            </div>
                        </div>
                    </a>
                    ';
                }
            return $output;
        }
    }

    if (isset($_POST['fetchEmployee']) &&  $_POST['fetchEmployee'] === 'fetch-employee') {
        /* ============================= Xử lý limit ============================= */
        isset($_POST['limitEmployee']) ?  $limitEmployee = $_POST['limitEmployee'] : $limitEmployee = '5';

        /* ============================= Xử lý page ============================= */
        if (isset($_POST['pageEmployee']) && $_POST['pageEmployee'] > 1) {
            $pageEmployee = $_POST['pageEmployee'];
            $startEmployee = ((intval($pageEmployee) - 1) * $limitEmployee);
        } else {
            $pageEmployee = 1;
            $startEmployee = 0;
        }

        /* ============================= Xử lý query ============================= */
        isset($_POST['queryEmployee']) && $_POST['queryEmployee'] !== '' ? $queryEmployee = str_replace('"', '%', $_POST['queryEmployee']) : $queryEmployee = '';

        /* ============================= Xử lý sort ============================= */
        if (isset($_POST['sortIDEmployee']) && isset($_POST['sortDateEmployee'])) {
            if (($_POST['sortIDEmployee'] === '' || $_POST['sortIDEmployee'] === 'ASC' || $_POST['sortIDEmployee'] === 'DESC') &&
                ($_POST['sortDateEmployee'] === '' || $_POST['sortDateEmployee'] === 'ASC' || $_POST['sortDateEmployee'] === 'DESC') &&
                ($_POST['sortPositionEmployee'] === '' || $_POST['sortPositionEmployee'] === 'ASC' || $_POST['sortPositionEmployee'] === 'DESC')) {
                // Trường hợp tất cả đều không rỗng, thì ưu tiên cho sortID
                if ($_POST['sortIDEmployee'] !== '' && $_POST['sortDateEmployee'] !== '' && $_POST['sortPositionEmployee'] !== '') {
                    $sortIDEmployee = $_POST['sortIDEmployee']; $sortDateEmployee = ''; $sortPositionEmployee = '';
                } 
                // Trường hợp sortID không rỗng, sortDate và sortPosition rỗng thì lấy sortID
                else if ($_POST['sortIDEmployee'] !== '' && $_POST['sortDateEmployee'] === '' && $_POST['sortPositionEmployee'] === '') {
                    $sortIDEmployee = $_POST['sortIDEmployee']; $sortDateEmployee = ''; $sortPositionEmployee = '';
                }
                // Trường hợp sortDate không rỗng, sortID và sortPosition rỗng thì lấy sortDate
                else if ($_POST['sortIDEmployee'] === '' && $_POST['sortDateEmployee'] !== '' && $_POST['sortPositionEmployee'] === '') {
                    $sortIDEmployee = ''; $sortDateEmployee = $_POST['sortDateEmployee']; $sortPositionEmployee = '';
                }
                // Trường hợp sortPosition không rỗng, sortID và sortDate rỗng thì lấy sortPosition
                else if ($_POST['sortIDEmployee'] === '' && $_POST['sortDateEmployee'] === '' && $_POST['sortPositionEmployee'] !== '') {
                    $sortIDEmployee = ''; $sortDateEmployee = ''; $sortPositionEmployee = $_POST['sortPositionEmployee'];
                }
                // Trường hợp sortID, sortDate, sortPosition đều rỗng thì ưu tiên sortID
                else if ($_POST['sortIDEmployee'] === '' && $_POST['sortDateEmployee'] === '' && $_POST['sortPositionEmployee'] === '') {
                    $sortIDEmployee = 'DESC'; $sortDateEmployee = ''; $sortPositionEmployee = '';
                }
            } else {
                $sortIDEmployee = 'DESC'; $sortDateEmployee = ''; $sortPositionEmployee = '';
            }
        }

        $dataEmployee =  fetchEmployee (
            $ValidateData->standardizeString($limitEmployee),$ValidateData->standardizeString($startEmployee), 
            $ValidateData->standardizeString($queryEmployee), $ValidateData->standardizeString($sortIDEmployee),
            $ValidateData->standardizeString($sortDateEmployee), $ValidateData->standardizeString($sortPositionEmployee)
        );
        
        $totalRecords = $EmployeeClass->countRecordEmployee($queryEmployee);
        $totalButton = ceil(intval($totalRecords) / intval($limitEmployee));
        $prevButton = "";
        $nextButton = "";
        $pageButton = "";
        $arrayButton = array();

        if ($totalButton > 8) {
            if ($pageEmployee < 5) {
                for($i = 1; $i <= 5; $i++) {
                    $arrayButton[] = $i;
                }
                $arrayButton[] = '...';
                $arrayButton[] = $totalButton;
            } else {
                $endLimit = $totalButton - 5;
                if ($pageEmployee > $endLimit) {
                    $arrayButton[] = 1;
                    $arrayButton[] = '...';
                    for($i = $endLimit; $i <= $totalButton; $i++) {
                      $arrayButton[] = $i;
                    }
                } else {
                    $arrayButton[] = 1;
                    $arrayButton[] = '...';
                    for($i = $pageEmployee - 1; $i <= $pageEmployee + 1; $i++)
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
            if(intval($pageEmployee) == $arrayButton[$i]) {
                $pageButton .= '<div class="pagination__employee__item active" value="'.$arrayButton[$i].'">'.$arrayButton[$i].'</div>';
                $prevID = $arrayButton[$i] - 1;
                if($prevID > 0) {
                    $prevButton = ' <div class="pagination__employee__item pagination__employee__prev" value="'.$prevID.'">
                                        <i class="bx bx-left-arrow-alt"></i>
                                    </div>';
                } else {
                    $prevButton = ' <div class="pagination__employee__item pagination__employee__prev" value="1">
                                        <i class="bx bx-left-arrow-alt"></i>
                                    </div>';
                }
                $nextID = $arrayButton[$i] + 1;
                if($nextID > $totalButton) {
                    $nextButton = ' <div class="pagination__employee__item pagination__employee__next" value="'.$totalButton.'">
                                        <i class="bx bx-right-arrow-alt"></i>
                                    </div>';
                } else {
                    $nextButton = ' <div class="pagination__employee__item pagination__employee__next" value="'.$nextID.'">
                                        <i class="bx bx-right-arrow-alt"></i>
                                    </div>';
                }
            } else {
                if($arrayButton[$i] == '...') {
                    $pageButton .= '<div class="pagination__employee__item__dots">...</div>';
                } else {
                    $pageButton .= '<div class="pagination__employee__item" value="'.$arrayButton[$i].'">'.$arrayButton[$i].'</div>';
                }
            }
        }

        $paginationButton = $prevButton . $pageButton . $nextButton;
        $dataResponse = [$paginationButton, $dataEmployee];
        print_r(json_encode($dataResponse));
    }

    if (isset($_POST['createEmployee']) &&  $_POST['createEmployee'] === 'create-employee') {
        if ($EmployeeClass->insertEmployee()) {
            echo 'create-success';
        } else {
            echo 'create-failed';
        }
    }

    if (isset($_POST['deleteEmployee']) && $_POST['deleteEmployee'] === 'delete-employee') {
        if (isset($_POST['idEmployeeDelete']) && $_POST['idEmployeeDelete'] !== '') {
            $EmployeeClass->setNV_IDNhanVien($_POST['idEmployeeDelete']);
            if ($EmployeeClass->setDeleteStatusEmployeeByID()) {
                echo 'delete-success';
            } else {
                echo 'delete-failed';
            }
        }
    }
?>