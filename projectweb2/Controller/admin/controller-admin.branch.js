$(document).ready(function() {
    const ClassFuction = new HandlingFunctions();
    const ClassValidate = new ValidateData();
    $('.loading__box').hide()

    // Lấy ra các chi nhánh
    function fetchBranch (fetchBranch, limitBranch, pageBranch, queryBranch, sortIDBranch, sortDateBranch) {
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.branch.php', 
        {
            fetchBranch: fetchBranch,
            limitBranch: limitBranch,
            pageBranch: pageBranch,
            queryBranch: queryBranch,
            sortIDBranch: sortIDBranch,
            sortDateBranch: sortDateBranch
        }
        ).done(function(response){
            var dataResponse = JSON.parse(response)
            if (dataResponse[1] !== null) {
                dataResponse[0].length !== 439 ? $('.pagination__branch').html(dataResponse[0]) : $('.pagination__branch').html('')
                $('.table__branch__tbody').html(dataResponse[1])
            } else {
                $('.table__branch__tbody').html(
                    `<tr class="branch__data__not__found__tr">
                         <td colspan="6" class="branch__data__not__found__tr__td">
                            <div class="branch__data__not__found">
                                Không tìm thấy chi nhánh phù hợp, vui lòng thử lại!
                            </div>
                         </td>
                    </tr>`
                )
                $('.pagination__branch').html('')
            }
        });
    }

    /* Mặc định khi hiển thị */
    fetchBranch ('fetch-branch', '5', '1', '', 'DESC', 'ASC')

    /* Xử lý chọn số item hiển thị một trang */
    $('body').on('mouseup', function() {
        $('.select__branch__option__box').removeClass('active')
    });
    $($('.select__branch__option').get(0)).unbind('click')
    $('.select__branch__option__selected').click(function() {
        $('.select__branch__option__box').toggleClass('active')
    })
    $('.select__branch__option').click(function() {
        var limitBranch = $(this).html().trim()
        var pageBranch = $('.pagination__branch__item.active').attr('value')
        var queryBranch = $('#search__branch__input').val().trim()
        var sortIDBranch = $('#sort__branch__id').attr('value').trim()
        var sortDateBranch = $('#sort__branch__date').attr('value').trim()
        fetchBranch ('fetch-branch', limitBranch, pageBranch, queryBranch, sortIDBranch, sortDateBranch)
        $('.select__branch__option__selected').html(limitBranch)
        $('.select__branch__option__box').removeClass('active')
    })

    /* Xử lý bấm nút phân trang */
    $(document).on('click', '.pagination__branch__item', function() {
        var limitBranch = $('.select__branch__option__selected').text().trim()
        var pageBranch = $(this).attr('value')
        var queryBranch = $('#search__branch__input').val().trim()
        var sortIDBranch = $('#sort__branch__id').attr('value').trim()
        var sortDateBranch = $('#sort__branch__date').attr('value').trim()
        fetchBranch ('fetch-branch', limitBranch, pageBranch, queryBranch, sortIDBranch, sortDateBranch)
    })

    /* Xử lý tìm kiếm */
    $('#search__branch__input').keyup(function () {
        var limitBranch = $('.select__branch__option__selected').text().trim()
        var pageBranch = $('.pagination__branch__item.active').attr('value')
        var queryBranch = $(this).val().trim()
        var sortIDBranch =  $('#sort__branch__id').attr('value').trim()
        var sortDateBranch = $('#sort__branch__date').attr('value').trim()
        fetchBranch ('fetch-branch', limitBranch, pageBranch, queryBranch, sortIDBranch, sortDateBranch)
    })

    /* Xử lý sắp xếp theo ID */
    $('#sort__branch__id').click(function() {
        var limitBranch = $('.select__branch__option__selected').text().trim()
        var pageBranch = $('.pagination__branch__item.active').attr('value')
        var queryBranch = $('#search__branch__input').val().trim()
        var sortDateBranch = '';
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__branch__id').attr('value', 'DESC') : $('#sort__branch__id').attr('value', 'ASC')
        }
        var sortIDBranch = $(this).attr('value')
        fetchBranch ('fetch-branch', limitBranch, pageBranch, queryBranch, sortIDBranch, sortDateBranch)
    })

    /* Xử lý sắp xếp theo ngày thành lập */
    $('#sort__branch__date').click(function() {
        var limitBranch = $('.select__branch__option__selected').text().trim()
        var pageBranch = $('.pagination__branch__item.active').attr('value')
        var queryBranch = $('#search__branch__input').val().trim()
        var sortIDBranch = '';
        if ($(this).attr('value') === '') {
            $(this).attr('value', 'ASC')
        } else {
            $(this).attr('value') === 'ASC' ? $('#sort__branch__date').attr('value', 'DESC') : $('#sort__branch__date').attr('value', 'ASC')
        }
        sortDateBranch = $(this).attr('value')
        fetchBranch ('fetch-branch', limitBranch, pageBranch, queryBranch, sortIDBranch, sortDateBranch)
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
    
    /* Tạo mới một chi nhánh */
    $('.Chat__Left__Create__Branch').click(function() {
        var limitBranch = $('.select__branch__option__selected').text().trim()
        var pageBranch = $('.pagination__branch__item.active').attr('value')
        var queryBranch = $('#search__branch__input').val().trim()
        var sortIDBranch =  $('#sort__branch__id').attr('value').trim()
        var sortDateBranch = $('#sort__branch__date').attr('value').trim()
        ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.branch.php', {createBranch: 'create-branch'}).done(function(response){
            response = response.trim()
            if (response !== '' && response === 'create-success') {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    fetchBranch ('fetch-branch', limitBranch, pageBranch, queryBranch, sortIDBranch, sortDateBranch)
                    alertSuccess ('Thêm mới chi nhánh thành công!')
                },2500)
            } else {
                $('.loading__box').show()
                setTimeout(function() {
                    $('.loading__box').hide()
                    alertFailed ('Thêm mới chi nhánh thất bại!')
                },2500)
            }
        });
    })

    /* Xóa bớt một chi nhánh */
    $(document).on('click', '.branch__action__delete__button', function(e) {
        var limitBranch = $('.select__branch__option__selected').text().trim()
        var pageBranch = $('.pagination__branch__item.active').attr('value')
        var queryBranch = $('#search__branch__input').val().trim()
        var sortIDBranch =  $('#sort__branch__id').attr('value').trim()
        var sortDateBranch = $('#sort__branch__date').attr('value').trim()
        e.preventDefault()
        $('.alert__delete__branch').addClass('active')  
        $('.alert__delete__branch__delete').attr('value', $(this).attr('value'))
        $('.alert__delete__branch__delete').click(function() {
            var idBranchDelete = $(this).attr('value') 
            ClassFuction.getAjaxPost('../../Controller/admin/controller-admin.branch.php', {
                deleteBranch: 'delete-branch',
                idBranchDelete: idBranchDelete
            }).done(function(response){
                response = response.trim()
                console.log(response)
                if (response !== '' && response === 'delete-success') {
                    $('.alert__delete__branch').removeClass('active')  
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        fetchBranch ('fetch-branch', limitBranch, pageBranch, queryBranch, sortIDBranch, sortDateBranch)
                        alertSuccess ('Xóa chi nhánh CN' + idBranchDelete + ' thành công!')
                    },2500)
                } else {
                    $('.alert__delete__branch').removeClass('active')  
                    $('.loading__box').show()
                    setTimeout(function() {
                        $('.loading__box').hide()
                        alertFailed ('Xóa chi nhánh CN' + idBranchDelete + ' thất bại!')
                    },2500)
                }
            });
        })
    })
    $('.alert__delete__branch__cancel').click(function() {
        $('.alert__delete__branch').removeClass('active')  
    })
})