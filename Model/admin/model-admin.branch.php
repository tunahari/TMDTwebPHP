<?php
class Branch {
    private $CN_IDChiNhanh, $CN_TenChiNhanh, $CN_DiaChiChiNhanh, $CN_HotLineChiNhanh,
    $CN_NgayThanhLapChiNhanh, $CN_IDQuanLyChiNhanh, $CN_DeleteStatusChiNhanh,
    $CN_NgayTaoChiNhanh, $CN_GhiChuChiNhanh;
    function __construct() {
        $this->CN_TenChiNhanh = 'Chưa cập nhật';
        $this->CN_DiaChiChiNhanh = 'Chưa cập nhật';
        $this->CN_HotLineChiNhanh = 'Chưa cập nhật';
        $this->CN_NgayThanhLapChiNhanh = 'Chưa cập nhật';
        $this->CN_IDQuanLyChiNhanh = 'Chưa cập nhật';
        $this->CN_DeleteStatusChiNhanh = 'No';
        $this->CN_NgayTaoChiNhanh = date("d-m-Y");
        $this->CN_GhiChuChiNhanh = 'Chưa cập nhật';
    }

    public function setCN_IDChiNhanh($CN_IDChiNhanh) {
        $this->CN_IDChiNhanh = $CN_IDChiNhanh;
    }
    public function setCN_TenChiNhanh ($CN_TenChiNhanh) {
        $this->CN_TenChiNhanh = $CN_TenChiNhanh;
    }
    public function setCN_DiaChiChiNhanh ($CN_DiaChiChiNhanh) {
        $this->CN_DiaChiChiNhanh = $CN_DiaChiChiNhanh;
    }
    public function setCN_HotLineChiNhanh ($CN_HotLineChiNhanh) {
        $this->CN_HotLineChiNhanh = $CN_HotLineChiNhanh;
    }
    public function setCN_NgayThanhLapChiNhanh ($CN_NgayThanhLapChiNhanh) {
        $this->CN_NgayThanhLapChiNhanh = $CN_NgayThanhLapChiNhanh;
    }
    public function setCN_IDQuanLyChiNhanh ($CN_IDQuanLyChiNhanh) {
        $this->CN_IDQuanLyChiNhanh = $CN_IDQuanLyChiNhanh;
    }
    public function setCN_DeleteStatusChiNhanh ($CN_DeleteStatusChiNhanh) {
        $this->CN_DeleteStatusChiNhanh = $CN_DeleteStatusChiNhanh;
    }
    public function setCN_NgayTaoChiNhanh ($CN_NgayTaoChiNhanh) {
        $this->CN_NgayTaoChiNhanh = $CN_NgayTaoChiNhanh;
    }
    public function setCN_GhiChuChiNhanh ($CN_GhiChuChiNhanh) {
        $this->CN_GhiChuChiNhanh = $CN_GhiChuChiNhanh;
    }


    function insertBranch () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'INSERT INTO branch (CN_TenChiNhanh, CN_DiaChiChiNhanh, CN_HotLineChiNhanh, CN_NgayThanhLapChiNhanh, CN_IDQuanLyChiNhanh,
        CN_DeleteStatusChiNhanh, CN_NgayTaoChiNhanh, CN_GhiChuChiNhanh) 
        VALUES (:CN_TenChiNhanh, :CN_DiaChiChiNhanh, :CN_HotLineChiNhanh, :CN_NgayThanhLapChiNhanh, :CN_IDQuanLyChiNhanh, 
        :CN_DeleteStatusChiNhanh, :CN_NgayTaoChiNhanh, :CN_GhiChuChiNhanh)';

        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':CN_TenChiNhanh',$this->CN_TenChiNhanh, PDO::PARAM_STR);
        $stmt->bindParam(':CN_DiaChiChiNhanh',$this->CN_DiaChiChiNhanh, PDO::PARAM_STR);
        $stmt->bindParam(':CN_HotLineChiNhanh',$this->CN_HotLineChiNhanh, PDO::PARAM_STR);
        $stmt->bindParam(':CN_NgayThanhLapChiNhanh',$this->CN_NgayThanhLapChiNhanh, PDO::PARAM_STR);
        $stmt->bindParam(':CN_IDQuanLyChiNhanh',$this->CN_IDQuanLyChiNhanh, PDO::PARAM_STR);
        $stmt->bindParam(':CN_DeleteStatusChiNhanh',$this->CN_DeleteStatusChiNhanh, PDO::PARAM_STR);
        $stmt->bindParam(':CN_NgayTaoChiNhanh',$this->CN_NgayTaoChiNhanh, PDO::PARAM_STR);
        $stmt->bindParam(':CN_GhiChuChiNhanh',$this->CN_GhiChuChiNhanh, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function selectAllBranch () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM branch WHERE CN_DeleteStatusChiNhanh = 'No'";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function selectLimitBranch ($limitBranch, $startBranch, $queryBranch, $sortIDBranch, $sortDateBranch) {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM branch WHERE CN_DeleteStatusChiNhanh = 'No'";
        $arrayReplace = ['CN', 'QL'];
        $queryBranch = trim(str_replace($arrayReplace, '', $queryBranch));
        if ($queryBranch !== '') {
            $sql .= ' AND ( 
            CN_TenChiNhanh LIKE "%'.$queryBranch.'%" 
            OR CN_IDChiNhanh LIKE "%'.$queryBranch.'%" 
            OR CN_DiaChiChiNhanh LIKE "%'.$queryBranch.'%"
            OR CN_HotLineChiNhanh LIKE "%'.$queryBranch.'%"
            OR CN_IDQuanLyChiNhanh LIKE "%'.$queryBranch.'%"
            ) ';
        }
        if ($sortIDBranch !== '' && $sortDateBranch === '') {
            $sql .= 'ORDER BY CN_IDChiNhanh '.$sortIDBranch.' ';
        } 
        if ($sortDateBranch !== '' && $sortIDBranch === '') {
            $sql .= 'ORDER BY CN_NgayThanhLapChiNhanh '.$sortDateBranch.' ';
        } 
        $sqlBranch =  $sql . 'LIMIT '.$startBranch.', '.$limitBranch.' ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sqlBranch);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function countRecordBranch ($queryBranch) {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM branch WHERE CN_DeleteStatusChiNhanh = 'No'";
        if ($queryBranch !== '') {
            $sql .= ' AND CN_TenChiNhanh LIKE "%'.$queryBranch.'%" ';
        }
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return count($result);
    }

    function selectBranchByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM branch WHERE CN_IDChiNhanh = :CN_IDChiNhanh";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':CN_IDChiNhanh', $this->CN_IDChiNhanh);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result[0];
        } else {
            return "";
        }
    }

    function setDeleteStatusBranchByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE branch SET CN_DeleteStatusChiNhanh = :CN_DeleteStatusChiNhanh WHERE CN_IDChiNhanh = :CN_IDChiNhanh";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':CN_DeleteStatusChiNhanh', $this->CN_DeleteStatusChiNhanh);
        $stmt->bindParam(':CN_IDChiNhanh', $this->CN_IDChiNhanh);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateInfoBranch () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE branch SET CN_TenChiNhanh = :CN_TenChiNhanh, CN_DiaChiChiNhanh = :CN_DiaChiChiNhanh,
        CN_HotLineChiNhanh = :CN_HotLineChiNhanh, CN_NgayThanhLapChiNhanh = :CN_NgayThanhLapChiNhanh,
        CN_IDQuanLyChiNhanh = :CN_IDQuanLyChiNhanh, CN_GhiChuChiNhanh = :CN_GhiChuChiNhanh WHERE CN_IDChiNhanh = :CN_IDChiNhanh";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':CN_TenChiNhanh', $this->CN_TenChiNhanh);
        $stmt->bindParam(':CN_DiaChiChiNhanh', $this->CN_DiaChiChiNhanh);
        $stmt->bindParam(':CN_HotLineChiNhanh', $this->CN_HotLineChiNhanh);
        $stmt->bindParam(':CN_NgayThanhLapChiNhanh', $this->CN_NgayThanhLapChiNhanh);
        $stmt->bindParam(':CN_IDQuanLyChiNhanh', $this->CN_IDQuanLyChiNhanh);
        $stmt->bindParam(':CN_GhiChuChiNhanh', $this->CN_GhiChuChiNhanh);
        $stmt->bindParam(':CN_IDChiNhanh', $this->CN_IDChiNhanh);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>