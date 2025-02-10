$(document).ready(function () {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $(`.Verify__Admin__Input__Item__Password, .Verify__Admin__Password, .Verify__Admin__Input__Item__CheckCode, 
    .Verify__Admin__CheckCode, .error-email, .error-code, .loading__box, .error-pass, .error-repass`).hide()

    /* Tạo thông báo */
    function alertLogin (title, notify) {
        $('.Verify__Admin__Alert__Bottom__Title').text(title)
        $('.Verify__Admin__Alert__Bottom__Text').text(notify)
        $('.Verify__Admin__Alert').addClass('active')
        setTimeout(function() {
            $('.Verify__Admin__Alert').removeClass('active')
        },3000)
    }

    $('#EmailVerify').keyup(function() {
        ClassValidate.validateEmail($('#EmailVerify').val().trim()) ? $('.error-email').hide() : $('.error-email').show()
    })

    $flagEmail = 0
    $('.Verify__Admin__SendCode').click(function() {
        if (ClassValidate.validateEmail($('#EmailVerify').val().trim())) {
            $('.error-email').hide()
            $flagEmail++
        } else {
            $('.error-email').show()
            $flagEmail = 0
        }
        if ($flagEmail !== 0) {
            ClassFuction.getAjaxPost(`../../Controller/admin/controller-admin.verify.php?code-verify=${$('.Verify__Admin__SendCode').attr('value').trim()}`, 
            {
                verifyAccount : 'verify-account',
                emailVerify : $('#EmailVerify').val().trim(),
            }
            ).done(function(response){
                response = response.trim()
                console.log(response)
                if (response !== 'check-email-failed') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        $('.Verify__Admin__Input__Item__CheckCode, .Verify__Admin__CheckCode').show()
                        $('.Verify__Admin__Input__Item__SendCode, .Verify__Admin__SendCode').hide()
                    },2500)
                    $('#CheckCode').click(function() {
                        if ($('#CodeVerify').val().trim().length === 6) {
                            $('.error-code').hide()
                            ClassFuction.getAjaxPost(`../../Controller/admin/controller-admin.verify.php?code-verify=${$('.Verify__Admin__SendCode').attr('value').trim()}`, 
                            {
                                checkCodeEmail : 'check-code-email',
                                verifyCodeEmail : $('#CodeVerify').val().trim(),
                            }
                            ).done(function(response){
                                response = response.trim()
                                if (response !== 'verify-failed') {
                                    $('.loading__box').show()
                                    setTimeout(function() {
                                        $('.loading__box').hide()
                                        $('.Verify__Admin__Input__Item__CheckCode, .Verify__Admin__CheckCode').hide()
                                        $('.Verify__Admin__Input__Item__Password, .Verify__Admin__Password').show()
                                    },2500)
                                    $('#PassVerify').keyup(function() {
                                        ClassValidate.validatePassword($('#PassVerify').val().trim()) ? $('.error-pass').hide() : $('.error-pass').show()
                                    }) 
                                    $('#RePassVerify').keyup(function() {
                                        ClassValidate.checkAccuratePassword ($('#RePassVerify').val().trim(), $('#PassVerify').val().trim()) ? $('.error-repass').hide() : $('.error-repass').show()
                                    })
                                    $flagPass = 0
                                    $flagRePass = 0
                                    $('.Verify__Admin__Password').click(function() {
                                        if (ClassValidate.validatePassword($('#PassVerify').val().trim())) {
                                            $('.error-pass').hide()
                                            $flagPass++
                                        } else {
                                            $('.error-pass').show()
                                            $flagPass = 0
                                        }
                                        if (ClassValidate.checkAccuratePassword ($('#RePassVerify').val().trim(), $('#PassVerify').val().trim())) {
                                            $('.error-repass').hide()
                                            $flagRePass++
                                        } else {
                                            $('.error-repass').show()
                                            $flagRePass = 0
                                        }
                                        if ($flagPass !== 0 && $flagRePass !== 0) {
                                            ClassFuction.getAjaxPost(`../../Controller/admin/controller-admin.verify.php?code-verify=${$('.Verify__Admin__SendCode').attr('value').trim()}`, 
                                            {
                                                changePassword : 'change-password',
                                                passwordVerify : $('#PassVerify').val().trim(),
                                                repasswordVerify: $('#RePassVerify').val().trim()
                                            }
                                            ).done(function(response){
                                                response = response.trim()
                                                if (response !== 'change-password-failed') {
                                                    $('.loading__box').show()
                                                    setTimeout(function() {
                                                        $('.loading__box').hide()
                                                        alertLogin ('Đổi Mật Khẩu Thành Công', 'Bạn có thể đăng nhập bằng tài khoản của mình!')
                                                    },2500)
                                                } else if (response === 'change-password-failed') {
                                                    $('.loading__box').show()
                                                    setTimeout(function() {
                                                        $('.loading__box').hide()
                                                        alertLogin ('Lỗi Mật Khẩu', 'Mật khẩu không khả dụng, vui lòng kiểm tra lại!')
                                                    },2500)
                                                }
                                            })
                                        }
                                    })
                                } else if(response === 'verify-failed') {
                                    $('.loading__box').show()
                                    setTimeout(function() {
                                        $('.loading__box').hide()
                                        alertLogin ('Mã Xác Thực Sai', 'Mã xác thực không chính xác, vui lòng kiểm tra lại!')
                                    },2500)
                                }
                            })
                        } else {
                            $('.error-code').show()
                        }
                    })
                } else if(response === 'check-email-failed') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertLogin ('Email Không Tồn Tại', 'Email không chính xác hoặc chưa được khởi tạo')
                    },2500)
                }
            })
        } else {
            $('.Verify__Admin__Input__Item__Password, .Verify__Admin__Password').hide()
        }
    })
})