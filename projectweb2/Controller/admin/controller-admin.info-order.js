$(document).ready(function() {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box').hide()

    /* =================================== Fetch nút thao tác đơn hàng =================================== */
    function fetchBtnOrder () {
        var idOrder = $('#MaDonHang').val().substr(2)
        var idCustomer = $('#MaKhachHang').val().substr(2)
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.info-order.php', 
        {
            fetchBtn : 'fetch-btn',
            idOrder: idOrder,
            idCustomer: idCustomer,
        }
        ).done(function(response){
            response = response.trim()
            var dataResponse = JSON.parse(response)
            $('#TrangThai').val(dataResponse[0])
            $('.Setup__Button__Group').html(dataResponse[1] + dataResponse[2] + dataResponse[3])
        })
    }
    fetchBtnOrder ();


    /* =================================== Xủ lý duyệt đơn hàng =================================== */
    $(document).on('click', '#BtnHandled', function () {
        var idOrder = $(this).attr('data-orderID')
        var idCustomer = $(this).attr('data-customerID')
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.info-order.php', 
        {
            handledOrder : 'handle-order',
            idOrder: idOrder,
            idCustomer: idCustomer,
        }
        ).done(function(response){
            response = response.trim()
            if (response === 'success') {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    alertSuccess('Xử lý đơn hàng thành công')
                    fetchBtnOrder ();
                },2000)
            } else if (response === 'failed') {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    alertFailed('Xử lý đơn hàng thất bại')
                    fetchBtnOrder ();
                },2000)
            } else if (response === 'error-quantity') {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    alertFailed('Số lượng sản phẩm không đủ để đáp ứng hóa đơn')
                    fetchBtnOrder ();
                },2000)
            }
        })
    })

    /* =================================== Xủ lý hủy đơn hàng =================================== */
    $(document).on('click', '#BtnCancel', function () {
        var idOrder = $(this).attr('data-orderID')
        var idCustomer = $(this).attr('data-customerID')
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.info-order.php', 
        {
            handledCancel : 'handle-cancel',
            idOrder: idOrder,
            idCustomer: idCustomer,
        }
        ).done(function(response){
            response = response.trim()
            if (response === 'success') {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    alertSuccess('Hủy đơn hàng thành công')
                    fetchBtnOrder ();
                },2000)
            } else if (response === 'failed') {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    alertFailed('Hủy đơn hàng thất bại')
                    fetchBtnOrder ();
                },2000)
            }
        })
    })

    /* =================================== Xủ lý xác nhận đơn hàng =================================== */
    $(document).on('click', '#BtnCheck', function () {
        var idOrder = $(this).attr('data-orderID')
        var idCustomer = $(this).attr('data-customerID')
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.info-order.php', 
        {
            handledCheck : 'handle-check',
            idOrder: idOrder,
            idCustomer: idCustomer,
        }
        ).done(function(response){
            response = response.trim()
            if (response === 'success') {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    alertSuccess('Xác nhận đơn hàng thành công')
                    fetchBtnOrder ();
                },2000)
            } else if (response === 'failed') {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    alertFailed('Xác nhận đơn hàng thất bại')
                    fetchBtnOrder ();
                },2000)
            }
        })
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
})