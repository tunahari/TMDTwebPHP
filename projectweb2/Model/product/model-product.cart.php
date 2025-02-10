<?php
class Cart {
    private $GH_IDGioHang , $GH_IDKhachHang, $GH_IDSanPham, $GH_SLSanPhamGioHang;
    public function setGH_IDGioHang($GH_IDGioHang) {$this->GH_IDGioHang = $GH_IDGioHang;}
    public function setGH_IDKhachHang($GH_IDKhachHang) {$this->GH_IDKhachHang = $GH_IDKhachHang;}
    public function setGH_IDSanPham($GH_IDSanPham) {$this->GH_IDSanPham = $GH_IDSanPham;}
    public function setGH_SLSanPhamGioHang($GH_SLSanPhamGioHang) {$this->GH_SLSanPhamGioHang = $GH_SLSanPhamGioHang;}

    function insertCart () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'INSERT INTO cart (GH_IDKhachHang, GH_IDSanPham, GH_SLSanPhamGioHang) 
                VALUES (:GH_IDKhachHang, :GH_IDSanPham, :GH_SLSanPhamGioHang)';

        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':GH_IDKhachHang', $this->GH_IDKhachHang,PDO::PARAM_STR);
        $stmt->bindParam(':GH_IDSanPham', $this->GH_IDSanPham,PDO::PARAM_STR);
        $stmt->bindParam(':GH_SLSanPhamGioHang', $this->GH_SLSanPhamGioHang,PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function selectAllCart () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM cart WHERE GH_IDKhachHang = :GH_IDKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':GH_IDKhachHang', $this->GH_IDKhachHang,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function updateQuantityCart () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'UPDATE cart SET GH_SLSanPhamGioHang = :GH_SLSanPhamGioHang WHERE GH_IDSanPham = :GH_IDSanPham
                AND GH_IDKhachHang = :GH_IDKhachHang ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':GH_SLSanPhamGioHang', $this->GH_SLSanPhamGioHang,PDO::PARAM_STR);
        $stmt->bindParam(':GH_IDSanPham', $this->GH_IDSanPham,PDO::PARAM_STR);
        $stmt->bindParam(':GH_IDKhachHang', $this->GH_IDKhachHang,PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function getQuantityByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT GH_SLSanPhamGioHang FROM cart WHERE GH_IDSanPham = :GH_IDSanPham AND GH_IDKhachHang = :GH_IDKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':GH_IDSanPham', $this->GH_IDSanPham,PDO::PARAM_STR);
        $stmt->bindParam(':GH_IDKhachHang', $this->GH_IDKhachHang,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result[0];
        } else {
            return [];
        }
    }

    function selectCartByCustomerID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM cart WHERE GH_IDKhachHang = :GH_IDKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':GH_IDKhachHang', $this->GH_IDKhachHang,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function checkDuplicate() {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM cart WHERE GH_IDSanPham = :GH_IDSanPham AND GH_IDKhachHang = :GH_IDKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':GH_IDSanPham', $this->GH_IDSanPham,PDO::PARAM_STR);
        $stmt->bindParam(':GH_IDKhachHang', $this->GH_IDKhachHang,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) === 0) {
            return true;
        } else {
            return false;
        }
    }

    function deleteProductCart () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'DELETE FROM cart WHERE GH_IDSanPham = :GH_IDSanPham AND GH_IDKhachHang = :GH_IDKhachHang';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':GH_IDSanPham', $this->GH_IDSanPham,PDO::PARAM_STR);
        $stmt->bindParam(':GH_IDKhachHang', $this->GH_IDKhachHang,PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function deleteProductCartCustomer () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'DELETE FROM cart WHERE GH_IDKhachHang = :GH_IDKhachHang';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':GH_IDKhachHang', $this->GH_IDKhachHang,PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function countProductCart () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'SELECT * FROM cart WHERE GH_IDKhachHang = :GH_IDKhachHang';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':GH_IDKhachHang', $this->GH_IDKhachHang,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return count($result);
    }
}
?>