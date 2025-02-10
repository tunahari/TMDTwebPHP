$(document).ready(function () {
    $(document).on('click', '.Profile__Tab__Item', function() {
        $('.Profile__Tab__Item').map(function () { 
            $(this).removeClass('active')
        })
        $(this).addClass('active')
        $('.Profile__Panel__Item').map(function () { 
            $(this).removeClass('active')
        })

        $('.Profile__Tab__Item').map(function () { 
            if ($($(this)).hasClass('active')) {
                var tabID = $(this).attr('data-TabID')
                $($('.Profile__Panel__Item').get(tabID)).addClass('active')
            }
        })
    })

    $(document).on('click', '.Profile__Panel__Item__Bill__Left__Bill__Box', function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active')
        } else {
            $('.Profile__Panel__Item__Bill__Left__Bill__Box').map(function() {
                $(this).removeClass('active')
            })
            $(this).addClass('active')
        }
    })
})