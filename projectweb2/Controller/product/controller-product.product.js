$(document).ready(function () {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box, .loading__bg ').hide()
    // Lấy ra các sản phẩm
    var limitDefault = '9'
    function fetchProduct(fetchProduct, limitProduct, pageProduct, queryProduct) {
        ClassFuction.getAjaxPost('../../Controller/product/controller-product.product.php',
            {
                fetchProduct: fetchProduct,
                limitProduct: limitProduct,
                pageProduct: pageProduct,
                queryProduct: queryProduct,
            }
        ).done(function (response) {
            // console.log(response)
            var dataResponse = JSON.parse(response)
            if (dataResponse[1] !== null) {
                dataResponse[0].length !== 504 ? $('.Product__Page__Content__Right__Product__Paging').html(dataResponse[0]) : $('.Product__Page__Content__Right__Product__Paging').html('')
                $('.Product__Page__Content__Right__Product__Panel').html(dataResponse[1])
            } else {
                $('.Product__Page__Content__Right__Product__Panel').html(
                    `<div class="product__data__not__found">
                            Không tìm thấy sản phẩm phù hợp, vui lòng thử lại!
                        </div>`
                )
                $('.Product__Page__Content__Right__Product__Paging').html('')
            }
        });
    }

    /* Mặc định khi hiển thị */
    fetchProduct(
        'fetch-product', limitDefault, '1',
        {
            filterName: '',
            filterCate: '',
            filterPriceMin: '0',
            filterPriceMax: '100000000',
            filterRam: '',
            filterRom: '',
            filterBattery: '',
            filterCamera: '',
            filterBranch: '',
            filterSortPrice: '',
        }
    )

    /* Xử lý bấm nút phân trang */
    $(document).on('click', '.Product__Page__Content__Right__Product__Paging__Item', function () {
        var pageProduct = $(this).attr('value')
        var filterName = $('#FilterName').val().trim()
        var filterPriceMin = $('#filterPriceMin').val().trim()
        var filterPriceMax = $('#filterPriceMax').val().trim()
        var filterCate = $('.Product__Page__Content__Left__Filter__Cate__Item.active').attr('value')
        var filterRam = $('.Product__Page__Content__Left__Filter__Ram__Item.active').attr('value')
        var filterRom = $('.Product__Page__Content__Left__Filter__Rom__Item.active').attr('value')
        var filterBattery = $('.Product__Page__Content__Left__Filter__Pin__Item.active').attr('value')
        var filterCamera = $('.Product__Page__Content__Left__Filter__Camera__Item.active').attr('value')
        var filterBranch = $('.Product__Page__Content__Left__Filter__Branch__Item.active').attr('value')
        var filterSortPrice = $('.Product__Page__Content__Left__Filter__SortPrice__Item.active').attr('value')
        filterCate !== undefined ? filterCate = filterCate : filterCate = ''
        filterRam !== undefined ? filterRam = filterRam : filterRam = ''
        filterRom !== undefined ? filterRom = filterRom : filterRom = ''
        filterBattery !== undefined ? filterBattery = filterBattery : filterBattery = ''
        filterCamera !== undefined ? filterCamera = filterCamera : filterCamera = ''
        filterBranch !== undefined ? filterBranch = filterBranch : filterBranch = ''
        filterSortPrice !== undefined ? filterSortPrice = filterSortPrice : filterSortPrice = ''
        var queryProduct = {
            filterName: filterName,
            filterCate: filterCate,
            filterPriceMin: filterPriceMin,
            filterPriceMax: filterPriceMax,
            filterRam: filterRam,
            filterRom: filterRom,
            filterBattery: filterBattery,
            filterCamera: filterCamera,
            filterBranch: filterBranch,
            filterSortPrice: filterSortPrice
        }
        $('.loading__box, .loading__bg ').show()
        setTimeout(function () {
            $('.loading__box, .loading__bg ').hide()
            fetchProduct('fetch-product', limitDefault, pageProduct, queryProduct)
            $("html, body").animate({ scrollTop: 800 }, 500);
        }, 2000)
    })

    /* Xử lý tìm kiếm */
    $('.Product__Page__Header__Bottom__Search__Button').click(function () {
        var pageProduct = $('.Product__Page__Content__Right__Product__Paging__Item').attr('value')
        var filterName = $('#FilterName').val().trim()
        var filterPriceMin = $('#filterPriceMin').val().trim()
        var filterPriceMax = $('#filterPriceMax').val().trim()
        var filterCate = $('.Product__Page__Content__Left__Filter__Cate__Item.active').attr('value')
        var filterRam = $('.Product__Page__Content__Left__Filter__Ram__Item.active').attr('value')
        var filterRom = $('.Product__Page__Content__Left__Filter__Rom__Item.active').attr('value')
        var filterBattery = $('.Product__Page__Content__Left__Filter__Pin__Item.active').attr('value')
        var filterCamera = $('.Product__Page__Content__Left__Filter__Camera__Item.active').attr('value')
        var filterBranch = $('.Product__Page__Content__Left__Filter__Branch__Item.active').attr('value')
        var filterSortPrice = $('.Product__Page__Content__Left__Filter__SortPrice__Item.active').attr('value')
        filterCate !== undefined ? filterCate = filterCate : filterCate = ''
        filterRam !== undefined ? filterRam = filterRam : filterRam = ''
        filterRom !== undefined ? filterRom = filterRom : filterRom = ''
        filterBattery !== undefined ? filterBattery = filterBattery : filterBattery = ''
        filterCamera !== undefined ? filterCamera = filterCamera : filterCamera = ''
        filterBranch !== undefined ? filterBranch = filterBranch : filterBranch = ''
        filterSortPrice !== undefined ? filterSortPrice = filterSortPrice : filterSortPrice = ''
        var queryProduct = {
            filterName: filterName,
            filterCate: filterCate,
            filterPriceMin: filterPriceMin,
            filterPriceMax: filterPriceMax,
            filterRam: filterRam,
            filterRom: filterRom,
            filterBattery: filterBattery,
            filterCamera: filterCamera,
            filterBranch: filterBranch,
            filterSortPrice: filterSortPrice
        }
        $('.loading__box, .loading__bg ').show()
        setTimeout(function () {
            $('.loading__box, .loading__bg ').hide()
            fetchProduct('fetch-product', limitDefault, pageProduct, queryProduct)
            $("html, body").animate({ scrollTop: 800 }, 500);
        }, 2000)
    })

    /* Xử lý lọc sản phẩm */
    $('.Product__Page__Content__Left__Filter__Apply').click(function () {
        var pageProduct = $('.Product__Page__Content__Right__Product__Paging__Item').attr('value')
        var filterName = $('#FilterName').val().trim()
        var filterPriceMin = $('#filterPriceMin').val().trim()
        var filterPriceMax = $('#filterPriceMax').val().trim()
        var filterCate = $('.Product__Page__Content__Left__Filter__Cate__Item.active').attr('value')
        var filterRam = $('.Product__Page__Content__Left__Filter__Ram__Item.active').attr('value')
        var filterRom = $('.Product__Page__Content__Left__Filter__Rom__Item.active').attr('value')
        var filterBattery = $('.Product__Page__Content__Left__Filter__Pin__Item.active').attr('value')
        var filterCamera = $('.Product__Page__Content__Left__Filter__Camera__Item.active').attr('value')
        var filterBranch = $('.Product__Page__Content__Left__Filter__Branch__Item.active').attr('value')
        var filterSortPrice = $('.Product__Page__Content__Left__Filter__SortPrice__Item.active').attr('value')
        filterCate !== undefined ? filterCate = filterCate : filterCate = ''
        filterRam !== undefined ? filterRam = filterRam : filterRam = ''
        filterRom !== undefined ? filterRom = filterRom : filterRom = ''
        filterBattery !== undefined ? filterBattery = filterBattery : filterBattery = ''
        filterCamera !== undefined ? filterCamera = filterCamera : filterCamera = ''
        filterBranch !== undefined ? filterBranch = filterBranch : filterBranch = ''
        filterSortPrice !== undefined ? filterSortPrice = filterSortPrice : filterSortPrice = ''

        var queryProduct = {
            filterName: filterName,
            filterCate: filterCate,
            filterPriceMin: filterPriceMin,
            filterPriceMax: filterPriceMax,
            filterRam: filterRam,
            filterRom: filterRom,
            filterBattery: filterBattery,
            filterCamera: filterCamera,
            filterBranch: filterBranch,
            filterSortPrice: filterSortPrice
        }
        $('.loading__box, .loading__bg ').show()
        setTimeout(function () {
            $('.loading__box, .loading__bg ').hide()
            fetchProduct('fetch-product', limitDefault, pageProduct, queryProduct)
            $("html, body").animate({ scrollTop: 800 }, 500);
        }, 2000)
    })


    /* Xử lý hiệu ứng click */
    $('.Product__Page__Content__Left__Filter__Cate__Item').click(function () {
        $('.Product__Page__Content__Left__Filter__Cate__Item').map(function () {
            $(this).removeClass('active')
        })
        $(this).addClass('active')
    })

    $('.Product__Page__Content__Left__Filter__Ram__Item').click(function () {
        $('.Product__Page__Content__Left__Filter__Ram__Item').map(function () {
            $(this).removeClass('active')
        })
        $(this).addClass('active')
    })

    $('.Product__Page__Content__Left__Filter__Rom__Item').click(function () {
        $('.Product__Page__Content__Left__Filter__Rom__Item').map(function () {
            $(this).removeClass('active')
        })
        $(this).addClass('active')
    })

    $('.Product__Page__Content__Left__Filter__Pin__Item').click(function () {
        $('.Product__Page__Content__Left__Filter__Pin__Item').map(function () {
            $(this).removeClass('active')
        })
        $(this).addClass('active')
    })

    $('.Product__Page__Content__Left__Filter__Camera__Item').click(function () {
        $('.Product__Page__Content__Left__Filter__Camera__Item').map(function () {
            $(this).removeClass('active')
        })
        $(this).addClass('active')
    })

    $('.Product__Page__Content__Left__Filter__Branch__Item').click(function () {
        $('.Product__Page__Content__Left__Filter__Branch__Item').map(function () {
            $(this).removeClass('active')
        })
        $(this).addClass('active')
    })

    $('.Product__Page__Content__Left__Filter__SortPrice__Item').click(function () {
        $('.Product__Page__Content__Left__Filter__SortPrice__Item').map(function () {
            $(this).removeClass('active')
        })
        $(this).addClass('active')
    })


    /* Xử lý reset filter */
    $('.Product__Page__Content__Left__Filter__Reset').click(function () {
        location.reload()
    })

    /* Xử lý thêm giỏ hàng */
    $(document).on('click', '#addCartProduct', function (e) {
        e.preventDefault()
        var idProduct = $(this).attr('value')
        var idCustomer = $(this).attr('data-customerID')
        if ($(this).attr('value') !== '') {
            ClassFuction.getAjaxPost('../../Controller/product/controller-product.product.php',
                {
                    addCart: 'add-cart',
                    idProduct: idProduct,
                    idCustomer: idCustomer
                }
            ).done(function (response) {
                response = response.trim()
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
            })
        }
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
