<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\STMT;
use PHPMailer\PHPMailer\Exception;
class HandlingFunctions {
    /* 
    - randomString(): Tạo chuỗi ngẫu nhiên.
    - encryptString($string): Mã hóa chuỗi sha1.
    - verifyEncryptString($stringA, $stringB): so sánh 2 chuỗi A và B khi được mã hóa sha1.
    (1) Cài đặt PHPMailer: composer require phpmailer/phpmailer
    (2) Cài đặt Swift Mailer: composer require "swiftmailer/swiftmailer:^6.0"
    - sendEmailByPHPMailer($fromEmail, $fromPass, $fromName, $toEmail, $subject, $body): gởi email bằng PHP Mailer
    - sendEmailBySwiftMailer($fromEmail, $fromPass, $fromName, $toEmail, $subject, $body): gởi email bằng SWift Mailer
    */

    /**
     * Hàm trả về một chuỗi ngẫu nhiên dài 40 ký tự
     */
    function randomString () {
        return sha1(uniqid());
    }

    /**
     * Hàm sử dụng để mã hóa sha1 một chuỗi 
     */
    function encryptString ($string) {
        return sha1($string);
    }

    /**
     * Hàm dùng để so sánh chuỗi thường và chuỗi mã hóa sha1
     */
    function verifyEncryptString ($stringA, $stringB) {
        if ($stringA === sha1($stringB)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Hàm dùng để gởi email xác thực đến email người dùng bằng PHP Mailer
     */
    function sendEmailByPHPMailer ($fromEmail, $fromPass, $fromName, $toName, $toEmail, $subject, $body) {
        $mail = new PHPMailer(true);                             
        try {
            $mail->SMTPDebug = 2; $mail->isSMTP(); $mail->CharSet = "utf-8"; $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true; $mail->Username = $fromEmail; $mail->Password = $fromPass; $mail->SMTPSecure = 'tls';                            
            $mail->Port = 587; $mail->setFrom($fromEmail, $fromName); $mail->addAddress($toEmail, $toName);                   
            $mail->addReplyTo($fromEmail, $fromName); $mail->isHTML(true); $mail->Subject = $subject; $mail->Body = $body;
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Hàm dùng để gởi email xác thực đến email người dùng bằng Swift Mailer
     */
    function sendEmailBySwiftMailer ($fromEmail, $fromPass, $fromName, $toName, $toEmail, $subject, $body) {
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 25))->setUsername($fromEmail)->setPassword($fromPass)->setEncryption('tls');;
        $mailer = new Swift_Mailer($transport);
        $message = (new Swift_Message($subject))->setFrom([$fromEmail => $fromName])->setTo([$toEmail => $toName])->setBody($body, 'text/html');
        $result = $mailer->send($message);
        if ($result === 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Hàm dùng để lưu một file vào thư mục được chỉ định
     */
    function uploadFile ($file, $folder, $filePost) {
        $error = '';
        if ($file !== null) {
            $file = $_FILES[$filePost];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = ['jpg', 'jpeg', 'png'];
            if (!in_array($fileActualExt, $allowed)) {
                $error = 'type_error';
            } 
            if ($fileSize > 10000000) {
                $error = 'size_error';
            }
            if ($fileError > 0) {
                $error = 'file_error';
            }
            if ($error === '') {
                $fileNameNew = sha1(uniqid('',true)) . '.' . $fileActualExt;
                $fileDestination = $folder . '/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                return $fileDestination;
            } else {
                return $error;
            }
        } 
    }
}
?>