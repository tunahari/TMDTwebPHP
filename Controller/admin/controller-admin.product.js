$(document).ready(function() {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box').hide()

    // Lấy ra các sản phẩm
    function fetchProduct (fetchProduct, limitProduct, pageProduct, queryProduct, sortIDProduct, sortDateProduct, sortPriceProduct) {
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.product.php', 
        {
            fetchProduct: fetchProduct,
            limitProduct: limitProduct,
            pageProduct: pageProduct,
            queryProduct: queryProduct,
            sortIDProduct: sortIDProduct,
            sortDateProduct: sortDateProduct,
            sortPriceProduct: sortPriceProduct
        }
        ).done(function(response){
            var dataResponse = JSON.parse(response)
            if (dataResponse[1] !== null) {
                dataResponse[0].length !== 444 ? $('.pagination__product').html(dataResponse[0]) : $('.pagination__product').html('')
                $('.table__product__tbody').html(dataResponse[1])
            } else {
                $('.table__product__tbody').html(
                    `<tr class="product__data__not__found__tr">
                         <td colspan="6" class="product__data__not__found__tr__td">
                            <div class="product__data__not__found">
                                Không tìm thấy sản phẩm phù hợp, vui lòng thử lại!
                            </div>
                         </td>
                    </tr>`
                )
                $('.pagination__product').html('')
            }
        });
    }

    /* Mặc định khi hiển thị */
    fetchProduct ('fetch-product', '5', '1', '', 'DESC', 'ASC', 'ASC')

    /* Xử lý chọn số item hiển thị một trang */
    $('body').on('mouseup', function() {
        $('.select__product__option__box').removeClass('active')
    });
    $($('.select__product__option').get(0)).unbind('click')
    $('.select__product__option__selected').click(function() {
        $('.select__product__option__box').toggleClass('active')
    })
    $('.select__product__option').click(function() {
        var limitProduct = $(this).html().trim()
        var pageProduct = $('.pagination__product__item.active').attr('value')
        var queryProduct = $('#search__product__input').val().trim()
        var sortIDProduct = $('#sort__product__id').attr('value').trim()
        var sortDateProduct = $('#sort__product__date').attr('value').trim()
        var sortPriceProduct =  $('#sort__product__price').attr('value').trim()
        fetchProduct ('fetch-product', limitProduct, pageProduct, queryProduct, sortIDProduct, sortDateProduct, sortPriceProduct)
        $('.select__product__option__selected').html(limitProduct)
        $('.select__product__option__box').removeClass('active')
    })

    /* Xử lý bấm nút phân trang */
    $(document).on('click', '.pagination__product__item', function() {
        var limitProduct = $('.select__product__option__selected').text().trim()
        var pageProduct = $(this).attr('value')
        var queryProduct = $('#search__product__input').val().trim()
        var sortIDProduct = $('#sort__product__id').attr('value').trim()
        var sortDateProduct = $('#sort__product__date').attr('value').trim()
        var sortPriceProduct = $('#sort__product__price').attr('value').trim()
        fetchProduct ('fetch-product', limitProduct, pageProduct, queryProduct, sortIDProduct, sortDateProduct, sortPriceProduct)
    })

    /* Xử lý tìm kiếm */
    $('#search__product__input').keyup(function () {
        var limitProduct = $('.select__product__option__selected').text().trim()
        var pageProduct = $('.pagination__product__item').attr('value')
        var queryProduct = $(this).val().trim()
        var sortIDProduct = $('#sort__product__id').attr('value').trim()
        var sortDateProduct = $('#sort__product__date').attr('value').trim()
        var sortPriceProduct = $('#sort__product__price').attr('value').trim()
        fetchProduct ('fetch-product', limitProduct, pageProduct, queryProduct, sortIDProduct, sortDateProduct, sortPriceProduct)
    })

    /* Xử lý sắp xếp theo ID */
    $('#sort__product__id').click(function() {
        var limitProduct = $('.select__product__option__selected').text().trim()
        var pageProduct = $('.pagination__product__item').attr('value')
        var queryProduct = $('#search__product__input').val().trim()
        var sortDateProduct = '';
        var sortPriceProduct = '';
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__product__id').attr('value', 'DESC') : $('#sort__product__id').attr('value', 'ASC')
        }
        $('#sort__product__date').attr('value', '')
        $('#sort__product__price').attr('value', '')
        var sortIDProduct = $(this).attr('value')
        fetchProduct ('fetch-product', limitProduct, pageProduct, queryProduct, sortIDProduct, sortDateProduct, sortPriceProduct)
    })

    /* Xử lý sắp xếp theo ngày tạo */
    $('#sort__product__date').click(function() {
        var limitProduct = $('.select__product__option__selected').text().trim()
        var pageProduct = $('.pagination__product__item').attr('value')
        var queryProduct = $('#search__product__input').val().trim()
        var sortIDProduct = '';
        var sortPriceProduct = '';
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__product__date').attr('value', 'DESC') : $('#sort__product__date').attr('value', 'ASC')
        }
        $('#sort__product__id').attr('value', '')
        $('#sort__product__price').attr('value', '')
        sortDateProduct = $(this).attr('value')
        fetchProduct ('fetch-product', limitProduct, pageProduct, queryProduct, sortIDProduct, sortDateProduct, sortPriceProduct)
    })

    /* Xử lý sắp xếp theo giá bán */
    $('#sort__product__price').click(function() {
        var limitProduct = $('.select__product__option__selected').text().trim()
        var pageProduct = $('.pagination__product__item').attr('value')
        var queryProduct = $('#search__product__input').val().trim()
        var sortIDProduct = '';
        var sortDateProduct = '';
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__product__price').attr('value', 'DESC') : $('#sort__product__price').attr('value', 'ASC')
        }
        $('#sort__product__date').attr('value', '')
        $('#sort__product__id').attr('value', '')
        sortPriceProduct = $(this).attr('value')
        fetchProduct ('fetch-product', limitProduct, pageProduct, queryProduct, sortIDProduct, sortDateProduct, sortPriceProduct)
    })

    // /* Tạo thông báo */
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
    
    /* Tạo mới một sản phẩm */
    $('.Chat__Left__Create__Product').click(function() {
        var limitProduct =$('.select__product__option__selected').text().trim()
        var pageProduct = $('.pagination__product__item.active').attr('value')
        var queryProduct = $('#search__product__input').val().trim()
        var sortIDProduct = $('#sort__product__id').attr('value').trim()
        var sortDateProduct = $('#sort__product__date').attr('value').trim()
        var sortPriceProduct =  $('#sort__product__price').attr('value').trim()
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.product.php', {createProduct: 'create-product'}).done(function(response){
            response = response.trim()
            if (response !== '' && response === 'create-success') {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    fetchProduct ('fetch-product', limitProduct, pageProduct, queryProduct, sortIDProduct, sortDateProduct, sortPriceProduct)
                    alertSuccess ('Thêm mới sản phẩm thành công!')
                },2500)
            } else {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    alertFailed ('Thêm mới sản phẩm thất bại!')
                },2500)
            }
        })
    })

    // /* Xóa bớt một chi nhánh */
    $(document).on('click', '.product__action__delete__button', function(e) {
        var limitProduct =$('.select__product__option__selected').text().trim()
        var pageProduct = $('.pagination__product__item.active').attr('value')
        var queryProduct = $('#search__product__input').val().trim()
        var sortIDProduct = $('#sort__product__id').attr('value').trim()
        var sortDateProduct = $('#sort__product__date').attr('value').trim()
        var sortPriceProduct =  $('#sort__product__price').attr('value').trim()
        e.preventDefault()
        $('.alert__delete__product').addClass('active')  
        $('.alert__delete__product__delete').attr('value', $(this).attr('value'))
        $('.alert__delete__product__delete').click(function() {
            var idProductDelete = $(this).attr('value') 
            ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.product.php', {
                deleteProduct: 'delete-product',
                idProductDelete: idProductDelete
                // ==================================================================================
            }).done(function(response){
                response = response.trim()
                if (response !== '' && response === 'delete-success') {
                    $('.alert__delete__product').removeClass('active')  
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        fetchProduct ('fetch-product', limitProduct, pageProduct, queryProduct, sortIDProduct, sortDateProduct, sortPriceProduct)
                        alertSuccess ('Xóa sản phẩm SP' + idProductDelete + ' thành công!')
                    },2500)
                } else {
                    $('.alert__delete__product').removeClass('active')  
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertFailed ('Xóa sản phẩm' + idProductDelete + ' thất bại!')
                    },2500)
                }
            })
        })
    })
    $('.alert__delete__product__cancel').click(function() {
        $('.alert__delete__product').removeClass('active')  
    })
})