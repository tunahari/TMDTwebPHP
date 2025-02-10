$(document).ready(function() {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box, .Branch__Info__Error').hide()
    $('.ChiNhanh__Input__Class').map(function() {
        $(this).keyup(function() {
            if ($(this).val() === '') {
                $($(this).parent().children().get(2)).show()
            } else {
                $($(this).parent().children().get(2)).hide()
            }
        })
    })
    $('#CN_HotLineChiNhanh__Input').keyup(function() {
        if (ClassValidate.validatePhoneNumber($(this).val())) {
            $($(this).parent().children().get(2)).hide()
        } else {
            $($(this).parent().children().get(2)).show()
        }
    })

    $('#CN_NgayThanhLapChiNhanh__Input').change(function() {
        if ($(this).val() !== '') {
            $($(this).parent().children().get(2)).hide()
        } else {
            $($(this).parent().children().get(2)).show()
        }
    })

    $('#CN_GhiChuChiNhanh__TextArea').keyup(function() {
        if ($(this).val() === '') {
            $($(this).parent().children().get(2)).show()
        } else {
            $($(this).parent().children().get(2)).hide()
        }
    })
    $('#CN_GhiChuChiNhanh__Save').click(function() {
        var flagText = 0
        var flagDate = 0
        var flagNumber = 0
        $('.ChiNhanh__Input__Class').map(function() {
            if ($(this).val() === '') {
                $($(this).parent().children().get(2)).show()
            } else {
                $($(this).parent().children().get(2)).hide()
                flagText++
                flagDate = 1
            }
        })
        if (ClassValidate.validatePhoneNumber($('#CN_HotLineChiNhanh__Input').val())) {
            $($('#CN_HotLineChiNhanh__Input').parent().children().get(2)).hide()
            flagNumber++
        } else {
            $($('#CN_HotLineChiNhanh__Input').parent().children().get(2)).show()
        }

        if ($('#CN_GhiChuChiNhanh__TextArea').val() === '' ) {
            $($(this).parent().children().get(2)).show()
        } else {
            $($(this).parent().children().get(2)).hide()
            flagText++
        }
        if (flagText === 13 && flagDate === 1 && flagNumber === 1) {
            ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.info-branch.php', 
            {
                updateInfoBranch: 'update-info-branch',
                branchID: $('#CN_IDChiNhanh__Input').val().trim().substring(2),
                branchName: $('#CN_TenChiNhanh__Input').val().trim(),
                branchAddress: $('#CN_DiaChiChiNhanh__Input').val().trim(),
                branchFounding: $('#CN_NgayThanhLapChiNhanh__Input').val().trim(),
                branchManagenmentID: $('#CN_IDQuanLyChiNhanh__Input').val().trim(),
                branchHotline: $('#CN_HotLineChiNhanh__Input').val().trim(), 
                branchNote: $('#CN_GhiChuChiNhanh__TextArea').val().trim()
            }
            ).done(function(response){
                response = response.trim()
                if (response === 'success') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertSuccess('Cập nhật thành công thông tin chi nhánh')
                    }, 2500)
                } else if (response === 'error-phone') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertFailed('Số điện thoại chi nhánh không hợp lệ')
                    }, 2500)
                } else if (response === 'error-founding') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertFailed('Ngày thành lập chi nhánh không hợp lệ')
                    }, 2500)
                } else if (response === 'error-idmanagenment') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertFailed('Mã nhân viên quản lý không tồn tại')
                    }, 2500)
                } else if (response === 'error-empty') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertFailed('Vui lòng nhập đầy đủ thông tin chi nhánh')
                    }, 2500)
                } else if (response === 'failed') {
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertFailed('Cập nhật thông tin chi nhánh thất bại')
                    }, 2500)
                }
            })
        } 
    })

    function alertSuccess(notify) {
        $('.alert__notify__box__success__right__content').text(notify)
        $('.alert__notify__box__success').addClass('active')
        setTimeout(function () {
            $('.alert__notify__box__success__progress').addClass('active')
        }, 500)
        setTimeout(function () {
            $('.alert__notify__box__success').removeClass('active')
            $('.alert__notify__box__success__progress').removeClass('active')
        }, 5000)
        $('.alert__notify__box__success__close').click(function () {
            $('.alert__notify__box__success').removeClass('active')
            setTimeout(function () {
                $('.alert__notify__box__success__progress').removeClass('active')
            }, 300)
        })
    }

    function alertFailed(notify) {
        $('.alert__notify__box__failed__right__content').text(notify)
        $('.alert__notify__box__failed').addClass('active')
        setTimeout(function () {
            $('.alert__notify__box__failed__progress').addClass('active')
        }, 500)
        setTimeout(function () {
            $('.alert__notify__box__failed').removeClass('active')
            $('.alert__notify__box__failed__progress').removeClass('active')
        }, 5000)
        $('.alert__notify__box__failed__close').click(function () {
            $('.alert__notify__box__failed').removeClass('active')
            setTimeout(function () {
                $('.alert__notify__box__failed__progress').removeClass('active')
            }, 300)
        })
    }
})