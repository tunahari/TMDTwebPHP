<?php
class ValidateData {
    
    /* Các phương thức của class ValidateData
    - standardizeString($string): Chuẩn hóa chuỗi.
    - validateUserName($username): Xác thực tên người dùng.
    - validatePassword($password): Xác thực mật khẩu.
    - validateDate($date): Xác thực ngày tháng. 
    - validatePhoneNumber($phone): Xác thực số điện thoại.
    - validateEmail($email): Xác thực email.
    - checkAccuratePassword($cfpassword, $password): Kiểm tra mật khẩu trùng khớp.
    */
    
    /* Chuẩn hóa chuỗi
    
    */
    function standardizeString ($string) {
        $string = trim($string);
        $string = htmlspecialchars($string);
        $string = stripslashes($string);
        return $string;
    }

    /* Xác thực tên người dùng
    - Tên người dùng phải trên 5 ký tự, chỉ chứa chữ và số
    */ 
    function validateUserName ($username) {
        $username = trim($username);
        if (strlen($username) >= 5 && ctype_alnum($username) === true) {
            return true;
        } else {
            return false;
        }
    }

    /* Xác thực mật khẩu hợp lệ
    - Mật khẩu phải trên 5 ký tự, có chứa ký tự đặt biệt [!,@,#,$,%,&,*], chữ và số
    */ 
    function validatePassword ($password) {
        $password = trim($password);
        $error = "";
        $countSpace = 0;
        for ($i = 0; $i < strlen($password); $i++) {
            if (mb_substr($password, $i, 1) === ' ') {
                $countSpace++;
            }
        }
        if (mb_strlen($password) <= 5) {
            $error = "1";
        } else if(!preg_match("#[0-9]+#",$password)) {
            $error = "1";
        } else if(!preg_match("#[A-Z]+#",$password)) {
            $error = "1";
        } else if(!preg_match("#[a-z]+#",$password)) {
            $error = "1";
        } else if(!preg_match("#[\W]+#",$password)) {
            $error = "1";
        } else if ($countSpace > 0) {
            $error = "1";
        } else {
            $error = "";
        }
        if ($error === "") {
            return true;
        } else {
            return false;
        }
    }

    /* Xác thực mật khẩu chính xác
    - Mật khẩu được băm nhỏ phải khớp với mật khẩu xác nhận
    */
    function checkAccuratePassword ($cfpassword, $password) {
        $cfpassword = trim($cfpassword);
        $password = trim($password);
        if (password_verify($cfpassword, password_hash($password, PASSWORD_DEFAULT))) {
            return true;
        } else {
            return false;
        }
    }

    /* Xác thực ngày tháng
    - Ngày tháng phải đúng định dạng dd/mm/yyyy 
    - Phải là ngày tồn tại
    */
    function validateDate ($date) {
        $date = trim($date);
        if (count(explode("-", $date)) === 3) {
            $day = intval(explode("-", $date)[2]);
            $month = intval(explode("-", $date)[1]);
            $year = intval(explode("-", $date)[0]);
            return checkdate($month, $day, $year);
        // } else {
        //     return false;
        }
        // return $date;
    }

    /* Xác thực số điện thoại
    - Số điện thoại phải đủ 10 ký tự
    - 10 ký tự phải là số nguyên, không âm
    - Số điện thoại đầu bằng số 0
    */
    function validatePhoneNumber ($phone) {
        $phone = trim($phone);
        if (strlen($phone) === 10 && (is_int($phone) || ctype_digit($phone)) && (int)$phone > 0 && intval(mb_substr($phone, 0, 1)) === 0) {
            return true;
        } else {
            return false;
        }
    }

    function validateNumber ($number) {
        if ((is_int($number) || ctype_digit($number)) && (int)$number > 0) {
            return true;
        } else {
            return false;
        }
    }

    /* Xác thực email
    - Email đúng định dạng : 'xxxx@gmail.com'
    */
    function validateEmail ($email) {
        $email = trim($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }
}
?>