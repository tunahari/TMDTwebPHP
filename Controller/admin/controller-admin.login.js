$(document).ready(function () {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();

    $('.loading__box').hide()

        /* Tạo thông báo */
    function alertLogin (title, notify, link, elmButton) {
        $('.Login__Admin__Alert__Bottom__Title').text(title)
        $('.Login__Admin__Alert__Bottom__Text').text(notify)
        setTimeout(function() {$('.Login__Admin__Alert__Top__Time__Icon span').text(0)},10000)
        $('.Login__Admin__Alert__Top__Time').hide()
        $('.Login__Admin__Alert').addClass('active')
        if (elmButton !== '' && link !== '') {
            $('.Login__Admin__Alert__Bottom__Link').html(elmButton)
            $('.Login__Admin__Alert__Link').attr('href', link)
            $('.Login__Admin__Alert__Top__Time').show()
            $('.Login__Admin__Alert__Top__Time__Icon span').text(10)
            setTimeout(function() {$('.Login__Admin__Alert__Top__Time__Icon span').text(9)},1000)
            setTimeout(function() {$('.Login__Admin__Alert__Top__Time__Icon span').text(8)},2000)
            setTimeout(function() {$('.Login__Admin__Alert__Top__Time__Icon span').text(7)},3000)
            setTimeout(function() {$('.Login__Admin__Alert__Top__Time__Icon span').text(6)},4000)
            setTimeout(function() {$('.Login__Admin__Alert__Top__Time__Icon span').text(5)},5000)
            setTimeout(function() {$('.Login__Admin__Alert__Top__Time__Icon span').text(4)},6000)
            setTimeout(function() {$('.Login__Admin__Alert__Top__Time__Icon span').text(3)},7000)
            setTimeout(function() {$('.Login__Admin__Alert__Top__Time__Icon span').text(2)},8000)
            setTimeout(function() {$('.Login__Admin__Alert__Top__Time__Icon span').text(1)},9000)
            setTimeout(function() {
                $('.Login__Admin__Alert').removeClass('active')
                window.location = link
            },11000)
        } else {
            $('.Login__Admin__Alert__Top__Time').hide()
            setTimeout(function() {
                $('.Login__Admin__Alert').removeClass('active')
            },3000)
        }
    }

    $('#EmployeeSubmitLogin').click(function() {
        var EmployeeIDLogin = $('#EmployeeIDLogin').val().trim()
        var EmployeePassLogin = $('#EmployeePassLogin').val().trim()
        if (EmployeeIDLogin !== '' && EmployeePassLogin !== '') {
            ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.login.php', 
            {
                EmployeeLogin: 'employee-login',
                EmployeeIDLogin: EmployeeIDLogin,
                EmployeePassLogin: EmployeePassLogin
            }).done(function(response){
                response = response.trim()
                var dataResponse = JSON.parse(response)
                if (dataResponse[0] !== '') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertLogin ('Lỗi Mã Nhân Viên', 'Mã nhân viên sai hoặc không tồn tại!', '', '')
                    },2500)
                }
                if (dataResponse[1] !== '') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertLogin ('Sai Mật Khẩu', 'Mật khẩu không chính xác, vui lòng kiểm tra lại', '', '')
                    },2500)
                }
                if (dataResponse[2] !== '') {
                    $('.loading__box').show()
                    let elmButtonVerify = '<a href="" class="Login__Admin__Alert__Link">Xác Thực Ngay<i class="fa-solid fa-arrow-right"></i></a>'
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertLogin ('Chưa Xác Thực', 'Tài khoản của bạn chưa được xác thực', `verify-admin.php?code-verify=${dataResponse[2]}`, elmButtonVerify)
                    },2500)
                }
                if (dataResponse[3] !== '') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertLogin ('Không Tìm Thấy', 'Không tìm thấy nhân viên có mã ' + EmployeeIDLogin + '!', '', '')
                    },2500)
                }
                if (dataResponse[0] === '' && dataResponse[1] === '' && dataResponse[2] === '' && dataResponse[3] === '' && dataResponse[4] === 'login-success') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        window.location = './product-admin.php?menu=product'
                    },2500)
                }
            });
        } else {
            alertLogin ('Thiếu Thông Tin', 'Vui lòng nhập đầy đủ thông tin đăng nhập!', '', '')
        }
    })
})