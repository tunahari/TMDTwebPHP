<?php
class Customer {
    private $KH_IDKhachHang, $KH_TenKhachHang ,$KH_SDTKhachHang ,$KH_DiaChiKhachHang ,$KH_LoaiKhachHang ,
    $KH_EmailKhachHang ,$KH_TrangThaiDangNhapKhachHang, $KH_MaXacNhanKhachHang ,$KH_NgayTaoKhachHang ,
    $KH_MatKhauKhachHang,$KH_XoaKhachHang, $KH_AvatarKhachHang, $KH_TokenIDKhachHang, $KH_ConnectIDKhachHang;

    public function setKH_IDKhachHang($KH_IDKhachHang) {$this->KH_IDKhachHang  = $KH_IDKhachHang;}
    public function setKH_TenKhachHang($KH_TenKhachHang) {$this->KH_TenKhachHang  = $KH_TenKhachHang;}
    public function setKH_SDTKhachHang($KH_SDTKhachHang) {$this->KH_SDTKhachHang  = $KH_SDTKhachHang;}
    public function setKH_DiaChiKhachHang($KH_DiaChiKhachHang) {$this->KH_DiaChiKhachHang  = $KH_DiaChiKhachHang;}
    public function setKH_LoaiKhachHang($KH_LoaiKhachHang) {$this->KH_LoaiKhachHang  = $KH_LoaiKhachHang;}
    public function setKH_EmailKhachHang($KH_EmailKhachHang) {$this->KH_EmailKhachHang  = $KH_EmailKhachHang;}
    public function setKH_TrangThaiDangNhapKhachHang($KH_TrangThaiDangNhapKhachHang) {$this->KH_TrangThaiDangNhapKhachHang  = $KH_TrangThaiDangNhapKhachHang;}
    public function setKH_MaXacNhanKhachHang($KH_MaXacNhanKhachHang) {$this->KH_MaXacNhanKhachHang  = $KH_MaXacNhanKhachHang;}
    public function setKH_NgayTaoKhachHang($KH_NgayTaoKhachHang) {$this->KH_NgayTaoKhachHang  = $KH_NgayTaoKhachHang;}
    public function setKH_MatKhauKhachHang($KH_MatKhauKhachHang) {$this->KH_MatKhauKhachHang  = $KH_MatKhauKhachHang;}
    public function setKH_XoaKhachHang($KH_XoaKhachHang) {$this->KH_XoaKhachHang  = $KH_XoaKhachHang;}
    public function setKH_AvatarKhachHang($KH_AvatarKhachHang) {$this->KH_AvatarKhachHang  = $KH_AvatarKhachHang;}
    public function setKH_TokenIDKhachHang($KH_TokenIDKhachHang) {$this->KH_TokenIDKhachHang  = $KH_TokenIDKhachHang;}
    public function setKH_ConnectIDKhachHang($KH_ConnectIDKhachHang) {$this->KH_ConnectIDKhachHang  = $KH_ConnectIDKhachHang;}

    function insertCustomer () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'INSERT INTO customer (KH_TenKhachHang ,KH_SDTKhachHang ,KH_DiaChiKhachHang ,KH_LoaiKhachHang ,
        KH_EmailKhachHang ,KH_TrangThaiDangNhapKhachHang ,KH_MaXacNhanKhachHang ,KH_NgayTaoKhachHang ,
        KH_MatKhauKhachHang,KH_XoaKhachHang, KH_AvatarKhachHang) 
        VALUES (:KH_TenKhachHang ,:KH_SDTKhachHang ,:KH_DiaChiKhachHang ,:KH_LoaiKhachHang ,
        :KH_EmailKhachHang ,:KH_TrangThaiDangNhapKhachHang ,:KH_MaXacNhanKhachHang ,:KH_NgayTaoKhachHang ,
        :KH_MatKhauKhachHang,:KH_XoaKhachHang, :KH_AvatarKhachHang)';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_TenKhachHang', $this->KH_TenKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_SDTKhachHang', $this->KH_SDTKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_DiaChiKhachHang', $this->KH_DiaChiKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_LoaiKhachHang', $this->KH_LoaiKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_EmailKhachHang', $this->KH_EmailKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_TrangThaiDangNhapKhachHang', $this->KH_TrangThaiDangNhapKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_MaXacNhanKhachHang', $this->KH_MaXacNhanKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_NgayTaoKhachHang', $this->KH_NgayTaoKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_MatKhauKhachHang', $this->KH_MatKhauKhachHang, PDO::PARAM_STR);        
        $stmt->bindParam(':KH_XoaKhachHang', $this->KH_XoaKhachHang, PDO::PARAM_STR);   
        $stmt->bindParam(':KH_AvatarKhachHang', $this->KH_AvatarKhachHang, PDO::PARAM_STR);      
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateProfileCustomer () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'UPDATE customer SET  KH_TenKhachHang = :KH_TenKhachHang, KH_SDTKhachHang = :KH_SDTKhachHang,
        KH_DiaChiKhachHang = :KH_DiaChiKhachHang, KH_EmailKhachHang = :KH_EmailKhachHang WHERE KH_IDKhachHang = :KH_IDKhachHang';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_TenKhachHang', $this->KH_TenKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_SDTKhachHang', $this->KH_SDTKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_DiaChiKhachHang', $this->KH_DiaChiKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_EmailKhachHang', $this->KH_EmailKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang, PDO::PARAM_STR);      
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function selectAllCustomer () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM customer WHERE KH_XoaKhachHang = 'No' AND KH_IDKhachHang != :KH_IDKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function selectAllPhone () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT KH_SDTKhachHang FROM customer WHERE KH_XoaKhachHang = 'No' AND KH_IDKhachHang != :KH_IDKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function selectAllEmail () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT KH_EmailKhachHang FROM customer WHERE KH_XoaKhachHang = 'No' AND KH_IDKhachHang != :KH_IDKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function checkEmailLogin () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT KH_EmailKhachHang FROM customer WHERE KH_XoaKhachHang = 'No' AND KH_EmailKhachHang = :KH_EmailKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_EmailKhachHang', $this->KH_EmailKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkEmailDuplicate () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT KH_EmailKhachHang FROM customer WHERE KH_XoaKhachHang = 'No' AND KH_EmailKhachHang = :KH_EmailKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_EmailKhachHang', $this->KH_EmailKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) === 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkEmailDuplicateID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT KH_EmailKhachHang FROM customer WHERE KH_XoaKhachHang = 'No' AND KH_EmailKhachHang = :KH_EmailKhachHang AND KH_IDKhachHang != :KH_IDKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_EmailKhachHang', $this->KH_EmailKhachHang);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) === 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkSDTDuplicateID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT KH_SDTKhachHang FROM customer WHERE KH_XoaKhachHang = 'No' AND KH_SDTKhachHang = :KH_SDTKhachHang AND KH_IDKhachHang != :KH_IDKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_SDTKhachHang', $this->KH_SDTKhachHang);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) === 0) {
            return true;
        } else {
            return false;
        }
    }

    function getPassByEmail () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT KH_MatKhauKhachHang FROM customer WHERE KH_XoaKhachHang = 'No' AND KH_EmailKhachHang = :KH_EmailKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_EmailKhachHang', $this->KH_EmailKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result[0]['KH_MatKhauKhachHang'];
        } else {
            return '';
        }
    }

    function getPassByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT KH_MatKhauKhachHang FROM customer WHERE KH_XoaKhachHang = 'No' AND KH_IDKhachHang = :KH_IDKhachHang ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result[0]['KH_MatKhauKhachHang'];
        } else {
            return '';
        }
    }

    function updatePassByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'UPDATE customer SET  KH_MatKhauKhachHang = :KH_MatKhauKhachHang WHERE KH_IDKhachHang = :KH_IDKhachHang';
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_MatKhauKhachHang', $this->KH_MatKhauKhachHang, PDO::PARAM_STR);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang, PDO::PARAM_STR);      
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateAvatarByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE customer SET KH_AvatarKhachHang = :KH_AvatarKhachHang WHERE KH_IDKhachHang = :KH_IDKhachHang";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_AvatarKhachHang', $this->KH_AvatarKhachHang);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function selectLimitCustomer ($limitCustomer, $startCustomer, $queryCustomer, $sortIDCustomer, $sortDateCustomer, $sortLevelCustomer) {
        $ConnectDataBase = new ConnectDataBase;
        session_start();
        $sql = "SELECT * FROM customer ";
       
        $arrayReplace = ['kh'];
        $queryCustomer = trim(str_replace($arrayReplace, '', strtolower($queryCustomer)));
        if ($queryCustomer !== '') {
            $sql .= '
            WHERE LOWER(KH_TenKhachHang) LIKE "%'.strtolower($queryCustomer).'%" 
            OR LOWER(KH_IDKhachHang)  LIKE "%'.strtolower($queryCustomer).'%" 
            OR LOWER(KH_DiaChiKhachHang) LIKE "%'.strtolower($queryCustomer).'%"
            OR LOWER(KH_SDTKhachHang) LIKE "%'.strtolower($queryCustomer).'%"
            OR LOWER(KH_EmailKhachHang) LIKE "%'.strtolower($queryCustomer).'%"
            ';
        }
        if ($sortIDCustomer !== '' && $sortDateCustomer === '' && $sortLevelCustomer === '') {
            $sql .= 'ORDER BY KH_IDKhachHang '.$sortIDCustomer.' ';
        } 
        if ($sortIDCustomer === '' && $sortDateCustomer !== '' && $sortLevelCustomer === '') {
            $sql .= 'ORDER BY KH_NgayTaoKhachHang '.$sortDateCustomer.' ';
        } 
        if ($sortIDCustomer === '' && $sortDateCustomer === '' && $sortLevelCustomer !== '') {
            $sql .= 'ORDER BY KH_LoaiKhachHang '.$sortLevelCustomer.' ';
        } 
        $sqlCustomer =  $sql . 'LIMIT '.$startCustomer.', '.$limitCustomer.' ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sqlCustomer);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function countRecordCustomer ($queryCustomer) {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM customer ";
        if ($queryCustomer !== '') {
            $arrayReplace = ['kh'];
            $queryCustomer = trim(str_replace($arrayReplace, '', strtolower($queryCustomer)));
            $sql .= '
            WHERE LOWER(KH_TenKhachHang) LIKE "%'.strtolower($queryCustomer).'%" 
            OR LOWER(KH_IDKhachHang)  LIKE "%'.strtolower($queryCustomer).'%" 
            OR LOWER(KH_DiaChiKhachHang) LIKE "%'.strtolower($queryCustomer).'%"
            OR LOWER(KH_SDTKhachHang) LIKE "%'.strtolower($queryCustomer).'%"
            OR LOWER(KH_EmailKhachHang) LIKE "%'.strtolower($queryCustomer).'%"
            ';
        }
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return count($result);
    }

    function selectCustomerByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM customer WHERE KH_IDKhachHang = :KH_IDKhachHang AND KH_XoaKhachHang = 'No' ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result[0];
        } else {
            return "";
        }
    }

    function selectCustomerByEmail () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM customer WHERE KH_EmailKhachHang = :KH_EmailKhachHang AND KH_XoaKhachHang = 'No' ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_EmailKhachHang', $this->KH_EmailKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result[0];
        } else {
            return "";
        }
    }

    function setDeleteStatusCustomerByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE customer SET KH_XoaKhachHang	 = 'Yes' WHERE KH_IDKhachHang = :KH_IDKhachHang";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // function updateInfoEmployeeByID () {
    //     $ConnectDataBase = new ConnectDataBase;
    //     $sql = "UPDATE employee SET 
    //     NV_TenNhanVien = :NV_TenNhanVien,
    //     NV_DiaChiNhanVien = :NV_DiaChiNhanVien,
    //     NV_MaChiNhanh = :NV_MaChiNhanh,
    //     NV_SoDienThoaiNhanVien = :NV_SoDienThoaiNhanVien,
    //     NV_EmailNhanVien = :NV_EmailNhanVien,
    //     NV_NgaySinhNhanVien = :NV_NgaySinhNhanVien,
    //     NV_ChucVuNhanVien = :NV_ChucVuNhanVien,
    //     NV_GioiTinhNhanVien = :NV_GioiTinhNhanVien,
    //     NV_GioiThieuNhanVien = :NV_GioiThieuNhanVien,
    //     NV_FacebookNhanVien = :NV_FacebookNhanVien,
    //     NV_TwitterNhanVien = :NV_TwitterNhanVien,
    //     NV_LinkedNhanVien = :NV_LinkedNhanVien
    //     WHERE NV_IDNhanVien = :NV_IDNhanVien AND NV_DeleteStatusNhanVien = 'No' ";
    //     $stmt = $ConnectDataBase->connectDB()->prepare($sql);
    //     $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
    //     $stmt->bindParam(':NV_TenNhanVien', $this->NV_TenNhanVien);    
    //     $stmt->bindParam(':NV_DiaChiNhanVien', $this->NV_DiaChiNhanVien);
    //     $stmt->bindParam(':NV_MaChiNhanh', $this->NV_MaChiNhanh);
    //     $stmt->bindParam(':NV_SoDienThoaiNhanVien', $this->NV_SoDienThoaiNhanVien);
    //     $stmt->bindParam(':NV_EmailNhanVien', $this->NV_EmailNhanVien); 
    //     $stmt->bindParam(':NV_NgaySinhNhanVien', $this->NV_NgaySinhNhanVien);  
    //     $stmt->bindParam(':NV_ChucVuNhanVien', $this->NV_ChucVuNhanVien);
    //     $stmt->bindParam(':NV_GioiTinhNhanVien', $this->NV_GioiTinhNhanVien);
    //     $stmt->bindParam(':NV_GioiThieuNhanVien', $this->NV_GioiThieuNhanVien);
    //     $stmt->bindParam(':NV_FacebookNhanVien', $this->NV_FacebookNhanVien);
    //     $stmt->bindParam(':NV_TwitterNhanVien', $this->NV_TwitterNhanVien);
    //     $stmt->bindParam(':NV_LinkedNhanVien', $this->NV_LinkedNhanVien);
    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // function updateProfileEmployeeByID () {
    //     $ConnectDataBase = new ConnectDataBase;
    //     $sql = "UPDATE employee SET 
    //     NV_TenNhanVien = :NV_TenNhanVien,
    //     NV_DiaChiNhanVien = :NV_DiaChiNhanVien,
    //     NV_SoDienThoaiNhanVien = :NV_SoDienThoaiNhanVien,
    //     NV_EmailNhanVien = :NV_EmailNhanVien,
    //     NV_NgaySinhNhanVien = :NV_NgaySinhNhanVien,
    //     NV_GioiTinhNhanVien = :NV_GioiTinhNhanVien,
    //     NV_GioiThieuNhanVien = :NV_GioiThieuNhanVien,
    //     NV_FacebookNhanVien = :NV_FacebookNhanVien,
    //     NV_TwitterNhanVien = :NV_TwitterNhanVien,
    //     NV_LinkedNhanVien = :NV_LinkedNhanVien
    //     WHERE NV_IDNhanVien = :NV_IDNhanVien AND NV_DeleteStatusNhanVien = 'No' ";
    //     $stmt = $ConnectDataBase->connectDB()->prepare($sql);
    //     $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
    //     $stmt->bindParam(':NV_TenNhanVien', $this->NV_TenNhanVien);    
    //     $stmt->bindParam(':NV_DiaChiNhanVien', $this->NV_DiaChiNhanVien);
    //     $stmt->bindParam(':NV_SoDienThoaiNhanVien', $this->NV_SoDienThoaiNhanVien);
    //     $stmt->bindParam(':NV_EmailNhanVien', $this->NV_EmailNhanVien); 
    //     $stmt->bindParam(':NV_NgaySinhNhanVien', $this->NV_NgaySinhNhanVien);  
    //     $stmt->bindParam(':NV_GioiTinhNhanVien', $this->NV_GioiTinhNhanVien);
    //     $stmt->bindParam(':NV_GioiThieuNhanVien', $this->NV_GioiThieuNhanVien);
    //     $stmt->bindParam(':NV_FacebookNhanVien', $this->NV_FacebookNhanVien);
    //     $stmt->bindParam(':NV_TwitterNhanVien', $this->NV_TwitterNhanVien);
    //     $stmt->bindParam(':NV_LinkedNhanVien', $this->NV_LinkedNhanVien);
    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    function updateLoginStatus () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE customer SET KH_TrangThaiDangNhapKhachHang = :KH_TrangThaiDangNhapKhachHang
        WHERE KH_EmailKhachHang = :KH_EmailKhachHang";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_EmailKhachHang', $this->KH_EmailKhachHang);
        $stmt->bindParam(':KH_TrangThaiDangNhapKhachHang', $this->KH_TrangThaiDangNhapKhachHang);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Tạo mã xác thực 
    function updateVerifyCode () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE customer SET KH_MaXacNhanKhachHang = :KH_MaXacNhanKhachHang
        WHERE KH_IDKhachHang = :KH_IDKhachHang";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        $stmt->bindParam(':KH_MaXacNhanKhachHang', $this->KH_MaXacNhanKhachHang);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Lấy ra khách hàng bằng mã xác thực
    function getCustomerByCodeVerify () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM customer WHERE KH_MaXacNhanKhachHang = :KH_MaXacNhanKhachHang AND KH_XoaKhachHang = 'No' ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_MaXacNhanKhachHang', $this->KH_MaXacNhanKhachHang);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    // Cập nhật mật khẩu mới cho khách hàng
    function updateNewPassword () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE customer SET KH_MatKhauKhachHang = :KH_MatKhauKhachHang
        WHERE KH_IDKhachHang = :KH_IDKhachHang";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':KH_IDKhachHang', $this->KH_IDKhachHang);
        $stmt->bindParam(':KH_MatKhauKhachHang', $this->KH_MatKhauKhachHang);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>


