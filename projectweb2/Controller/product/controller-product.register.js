$(document).ready(function() {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.Account__Register__Right__Error, .loading__box, .loading__bg').hide()
    
    function checkInput (elmInput, functionName, elmInputPass) {
        if (functionName === 'validateUserName') {
            elmInput.val().trim().length > 4 ? $(elmInput.parent().children().get(2)).hide() : $(elmInput.parent().children().get(2)).show()
        } else if (functionName === 'validateEmail') {
            ClassValidate.validateEmail(elmInput.val().trim()) ? $(elmInput.parent().children().get(2)).hide(): $(elmInput.parent().children().get(2)).show()
        } else if (functionName === 'validatePassword') {
            ClassValidate.validatePassword(elmInput.val().trim()) ? $(elmInput.parent().children().get(2)).hide(): $(elmInput.parent().children().get(2)).show()
        } else if (functionName === 'checkAccuratePassword') {
            ClassValidate.checkAccuratePassword(elmInput.val().trim(), elmInputPass.val().trim()) ? $(elmInput.parent().children().get(2)).hide(): $(elmInput.parent().children().get(2)).show()
        }
    }

    /* ======================= Bước 1: Validate bằng sự kiện keyup ======================= */
    $('#registerName').keyup(function () {checkInput($('#registerName'), 'validateUserName', $('#registerPass'))})
    $('#registerEmail').keyup(function () {checkInput($('#registerEmail'), 'validateEmail', $('#registerPass'))})
    $('#registerPass').keyup(function () {checkInput($('#registerPass'), 'validatePassword', $('#registerPass'))})
    $('#registerCFPass').keyup(function () {checkInput($('#registerCFPass'), 'checkAccuratePassword', $('#registerPass'))})

    /* ======================= Bước 2: Validate bằng sự kiện blur ======================= */
    $('#registerName').blur(function () {checkInput($('#registerName'), 'validateUserName', $('#registerPass'))})
    $('#registerEmail').blur(function () {checkInput($('#registerEmail'), 'validateEmail', $('#registerPass'))})
    $('#registerPass').blur(function () {checkInput($('#registerPass'), 'validatePassword', $('#registerPass'))})
    $('#registerCFPass').blur(function () {checkInput($('#registerCFPass'), 'checkAccuratePassword', $('#registerPass'))})

    /* ======================= Bước 3: Validate rồi gởi dữ liệu sang server ======================= */
    $('#registerSubmit').click(function () {
        var flagName = false
        var flagEmail = false
        var flagPass = false
        var flagCFPass = false
        $('#registerName').val().trim().length > 4 ? flagName = true : flagName = false
        ClassValidate.validateEmail($('#registerEmail').val().trim()) ? flagEmail = true : flagEmail = false
        ClassValidate.validatePassword($('#registerPass').val().trim()) ? flagPass = true : flagPass = false
        ClassValidate.checkAccuratePassword($('#registerCFPass').val().trim(), $('#registerPass').val().trim()) ? flagCFPass = true : flagCFPass = false
        
        if (flagName === true && flagEmail === true && flagPass === true && flagCFPass === true) {
            ClassFuction.getAjaxPost('../../Controller/product/controller-product.register.php', 
            {
                registerFlag: 'register', 
                registerName: $('#registerName').val().trim(),
                registerEmail: $('#registerEmail').val().trim(),
                registerPass: $('#registerPass').val().trim(),
            }
            ).done(function(response){
                response = response.trim()
                if (response === 'success') {
                    handleAlert ('success')
                } else if (response === 'failed') {
                    handleAlert ('failed')
                } else if (response === 'registerName') {
                    handleAlert ('registerName')
                } else if (response === 'registerEmail') {
                    handleAlert ('registerEmail')
                } else if (response === 'registerPass') {
                    handleAlert ('registerPass')
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
                alertSuccess ('Đăng ký thanh công, Bạn sẽ được chuyển về trang đăng nhập')
                $('#registerName').val('')
                $('#registerEmail').val('')
                $('#registerPass').val('')
                $('#registerCFPass').val('')
            },2500)
            setTimeout(function() {
                window.location.href = "./login.view.php";
            }, 3000);
            
        } else if (notify === 'failed') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Vui lòng kiểm tra lại thông tin đăng ký')
            },1500)
        } else if (notify === 'registerName') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Tên người dùng không hợp lệ')
            },1500)
        } else if (notify === 'registerEmail') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Email không hợp lệ hoặc bị trùng')
            },1500)
        } else if (notify === 'registerPass') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Mật khẩu không hợp lệ')
            },1500)
        } else if (notify === 'emptyField') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Vui lòng điền đầy đủ thông tin đăng ký')
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