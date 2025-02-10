<?php
class Employee {
    private $NV_IDNhanVien , $NV_TenNhanVien, $NV_SoDienThoaiNhanVien, $NV_DiaChiNhanVien, $NV_EmailNhanVien, 
    $NV_NgaySinhNhanVien, $NV_GioiTinhNhanVien, $NV_MaChiNhanh, $NV_ChucVuNhanVien, $NV_NgayTaoNhanVien, 
    $NV_AvatarNhanVien, $NV_GioiThieuNhanVien, $NV_FacebookNhanVien, $NV_TwitterNhanVien, $NV_LinkedNhanVien, 
    $NV_DeleteStatusNhanVien, $NV_MatKhauNhanVien, $NV_XacThucEmailNhanVien, $NV_TrangThaiTaiKhoanNhanVien,
    $NV_TrangThaiDangNhapNhanVien, $NV_MaChoXacThucNhanVien;

    function __construct() {
        $this->NV_TenNhanVien = 'Chưa cập nhật';
        $this->NV_SoDienThoaiNhanVien = 'Chưa cập nhật';
        $this->NV_DiaChiNhanVien = 'Chưa cập nhật';
        $this->NV_EmailNhanVien = 'Chưa cập nhật'; 
        $this->NV_NgaySinhNhanVien = 'Chưa cập nhật';
        $this->NV_GioiTinhNhanVien = 'Chưa cập nhật';
        $this->NV_MaChiNhanh = 'Chưa cập nhật';
        $this->NV_ChucVuNhanVien = '-1';
        $this->NV_NgayTaoNhanVien = date("Y-m-d"); 
        $this->NV_AvatarNhanVien = 'image/avtdefault.png';
        $this->NV_GioiThieuNhanVien = 'Chưa cập nhật';
        $this->NV_FacebookNhanVien = 'Chưa cập nhật';
        $this->NV_TwitterNhanVien = 'Chưa cập nhật';
        $this->NV_LinkedNhanVien = 'Chưa cập nhật';
        $this->NV_DeleteStatusNhanVien = 'No';
        $this->NV_MatKhauNhanVien = password_hash('123456', PASSWORD_DEFAULT);
        $this->NV_TrangThaiTaiKhoanNhanVien = 'Chưa xác thực';
        $this->NV_TrangThaiDangNhapNhanVien = 'logout';
    }

    public function setNV_IDNhanVien($NV_IDNhanVien) {$this->NV_IDNhanVien = $NV_IDNhanVien;}
    public function setNV_TenNhanVien($NV_TenNhanVien) {$this->NV_TenNhanVien = $NV_TenNhanVien;}
    public function setNV_SoDienThoaiNhanVien($NV_SoDienThoaiNhanVien) {$this->NV_SoDienThoaiNhanVien = $NV_SoDienThoaiNhanVien;}
    public function setNV_DiaChiNhanVien($NV_DiaChiNhanVien) {$this->NV_DiaChiNhanVien = $NV_DiaChiNhanVien;}
    public function setNV_EmailNhanVien($NV_EmailNhanVien) {$this->NV_EmailNhanVien = $NV_EmailNhanVien;}
    public function setNV_NgaySinhNhanVien($NV_NgaySinhNhanVien) {$this->NV_NgaySinhNhanVien = $NV_NgaySinhNhanVien;}
    public function setNV_GioiTinhNhanVien($NV_GioiTinhNhanVien) {$this->NV_GioiTinhNhanVien = $NV_GioiTinhNhanVien;}
    public function setNV_MaChiNhanh($NV_MaChiNhanh) {$this->NV_MaChiNhanh = $NV_MaChiNhanh;}
    public function setNV_ChucVuNhanVien($NV_ChucVuNhanVien) {$this->NV_ChucVuNhanVien = $NV_ChucVuNhanVien;}
    public function setNV_NgayTaoNhanVien($NV_NgayTaoNhanVien) {$this->NV_NgayTaoNhanVien = $NV_NgayTaoNhanVien;}
    public function setNV_AvatarNhanVien($NV_AvatarNhanVien) {$this->NV_AvatarNhanVien = $NV_AvatarNhanVien;}
    public function setNV_GioiThieuNhanVien($NV_GioiThieuNhanVien) {$this->NV_GioiThieuNhanVien = $NV_GioiThieuNhanVien;}
    public function setNV_FacebookNhanVien($NV_FacebookNhanVien) {$this->NV_FacebookNhanVien = $NV_FacebookNhanVien;}
    public function setNV_TwitterNhanVien($NV_TwitterNhanVien) {$this->NV_TwitterNhanVien = $NV_TwitterNhanVien;}
    public function setNV_LinkedNhanVien($NV_LinkedNhanVien) {$this->NV_LinkedNhanVien = $NV_LinkedNhanVien;}
    public function setNV_DeleteStatusNhanVien($NV_DeleteStatusNhanVien) {$this->NV_DeleteStatusNhanVien = $NV_DeleteStatusNhanVien;}
    public function setNV_MatKhauNhanVien($NV_MatKhauNhanVien) {$this->NV_MatKhauNhanVien = $NV_MatKhauNhanVien;}
    public function setNV_XacThucEmailNhanVien($NV_XacThucEmailNhanVien) {$this->NV_XacThucEmailNhanVien = $NV_XacThucEmailNhanVien;}
    public function setNV_TrangThaiTaiKhoanNhanVien($NV_TrangThaiTaiKhoanNhanVien) {$this->NV_TrangThaiTaiKhoanNhanVien = $NV_TrangThaiTaiKhoanNhanVien;}
    public function setNV_TrangThaiDangNhapNhanVien($NV_TrangThaiDangNhapNhanVien) {$this->NV_TrangThaiDangNhapNhanVien = $NV_TrangThaiDangNhapNhanVien;}
    public function setNV_MaChoXacThucNhanVien($NV_MaChoXacThucNhanVien) {$this->NV_MaChoXacThucNhanVien = $NV_MaChoXacThucNhanVien;}

    function insertEmployee () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = 'INSERT INTO employee (NV_TenNhanVien, NV_SoDienThoaiNhanVien, NV_DiaChiNhanVien, NV_EmailNhanVien , 
        NV_NgaySinhNhanVien, NV_GioiTinhNhanVien, NV_MaChiNhanh, NV_ChucVuNhanVien, NV_NgayTaoNhanVien, NV_AvatarNhanVien, 
        NV_GioiThieuNhanVien, NV_FacebookNhanVien, NV_TwitterNhanVien, NV_LinkedNhanVien, NV_DeleteStatusNhanVien,
        NV_MatKhauNhanVien, NV_TrangThaiTaiKhoanNhanVien, NV_TrangThaiDangNhapNhanVien) 
        VALUES (:NV_TenNhanVien, :NV_SoDienThoaiNhanVien, :NV_DiaChiNhanVien, :NV_EmailNhanVien , :NV_NgaySinhNhanVien, 
        :NV_GioiTinhNhanVien, :NV_MaChiNhanh, :NV_ChucVuNhanVien, :NV_NgayTaoNhanVien, :NV_AvatarNhanVien, :NV_GioiThieuNhanVien, 
        :NV_FacebookNhanVien, :NV_TwitterNhanVien, :NV_LinkedNhanVien, :NV_DeleteStatusNhanVien, :NV_MatKhauNhanVien, 
        :NV_TrangThaiTaiKhoanNhanVien, :NV_TrangThaiDangNhapNhanVien)';

        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_TenNhanVien', $this->NV_TenNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_SoDienThoaiNhanVien', $this->NV_SoDienThoaiNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_DiaChiNhanVien', $this->NV_DiaChiNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_EmailNhanVien', $this->NV_EmailNhanVien,PDO::PARAM_STR); 
        $stmt->bindParam(':NV_NgaySinhNhanVien', $this->NV_NgaySinhNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_GioiTinhNhanVien', $this->NV_GioiTinhNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_MaChiNhanh', $this->NV_MaChiNhanh,PDO::PARAM_STR);
        $stmt->bindParam(':NV_ChucVuNhanVien', $this->NV_ChucVuNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_NgayTaoNhanVien', $this->NV_NgayTaoNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_AvatarNhanVien', $this->NV_AvatarNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_GioiThieuNhanVien', $this->NV_GioiThieuNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_FacebookNhanVien', $this->NV_FacebookNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_TwitterNhanVien', $this->NV_TwitterNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_LinkedNhanVien', $this->NV_LinkedNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_DeleteStatusNhanVien', $this->NV_DeleteStatusNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_MatKhauNhanVien', $this->NV_MatKhauNhanVien,PDO::PARAM_STR);
        $stmt->bindParam(':NV_TrangThaiTaiKhoanNhanVien', $this->NV_TrangThaiTaiKhoanNhanVien, PDO::PARAM_STR);
        $stmt->bindParam(':NV_TrangThaiDangNhapNhanVien', $this->NV_TrangThaiDangNhapNhanVien, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function selectAllEmployee () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM employee WHERE NV_DeleteStatusNhanVien = 'No' AND NV_IDNhanVien != :NV_IDNhanVien ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
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
        $sql = "SELECT NV_SoDienThoaiNhanVien FROM employee WHERE NV_DeleteStatusNhanVien = 'No' AND NV_IDNhanVien != :NV_IDNhanVien ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
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
        $sql = "SELECT NV_EmailNhanVien FROM employee WHERE NV_DeleteStatusNhanVien = 'No' AND NV_IDNhanVien != :NV_IDNhanVien ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function selectLimitEmployee ($limitEmployee, $startEmployee, $queryEmployee, $sortIDEmployee, $sortDateEmployee, $sortPositionEmployee) {
        $ConnectDataBase = new ConnectDataBase;
        session_start();
        $sql = "SELECT * FROM employee WHERE NV_DeleteStatusNhanVien = 'No' AND NV_ChucVuNhanVien != '2' ";
        if ($_SESSION['sesion-array']['NV_ChucVuNhanVien'] == '1') {
         $sql .= " AND NV_ChucVuNhanVien != '1' ";   
        }
        $arrayReplace = ['nv', 'ql', 'tgd', 'cn'];
        $queryEmployee = trim(str_replace($arrayReplace, '', strtolower($queryEmployee)));
        if ($queryEmployee !== '') {
            $sql .= ' AND ( 
            NV_TenNhanVien LIKE "%'.strtolower($queryEmployee).'%" 
            OR NV_IDNhanVien LIKE "%'.strtolower($queryEmployee).'%" 
            OR NV_DiaChiNhanVien LIKE "%'.strtolower($queryEmployee).'%"
            OR NV_SoDienThoaiNhanVien LIKE "%'.strtolower($queryEmployee).'%"
            OR NV_EmailNhanVien LIKE "%'.strtolower($queryEmployee).'%"
            OR NV_MaChiNhanh LIKE "%'.strtolower($queryEmployee).'%"

            OR NV_IDNhanVien LIKE "%'.strtoupper($queryEmployee).'%" 
            OR NV_DiaChiNhanVien LIKE "%'.strtoupper($queryEmployee).'%"
            OR NV_SoDienThoaiNhanVien LIKE "%'.strtoupper($queryEmployee).'%"
            OR NV_EmailNhanVien LIKE "%'.strtoupper($queryEmployee).'%"
            OR NV_MaChiNhanh LIKE "%'.strtoupper($queryEmployee).'%"

            OR NV_IDNhanVien LIKE "%'.$queryEmployee.'%" 
            OR NV_DiaChiNhanVien LIKE "%'.$queryEmployee.'%"
            OR NV_SoDienThoaiNhanVien LIKE "%'.$queryEmployee.'%"
            OR NV_EmailNhanVien LIKE "%'.$queryEmployee.'%"
            OR NV_MaChiNhanh LIKE "%'.$queryEmployee.'%"
            ) ';
        }
        if ($sortIDEmployee !== '' && $sortDateEmployee === '' && $sortPositionEmployee === '') {
            $sql .= 'ORDER BY NV_IDNhanVien '.$sortIDEmployee.' ';
        } 
        if ($sortIDEmployee === '' && $sortDateEmployee !== '' && $sortPositionEmployee === '') {
            $sql .= 'ORDER BY NV_NgayTaoNhanVien '.$sortDateEmployee.' ';
        } 
        if ($sortIDEmployee === '' && $sortDateEmployee === '' && $sortPositionEmployee !== '') {
            $sql .= 'ORDER BY NV_ChucVuNhanVien '.$sortPositionEmployee.' ';
        } 
        $sqlEmployee =  $sql . 'LIMIT '.$startEmployee.', '.$limitEmployee.' ';
        $stmt = $ConnectDataBase->connectDB()->prepare($sqlEmployee);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function countRecordEmployee ($queryEmployee) {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM employee WHERE NV_DeleteStatusNhanVien = 'No'";
        if ($queryEmployee !== '') {
            $sql .= ' AND ( 
            NV_TenNhanVien LIKE "%'.$queryEmployee.'%" 
            OR NV_IDNhanVien LIKE "%'.$queryEmployee.'%" 
            OR NV_DiaChiNhanVien LIKE "%'.$queryEmployee.'%"
            OR NV_SoDienThoaiNhanVien LIKE "%'.$queryEmployee.'%"
            OR NV_EmailNhanVien LIKE "%'.$queryEmployee.'%"
            OR NV_MaChiNhanh LIKE "%'.$queryEmployee.'%"
            ) ';
        }
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return count($result);
    }

    function selectEmployeeByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM employee WHERE NV_IDNhanVien = :NV_IDNhanVien AND NV_DeleteStatusNhanVien = 'No' ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result[0];
        } else {
            return "";
        }
    }

    function setDeleteStatusEmployeeByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE employee SET NV_DeleteStatusNhanVien	 = 'Yes' WHERE NV_IDNhanVien = :NV_IDNhanVien";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateAvtEmployeeByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE employee SET NV_AvatarNhanVien = :NV_AvatarNhanVien WHERE NV_IDNhanVien = :NV_IDNhanVien";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_AvatarNhanVien', $this->NV_AvatarNhanVien);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateInfoEmployeeByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE employee SET 
        NV_TenNhanVien = :NV_TenNhanVien,
        NV_DiaChiNhanVien = :NV_DiaChiNhanVien,
        NV_MaChiNhanh = :NV_MaChiNhanh,
        NV_SoDienThoaiNhanVien = :NV_SoDienThoaiNhanVien,
        NV_EmailNhanVien = :NV_EmailNhanVien,
        NV_NgaySinhNhanVien = :NV_NgaySinhNhanVien,
        NV_ChucVuNhanVien = :NV_ChucVuNhanVien,
        NV_GioiTinhNhanVien = :NV_GioiTinhNhanVien,
        NV_GioiThieuNhanVien = :NV_GioiThieuNhanVien,
        NV_FacebookNhanVien = :NV_FacebookNhanVien,
        NV_TwitterNhanVien = :NV_TwitterNhanVien,
        NV_LinkedNhanVien = :NV_LinkedNhanVien
        WHERE NV_IDNhanVien = :NV_IDNhanVien AND NV_DeleteStatusNhanVien = 'No' ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        $stmt->bindParam(':NV_TenNhanVien', $this->NV_TenNhanVien);    
        $stmt->bindParam(':NV_DiaChiNhanVien', $this->NV_DiaChiNhanVien);
        $stmt->bindParam(':NV_MaChiNhanh', $this->NV_MaChiNhanh);
        $stmt->bindParam(':NV_SoDienThoaiNhanVien', $this->NV_SoDienThoaiNhanVien);
        $stmt->bindParam(':NV_EmailNhanVien', $this->NV_EmailNhanVien); 
        $stmt->bindParam(':NV_NgaySinhNhanVien', $this->NV_NgaySinhNhanVien);  
        $stmt->bindParam(':NV_ChucVuNhanVien', $this->NV_ChucVuNhanVien);
        $stmt->bindParam(':NV_GioiTinhNhanVien', $this->NV_GioiTinhNhanVien);
        $stmt->bindParam(':NV_GioiThieuNhanVien', $this->NV_GioiThieuNhanVien);
        $stmt->bindParam(':NV_FacebookNhanVien', $this->NV_FacebookNhanVien);
        $stmt->bindParam(':NV_TwitterNhanVien', $this->NV_TwitterNhanVien);
        $stmt->bindParam(':NV_LinkedNhanVien', $this->NV_LinkedNhanVien);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateProfileEmployeeByID () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE employee SET 
        NV_TenNhanVien = :NV_TenNhanVien,
        NV_DiaChiNhanVien = :NV_DiaChiNhanVien,
        NV_SoDienThoaiNhanVien = :NV_SoDienThoaiNhanVien,
        NV_EmailNhanVien = :NV_EmailNhanVien,
        NV_NgaySinhNhanVien = :NV_NgaySinhNhanVien,
        NV_GioiTinhNhanVien = :NV_GioiTinhNhanVien,
        NV_GioiThieuNhanVien = :NV_GioiThieuNhanVien,
        NV_FacebookNhanVien = :NV_FacebookNhanVien,
        NV_TwitterNhanVien = :NV_TwitterNhanVien,
        NV_LinkedNhanVien = :NV_LinkedNhanVien
        WHERE NV_IDNhanVien = :NV_IDNhanVien AND NV_DeleteStatusNhanVien = 'No' ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        $stmt->bindParam(':NV_TenNhanVien', $this->NV_TenNhanVien);    
        $stmt->bindParam(':NV_DiaChiNhanVien', $this->NV_DiaChiNhanVien);
        $stmt->bindParam(':NV_SoDienThoaiNhanVien', $this->NV_SoDienThoaiNhanVien);
        $stmt->bindParam(':NV_EmailNhanVien', $this->NV_EmailNhanVien); 
        $stmt->bindParam(':NV_NgaySinhNhanVien', $this->NV_NgaySinhNhanVien);  
        $stmt->bindParam(':NV_GioiTinhNhanVien', $this->NV_GioiTinhNhanVien);
        $stmt->bindParam(':NV_GioiThieuNhanVien', $this->NV_GioiThieuNhanVien);
        $stmt->bindParam(':NV_FacebookNhanVien', $this->NV_FacebookNhanVien);
        $stmt->bindParam(':NV_TwitterNhanVien', $this->NV_TwitterNhanVien);
        $stmt->bindParam(':NV_LinkedNhanVien', $this->NV_LinkedNhanVien);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function getBranchID() {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT CN_IDChiNhanh FROM branch WHERE CN_DeleteStatusChiNhanh = 'No' ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    function updateLoginStatus () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE employee SET NV_TrangThaiDangNhapNhanVien = :NV_TrangThaiDangNhapNhanVien
        WHERE NV_IDNhanVien = :NV_IDNhanVien";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        $stmt->bindParam(':NV_TrangThaiDangNhapNhanVien', $this->NV_TrangThaiDangNhapNhanVien);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Tạo mã xác thực 
    function updateVerifyCode () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE employee SET NV_MaChoXacThucNhanVien = :NV_MaChoXacThucNhanVien
        WHERE NV_IDNhanVien = :NV_IDNhanVien";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        $stmt->bindParam(':NV_MaChoXacThucNhanVien', $this->NV_MaChoXacThucNhanVien);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Lấy ra nhân viên bằng mã xác thực
    function getEmployeeByCodeVerify () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "SELECT * FROM employee WHERE NV_MaChoXacThucNhanVien = :NV_MaChoXacThucNhanVien AND NV_DeleteStatusNhanVien = 'No' ";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_MaChoXacThucNhanVien', $this->NV_MaChoXacThucNhanVien);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }

    // Tạo mã xác thực email
    function updateVerifyCodeEmail () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE employee SET NV_XacThucEmailNhanVien = :NV_XacThucEmailNhanVien
        WHERE NV_IDNhanVien = :NV_IDNhanVien";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        $stmt->bindParam(':NV_XacThucEmailNhanVien', $this->NV_XacThucEmailNhanVien);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Xét trạng thái tài khoản nhân viên
    function updateAccountStatus () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE employee SET NV_TrangThaiTaiKhoanNhanVien = :NV_TrangThaiTaiKhoanNhanVien
        WHERE NV_IDNhanVien = :NV_IDNhanVien";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        $stmt->bindParam(':NV_TrangThaiTaiKhoanNhanVien', $this->NV_TrangThaiTaiKhoanNhanVien);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Cập nhật mật khẩu mới cho nhân viên
    function updateNewPassword () {
        $ConnectDataBase = new ConnectDataBase;
        $sql = "UPDATE employee SET NV_MatKhauNhanVien = :NV_MatKhauNhanVien
        WHERE NV_IDNhanVien = :NV_IDNhanVien";
        $stmt = $ConnectDataBase->connectDB()->prepare($sql);
        $stmt->bindParam(':NV_IDNhanVien', $this->NV_IDNhanVien);
        $stmt->bindParam(':NV_MatKhauNhanVien', $this->NV_MatKhauNhanVien);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>


