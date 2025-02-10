<?php
    session_start();
    require_once '../../Model/admin/model-admin.employee.php';
    require_once '../../Model/admin/model-admin.branch.php';
    require_once '../../Model/database/connectDataBase.php';
    require_once '../class/controller.validate.php';
    $BranchClass = new Branch;
    $ValidateData = new ValidateData;

    function fetchBranch ($limitBranch, $startBranch, $queryBranch, $sortIDBranch, $sortDateBranch) {
        $EmployeeClass = new Employee;
        $BranchClass = new Branch;
        $listBranch = $BranchClass->selectLimitBranch($limitBranch, $startBranch, $queryBranch, $sortIDBranch, $sortDateBranch);
        $output = '';
        if ($listBranch) {
                for ($i = 0; $i < count($listBranch); $i++) {
                    $employeeName = '';
                    $employeeID = '';
                    if ($listBranch[$i]['CN_IDQuanLyChiNhanh'] === 'Chưa cập nhật') {
                        $employeeName = 'Chưa cập nhật';
                        $employeeID = 'Chưa cập nhật';
                    } else {
                        $EmployeeClass->setNV_IDNhanVien($listBranch[$i]['CN_IDQuanLyChiNhanh']);
                        $employeeName = $EmployeeClass->selectEmployeeByID()['NV_TenNhanVien'];
                        $employeeID = "NV" . $EmployeeClass->selectEmployeeByID()['NV_IDNhanVien'];
                    }
                    
                    $output .= '
                    <a href="./branch-info-admin.php?id-branch='.$listBranch[$i]['CN_IDChiNhanh'].'&menu=branch">
                        <div class="table__branch__tbody__tr">
                            <div class="table__branch__tbody__tr__td">CN'.$listBranch[$i]['CN_IDChiNhanh'].'</div>
                            <div class="table__branch__tbody__tr__td">'.$listBranch[$i]['CN_TenChiNhanh'].'</div>
                            <div class="table__branch__tbody__tr__td">'.$listBranch[$i]['CN_DiaChiChiNhanh'].'</div>
                            <div class="table__branch__tbody__tr__td">'.$listBranch[$i]['CN_HotLineChiNhanh'].'</div>
                            <div class="table__branch__tbody__tr__td">'.$employeeID.' - '.$employeeName.'</div>
                            <div class="table__branch__tbody__tr__td">'.$listBranch[$i]['CN_NgayThanhLapChiNhanh'].'</div>
                            <div class="table__branch__tbody__tr__td">
                                <div class="branch__action__delete__button" value="'.$listBranch[$i]['CN_IDChiNhanh'].'">
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

    if (isset($_POST['fetchBranch']) &&  $_POST['fetchBranch'] === 'fetch-branch') {
        isset($_POST['limitBranch']) ?  $limitBranch = $_POST['limitBranch'] : $limitBranch = '5';
        if (isset($_POST['pageBranch']) && $_POST['pageBranch'] > 1) {
            $pageBranch = $_POST['pageBranch'];
            $startBranch = ((intval($pageBranch) - 1) * $limitBranch);
        } else {
            $pageBranch = 1;
            $startBranch = 0;
        }
        
        isset($_POST['queryBranch']) && $_POST['queryBranch'] !== '' ? $queryBranch = str_replace('"', '%', $_POST['queryBranch']) : $queryBranch = '' ;

        if (isset($_POST['sortIDBranch']) && isset($_POST['sortDateBranch'])) {
            if (($_POST['sortIDBranch'] === '' || $_POST['sortIDBranch'] === 'ASC' || $_POST['sortIDBranch'] === 'DESC') &&
                ($_POST['sortDateBranch'] === '' || $_POST['sortDateBranch'] === 'ASC' || $_POST['sortDateBranch'] === 'DESC')) {
                    if ($_POST['sortDateBranch'] !== '' && $_POST['sortIDBranch'] !== '') {
                        $sortIDBranch = $_POST['sortIDBranch']; $sortDateBranch = '';
                    } else if ($_POST['sortDateBranch'] === '' && $_POST['sortIDBranch'] !== '') {
                        $sortIDBranch = $_POST['sortIDBranch']; $sortDateBranch = '';
                    } else if ($_POST['sortDateBranch'] !== '' && $_POST['sortIDBranch'] === '') {
                        $sortIDBranch = ''; $sortDateBranch = $_POST['sortDateBranch'];
                    } else if ($_POST['sortDateBranch'] === '' && $_POST['sortIDBranch'] === '') {
                        $sortIDBranch = 'ASC'; $sortDateBranch = '';
                    }
            } else {
                $sortIDBranch = 'ASC'; $sortDateBranch = '';
            }
        }
        $dataBranch =  fetchBranch (
            $ValidateData->standardizeString($limitBranch),$ValidateData->standardizeString($startBranch), 
            $ValidateData->standardizeString($queryBranch), $ValidateData->standardizeString($sortIDBranch),
            $ValidateData->standardizeString($sortDateBranch)
        );

        $totalRecords = $BranchClass->countRecordBranch($queryBranch);
        $totalButton = ceil(intval($totalRecords) / intval($limitBranch));
        $prevButton = "";
        $nextButton = "";
        $pageButton = "";
        $arrayButton = array();

        if ($totalButton > 8) {
            if ($pageBranch < 5) {
                for($i = 1; $i <= 5; $i++) {
                    $arrayButton[] = $i;
                }
                $arrayButton[] = '...';
                $arrayButton[] = $totalButton;
            } else {
                $endLimit = $totalButton - 5;
                if ($pageBranch > $endLimit) {
                    $arrayButton[] = 1;
                    $arrayButton[] = '...';
                    for($i = $endLimit; $i <= $totalButton; $i++) {
                      $arrayButton[] = $i;
                    }
                } else {
                    $arrayButton[] = 1;
                    $arrayButton[] = '...';
                    for($i = $pageBranch - 1; $i <= $pageBranch + 1; $i++)
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
        if(intval($pageBranch) == $arrayButton[$i]) {
            $pageButton .= '<div class="pagination__branch__item active" value="'.$arrayButton[$i].'">'.$arrayButton[$i].'</div>';
            $prevID = $arrayButton[$i] - 1;
            if($prevID > 0) {
                $prevButton = ' <div class="pagination__branch__item pagination__branch__prev" value="'.$prevID.'">
                                    <i class="bx bx-left-arrow-alt"></i>
                                </div>';
            } else {
                $prevButton = ' <div class="pagination__branch__item pagination__branch__prev" value="1">
                                    <i class="bx bx-left-arrow-alt"></i>
                                </div>';
            }
            $nextID = $arrayButton[$i] + 1;
            if($nextID > $totalButton) {
                $nextButton = ' <div class="pagination__branch__item pagination__branch__next" value="'.$totalButton.'">
                                    <i class="bx bx-right-arrow-alt"></i>
                                </div>';
            } else {
                $nextButton = ' <div class="pagination__branch__item pagination__branch__next" value="'.$nextID.'">
                                    <i class="bx bx-right-arrow-alt"></i>
                                </div>';
            }
        } else {
            if($arrayButton[$i] == '...') {
                $pageButton .= '<div class="pagination__branch__item__dots">...</div>';
            } else {
                $pageButton .= '<div class="pagination__branch__item" value="'.$arrayButton[$i].'">'.$arrayButton[$i].'</div>';
            }
        }
    }
        
    $paginationButton = $prevButton . $pageButton . $nextButton;
    $dataResponse = [$paginationButton, $dataBranch];
    print_r(json_encode($dataResponse));
    }

    if (isset($_POST['createBranch']) &&  $_POST['createBranch'] === 'create-branch') {
        if ($BranchClass->insertBranch()) {
            echo 'create-success';
        } else {
            echo 'create-failed';
        }
    }

    if (isset($_POST['deleteBranch']) && $_POST['deleteBranch'] === 'delete-branch') {
        if (isset($_POST['idBranchDelete']) && $_POST['idBranchDelete'] !== '') {
            $BranchClass->setCN_IDChiNhanh($_POST['idBranchDelete']);
            $BranchClass->setCN_DeleteStatusChiNhanh('Yes');
            if ($BranchClass->setDeleteStatusBranchByID()) {
                echo 'delete-success';
            } else {
                echo 'delete-failed';
            }
        }
    }
?>