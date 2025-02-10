var swiper = new Swiper(".Details__Page__Content__2__SpecialTrend__Swipper", {
    navigation: {
      nextEl: ".SpecialTrend__Swipper__Next",
      prevEl: ".SpecialTrend__Swipper__Prev",
    },
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    breakpoints: {  
      '500': {
      slidesPerView: 2,
      spaceBetween: 10,
      },
      '750': {
      slidesPerView: 3,
      spaceBetween: 10,
      },
      '1024': {
      slidesPerView: 4,
      spaceBetween: 10,
      },
    },
  }) 


$(document).ready(function() {
    // Hiện chi tiết sản phẩm
    $('.content-bottom-desciption-open').click(function() {
        $('.quickview').addClass('active')
    })
    $('.quickview-close').click(function() {
        $('.quickview').removeClass('active')
    })
    $('.quickview-blur').click(function() {
        $('.quickview').removeClass('active')
    })
    $('.bottom-reviews').hide()
    $('.bottom-tittle-review').removeClass('active')
    $('.bottom-description').show()
    $('.bottom-tittle-desc').addClass('active')
    $('.bottom-tittle-desc').click(function() {
        $('.bottom-reviews').hide()
        $('.bottom-description').show()
        $('.bottom-tittle-desc').addClass('active')
        $('.bottom-tittle-review').removeClass('active')
    })
    $('.bottom-tittle-review').click(function() {
        $('.bottom-description').hide()
        $('.bottom-reviews').show()
        $('.bottom-tittle-review').addClass('active')
        $('.bottom-tittle-desc').removeClass('active')
    })
    $('.review-button').click(function() {
        $('html, body').animate({
            scrollTop: $('.content-bottom-desciption').offset().top - 200
        }, 1000)
        $('.bottom-description').hide()
        $('.bottom-reviews').show()
        $('.bottom-tittle-review').addClass('active')
        $('.bottom-tittle-desc').removeClass('active')
    })

    // Slide sản phẩm
    $('.details-small-img').click(function() {
        $('.details-small-img').removeClass('active')
        $(this).addClass('active')
        $('.details-main-img img').attr('src', $(this).find('img').attr('src'))
    })

    $('.details-small-img').mousemove(function() {
        $('.details-small-img').removeClass('active')
        $(this).addClass('active')
        $('.details-main-img img').attr('src', $(this).find('img').attr('src'))
    })
})
