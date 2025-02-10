$(document).ready(function () {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box, .loading__bg ').hide()

    /* Hiển thị sản phẩm trong giỏ hàng */
    function fetchCart() {
        ClassFuction.getAjaxPost('../../Controller/product/controller-product.product.php',
            {
                fetchCart: 'fetch-cart',
            }
        ).done(function (response) {
            response = response.trim()
            $('.order-details').html(response)
        });
    }

    fetchCart()
    
    /* Hiển thị số lượng sản phẩm trong giỏ hàng */
    function fetchQuantityCart() {
        ClassFuction.getAjaxPost('../../Controller/product/controller-product.product.php',
            {
                fetchQuantityCart: 'fetch-quantity-cart',
            }
        ).done(function (response) {
            response = response.trim()
            $('.Product__Page__Header__Bottom__Cart__Quantity').html(response)
            if (response > 0) {
                $('.createBillBox').html('<div id="createBill">Đặt Hàng</div>');
                /* ================================== Tạo đơn hàng ================================== */
                $('#createBill').click(function () {
                    ClassFuction.getAjaxPost('../../Controller/product/controller-product.product.php',
                        {
                            createBill: 'create-bill',
                        }
                    ).done(function (response) {
                        response = response.trim()
                        var dataReponse = JSON.parse(response)
                        $('.loading__box, .loading__bg').show()
                        setTimeout(function() {
                            $('.loading__box, .loading__bg').hide()
                            $('.order-details').html(dataReponse[0])
                            $('#priceBill').html(dataReponse[1] + ' VND')
                            $('#priceSale').html(dataReponse[2] + ' VND')
                            $('#numberItem').html(dataReponse[3])
                            $('#numberProduct').html(dataReponse[4])
                            $('#totalPriceBill').html(dataReponse[5] + ' VND')
                            $('#fetchCheckout').html(dataReponse[7])
                            $('.summary-save').append(`<div id="saveBill">XÁC NHẬN ĐẶT HÀNG</div>`)
                            $('#createBill').hide()
                            $('.order-tittle h4').text('Danh Sách Sản Phẩm Đơn Hàng')
                            alertSuccess('Đã tạo thành công đơn hàng')
                            $('#saveBill').click(function () {
                                $('.loading__box, .loading__bg').show()
                                ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.order.php',
                                {
                                    saveBill: 'save-bill',
                                }
                                ).done(function (response) {
                                    response = response.trim()
                                    if (response !== 'failed') {
                                        setTimeout(function() {
                                            $('.loading__box, .loading__bg').hide()
                                            fetchCart()
                                            fetchQuantityCart()
                                            alertSuccess('Đặt hàng thành công')
                                            $('.order-details').html(dataReponse[0])
                                            $('#priceBill').html('0 VND')
                                            $('#priceSale').html('0 VND')
                                            $('#numberItem').html(0)
                                            $('#numberProduct').html(0)
                                            $('#totalPriceBill').html('0 VND')
                                            // $('#fetchCheckout').html(dataReponse[7])
                                            $('#saveBill').remove()
                                        })
                                    } else {
                                        $('.loading__box, .loading__bg').show()
                                        setTimeout(function() {
                                            $('.loading__box, .loading__bg').hide()
                                            fetchCart()
                                            fetchQuantityCart()
                                            alertFailed('Đặt hàng thất bại')
                                        },2000)
                                    }
                                })
                            })
                        },2000)
                    })
                })
                /* ================================== Tạo đơn hàng ================================== */
            } else {
                $('.createBillBox').html('');
            }
        })
    }

    fetchQuantityCart()

    /* Xóa sản phẩm trong giỏ hàng */
    $(document).on('click', '#deleteCart', function (e) {
        e.preventDefault()
        var idProduct = $(this).attr('value')
        ClassFuction.getAjaxPost('../../Controller/product/controller-product.product.php',
            {
                deleteCart: 'delete-cart',
                idProduct: idProduct
            }
        ).done(function (response) {
            response = response.trim()
            if (response === 'success') {
                $('.loading__box, .loading__bg ').show()
                setTimeout(function () {
                    $('.loading__box, .loading__bg ').hide()
                    fetchCart()
                    fetchQuantityCart()
                    alertSuccess('Xóa sản phẩm khỏi giỏ hàng thành công')
                }, 1000)
            } else if (response === 'failed') {
                $('.loading__box, .loading__bg ').show()
                setTimeout(function () {
                    $('.loading__box, .loading__bg ').hide()
                    fetchCart()
                    fetchQuantityCart()
                    alertFailed('Xóa sản phẩm khỏi giỏ hàng thất bại')
                }, 1000)
            }
        });
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

    function updateQuantityCart(quantityCart, idProduct) {
        ClassFuction.getAjaxPost('../../Controller/product/controller-product.product.php',
            {
                flagUpdateQuantity: 'update-quantity',
                quantityCart: quantityCart,
                idProduct: idProduct
            }
        ).done(function (response) {
            response = response.trim()
            console.log(response)
        })
    }

    $(document).on('click', '#increaseQuantityRight', function () {
        var quantityCart = $($(this).parent().parent().children().get(0)).val()
        var idProduct = $($(this).parent().parent().children().get(0)).attr('data-productID')
        quantityCart++
        $($(this).parent().parent().children().get(0)).val(quantityCart)
        updateQuantityCart(quantityCart, idProduct)
    })

    $(document).on('click', '#decreaseQuantityRight', function () {
        var quantityCart = $($(this).parent().parent().children().get(0)).val()
        var idProduct = $($(this).parent().parent().children().get(0)).attr('data-productID')
        quantityCart < 2 ? quantityCart = 1 : quantityCart--
        $($(this).parent().parent().children().get(0)).val(quantityCart)
        updateQuantityCart(quantityCart, idProduct)
    })

    $(document).on('keyup', '#quantityCartRight', function () {
        var quantityCart = $(this).val()
        var idProduct = $(this).attr('data-productID')
        if ($(this).val() < 1) { $(this).val(quantityCart) }
        updateQuantityCart(quantityCart, idProduct)
    })

    $(document).on('click', '#increaseQuantityLeft', function () {
        var quantityCart = $($(this).parent().parent().children().get(0)).val()
        var idProduct = $($(this).parent().parent().children().get(0)).attr('data-productID')
        quantityCart++
        $($(this).parent().parent().children().get(0)).val(quantityCart)
        updateQuantityCart(quantityCart, idProduct)
    })

    $(document).on('click', '#decreaseQuantityLeft', function () {
        var quantityCart = $($(this).parent().parent().children().get(0)).val()
        var idProduct = $($(this).parent().parent().children().get(0)).attr('data-productID')
        quantityCart < 2 ? quantityCart = 1 : quantityCart--
        $($(this).parent().parent().children().get(0)).val(quantityCart)
        updateQuantityCart(quantityCart, idProduct)
    })

    $(document).on('keyup', '#quantityCartLeft', function () {
        var quantityCart = $(this).val()
        var idProduct = $(this).attr('data-productID')
        if ($(this).val() < 1) { $(this).val(quantityCart) }
        updateQuantityCart(quantityCart, idProduct)
    })
})
