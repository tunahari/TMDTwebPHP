<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./register.view.css">
    <title>Login SB Mobile</title>
</head>
<body>
    <div class="Account__Register__Container">
        <div class="Account__Register__Left"></div>
        <div class="Account__Register__Right">
            <div class="Account__Register__Right__Title__Box">
                <div class="Account__Register__Right__Title">
                    Đăng Ký SB Moblie
                </div>
                <div class="Account__Register__Right__Login__Text">
                    Đăng ký để tiếp tục mua hàng
                </div>
            </div>
            <div class="Account__Register__Right__Input__Box">
                <div class="Account__Register__Right__Input__Item">
                    <label for="">Tên:</label>
                    <input type="text" name="" id="registerName" placeholder="Viết tên của bạn vào đây...">
                    <div class="Account__Register__Right__Error Account__Register__Right__Error__Username">
                    Tên chứa ít nhất 5 ký tự
                    </div>
                </div>
                <div class="Account__Register__Right__Input__Item">
                    <label for="">Email</label>
                    <input type="email" name="" id="registerEmail" placeholder="Viết email của bạn vào đây...">
                    <div class="Account__Register__Right__Error Account__Register__Right__Error__Email">
                    Email không đúng định dạng, vui lòng kiểm tra lại
                    </div>
                </div>
            </div>
            <div class="Account__Register__Right__Input__Box">
                <div class="Account__Register__Right__Input__Item">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="" id="registerPass" placeholder="Viết mật khẩu của bạn vào đây...">
                    <div class="Account__Register__Right__Error Account__Register__Right__Error__Password">
                    Mật khẩu chứa ít nhất 5 ký tự, bao gồm chữ hoa, thường, số và ký tự đặc biệt 
                    </div>
                </div>
                <div class="Account__Register__Right__Input__Item">
                    <label for="">Xác nhận mật khẩu</label>
                    <input type="password" name="" id="registerCFPass" placeholder="Viết mật khẩu xác nhận vào đây...">
                    <div class="Account__Register__Right__Error Account__Register__Right__Error__CFPassword">
                    Mật khẩu xác nhận phải giống với mật khẩu đăng ký
                    </div>
                </div>
            </div>
            <div class="Account__Register__Right__Register__Button" id="registerSubmit">Đăng Ký</div>
            <div class="Account__Register__Right__Have__Account">
                Đã có tài khoản? <a href="./login.view.php">Đăng Nhập Ngay</a>
            </div>
        </div>
    </div>

    <!-- LOADING -->
        <div class="loading__bg"></div>
        <div class="loading__box">
        <p>Đang Thực Hiện...</p>
        <div class="loading"></div>
    </div>
    <!-- ALERT NOTIFY SUCCESS -->
    <div class="alert__notify__box__success">
        <div class="alert__notify__box__success__close"><i class="fa-solid fa-xmark"></i></div>
        <div class="alert__notify__box__success__left">
            <div class="alert__notify__box__success__left__icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
        <div class="alert__notify__box__success__right">
            <div class="alert__notify__box__success__right__title">Thành Công</div>
            <div class="alert__notify__box__success__right__content"></div>
        </div>
        <div class="alert__notify__box__success__progress"></div>
    </div>
    <!-- ALERT NOTIFY Failed -->
    <div class="alert__notify__box__failed">
        <div class="alert__notify__box__failed__close"><i class="fa-solid fa-xmark"></i></div>
        <div class="alert__notify__box__failed__left">
            <div class="alert__notify__box__failed__left__icon">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
        </div>
        <div class="alert__notify__box__failed__right">
            <div class="alert__notify__box__failed__right__title">Thất Bại</div>
            <div class="alert__notify__box__failed__right__content"></div>
        </div>
        <div class="alert__notify__box__failed__progress"></div>
    </div>
</body>
</html>
<script src="./register.view.js"></script>
<script src="../../Controller/class/controller.function.js"></script>
<script src="../../Controller/class/controller.validate.js"></script>
<script src="../../Controller/product/controller-product.register.js"></script>