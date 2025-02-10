$(document).ready(function () {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box, .loading__bg, .Profile__Input__Error, #saveAvatar').hide()

    /* ======================= Xử lý cập nhật hồ sơ người dùng ======================= */
    function checkInput (elmInput, functionName) {
        if (functionName === 'validateUserName') {
            elmInput.val().trim().length > 4 ? $(elmInput.parent().children().get(2)).hide() : $(elmInput.parent().children().get(2)).show()
        } else if (functionName === 'validateEmail') {
            ClassValidate.validateEmail(elmInput.val().trim()) ? $(elmInput.parent().children().get(2)).hide(): $(elmInput.parent().children().get(2)).show()
        } else if (functionName === 'validateAddress') {
            elmInput.val().trim().length > 4 ? $(elmInput.parent().children().get(2)).hide(): $(elmInput.parent().children().get(2)).show()
        } else if (functionName === 'validatePhone') {
            ClassValidate.validatePhoneNumber(elmInput.val().trim()) ? $(elmInput.parent().children().get(2)).hide(): $(elmInput.parent().children().get(2)).show()
        }
    }

    $('#profileName').keyup(function () {checkInput($('#profileName'), 'validateUserName')})
    $('#profilePhone').keyup(function () {checkInput($('#profilePhone'), 'validatePhone')})
    $('#profileAddress').keyup(function () {checkInput($('#profileAddress'), 'validateAddress')})
    $('#profileEmail').keyup(function () {checkInput($('#profileEmail'), 'validateEmail')})

    $('#profileName').blur(function () {checkInput($('#profileName'), 'validateUserName')})
    $('#profilePhone').blur(function () {checkInput($('#profilePhone'), 'validatePhone')})
    $('#profileAddress').blur(function () {checkInput($('#profileAddress'), 'validateAddress')})
    $('#profileEmail').blur(function () {checkInput($('#profileEmail'), 'validateEmail')})

    $('#submitProfile').click(function () {
        var flagName = false
        var flagEmail = false
        var flagPhone = false
        var flagAddress = false
        $('#profileName').val().trim().length > 4 ? flagName = true : flagName = false
        ClassValidate.validateEmail($('#profileEmail').val().trim()) ? flagEmail = true : flagEmail = false
        $('#profileAddress').val().trim().length > 4 ? flagAddress = true : flagAddress = false
        ClassValidate.validatePhoneNumber($('#profilePhone').val().trim()) ? flagPhone = true : flagPhone = false
        
        if (flagName === true && flagEmail === true && flagPhone === true && flagAddress === true) {
            ClassFuction.getAjaxPost('../../Controller/product/controller-product.profile.php', 
            {
                profileFlag: 'profile', 
                profileName: $('#profileName').val().trim(),
                profileEmail: $('#profileEmail').val().trim(),
                profilePhone: $('#profilePhone').val().trim(),
                profileAddress: $('#profileAddress').val().trim(),
                profileID: $('#submitProfile').attr('value'),
            }
            ).done(function(response){
                response = response.trim()
                if (response === 'success') {
                    handleAlert ('success')
                } else if (response === 'failed') {
                    handleAlert ('failed')
                } else if (response === 'profileName') {
                    handleAlert ('profileName')
                } else if (response === 'profileEmail') {
                    handleAlert ('profileEmail')
                } else if (response === 'profilePhone') {
                    handleAlert ('profilePhone')
                } else if (response === 'profileAddress') {
                    handleAlert ('profileAddress')
                } 
            })
        } else {
            handleAlert ('emptyField')
        }
    })


    /* ======================= Xử lý đổi mật khẩu người dùng ======================= */

    function checkPass (elmInput, functionName, elmInputPass) {
        if (functionName === 'validatePassword') {
            ClassValidate.validatePassword(elmInput.val().trim()) ? $(elmInput.parent().children().get(2)).hide(): $(elmInput.parent().children().get(2)).show()
        } else if (functionName === 'checkAccuratePassword') {
            ClassValidate.checkAccuratePassword(elmInput.val().trim(), elmInputPass.val().trim()) ? $(elmInput.parent().children().get(2)).hide(): $(elmInput.parent().children().get(2)).show()
        } 
    }

    $('#profileNewPassword').keyup(function () {checkPass($('#profileNewPassword'), 'validatePassword', $('#profileNewPassword'))})
    $('#profileCFNewPassword').keyup(function () {checkPass($('#profileCFNewPassword'), 'checkAccuratePassword', $('#profileNewPassword'))})
    $('#profileNewPassword').blur(function () {checkPass($('#profileNewPassword'), 'validatePassword', $('#profileNewPassword'))})
    $('#profileCFNewPassword').blur(function () {checkPass($('#profileCFNewPassword'), 'checkAccuratePassword', $('#profileNewPassword'))})


    $('#submitPass').click(function () {
        var flagOldPass = false
        var flagNewPass = false
        var flagCFNewPass = false
        $('#profileName').val().trim().length > 0 ? flagOldPass = true : flagOldPass = false
        ClassValidate.validatePassword($('#profileNewPassword').val().trim()) ? flagNewPass = true : flagNewPass = false
        ClassValidate.checkAccuratePassword($('#profileNewPassword').val().trim(), $('#profileCFNewPassword').val().trim()) ? flagCFNewPass = true : flagCFNewPass = false
        
        if (flagOldPass === true && flagNewPass === true && flagCFNewPass === true) {
            ClassFuction.getAjaxPost('../../Controller/product/controller-product.profile.php', 
            {
                passFlag: 'pass', 
                passOld: $('#profileOldPassword').val().trim(),
                passNew: $('#profileNewPassword').val().trim(),
                passID: $('#submitPass').attr('value'),
            }
            ).done(function(response){
                response = response.trim()
                if (response === 'successPass') {
                    handleAlert ('successPass')
                } else if (response === 'failedPass') {
                    handleAlert ('failedPass')
                } else if (response === 'errorOldPass') {
                    handleAlert ('errorOldPass')
                } else if (response === 'errorNewPass') {
                    handleAlert ('errorNewPass')
                }
            })
        } else {
            handleAlert ('emptyField')
        }
    })

    /* ======================= Xử lý cập nhật ảnh đại diện người dùng  ======================= */
    $('#inputUpdateAvt').hide()
    function previewImage (event, imageID, submitID, inputFileID, previewID) {
        $('#' + imageID).hide()
        $('#' + submitID).show()
        $('.Profile__Panel__Item__Profile__Left__Avt svg').hide()
        ClassFuction.previewFile (event, inputFileID, previewID)
    }

    var fileData; 
    $('#inputUpdateAvt').change(function(event) {
        previewImage (event, 'previewAvtImage', 'saveAvatar', 'inputUpdateAvt', 'previewAvtBox')
        fileData = $(this).prop('files')[0]
    })

    $('#saveAvatar').click(function() {
        var formData = new FormData()                
        formData.append('updateAvtProfile' , fileData)
        var fileResponse = '';
        if (fileData !== undefined) {
            $.ajax({
                url: `../../Controller/product/controller-product.profile.php?id-update=${$(this).attr('value')}`,
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: formData,                    
                type: 'POST',
                async: false,
                success: function(response){
                    fileResponse = response.trim()
                }
            })
        }  
        if (fileResponse !== 'update-file-failed') {
            $('.loading__box, .loading__bg, #saveAvatar').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg, #saveAvatar').hide()
                alertSuccess ('Cập nhật ảnh đại diện thành công')
                $('#previewAvtImage').attr('src','../../Controller/product/' + fileResponse)
            },2500)
        } else {
            $('.loading__box').show()
            setTimeout(function() {
                $('.loading__box').hide()
                alertFailed ('Cập nhật ảnh đại diện thất bại')
            },2500)  
        }
    })

    /* ======================= Xử lý lấy đơn hàng đã mua  ======================= */
    function fetchAllBill () {
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.order.php', 
        {
            fetchBill : 'fetch-bill'
        }
        ).done(function(response){
            response = response.trim()
            // console.log(response)
            $('.Profile__Panel__Item__Bill__Left').html(response)
        })
    }
    fetchAllBill ()
    
    /* ======================= Xử lý hủy đơn hàng đã đặt  ======================= */
    $(document).on('click', '#CancelBill', function () {
        var cancelBillID = $(this).attr('value')
        if (cancelBillID !== '') {
            ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.order.php', 
            {
                cancelBill : 'cancel-bill',
                cancelBillID : cancelBillID
            }
            ).done(function(response){
                response = response.trim()
                if (response === 'success') {
                    $('.loading__box, .loading__bg').show()
                    setTimeout(function() {
                        $('.loading__box, .loading__bg').hide()
                        alertSuccess ('Hủy đơn hàng HD' + cancelBillID + ' thành công')
                        fetchAllBill ()
                    },2500)
                } else if (response === 'failed') {
                    $('.loading__box, .loading__bg').show()
                    setTimeout(function() {
                        $('.loading__box, .loading__bg').hide()
                        alertFailed ('Hủy đơn hàng HD' + cancelBillID + ' thất bại')
                        fetchAllBill ()
                    },2500)
                }
            })
        } else {

        }
    })

    /* ======================= Tạo thông báo ======================= */

    function handleAlert (notify) {
        if (notify === 'success') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertSuccess ('Đã cập nhật hồ sơ của bạn thành công')
            },2500)
        } else if (notify === 'failed') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Cập nhật hồ sơ của bạn thất bại')
            },2500)
        } else if (notify === 'profileName') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Tên người dùng không hợp lệ')
            },2500)
        } else if (notify === 'profileEmail') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Email không hợp lệ hoặc bị trùng')
            },2500)
        } else if (notify === 'profilePhone') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Số điện thoại không hợp lệ hoặc bị trùng')
            },2500)
            
        } else if (notify === 'profileAddress') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Địa chỉ không hợp lệ')
            },2500)
            
        } else if (notify === 'successPass') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertSuccess ('Đổi mật khẩu thành công')
            },2500)
            
        } else if (notify === 'failedPass') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Đổi mật khẩu thất bại')
            },2500)
            
        } else if (notify === 'errorOldPass') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Mật khẩu cũ không đúng')
            },2500)
            
        } else if (notify === 'errorNewPass') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Mật khẩu mới không hợp lệ hoặc giống với mật khẩu cũ')
            },2500)
            
        } else if (notify === 'emptyField') {
            $('.loading__box, .loading__bg').show()
            setTimeout(function() {
                $('.loading__box, .loading__bg').hide()
                alertFailed ('Vui lòng điền đầy đủ thông tin')
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
