<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập trang quản trị</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./login-admin.css">
</head>
<body>
    <div class="Login__Admin__Container">
        <div class="Login__Admin__Header">
            <div class="Login__Admin__Header__Logo">SB MOBILE</div>
            <div class="Login__Admin__Header__Info">
                <div class="Login__Admin__Header__Info__Item">
                    <i class="fa-solid fa-phone-flip"></i>
                    0369969650
                </div>
                    <div class="Login__Admin__Header__Info__Item">
                    <i class="fa-brands fa-facebook-f"></i>
                    <a href="https://www.facebook.com/hai.tuan.f11" target="_blank">Facebook</a>
                </div>
                <div class="Login__Admin__Header__Info__Item">
                    <i class="fa-solid fa-envelope"></i>
                    TunaHari86@gmial.comcom
                </div>
            </div>
        </div>
        <div class="Login__Admin__Title">ĐĂNG NHẬP HỆ THỐNG</div>
        <div class="Login__Admin__Box">
            <div class="Login__Admin__Input__Group">
                <div class="Login__Admin__Input__Item">
                    <label for="EmployeeIDLogin">Mã nhân viên: </label>
                    <input type="text" id="EmployeeIDLogin">
                </div>
                <div class="Login__Admin__Input__Item">
                    <label for="EmployeePassLogin">Mật khẩu: </label>
                    <input type="password" id="EmployeePassLogin">
                </div>
                <div class="Login__Admin__Remember__Forget">
                    <div class="Login__Admin__Remember">
                        <label for="Login__Admin__Remember__Check"><i class="fa-solid fa-check"></i></label>
                        <input type="checkbox" name="" id="Login__Admin__Remember__Check">
                        <p>Ghi nhớ tài khoản của bạn</p>
                    </div>
                    <div class="Login__Admin__Forget">
                        <a href="#">Quên mật khẩu?</a>
                    </div>
                </div>
                <div class="Login__Admin__Submit" id="EmployeeSubmitLogin">Đăng Nhập Hệ Thống</div>
            </div>
        </div>
    </div>

    <div class="Login__Admin__Alert">
        <div class="Login__Admin__Alert__Top">
            <div class="Login__Admin__Alert__Top__Icon">
            <i class="fa-solid fa-triangle-exclamation"></i>
                <div class="Login__Admin__Alert__Top__Time">
                    <p>Chuyển hướng sau</p>
                    <div class="Login__Admin__Alert__Top__Time__Icon">
                        <span>10</span>s
                    </div>
                </div>
            </div>
        </div>
        <div class="Login__Admin__Alert__Bottom">
            <div class="Login__Admin__Alert__Bottom__Title"></div>
            <div class="Login__Admin__Alert__Bottom__Text"></div>
            <div class="Login__Admin__Alert__Bottom__Link"></div>
        </div>
    </div>

    <!-- LOADING -->
    <div class="loading__box">
        <p>Đang Kiểm Tra...</p>
        <div class="loading"></div>
    </div>
</body>
</html>

<script src="../../Controller/class/controller.function.js"></script>
<script src="../../Controller/class/controller.validate.js"></script>
<script src="../../Controller/admin/controller-admin.login.js"></script>