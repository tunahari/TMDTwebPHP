$(document).ready(function() {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box').hide()

    // Lấy ra các nhân viên
    function fetchEmployee (fetchEmployee, limitEmployee, pageEmployee, queryEmployee, 
        sortIDEmployee, sortDateEmployee, sortPositionEmployee) {
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.employee.php', 
        {
            fetchEmployee: fetchEmployee,
            limitEmployee: limitEmployee,
            pageEmployee: pageEmployee,
            queryEmployee: queryEmployee,
            sortIDEmployee: sortIDEmployee,
            sortDateEmployee: sortDateEmployee,
            sortPositionEmployee: sortPositionEmployee
        }
        ).done(function(response){
            if (response !== '') {
                var dataResponse = JSON.parse(response)
                if (dataResponse[1] !== null) {
                    dataResponse[0].length !== 465 ? $('.pagination__employee').html(dataResponse[0]) : $('.pagination__employee').html('')
                    $('.table__employee__tbody').html(dataResponse[1])
                } else {
                    $('.table__employee__tbody').html(
                        `<tr class="employee__data__not__found__tr">
                             <td colspan="6" class="employee__data__not__found__tr__td">
                                <div class="employee__data__not__found">
                                    Không tìm thấy nhân viên phù hợp, vui lòng thử lại!
                                </div>
                             </td>
                        </tr>`
                    )
                    $('.pagination__employee').html('')
                }
            } else {
                console.log('Empty!')
            }
        });
    }

    /* Mặc định khi hiển thị */
    fetchEmployee ('fetch-employee', '5', '1', '', 'DESC', 'ASC', 'ASC')

    /* Xử lý chọn số item hiển thị một trang */
    $('body').on('mouseup', function() {
        $('.select__employee__option__box').removeClass('active')
    });
    $($('.select__employee__option').get(0)).unbind('click')
    $('.select__employee__option__selected').click(function() {
        $('.select__employee__option__box').toggleClass('active')
    })
    $('.select__employee__option').click(function() {
        var limitEmployee = $(this).html().trim()
        var pageEmployee = $('.pagination__employee__item.active').attr('value')
        var queryEmployee = $('#search__employee__input').val().trim()
        var sortIDEmployee = $('#sort__employee__id').attr('value').trim()
        var sortDateEmployee = $('#sort__employee__date').attr('value').trim()
        var sortPositionEmployee = $('#sort__employee__position').attr('value').trim()
        fetchEmployee ('fetch-employee', limitEmployee, pageEmployee, queryEmployee, sortIDEmployee, sortDateEmployee, sortPositionEmployee)
        $('.select__employee__option__selected').html(limitEmployee)
        $('.select__employee__option__box').removeClass('active')
    })

    /* Xử lý bấm nút phân trang */
    $(document).on('click', '.pagination__employee__item', function() {
        var limitEmployee = $('.select__employee__option__selected').text().trim()
        var pageEmployee = $(this).attr('value')
        var queryEmployee = $('#search__employee__input').val().trim()
        var sortIDEmployee = $('#sort__employee__id').attr('value').trim()
        var sortDateEmployee = $('#sort__employee__date').attr('value').trim()
        var sortPositionEmployee = $('#sort__employee__position').attr('value').trim()
        fetchEmployee ('fetch-employee', limitEmployee, pageEmployee, queryEmployee, sortIDEmployee, sortDateEmployee, sortPositionEmployee)
    })

    /* Xử lý tìm kiếm */
    $('#search__employee__input').keyup(function () {
        var limitEmployee = $('.select__employee__option__selected').text().trim()
        var pageEmployee = $('.pagination__employee__item.active').attr('value')
        var queryEmployee = $(this).val().trim()
        var sortIDEmployee = $('#sort__employee__id').attr('value').trim()
        var sortDateEmployee = $('#sort__employee__date').attr('value').trim()
        var sortPositionEmployee = $('#sort__employee__position').attr('value').trim()
        fetchEmployee ('fetch-employee', limitEmployee, pageEmployee, queryEmployee, sortIDEmployee, sortDateEmployee, sortPositionEmployee)
    })

    /* Xử lý sắp xếp theo ID */
    $('#sort__employee__id').click(function() {
        var limitEmployee = $('.select__employee__option__selected').text().trim()
        var pageEmployee = $('.pagination__employee__item.active').attr('value')
        var queryEmployee = $('#search__employee__input').val().trim()
        var sortDateEmployee = '';
        var sortPositionEmployee = ''
        $('#sort__employee__date').attr('value','')
        $('#sort__employee__position').attr('value','')
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__employee__id').attr('value', 'DESC') : $('#sort__employee__id').attr('value', 'ASC')
        }
        var sortIDEmployee = $(this).attr('value')
        fetchEmployee ('fetch-employee', limitEmployee, pageEmployee, queryEmployee, sortIDEmployee, sortDateEmployee, sortPositionEmployee)
    })

    /* Xử lý sắp xếp theo ngày tạo */
    $('#sort__employee__date').click(function() {
        var limitEmployee = $('.select__employee__option__selected').text().trim()
        var pageEmployee = $('.pagination__employee__item.active').attr('value')
        var queryEmployee = $('#search__employee__input').val().trim()
        var sortIDEmployee = '';
        var sortPositionEmployee = ''
        $('#sort__employee__id').attr('value','')
        $('#sort__employee__position').attr('value','')
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__employee__date').attr('value', 'DESC') : $('#sort__employee__date').attr('value', 'ASC')
        }
        var sortDateEmployee = $(this).attr('value')
        fetchEmployee ('fetch-employee', limitEmployee, pageEmployee, queryEmployee, sortIDEmployee, sortDateEmployee, sortPositionEmployee)
    })

    /* Xử lý sắp xếp theo chức vụ */
    $('#sort__employee__position').click(function() {
        var limitEmployee = $('.select__employee__option__selected').text().trim()
        var pageEmployee = $('.pagination__employee__item.active').attr('value')
        var queryEmployee = $('#search__employee__input').val().trim()
        var sortIDEmployee = '';
        var sortDateEmployee = ''
        $('#sort__employee__id').attr('value','')
        $('#sort__employee__date').attr('value','')
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__employee__position').attr('value', 'DESC') : $('#sort__employee__position').attr('value', 'ASC')
        }
        var sortPositionEmployee = $(this).attr('value')
        fetchEmployee ('fetch-employee', limitEmployee, pageEmployee, queryEmployee, sortIDEmployee, sortDateEmployee, sortPositionEmployee)
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

    /* Tạo mới một nhân viên */
    $('.Chat__Left__Create__Employee').click(function() {
        var limitEmployee = $('.select__employee__option__selected').text().trim()
        var pageEmployee = $('.pagination__employee__item.active').attr('value')
        var queryEmployee = $('#search__employee__input').val().trim()
        var sortIDEmployee = $('#sort__employee__id').attr('value').trim()
        var sortDateEmployee = $('#sort__employee__date').attr('value').trim()
        var sortPositionEmployee = $('#sort__employee__position').attr('value').trim()
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.employee.php', {createEmployee: 'create-employee'}).done(function(response){
            response = response.trim()
            if (response !== '' && response === 'create-success') {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    fetchEmployee ('fetch-employee', limitEmployee, pageEmployee, queryEmployee, sortIDEmployee, sortDateEmployee, sortPositionEmployee)
                    alertSuccess ('Thêm mới nhân viên thành công!')
                },2500)
            } else {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    alertFailed ('Thêm mới nhân viên thất bại!')
                },2500)
            }
        });
    })

    /* Xóa bớt một nhân viên */
    $(document).on('click', '.employee__action__delete__button', function(e) {
        var limitEmployee = $('.select__employee__option__selected').text().trim()
        var pageEmployee = $('.pagination__employee__item.active').attr('value')
        var queryEmployee = $('#search__employee__input').val().trim()
        var sortIDEmployee = $('#sort__employee__id').attr('value').trim()
        var sortDateEmployee = $('#sort__employee__date').attr('value').trim()
        var sortPositionEmployee = $('#sort__employee__position').attr('value').trim()
        e.preventDefault()
        $('.alert__delete__employee').addClass('active')  
        $('.alert__delete__employee__delete').attr('value', $(this).attr('value'))
        $('.alert__delete__employee__delete').click(function() {
            var idEmployeeDelete = $(this).attr('value') 
            ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.employee.php', {
                deleteEmployee: 'delete-employee',
                idEmployeeDelete: idEmployeeDelete
            }).done(function(response){
                response = response.trim()
                if (response !== '' && response === 'delete-success') {
                    $('.alert__delete__employee').removeClass('active')  
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        fetchEmployee ('fetch-employee', limitEmployee, pageEmployee, queryEmployee, sortIDEmployee, sortDateEmployee, sortPositionEmployee)
                        alertSuccess ('Xóa nhân viên NV' + idEmployeeDelete + ' thành công!')
                    },2500)
                } else {
                    $('.alert__delete__employee').removeClass('active')  
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertFailed ('Xóa nhân viên NV' + idEmployeeDelete + ' thất bại!')
                    },2500)
                }
            });
        })
    })
    $('.alert__delete__employee__cancel').click(function() {
        $('.alert__delete__employee').removeClass('active')  
    })
})