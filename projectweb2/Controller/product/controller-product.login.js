$(document).ready(function() {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.Account__Register__Right__Error, .loading__box, .loading__bg').hide()

    /* Gởi ajax qua để server kiểm tra dữ liệu */
    $('#loginSubmit').click(function () {
        if ($('#loginEmail').val().trim().length > 0 && $('#loginPass').val().trim().length > 0) {
            ClassFuction.getAjaxPost('../../Controller/product/controller-product.login.php', 
                {
                    loginFlag: 'login', 
                    loginEmail: $('#loginEmail').val().trim(),
                    loginPass: $('#loginPass').val().trim(),
                }
                ).done(function(response){
                    response = response.trim()
                    if (response === 'success') {
                        handleAlert ('success')
                    } else if (response === 'loginEmail') {
                        handleAlert ('loginEmail')
                    } else if (response === 'loginPass') {
                        handleAlert ('loginPass')
                } 
            })
        } else {
            handleAlert ('emptyField')
        }
    })

    /* Tạo thông báo */

    function handleAlert (notify) {
        if (notify === 'success') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertSuccess ('Đăng nhập thành công')
            })
            setTimeout(function() {
                window.location="./product.view.php"; 
            },1000)
        } else if (notify === 'loginEmail') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Email không chính xác, vui lòng kiểm tra lại')
            },1000)
        } else if (notify === 'loginPass') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Mật khẩu không chính xác, vui lòng kiểm tra lại')
            },1000)
        } else if (notify === 'emptyField') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Vui lòng điền đầy đủ thông tin đăng nhập')
            },1000)
        }     
    }

    function alertSuccess (notify) {
        $('.alert__notify__box__success__right__content').text(notify)
        $('.alert__notify__box__success').addClass('active')
        setTimeout(function() {
            $('.alert__notify__box__success__progress').addClass('active')
        },500)
        setTimeout(function() {
            $('.alert__notify__box__success').removeClass('active')
            $('.alert__notify__box__success__progress').removeClass('active')
        },5000)
        $('.alert__notify__box__success__close').click(function() {
            $('.alert__notify__box__success').removeClass('active')
            setTimeout(function() {
                $('.alert__notify__box__success__progress').removeClass('active')
            },300)
        })
    }

    function alertFailed (notify) {
        $('.alert__notify__box__failed__right__content').text(notify)
        $('.alert__notify__box__failed').addClass('active')
        setTimeout(function() {
            $('.alert__notify__box__failed__progress').addClass('active')
        },500)
        setTimeout(function() {
            $('.alert__notify__box__failed').removeClass('active')
            $('.alert__notify__box__failed__progress').removeClass('active')
        },5000)
        $('.alert__notify__box__failed__close').click(function() {
            $('.alert__notify__box__failed').removeClass('active')
            setTimeout(function() {
                $('.alert__notify__box__failed__progress').removeClass('active')
            },300)
        })
    }
})