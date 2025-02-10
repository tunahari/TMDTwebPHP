<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./login.view.css">
    
    <title>Login SB Mobile</title>
</head>

<body>
    <div class="Account__Login__Container">
        <div class="Account__Login__Left"></div>
        <div class="Account__Login__Right">
            <!-- Alert Failed -->
            <div class="Account__Login__Right__Alert__Failed">
                <div class="Account__Login__Right__Alert__Failed__Left">
                    <div class="Account__Login__Right__Alert__Failed__Left__Icon">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                </div>
                <div class="Account__Login__Right__Alert__Failed__Right">
                    <div class="Account__Login__Right__Alert__Failed__Notify">
                        Login Failed!
                    </div>
                    <div class="Account__Login__Right__Alert__Failed__Text">
                        Username or password incorrect
                    </div>
                </div>
                <div class="Account__Login__Right__Alert__Failed__Process__Box">
                    <div class="Account__Login__Right__Alert__Failed__Process"></div>
                </div>
            </div>
            <!-- Alert Success -->
            <div class="Account__Login__Right__Alert__Success">
                <div class="Account__Login__Right__Alert__Success__Left">
                    <div class="Account__Login__Right__Alert__Success__Left__Icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
                <div class="Account__Login__Right__Alert__Success__Right">
                    <div class="Account__Login__Right__Alert__Success__Notify">
                        Đăng nhập thành công
                    </div>
                    <div class="Account__Login__Right__Alert__Success__Text">
                        Bây giờ bạn có thể mua hàng tại SB Mobile
                    </div>
                </div>
                <div class="Account__Login__Right__Alert__Success__Process__Box">
                    <div class="Account__Login__Right__Alert__Success__Process"></div>
                </div>
            </div>
            <div class="Account__Login__Right__Loading"><i class="fa-solid fa-spinner"></i></div>
            <div class="Account__Login__Right__Title__Box">
                <div class="Account__Login__Right__Title">
                    SB Moblie Xin Chào!
                </div>
                <div class="Account__Login__Right__Login__Text">
                    Đăng nhập để tiếp tục mua hàng
                </div>
            </div>
            <div class="Account__Login__Right__Input__Box">
                <div class="Account__Login__Right__Input__Item">
                    <label for="">Email</label>
                    <input type="text" name="" id="loginEmail" placeholder="Viết email của bạn vào đây...">
                </div>
                <div class="Account__Login__Right__Input__Item">
                    <label for="">Mật Khẩu</label>
                    <input type="password" name="" id="loginPass" placeholder="Viết mật khẩu của bạn vào đây...">
                </div>
            </div>
            <div class="Account__Login__Right__Remember__Box">
                <div class="Account__Login__Right__Remember__Box__Left">
                    <label for="RememberCheck"><i class="fa-solid fa-check"></i></label>
                    <span id="RememberCheck">Ghi nhớ đăng nhập</span>
                    <input type="checkbox" id="RememberCheck">
                </div>
                <div class="Account__Login__Right__Remember__Box__Right">
                    <a href="#">Quên mật khẩu?</a>
                </div>
            </div>
            <div class="Account__Login__Right__Login__Button" id="loginSubmit">Đăng Nhập</div>
            <div class="Account__Login__Right__Login__Or">
                <span>HOẶC</span>
            </div>
            <div class="Account__Login__Right__Login__Group">
                <div class="Account__Login__Right__Login__Google">
                    <img class="Account__Login__Right__Login__Google__Image" src="./image/login-gg-icon.png" alt="">
                    ĐĂNG NHẬP VỚI GOOGLE
                </div>
                <div class="Account__Login__Right__Login__Facebook">
                    <img class="Account__Login__Right__Login__Facebook__Image" src="./image/login-fb-icon.png" alt="">
                    ĐĂNG NHẬP VỚI FACEBOOK
                </div>
            </div>
            <div class="Account__Login__Right__Have__Account">
                Chưa có tài khoản? <a href="./register.view.php">Đăng Ký ngay</a>
            </div>
        </div>
    </div>

    <!-- LOADING -->
    <div class="loading__bg"></div>
    <div class="loading__box">
        <p>Loading...</p>
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
<script src="./login.view.js"></script>
<script src="../../Controller/class/controller.function.js"></script>
<script src="../../Controller/class/controller.validate.js"></script>
<script src="../../Controller/product/controller-product.login.js"></script>