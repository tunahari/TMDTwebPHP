<?php
class Order {
    private $DH_IDDonHang, $DH_IDKhachHang, $DH_NgayDatDonHang, $DH_TrangThaiDonHang;

    private $CTDH_IDChiTietDH, $CTDH_IDDonHang, $CTDH_IDSanPham, $CTDH_SLSanPham;

    
    public function setDH_IDDonHang($DH_IDDonHang) {$this->DH_IDDonHang  = $DH_IDDonHang;}
    public function setDH_IDKhachHang($DH_IDKhachHang) {$this->DH_IDKhachHang  = $DH_IDKhachHang;}
    public function setDH_NgayDatDonHang($DH_NgayDatDonHang) {$this->DH_NgayDatDonHang  = $DH_NgayDatDonHang;}
    public function setDH_TrangThaiDonHang($DH_TrangThaiDonHang) {$this->DH_TrangThaiDonHang  = $DH_TrangThaiDonHang;}

    public function setCTDH_IDChiTietDH($CTDH_IDChiTietDH) {$this->CTDH_IDChiTietDH  = $CTDH_IDChiTietDH;}
    public function setCTDH_IDDonHang($CTDH_IDDonHang) {$this->CTDH_IDDonHang  = $CTDH_IDDonHang;}
    public function setCTDH_IDSanPham($CTDH_IDSanPham) {$this->CTDH_IDSanPham  = $CTDH_IDSanPham;}
    public function setCTDH_SLSanPham($CTDH_SLSanPham) {$this->CTDH_SLSanPham  = $CTDH_SLSanPham;}

    function insertBill () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'INSERT INTO bill (DH_IDKhachHang, DH_NgayDatDonHang, DH_TrangThaiDonHang) 
        VALUES (:DH_IDKhachHang, :DH_NgayDatDonHang, :DH_TrangThaiDonHang)';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':DH_IDKhachHang', $this->DH_IDKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':DH_NgayDatDonHang', $this->DH_NgayDatDonHang, PDO::PARAM_STR);
        $stmt->bindParam(':DH_TrangThaiDonHang', $this->DH_TrangThaiDonHang, PDO::PARAM_INT);
        if ($stmt->execute()) {return true;} else {return false;}
    }

    function insertBillDetals () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'INSERT INTO billdetails (CTDH_IDDonHang, CTDH_IDSanPham, CTDH_SLSanPham) 
        VALUES (:CTDH_IDDonHang, :CTDH_IDSanPham, :CTDH_SLSanPham)';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':CTDH_IDDonHang', $this->CTDH_IDDonHang, PDO::PARAM_STR);
        $stmt->bindParam(':CTDH_IDSanPham', $this->CTDH_IDSanPham, PDO::PARAM_STR);
        $stmt->bindParam(':CTDH_SLSanPham', $this->CTDH_SLSanPham, PDO::PARAM_INT);
        if ($stmt->execute()) {return true;} else {return false;}
    }

    function updateBillStatus () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'UPDATE bill SET DH_TrangThaiDonHang = :DH_TrangThaiDonHang WHERE DH_IDDonHang  = :DH_IDDonHang 
        AND DH_IDKhachHang = :DH_IDKhachHang ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':DH_TrangThaiDonHang', $this->DH_TrangThaiDonHang);
        $stmt->bindParam(':DH_IDDonHang', $this->DH_IDDonHang);  
        $stmt->bindParam(':DH_IDKhachHang', $this->DH_IDKhachHang);  
        if ($stmt->execute()) {return true;} else {return false;}
    }

    function selectBillStatus () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT DH_TrangThaiDonHang FROM bill WHERE DH_IDDonHang = :DH_IDDonHang AND DH_IDKhachHang = :DH_IDKhachHang";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':DH_IDDonHang', $this->DH_IDDonHang);  
        $stmt->bindParam(':DH_IDKhachHang', $this->DH_IDKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {return $result[0]['DH_TrangThaiDonHang'];} else {return [];}
    }

    function selectBillNewID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT DH_IDDonHang FROM bill ORDER BY DH_IDDonHang DESC LIMIT 1 ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {return $result[0]['DH_IDDonHang'];} else {return null;}
    }

    function selectAllBillByCustomerID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM bill WHERE DH_IDKhachHang = :DH_IDKhachHang ORDER BY DH_IDDonHang DESC";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':DH_IDKhachHang', $this->DH_IDKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {return $result;} else {return [];}
    }

    // 10% VAT = (SP_GiaBanSanPham * 10 / 100)
    // Giảm Giá = SP_GiaBanSanPham - (SP_GiaBanSanPham * SP_GiamGiaSanPham / 100)
    // Giá sau khi giảm = SP_GiaBanSanPham - (SP_GiaBanSanPham * SP_GiamGiaSanPham / 100)
    // Giá cuối cùng 1 sản phẩm = SP_GiaBanSanPham - (SP_GiaBanSanPham * SP_GiamGiaSanPham / 100) + (SP_GiaBanSanPham * 10 / 100)
    // Giá cuối cùng của nhiều sản phẩm = (SP_GiaBanSanPham - (SP_GiaBanSanPham * SP_GiamGiaSanPham / 100) + (SP_GiaBanSanPham * 10 / 100)) * CTDH_SLSanPham
    // Giá cuối cùng của 1 đơn hàng = SUM((SP_GiaBanSanPham - (SP_GiaBanSanPham * SP_GiamGiaSanPham / 100) + (SP_GiaBanSanPham * 10 / 100)) * CTDH_SLSanPham)

    function priceBill () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT SUM((SP_GiaBanSanPham - (SP_GiaBanSanPham * SP_GiamGiaSanPham / 100) + ((SP_GiaBanSanPham - (SP_GiaBanSanPham * SP_GiamGiaSanPham / 100)) * 10 / 100)) * CTDH_SLSanPham) AS PriceBill
        FROM bill JOIN billdetails ON DH_IDDonHang = CTDH_IDDonHang JOIN product ON CTDH_IDSanPham = SP_IDSanPham 
        WHERE DH_IDKhachHang = :DH_IDKhachHang AND DH_IDDonHang = :DH_IDDonHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':DH_IDKhachHang', $this->DH_IDKhachHang);
        $stmt->bindParam(':DH_IDDonHang', $this->DH_IDDonHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {return $result[0]['PriceBill'];} else {return null;}
        
    }

    function selectProductBill () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT (SP_GiaBanSanPham - (SP_GiaBanSanPham* SP_GiamGiaSanPham) / 100) AS GiamGia, SP_IDSanPham, SP_GiaBanSanPham,
        SP_TenSanPham, CTDH_SLSanPham, DH_NgayDatDonHang, SP_TonKhoSanPham,
        SP_Image1SanPham FROM billdetails JOIN product ON CTDH_IDSanPham = SP_IDSanPham JOIN bill ON CTDH_IDDonHang = DH_IDDonHang
        WHERE DH_IDKhachHang = :DH_IDKhachHang AND DH_IDDonHang = :DH_IDDonHang";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':DH_IDKhachHang', $this->DH_IDKhachHang);
        $stmt->bindParam(':DH_IDDonHang', $this->DH_IDDonHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {return $result;} else {return [];}
        
    }

    function countItemBill () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT COUNT(*) AS SLMatHang FROM billdetails JOIN bill ON CTDH_IDDonHang = DH_IDDonHang 
        WHERE CTDH_IDDonHang = :DH_IDDonHang AND DH_IDKhachHang = :DH_IDKhachHang";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':DH_IDKhachHang', $this->DH_IDKhachHang);
        $stmt->bindParam(':DH_IDDonHang', $this->DH_IDDonHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {return $result[0]['SLMatHang'];} else {return null;}
        
    }

    function countProductBill () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT SUM(CTDH_SLSanPham) AS SLSanPham FROM billdetails JOIN bill ON CTDH_IDDonHang = DH_IDDonHang 
        WHERE CTDH_IDDonHang = :DH_IDDonHang AND DH_IDKhachHang = :DH_IDKhachHang";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':DH_IDKhachHang', $this->DH_IDKhachHang);
        $stmt->bindParam(':DH_IDDonHang', $this->DH_IDDonHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {return $result[0]['SLSanPham'];} else {return [];}
    }

    function selectLimitOrder ($limitOrder, $startOrder, $queryOrder, $sortIDOrder, $sortDateOrder, $sortStatusOrder) {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM bill JOIN customer ON KH_IDKhachHang = DH_IDKhachHang ";
        $arrayReplace = ['dh'];
        $queryOrder = trim(str_replace($arrayReplace, '', strtolower($queryOrder)));
        if ($queryOrder !== '') {
            $sql .= '
            WHERE LOWER(KH_TenKhachHang) LIKE "%'.strtolower($queryOrder).'%" 
            OR LOWER(KH_IDKhachHang)  LIKE "%'.strtolower($queryOrder).'%" 
            OR LOWER(DH_IDDonHang) LIKE "%'.strtolower($queryOrder).'%"
            OR LOWER(KH_SDTKhachHang) LIKE "%'.strtolower($queryOrder).'%"
            OR LOWER(KH_EmailKhachHang) LIKE "%'.strtolower($queryOrder).'%"
            ';
        }
        if ($sortIDOrder !== '' && $sortDateOrder === '' && $sortStatusOrder === '') {
            $sql .= 'ORDER BY DH_IDDonHang '.$sortIDOrder.' ';
        } 
        if ($sortIDOrder === '' && $sortDateOrder !== '' && $sortStatusOrder === '') {
            $sql .= 'ORDER BY DH_NgayDatDonHang '.$sortDateOrder.' ';
        } 
        if ($sortIDOrder === '' && $sortDateOrder === '' && $sortStatusOrder !== '') {
            $sql .= 'ORDER BY DH_TrangThaiDonHang '.$sortStatusOrder.' ';
        } 
        $sqlOrder =  $sql . 'LIMIT '.$startOrder.', '.$limitOrder.' ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sqlOrder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function countRecordOrder ($queryOrder) {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM bill JOIN customer ON KH_IDKhachHang = DH_IDKhachHang ";
        $arrayReplace = ['dh'];
        $queryOrder = trim(str_replace($arrayReplace, '', strtolower($queryOrder)));
        if ($queryOrder !== '') {
            $sql .= '
            WHERE LOWER(KH_TenKhachHang) LIKE "%'.strtolower($queryOrder).'%" 
            OR LOWER(KH_IDKhachHang)  LIKE "%'.strtolower($queryOrder).'%" 
            OR LOWER(DH_IDDonHang) LIKE "%'.strtolower($queryOrder).'%"
            OR LOWER(KH_SDTKhachHang) LIKE "%'.strtolower($queryOrder).'%"
            OR LOWER(KH_EmailKhachHang) LIKE "%'.strtolower($queryOrder).'%"
            ';
        }
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return count($result);
    }


    function selectOrderByCustomerID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM bill JOIN customer ON KH_IDKhachHang = DH_IDKhachHang WHERE DH_IDKhachHang = :DH_IDKhachHang
        AND DH_IDDonHang = :DH_IDDonHang";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':DH_IDKhachHang', $this->DH_IDKhachHang);
        $stmt->bindParam(':DH_IDDonHang', $this->DH_IDDonHang);
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


