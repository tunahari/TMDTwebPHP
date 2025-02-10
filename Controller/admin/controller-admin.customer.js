$(document).ready(function() {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box').hide()

    // Lấy ra các nhân viên
    function fetchCustomer (fetchCustomer, limitCustomer, pageCustomer, queryCustomer, 
        sortIDCustomer, sortDateCustomer, sortLevelCustomer) {
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.customer.php', 
        {
            fetchCustomer: fetchCustomer,
            limitCustomer: limitCustomer,
            pageCustomer: pageCustomer,
            queryCustomer: queryCustomer,
            sortIDCustomer: sortIDCustomer,
            sortDateCustomer: sortDateCustomer,
            sortLevelCustomer: sortLevelCustomer
        }
        ).done(function(response){
            response = response.trim()
            if (response !== '') {
                var dataResponse = JSON.parse(response)
                if (dataResponse[1] !== null) {
                    dataResponse[0].trim().length !== 464 ? $('.pagination__customer').html(dataResponse[0]) : $('.pagination__customer').html('')
                    $('.table__customer__tbody').html(dataResponse[1])
                } else {
                    $('.table__customer__tbody').html(
                        `<tr class="customer__data__not__found__tr">
                             <td colspan="6" class="customer__data__not__found__tr__td">
                                <div class="customer__data__not__found">
                                    Không tìm thấy nhân viên phù hợp, vui lòng thử lại!
                                </div>
                             </td>
                        </tr>`
                    )
                    $('.pagination__customer').html('')
                }
            } else {
                console.log('Empty!')
            }
        });
    }

    /* Mặc định khi hiển thị */
    fetchCustomer ('fetch-customer', '5', '1', '', 'DESC', 'ASC', 'ASC')

    /* Xử lý chọn số item hiển thị một trang */
    $('body').on('mouseup', function() {
        $('.select__customer__option__box').removeClass('active')
    });
    $($('.select__customer__option').get(0)).unbind('click')
    $('.select__customer__option__selected').click(function() {
        $('.select__customer__option__box').toggleClass('active')
    })
    $('.select__customer__option').click(function() {
        var limitCustomer = $(this).html().trim()
        var pageCustomer = $('.pagination__customer__item.active').attr('value')
        var queryCustomer = $('#search__customer__input').val().trim()
        var sortIDCustomer = $('#sort__customer__id').attr('value').trim()
        var sortDateCustomer = $('#sort__customer__date').attr('value').trim()
        var sortLevelCustomer = $('#sort__customer__level').attr('value').trim()
        fetchCustomer ('fetch-customer', limitCustomer, pageCustomer, queryCustomer, sortIDCustomer, sortDateCustomer, sortLevelCustomer)
        $('.select__customer__option__selected').html(limitCustomer)
        $('.select__customer__option__box').removeClass('active')
    })

    /* Xử lý bấm nút phân trang */
    $(document).on('click', '.pagination__customer__item', function() {
        var limitCustomer = $('.select__customer__option__selected').text().trim()
        var pageCustomer = $(this).attr('value')
        var queryCustomer = $('#search__customer__input').val().trim()
        var sortIDCustomer = $('#sort__customer__id').attr('value').trim()
        var sortDateCustomer = $('#sort__customer__date').attr('value').trim()
        var sortLevelCustomer = $('#sort__customer__level').attr('value').trim()
        fetchCustomer ('fetch-customer', limitCustomer, pageCustomer, queryCustomer, sortIDCustomer, sortDateCustomer, sortLevelCustomer)
    })

    /* Xử lý tìm kiếm */
    $('#search__customer__input').keyup(function () {
        var limitCustomer = $('.select__customer__option__selected').text().trim()
        var pageCustomer = $('.pagination__customer__item.active').attr('value')
        var queryCustomer = $(this).val().trim()
        var sortIDCustomer = $('#sort__customer__id').attr('value').trim()
        var sortDateCustomer = $('#sort__customer__date').attr('value').trim()
        var sortLevelCustomer = $('#sort__customer__level').attr('value').trim()
        fetchCustomer ('fetch-customer', limitCustomer, pageCustomer, queryCustomer, sortIDCustomer, sortDateCustomer, sortLevelCustomer)
    })

    /* Xử lý sắp xếp theo ID */
    $('#sort__customer__id').click(function() {
        var limitCustomer = $('.select__customer__option__selected').text().trim()
        var pageCustomer = $('.pagination__customer__item.active').attr('value')
        var queryCustomer = $('#search__customer__input').val().trim()
        var sortDateCustomer = ''
        var sortLevelCustomer = ''
        $('#sort__customer__level').attr('value','')
        $('#sort__customer__date').attr('value','')
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__customer__id').attr('value', 'DESC') : $('#sort__customer__id').attr('value', 'ASC')
        }
        var sortIDCustomer = $(this).attr('value')
        fetchCustomer ('fetch-customer', limitCustomer, pageCustomer, queryCustomer, sortIDCustomer, sortDateCustomer, sortLevelCustomer)
    })

    /* Xử lý sắp xếp theo ngày tạo */
    $('#sort__customer__date').click(function() {
        var limitCustomer = $('.select__customer__option__selected').text().trim()
        var pageCustomer = $('.pagination__customer__item.active').attr('value')
        var queryCustomer = $('#search__customer__input').val().trim()
        var sortIDCustomer = ''
        var sortLevelCustomer = ''
        $('#sort__customer__id').attr('value','')
        $('#sort__customer__level').attr('value','')
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__customer__date').attr('value', 'DESC') : $('#sort__customer__date').attr('value', 'ASC')
        }
        var sortDateCustomer = $(this).attr('value')
        fetchCustomer ('fetch-customer', limitCustomer, pageCustomer, queryCustomer, sortIDCustomer, sortDateCustomer, sortLevelCustomer)
    })

    /* Xử lý sắp xếp theo cấp độ */
    $('#sort__customer__level').click(function() {
        var limitCustomer = $('.select__customer__option__selected').text().trim()
        var pageCustomer = $('.pagination__customer__item.active').attr('value')
        var queryCustomer = $('#search__customer__input').val().trim()
        var sortIDCustomer = '';
        var sortDateCustomer = ''
        $('#sort__customer__id').attr('value','')
        $('#sort__customer__date').attr('value','')
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__customer__level').attr('value', 'DESC') : $('#sort__customer__level').attr('value', 'ASC')
        }
        var sortLevelCustomer = $(this).attr('value')
        fetchCustomer ('fetch-customer', limitCustomer, pageCustomer, queryCustomer, sortIDCustomer, sortDateCustomer, sortLevelCustomer)
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