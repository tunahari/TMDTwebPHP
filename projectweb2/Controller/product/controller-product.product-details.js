$(document).ready(function () {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box, .loading__bg').hide()

    $('#increaseQuantity').click(function () {
        var quantityCart = $($(this).parent().parent().children().get(0)).val()
        quantityCart++
        $($(this).parent().parent().children().get(0)).val(quantityCart)
    })

    $('#decreaseQuantity').click(function () {
        var quantityCart = $($(this).parent().parent().children().get(0)).val()
        quantityCart < 2 ? quantityCart = 1 : quantityCart--
        $($(this).parent().parent().children().get(0)).val(quantityCart)
    })

    $('#quantityCart').keyup(function () {
        var quantityCart = $(this).val()
        if ($(this).val() < 1) { $(this).val(quantityCart) }
    })

    $('#addCart').click(function () {
        var quantityCart = $('#quantityCart').val()
        var idProduct = $(this).attr('data-productID')
        var idCustomer = $(this).attr('data-customerID')
        ClassFuction.getAjaxPost('../../Controller/product/controller-product.product.php',
            {
                addCartDetals: 'add-cart-details',
                idProductDetals: idProduct,
                idCustomerDetals: idCustomer,
                quantityCartDetals: quantityCart
            }
        ).done(function (response) {
            response = response.trim()
            console.log(response)
            if (response === 'success') {
                $('.loading__box, .loading__bg ').show()
                setTimeout(function () {
                    $('.loading__box, .loading__bg ').hide()
                    fetchQuantityCart()
                    alertSuccess('Thêm sản phẩm vào giỏ hàng thành công')
                }, 1000)
            } else if (response === 'errorInsert') {
                $('.loading__box, .loading__bg ').show()
                setTimeout(function () {
                    $('.loading__box, .loading__bg ').hide()
                    alertFailed('Thêm sản phẩm vào giỏ hàng thất bại')
                }, 1000)
            } else if (response === 'errorUpdate') {
                $('.loading__box, .loading__bg ').show()
                setTimeout(function () {
                    $('.loading__box, .loading__bg ').hide()
                    alertFailed('Thêm sản phẩm vào giỏ hàng thất bại')
                }, 1000)
            }
        });
    })

    /* Hiển thị số lượng sản phẩm trong giỏ */
    function fetchQuantityCart() {
        ClassFuction.getAjaxPost('../../Controller/product/controller-product.product.php',
            {
                fetchQuantityCart: 'fetch-quantity-cart',
            }
        ).done(function (response) {
            response = response.trim()
            $('.Product__Page__Header__Bottom__Cart__Quantity').html(response)
        })
    }

    fetchQuantityCart()

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