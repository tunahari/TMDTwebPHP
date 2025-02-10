$(document).ready(function() {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box').hide()
    $($('.Input__NV__Info__Error').get(11)).css({marginLeft : '50px'})
    $($('.Input__NV__Info__Error').get(12)).css({marginLeft : '50px'})
    $($('.Input__NV__Info__Error').get(13)).css({marginLeft : '50px'})

    function handleValidate(condition, idInput) {
        condition ? $($('#' + idInput).parent().children().get(2)).removeClass('active') : $($('#' + idInput).parent().children().get(2)).addClass('active')
    }
    
    // Xử lý giới tính
    $('#Input_NV_GioiTinhNhanVien').keyup(function() {
        handleValidate($(this).val() === '1' || $(this).val() === '0', 'Input_NV_GioiTinhNhanVien')
    }) 
    $('#Input_NV_GioiTinhNhanVien').blur(function() {
        handleValidate($(this).val() === '1' || $(this).val() === '0', 'Input_NV_GioiTinhNhanVien')
    })

    // Xử lý chức vụ
    $('#Input_NV_ChucVuNhanVien').keyup(function() {
        handleValidate($(this).val() === '2' || $(this).val() === '1' || $(this).val() === '0', 'Input_NV_ChucVuNhanVien')
    }) 
    $('#Input_NV_ChucVuNhanVien').blur(function() {
        handleValidate($(this).val() === '2' || $(this).val() === '1' || $(this).val() === '0', 'Input_NV_ChucVuNhanVien')
    })

    // Xử lý họ tên
    $('#Input_NV_TenNhanVien').keyup(function() {
        handleValidate($(this).val() !== '', 'Input_NV_TenNhanVien')
    }) 
    $('#Input_NV_TenNhanVien').blur(function() {
        handleValidate($(this).val() !== '', 'Input_NV_TenNhanVien')
    }) 

    // Xử lý mã chi nhánh
    $('#Input_NV_MaChiNhanh').keyup(function() {
        handleValidate($(this).val() !== '', 'Input_NV_MaChiNhanh')
    }) 
    $('#Input_NV_MaChiNhanh').blur(function() {
        handleValidate($(this).val() !== '', 'Input_NV_MaChiNhanh')
    }) 

    // Xử lý số điện thoại
    $('#Input_NV_SoDienThoaiNhanVien').keyup(function() {
        handleValidate(ClassValidate.validatePhoneNumber($(this).val()), 'Input_NV_SoDienThoaiNhanVien')
    })
    $('#Input_NV_SoDienThoaiNhanVien').blur(function() {
        handleValidate(ClassValidate.validatePhoneNumber($(this).val()), 'Input_NV_SoDienThoaiNhanVien')
    })
    
    // Xử lý địa chỉ
    $('#Input_NV_DiaChiNhanVien').keyup(function() {
        handleValidate($(this).val() !== '', 'Input_NV_DiaChiNhanVien')
    })
    $('#Input_NV_DiaChiNhanVien').blur(function() {
        handleValidate($(this).val() !== '', 'Input_NV_DiaChiNhanVien')
    })

    // Xử lý email
    $('#Input_NV_EmailNhanVien').keyup(function() {
        handleValidate(ClassValidate.validateEmail($(this).val()), 'Input_NV_EmailNhanVien')
    })
    $('#Input_NV_EmailNhanVien').blur(function() {
        handleValidate(ClassValidate.validateEmail($(this).val()), 'Input_NV_EmailNhanVien')
    })

    // Xử lý ngày tháng
    $('#Input_NV_NgaySinhNhanVien').change(function() {
        handleValidate($(this).val() !== '', 'Input_NV_NgaySinhNhanVien')
    })
    $('#Input_NV_NgaySinhNhanVien').keyup(function() {
        handleValidate($(this).val() !== '', 'Input_NV_NgaySinhNhanVien')
    })

    /* Tạo thông báo */
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

    /* Cập nhật thông tin nhân viên */
    $('.Profile__Save__Info__Button').click(function() {
        var flagText = 0
        var flagNumber = 0
        var flagDate = 0
        var flagPhone = 0
        var flagEmail = 0

        handleValidate($('#Input_NV_TenNhanVien').val() !== '', 'Input_NV_TenNhanVien')
        if ($('#Input_NV_TenNhanVien').val() !== '') { flagText++ }
        handleValidate($('#Input_NV_DiaChiNhanVien').val() !== '', 'Input_NV_DiaChiNhanVien')
        if ($('#Input_NV_DiaChiNhanVien').val() !== '') { flagText++ }
        handleValidate($('#Input_NV_MaChiNhanh').val() !== '','Input_NV_MaChiNhanh')
        if($('#Input_NV_MaChiNhanh').val() !== '') { flagText++ }
        handleValidate(ClassValidate.validatePhoneNumber($('#Input_NV_SoDienThoaiNhanVien').val()),'Input_NV_SoDienThoaiNhanVien')
        if (ClassValidate.validatePhoneNumber($('#Input_NV_SoDienThoaiNhanVien').val())) { flagPhone++ }
        handleValidate(ClassValidate.validateEmail($('#Input_NV_EmailNhanVien').val()),'Input_NV_EmailNhanVien')
        if (ClassValidate.validateEmail($('#Input_NV_EmailNhanVien').val())) { flagEmail++ }
        handleValidate($('#Input_NV_NgaySinhNhanVien').val() !== '','Input_NV_NgaySinhNhanVien')
        if ($('#Input_NV_NgaySinhNhanVien').val() !== '') { flagDate++ }
        handleValidate($('#Input_NV_ChucVuNhanVien').val() === '2' || $('#Input_NV_ChucVuNhanVien').val() === '1' || 
        $('#Input_NV_ChucVuNhanVien').val() === '0' ,'Input_NV_ChucVuNhanVien')
        if ($('#Input_NV_ChucVuNhanVien').val() === '2' || $('#Input_NV_ChucVuNhanVien').val() === '1' || 
        $('#Input_NV_ChucVuNhanVien').val() === '0') { flagNumber++ }
        handleValidate($('#Input_NV_GioiTinhNhanVien').val() === '1' || $('#Input_NV_GioiTinhNhanVien').val() === '0','Input_NV_GioiTinhNhanVien')
        if ($('#Input_NV_GioiTinhNhanVien').val() === '1' || $('#Input_NV_GioiTinhNhanVien').val() === '0') { flagNumber++ }
        if (flagText === 3 && flagNumber === 2 && flagDate === 1 && flagPhone === 1 && flagEmail === 1) {
            var employeeInfo = {
                Input_NV_IDNhanVien: $('#Input_NV_IDNhanVien').val().trim(),
                Input_NV_TenNhanVien: $('#Input_NV_TenNhanVien').val().trim(),
                Input_NV_DiaChiNhanVien: $('#Input_NV_DiaChiNhanVien').val().trim(),
                Input_NV_MaChiNhanh: $('#Input_NV_MaChiNhanh').val().trim(),
                Input_NV_SoDienThoaiNhanVien: $('#Input_NV_SoDienThoaiNhanVien').val().trim(),
                Input_NV_EmailNhanVien: $('#Input_NV_EmailNhanVien').val().trim(),
                Input_NV_NgaySinhNhanVien: $('#Input_NV_NgaySinhNhanVien').val().trim(),
                Input_NV_ChucVuNhanVien: $('#Input_NV_ChucVuNhanVien').val().trim(),
                Input_NV_GioiTinhNhanVien: $('#Input_NV_GioiTinhNhanVien').val().trim(),
                Input_NV_GioiThieuNhanVien: $('#Input_NV_GioiThieuNhanVien').val().trim(),
                Input_NV_FacebookNhanVien: $('#Input_NV_FacebookNhanVien').val().trim(),
                Input_NV_TwitterNhanVien: $('#Input_NV_TwitterNhanVien').val().trim(),
                Input_NV_LinkedNhanVien: $('#Input_NV_LinkedNhanVien').val().trim()
            }
            ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.info-employee.php', 
            {
                updateEmployeeInfo: 'update-employee-info',
                employeeInfo: employeeInfo
            }).done(function(response){
                if (response.trim() === 'update-success') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertSuccess ('Cập nhật thông tin nhân viên thành công!')
                    },2500)
                    
                } else {
                    $('.loading__box').show()
                    dataResponse = JSON.parse(response)
                    if (dataResponse[0] !== '') {
                        setTimeout(function() {
                            $('.loading__box').hide()
                            alertFailed ('Số điện thoại đã được đăng ký!')
                        },2500)           
                    }
                    if (dataResponse[1] !== '') {
                        setTimeout(function() {
                            $('.loading__box').hide()
                            alertFailed ('Email đã được đăng ký!')
                        },2500)        
                    }
                    if (dataResponse[2] !== '') {
                        setTimeout(function() {
                            $('.loading__box').hide()
                            alertFailed ('Không đủ quyền hạn để thêm chức vụ này!')
                        },2500)  
                    }
                    if (dataResponse[3] !== '') {
                        setTimeout(function() {
                            $('.loading__box').hide()
                            alertFailed ('Giới tính không hợp lệ!')
                        },2500)  
                    }
                    if (dataResponse[4] !== '') {
                        setTimeout(function() {
                            $('.loading__box').hide()
                            alertFailed ('Mã chi nhánh không tồn tại')
                        },2500)  
                    }
                    if (dataResponse[5] !== '') {
                        setTimeout(function() {
                            $('.loading__box').hide()
                            alertFailed ('Đầu vào không hợp lệ!')
                        },2500)  
                    }
                    if (dataResponse[6] !== '') {
                        setTimeout(function() {
                            $('.loading__box').hide()
                            alertFailed ('Cập nhật thông tin nhân viên thất bại!')
                        },2500)  
                    }
                }
            });
        }
    })

    const handlingFunctions = new HandlingFunctions()
    $('#submitUpdateAvatarEmployee').hide()
    $('#image-preview').hide()
    function previewAvt (event) {
        $('#avtEmployeeDefault').hide()
        $('.Info__Input__Box__Content__Avatar__Update label').hide()
        $('#submitUpdateAvatarEmployee').show()
        $('#image-preview').show()
        handlingFunctions.previewFile (event, 'inputUpdateAvatarEmployee', 'previewAvtEmployeeImage')
    }

    $('#inputUpdateAvatarEmployee').change(function(event) {
        previewAvt (event)
    })

    $('#submitUpdateAvatarEmployee').click(function() {
        var dataResponse = handlingFunctions.getAjaxFile (`../../Controller/admin/controller-admin.info-employee.php?id-update=${$('#Input_NV_IDNhanVien').val().trim()}`, 
        $('#inputUpdateAvatarEmployee'), 'uploadAvtEmployee')
        if (dataResponse === 'update-file-success') {
            $('.loading__box').show()
            setTimeout(function() {
                $('.loading__box').hide()
                alertSuccess ('Cập nhật ảnh đại diện nhân viên thành công!')
            },2500)
        } else {
            $('.loading__box').show()
            setTimeout(function() {
                $('.loading__box').hide()
                alertFailed ('Cập nhật ảnh đại diện nhân viên thất bại!')
            },2500)  
        }
    })
})